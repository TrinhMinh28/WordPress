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
define( 'DB_NAME', 'wp_demoPlugin' );

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
define( 'AUTH_KEY',         'eymDM1t~4>,YUJ2<rJAD4yiU#_+^k|$BqNi0Ru8thmjVH5b`mzYazl/*uLva4f81' );
define( 'SECURE_AUTH_KEY',  'AbA@zn{?#8^V$HQwh24->9ffD5pR,pv;R:ZT)O 5i{ABEzvA&4[*}BC_$ZaL<?ve' );
define( 'LOGGED_IN_KEY',    'XFZC>HGmy#|n^l^9bs9*a/2xnP {<++<;+3;|A*RVtl79&s[j`t^xNjIfs$`[Fs#' );
define( 'NONCE_KEY',        'cYXiR(AJ82;bsS>,+jIGh!S&SCw#VUd N[*g]9g%w[Vo`Lk9y~d@9qX#Dx:;l;ZQ' );
define( 'AUTH_SALT',        '^@>];F9?{~y<tgs3e;a^(0p74tH^FrYbwr(M9Ou]saS^@X&9M/fNMQq#dRzDcmFc' );
define( 'SECURE_AUTH_SALT', '%&ma)ka:LY%6)c`ERK$u|`zf!ke[0O!SBR~G*[^^QuPIRubj,gy/t,L/;[Z=7-X7' );
define( 'LOGGED_IN_SALT',   'Yu^ww*~:GRTq7*cEB9Z^55$|+c}VA@Mh~JUX@0M3YYT23x{kfH i?_/8oLP3v?7q' );
define( 'NONCE_SALT',       's#:@]]&qPNr,Ik,]ps_)VRh(W@=K6[GSu U&~ZTgGCOgX 4_R5I,z5[XkOB.JZNr' );

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
