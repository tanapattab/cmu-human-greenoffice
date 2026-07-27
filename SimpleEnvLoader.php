<?php
/**
 * Simple .env Loader (ไม่ต้องใช้ Composer)
 * สำหรับโปรเจคที่ไม่สามารถติดตั้ง Composer ได้
 */
class SimpleEnvLoader {
    
    protected static $loaded = false;
    protected static $variables = [];
    
    /**
     * Load .env file
     * 
     * @param string $path Path to directory containing .env file
     * @return void
     */
    public static function load($path) {
        if (self::$loaded) {
            return;
        }
        
        $envFile = rtrim($path, '/') . '/.env';
        
        if (!file_exists($envFile)) {
            throw new Exception(".env file not found at: {$envFile}");
        }
        
        $lines = file($envFile, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
        
        foreach ($lines as $line) {
            // Skip comments
            if (strpos(trim($line), '#') === 0) {
                continue;
            }
            
            // Parse KEY=VALUE
            if (strpos($line, '=') !== false) {
                list($key, $value) = explode('=', $line, 2);
                
                $key = trim($key);
                $value = trim($value);
                
                // Remove quotes
                $value = self::removeQuotes($value);
                
                // Set in $_ENV and $_SERVER
                if (!array_key_exists($key, $_ENV)) {
                    $_ENV[$key] = $value;
                }
                
                if (!array_key_exists($key, $_SERVER)) {
                    $_SERVER[$key] = $value;
                }
                
                // Store in static array
                self::$variables[$key] = $value;
                
                // Also set using putenv
                putenv("{$key}={$value}");
            }
        }
        
        self::$loaded = true;
    }
    
    /**
     * Remove quotes from value
     * 
     * @param string $value
     * @return string
     */
    protected static function removeQuotes($value) {
        // Remove single quotes
        if (strlen($value) > 1 && $value[0] === "'" && $value[strlen($value) - 1] === "'") {
            return substr($value, 1, -1);
        }
        
        // Remove double quotes
        if (strlen($value) > 1 && $value[0] === '"' && $value[strlen($value) - 1] === '"') {
            return substr($value, 1, -1);
        }
        
        return $value;
    }
    
    /**
     * Get environment variable
     * 
     * @param string $key
     * @param mixed $default
     * @return mixed
     */
    public static function get($key, $default = null) {
        if (isset(self::$variables[$key])) {
            return self::$variables[$key];
        }
        
        if (isset($_ENV[$key])) {
            return $_ENV[$key];
        }
        
        if (isset($_SERVER[$key])) {
            return $_SERVER[$key];
        }
        
        $value = getenv($key);
        if ($value !== false) {
            return $value;
        }
        
        return $default;
    }
    
    /**
     * Check if loaded
     * 
     * @return bool
     */
    public static function isLoaded() {
        return self::$loaded;
    }
    
    /**
     * Get all variables
     * 
     * @return array
     */
    public static function getAll() {
        return self::$variables;
    }
}
?>
