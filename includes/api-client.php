<?php
require_once dirname(__FILE__) . '/../SimpleEnvLoader.php';
try {
    SimpleEnvLoader::load(dirname(__FILE__) . '/..');
} catch (Exception $e) {
    // Fall through with GO_API_BASE/GO_API_KEY undefined; go_api_get() below
    // requires them to be defined externally in that case.
}

if (!defined('GO_API_BASE')) {
    define('GO_API_BASE', SimpleEnvLoader::get('GO_API_BASE', 'http://localhost/e-humanities/APIService2/human/greenoffice/'));
}
if (!defined('GO_API_KEY')) {
    define('GO_API_KEY', SimpleEnvLoader::get('GO_API_KEY', ''));
}

/**
 * Calls a Green Office backend JSON API endpoint (server-to-server, since the
 * front-end and back-end run on separate servers). Returns the decoded array
 * on success, or null on any failure (unreachable host, timeout, bad JSON) so
 * callers can fall back to a safe default instead of fataling the public site.
 */
function go_api_get($path, $params = []) {
    $url = GO_API_BASE . ltrim($path, '/');
    if (!empty($params)) {
        $url .= '?' . http_build_query($params);
    }

    if (!function_exists('curl_init')) {
        return null;
    }

    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 3);
    curl_setopt($ch, CURLOPT_TIMEOUT, 5);
    curl_setopt($ch, CURLOPT_HTTPHEADER, ['X-API-Key: ' . GO_API_KEY]);
    $response = curl_exec($ch);
    $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);

    if ($response === false || $httpCode < 200 || $httpCode >= 300) {
        return null;
    }

    $data = json_decode($response, true);
    if (json_last_error() !== JSON_ERROR_NONE) {
        return null;
    }

    return $data;
}

/**
 * Only lets http(s) URLs through before they're echoed into an href/src.
 * Backend fields like youtube_url/result_doc_link/external_link are free-text
 * entered by admins (and, for result_doc_link, category-scoped "responsible"
 * users) - htmlspecialchars() alone doesn't stop a javascript: URI from being
 * stored and then executed when a visitor clicks the link.
 */
function goc_safe_url($url) {
    if (!is_string($url) || $url === '') {
        return '';
    }
    return preg_match('~^https?://~i', $url) ? $url : '';
}
