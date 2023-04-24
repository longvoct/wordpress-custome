<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the web site, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://wordpress.org/documentation/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'mywordpress' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', '' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The database collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication unique keys and salts.
 *
 * Change these to different unique phrases! You can generate these using
 * the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}.
 *
 * You can change these at any point in time to invalidate all existing cookies.
 * This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'dN9*^7Pue$DFeaB=5t[!!TFewLSz+E+oTLE`q<H?t;<1G]WK-vtl)+[Zv}mfg&|(' );
define( 'SECURE_AUTH_KEY',  '/[3H pmPfp9M&-0{1J@D1,n-k;Xe_mw*:cjM]XanT9HZN:Uc4Fhni3E,$gF4qkyW' );
define( 'LOGGED_IN_KEY',    'ZED`i|AeiWFB/n$P<hTp>0e>,MH!LA]&XpCarJ!rvVcP^p3(?K[y@=WVAZPq{lYq' );
define( 'NONCE_KEY',        '-oa9Z.Uo-TRp(lsqUU`gsIl==t]._367{}^9i=E(b#=BU8~<j=.r1M}_z1jS.0SM' );
define( 'AUTH_SALT',        '/WiS8E9H[I24$ +~6[gg!aGp+c5ngUbhTImh@`UvT/nW6HduC,$%H2-L`f!?}(@!' );
define( 'SECURE_AUTH_SALT', 'o#i:TmUUE#Q(y[P>9Aau!#flQfo1GB#ExH+;oTybTa`N+c=f:}]wY:#Wg`5E2FgP' );
define( 'LOGGED_IN_SALT',   'p5s<Z>#9Z2$b--wD7ZoXe5f+5K,49fCnoZ%`o&7({>{;THRI2Ot>/;l0s:AiUrX~' );
define( 'NONCE_SALT',       '$9Vxa5!%Pa]LTHR,.a8{!1OcfNQ^9VSfX8_%$[Stv22HZ}t1F@&mFjtHXK9q%B|{' );

/**#@-*/

/**
 * WordPress database table prefix.
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
 * @link https://wordpress.org/documentation/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
