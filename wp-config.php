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
define( 'DB_USER', 'admin' );

/** Database password */
define( 'DB_PASSWORD', '123456' );

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
define( 'AUTH_KEY',         '+49k0nSUkaWv$kRM^PNfqmv|t0h&+_F&^u!J7<VlB-%#^[ye~ZWFg)(jvAA!pl$]' );
define( 'SECURE_AUTH_KEY',  'G[=x&3}-;p^@B<er~qr^54So}(d*&#b:kDK2p.x?nkxl72z_E%j1VWn<I6=&tN~a' );
define( 'LOGGED_IN_KEY',    '~oC9o$5q>G`U+ #NOdB}(M/oQc.@4 ^?r)aq[4&cKE_EGG4zL85VO<2+isI)vgXI' );
define( 'NONCE_KEY',        'DF UD)LJJI$f@`#j_2lQh<jTHcs2WFuq[U]FZ g/T3SF,6ZI{s**O*m>M0fp=xtP' );
define( 'AUTH_SALT',        '7=p$e;S,HK*vJ%oq9F6<yf`J=(lWY1xL4caRuR^eV gB rXkQhTn2 C9kAn#SSt&' );
define( 'SECURE_AUTH_SALT', 'Vz5{W%A7kU=.#kF/g:({1E953D$9#t|wK[]mQZiREA02ks`Ykmjp>IU`~d!6NtH2' );
define( 'LOGGED_IN_SALT',   '%rf)e6r.rx{?oz Nd1T#)E?=N8:B-Jm4^-L2=>olVg`cWZs0-<{jRx~]c%tt<Y*C' );
define( 'NONCE_SALT',       'O EN*pv{UFS1x&HMT.Ks/[IR[^x3O`4O9+C2`R^,ugP_yi2`h? {+I7J zm~|rzU' );

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
