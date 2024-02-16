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
define( 'DB_NAME', 'wp_banhang' );

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
define( 'AUTH_KEY',         'q92%>J+R45leb:)>s/*VoI&6>e9=P)>(FyMrRuh)dEupWuT`G|#Z{A)%Lj*jM}XZ' );
define( 'SECURE_AUTH_KEY',  'Uu3{Z{ VG<hT8JCm]KlC/f1/,|=[9Y|LE>Cjov rLUn/1Yk96!M$g1O<aw|E?L8N' );
define( 'LOGGED_IN_KEY',    ')b_1Bvcb[5Ey_ h+gZ}m.STt1a.:!7dI[=G=E Z*;Wkcg<ZdWce)<!CRNXK5=^G/' );
define( 'NONCE_KEY',        '`[89~[woQR({:_L&[7+L9xg8=^hcscmHRz>K)_Y%B_r7nmsAtG?,Wrq7Wu?Crx3X' );
define( 'AUTH_SALT',        ').RNE7D4,H= QcOH!2peuDm+Q}(uVSamQv?nWIs)]ZhEpPCG?Puig#Mv)MZ3CE5B' );
define( 'SECURE_AUTH_SALT', 'ia6k`ED3he{^!!&yy`nfP2E0@~8ea(twJQB*f-6ZG[T-VfAF?y;3*J+r`tE5wn;h' );
define( 'LOGGED_IN_SALT',   '`s?/%T*.VPyZ&X,91%KYWB8J8CW]KW]naMQL@6+3h@:Pd##WbTN_+dP8#ux-tt#V' );
define( 'NONCE_SALT',       '?]m:r_5M:k+I-3xU8PEcsd0oAxWgYjM4ae0s3>lT_gFS6oQf|tVX @zaHsBZ4&2e' );

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
