<?php

$host = "YOUR_HOST HERE";
$port = 3306;
$driver = "mysql";

// If DDEV_PHP_VERSION is not set but IS_DDEV_PROJECT *is*, it means we're running (drush) on the host,
// so use the host-side bind port on docker IP
if (empty(getenv('DDEV_PHP_VERSION') && getenv('IS_DDEV_PROJECT') == 'true')) {
  $host = "127.0.0.1";
  $port = 64121;
}

$databases['default']['default']['database'] = "DATABASE_NAME";
$databases['default']['default']['username'] = "USERNAME";
$databases['default']['default']['password'] = "PASSWORD";
$databases['default']['default']['host'] = $host;
$databases['default']['default']['driver'] = $driver;
$databases['default']['default']['port'] = $port;