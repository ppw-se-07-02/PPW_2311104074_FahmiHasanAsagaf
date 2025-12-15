<?php
/**
 * The base configuration for WordPress
 *
 * @link https://wordpress.org/documentation/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings ** //
define( 'DB_NAME', 'webbaru_db' );      // Nama database kamu
define( 'DB_USER', 'root' );            // User database XAMPP
define( 'DB_PASSWORD', '' );            // Password (kosong)
define( 'DB_HOST', 'localhost' );       // Host database

define( 'DB_CHARSET', 'utf8mb4' );
define( 'DB_COLLATE', '' );

// ** Authentication Unique Keys and Salts ** //
// Kamu boleh pakai ini apa adanya untuk lokal
define('AUTH_KEY',         'put your unique phrase here');
define('SECURE_AUTH_KEY',  'put your unique phrase here');
define('LOGGED_IN_KEY',    'put your unique phrase here');
define('NONCE_KEY',        'put your unique phrase here');
define('AUTH_SALT',        'put your unique phrase here');
define('SECURE_AUTH_SALT', 'put your unique phrase here');
define('LOGGED_IN_SALT',   'put your unique phrase here');
define('NONCE_SALT',       'put your unique phrase here');

// ** Table Prefix ** //
$table_prefix = 'wp_';

// ** Debug Mode ** //
define( 'WP_DEBUG', true );
define( 'WP_DEBUG_DISPLAY', true );
define('FS_METHOD', 'direct');

// That's all, stop editing! Happy publishing.

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
    define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
