<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the
 * installation. You don't have to use the web site, you can
 * copy this file to "wp-config.php" and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * MySQL settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'wordpress-theme-from-scratch' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', '' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

if ( !defined('WP_CLI') ) {
    define( 'WP_SITEURL', $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['HTTP_HOST'] );
    define( 'WP_HOME',    $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['HTTP_HOST'] );
}



/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'qiaIU1fdbRFAabPt4baYJoAUPdxORuMuMDQMPnETUd8jtpmiCI2vhpM5so0gG81G' );
define( 'SECURE_AUTH_KEY',  'yJybWiBrJRYXjRN4byazmGS1oWHjNuZvWU8XTIO3DcHxJYkasTKKBVabSdrdrvrw' );
define( 'LOGGED_IN_KEY',    '7prjohVGgnO1QokMKcE0cmZPM63N7DxKgXwkrdjTinnV61ELuV9XBysyDPX000xp' );
define( 'NONCE_KEY',        'nZx9qOuY6F5lQbst9AqAz1ecau7biE6ovEP6ugsD20y2qo1e2m7zuTiqgOk3k0Vn' );
define( 'AUTH_SALT',        'PIlirzgkadiGH5LiM2XSF2qRoA5tLFYFOM9qv1yYKGkYRBJif2jzW3y59XOTWKeu' );
define( 'SECURE_AUTH_SALT', 'bX8ggnv36Oldfinf4fP5jpQW9gH2R6SLSrQdkV5Xuayc3wP1F0z9D6LFgOqnvcnI' );
define( 'LOGGED_IN_SALT',   'OFYRG2kDuiW8It6Op8GAiGyJmbmM3kLnEtnEIjk3eRsAYkPNvUFYyparByDXe91B' );
define( 'NONCE_SALT',       'tcawuj1sXsUCYT21co6spORnKeN8FLkJQ18AvCMeZUSwjTGHiwpin6fzcJrlEO28' );

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the documentation.
 *
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
