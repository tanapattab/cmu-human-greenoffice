<?php
header('Content-Type: text/html; charset=utf-8');
?>
<!DOCTYPE html>
<html lang="th">
<head>
<meta charset="utf-8">
<title>ทดสอบภาษาไทย UTF-8</title>
</head>
<body style="font-family: sans-serif; font-size: 20px; padding: 40px;">
    <p>ถ้าอ่านบรรทัดนี้ออกเป็นภาษาไทยปกติ แปลว่าเซิร์ฟเวอร์ตั้งค่า UTF-8 ถูกต้องแล้ว</p>
    <p>คณะมนุษยศาสตร์ มหาวิทยาลัยเชียงใหม่ - สำนักงานสีเขียว (Green Office)</p>
    <hr>
    <p style="color:#666;font-size:14px;">
        PHP version: <?php echo phpversion(); ?><br>
        default_charset (php.ini): <?php echo ini_get('default_charset') ?: '(ว่าง/ไม่ได้ตั้งค่า)'; ?><br>
        mbstring loaded: <?php echo extension_loaded('mbstring') ? 'ใช่' : 'ไม่ใช่'; ?><br>
        <?php if (extension_loaded('mbstring')): ?>
        mbstring.internal_encoding: <?php echo ini_get('mbstring.internal_encoding') ?: '(ว่าง)'; ?><br>
        mbstring.http_output: <?php echo ini_get('mbstring.http_output') ?: '(ว่าง)'; ?><br>
        mbstring.encoding_translation: <?php echo ini_get('mbstring.encoding_translation') ?: '(ว่าง/ปิด)'; ?><br>
        <?php endif; ?>
    </p>
</body>
</html>
