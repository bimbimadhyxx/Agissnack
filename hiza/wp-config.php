<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the website, you can copy this file to "wp-config.php"
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
define( 'DB_NAME', 'hiza' );

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
define( 'AUTH_KEY',         '>N Jt0ir?O6AjJeEe-x4mW@LM1W)Aixp7gQK)$[p4Gm=OWKD/]xx[KDRY>*j,l2S' );
define( 'SECURE_AUTH_KEY',  '|R:Eeb_Zbey(J`yso6Jy_z^SrKvK+yk$Q*cMTjst FVQSdz2>3KeMF@NHSS6df0_' );
define( 'LOGGED_IN_KEY',    ' Kf]?J2wYjU),vMzWUc1o(d.X!+w,k<ib,FFBuy!D2{Uz*u)c[i *j QORd,v@-7' );
define( 'NONCE_KEY',        'Yd@Jq j{p3cc0^H|_((e$TEU8>hub`B_}QSWo<qLH :cUz1judK5,!Hf$71L~Lm7' );
define( 'AUTH_SALT',        '`C@!I)4w<f,}$E/W~B6GTWo-uY9SIyO*h>6v:zs3ch~l*}p?J%/] MAq`z41)0.5' );
define( 'SECURE_AUTH_SALT', 'R9]t`Z2VERIa`~~7/^rN;2BRgWwd9y=Q#!a?c13N]/<!kSgm-nSo1]Ac4<NL!Baj' );
define( 'LOGGED_IN_SALT',   'ah$z9Zm.*<C*nn+=3jk@ T)Ms8147jKXObRKtg0a?q:j]X</L?:QzB==1uu-)kUU' );
define( 'NONCE_SALT',       '`%j]Esg6p=,;7bPafj:D~jt37UwH@Q](esb>s]X+)vap=UGG7D~AGav|VMEB{]9*' );

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
