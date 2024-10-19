<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$active_group = 'default';
$query_builder = TRUE;

$db['default'] = array(
    'dsn'      => '',
    'hostname' => 'localhost', // Your MySQL host, typically 'localhost'
    'username' => 'root',      // Your MySQL username
    'password' => 'Admin@123', // Your MySQL password
    'database' => 'myapp',       // The database name you want to connect to
    'dbdriver' => 'mysqli',    // MySQLi driver for MySQL database
    'dbprefix' => '',          // Optional prefix for your tables
    'pconnect' => FALSE,       // FALSE is recommended for non-persistent connections
    'db_debug' => (ENVIRONMENT !== 'production'), // Show errors except in production
    'cache_on' => FALSE,       // Enable/disable query caching
    'cachedir' => '',          // Path to query cache files, leave empty if cache is disabled
    'char_set' => 'utf8',      // Character set for your database
    'dbcollat' => 'utf8_general_ci', // Database collation for MySQL
    'swap_pre' => '',          // Default table prefix swap
    'encrypt'  => FALSE,       // Set TRUE if you want an encrypted connection (SSL)
    'compress' => FALSE,       // Enable compression for MySQL
    'stricton' => FALSE,       // Use strict SQL mode for MySQL
    'failover' => array(),     // Array of backup database settings
    'save_queries' => TRUE     // Saves last executed query for debugging, can be set to FALSE for performance
);
