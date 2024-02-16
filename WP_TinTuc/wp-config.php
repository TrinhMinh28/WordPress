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
define( 'DB_NAME', 'wp_tintuc' );

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
define( 'AUTH_KEY',         '+%pNr.);nNlF ~E<qYI*QB(9kY,f&mIC5)}Q5^T?2*[ttwTE2hGB|mimS|a|/x)q' );
define( 'SECURE_AUTH_KEY',  'sI;W#$MpGOP5zXEgx!I{szjpxuuD3$B/`(n`iJW(}cF_P0PKBYj!2hZ)U.cUO7;e' );
define( 'LOGGED_IN_KEY',    'JpQ?OL_aCl6)ACDRO3(]oCSJx!R3Q[:@vcd9B]KNxg[yWRrE]H(?vJ0M45yd3wv*' );
define( 'NONCE_KEY',        'S7-/%_>brK@mH}N4/qZxE)/~feCs|M,`<s*.NsCqksd1[{U:LH)o,iu@_:YH<bP=' );
define( 'AUTH_SALT',        '3Q#*o]gV V#_HFopiP(DR;*=jYqmo%`]B$1Z3`=r;x4AX^t<5Ca,H}vzCEtKW=2Z' );
define( 'SECURE_AUTH_SALT', '}29Gz_(xc[yG,s^n{R_fwxr>pZJsX=z$2r9^hvnG+MW@otjK(*n/Om0&9o(a{hJJ' );
define( 'LOGGED_IN_SALT',   '3cGKF;<LwGjxC37G Vr9cEjF/Bd;%^F(PSVg.tQfS~]e{ft4i82P.A31^f};}ey3' );
define( 'NONCE_SALT',       '+O9C2z^pC>5b>t^#ik|<oT#D#tyX,liNnb|LS7SIcaDfalA$GZ]IoD6kyh5}cLm[' );

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
