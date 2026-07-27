<#
Auto-generate a WinSCP deploy script from files changed between two git refs
(same convention as e-humanities' deploy/generate_deploy.ps1).

Usage (run from PowerShell inside the human-greenoffice folder):

  .\deploy\generate_deploy.ps1

Default: diffs from tag "deployed" (last deploy point) to HEAD. If the
"deployed" tag doesn't exist yet (first deploy), diffs from git's empty-tree
hash instead - i.e. every tracked file in the repo.

To compare a different range:

  .\deploy\generate_deploy.ps1 -FromRef deployed -ToRef HEAD
#>

param(
    [string]$FromRef = $(if (git rev-parse -q --verify "deployed^{commit}" 2>$null) { "deployed" } else { "4b825dc642cb6eb9a060e54bf8d69288fbee4904" }),
    [string]$ToRef = "HEAD",
    [string]$OutFile = "deploy\deploy_auto.txt",
    [string]$LocalRoot = "D:\AppServ\www\human-greenoffice",
    [string]$RemoteRoot = "/var/www/html",
    [string]$SiteName = "human.greenoffice"
)

# -c core.quotepath=false: without this, git wraps any filename containing
# non-ASCII bytes (e.g. Thai characters) in double quotes and octal-escapes
# it (e.g. "images/HumanView_\340\271\222...") instead of printing it as
# plain UTF-8 - which then corrupts the mkdir/put paths built below.
git config core.quotepath false

# Files added/modified/renamed (NOT deleted - deletions need to be handled manually)
$changedFiles = git diff --name-only --diff-filter=ACMR $FromRef $ToRef

if (-not $changedFiles) {
    Write-Host "No changed files between $FromRef and $ToRef"
    exit
}

# Warn about deleted files - this script only handles uploads, not remote deletes
$deletedFiles = git diff --name-only --diff-filter=D $FromRef $ToRef
if ($deletedFiles) {
    Write-Host "WARNING: these files were deleted locally - remove them on production manually:"
    $deletedFiles | ForEach-Object { Write-Host "  - $_" }
    Write-Host ""
}

# WinSCP's `put` does NOT auto-create missing remote directories, and with
# `option batch continue` a put into a nonexistent folder fails silently and
# the script just moves on. So: collect every directory level (parent before
# child) touched by the changed files and `mkdir` each one first. Existing
# dirs will just error-and-continue harmlessly under batch mode.
$dirSet = New-Object 'System.Collections.Generic.HashSet[string]'
foreach ($f in $changedFiles) {
    $parts = ($f -replace '\\', '/') -split '/'
    $path = ""
    for ($i = 0; $i -lt $parts.Length - 1; $i++) {
        $path = if ($path -eq "") { $parts[$i] } else { "$path/$($parts[$i])" }
        [void]$dirSet.Add($path)
    }
}
# Sort so parent directories are created before their children
$sortedDirs = $dirSet | Sort-Object { ($_ -split '/').Length }, { $_ }

$lines = @()
$lines += "option batch continue"
$lines += "option confirm off"
$lines += "open `"$SiteName`""

foreach ($d in $sortedDirs) {
    $lines += "mkdir `"$RemoteRoot/$d`""
}

foreach ($f in $changedFiles) {
    $localPath = Join-Path $LocalRoot ($f -replace '/', '\')
    $remotePath = "$RemoteRoot/$f"
    $lines += "put `"$localPath`" `"$remotePath`""
}

$lines += "exit"

# -Encoding ASCII would replace non-ASCII filenames (e.g. Thai characters)
# with literal "?", producing a put command WinSCP can never find locally.
# Write UTF-8 without a BOM instead (Windows PowerShell 5.1's Out-File has
# no "utf8NoBOM" option, so use .NET directly).
$fullOutPath = [System.IO.Path]::Combine((Get-Location), $OutFile)
[System.IO.File]::WriteAllLines($fullOutPath, $lines, (New-Object System.Text.UTF8Encoding($false)))

Write-Host "Generated $OutFile with $($changedFiles.Count) file(s):"
$changedFiles | ForEach-Object { Write-Host "  - $_" }
Write-Host ""
Write-Host "Review the file, then run:"
Write-Host "`"C:\Program Files (x86)\WinSCP\WinSCP.com`" /script=`"$LocalRoot\$OutFile`""
