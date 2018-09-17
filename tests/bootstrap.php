<?php
declare(strict_types=1);

define('YII_DEBUG', true);
define('YII_ENV', 'dev');

if (!function_exists('env')) {
    function env ($varname) {
        return getenv($varname);
    }
}

if (!getenv('PDO_DB_DSN')) {
    putenv('PDO_DB_DSN=sqlite::memory:');
}

require(__DIR__ . '/../vendor/autoload.php');
require(__DIR__ . '/../vendor/yiisoft/yii2/Yii.php');
