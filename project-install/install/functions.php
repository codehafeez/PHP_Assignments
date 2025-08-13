<?php
// install/functions.php
function sanitizeInputs($data) {
    $inputs = [];
    foreach ($data as $key => $value) {
        $inputs[$key] = trim(htmlspecialchars($value));
    }
    return $inputs;
}

function createConfigFile($inputs) {
    $configContent = "<?php
// Database Configuration
define('DB_HOST', '".addslashes($inputs['db_host'])."');
define('DB_NAME', '".addslashes($inputs['db_name'])."');
define('DB_USER', '".addslashes($inputs['db_user'])."');
define('DB_PASS', '".addslashes($inputs['db_pass'])."');

// Application Settings
define('APP_NAME', 'My Product');
define('APP_URL', 'http://".$_SERVER['HTTP_HOST']."');

// Security
define('SECRET_KEY', '".bin2hex(random_bytes(32))."');
";

    return file_put_contents('../config.php', $configContent);
}