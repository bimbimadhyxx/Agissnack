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
define( 'DB_NAME', 'RonaMakaroni' );

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
define( 'AUTH_KEY',         '==N:Xr71,O@FKr>CK8LLDl9rhDq%Vg6[pYS[mE+gW|)*!?/QIE{rLpc_D,tw8SG)' );
define( 'SECURE_AUTH_KEY',  '2h+LDa3w|QT+gy>df&/Q!OvgHesq)W^~W.]wXry6/@7z.|it>}k$I,r@:7,I&U{A' );
define( 'LOGGED_IN_KEY',    ', .qQGoBk<1zQ MfKe]to~g6@^MO<9cY`[p2MM7!F4{mle!IsMNuV4pn2 >Y&,;j' );
define( 'NONCE_KEY',        'Rn?*0TJ4})$tqtan>we=`bpEg<pW|4iCl2uT<B*NF=^s^D3<1rgbHFA0My9S5[DL' );
define( 'AUTH_SALT',        ')fKsl?;=:yTUC_#i&8I50bc[21S)}zikQy1,..:./&/{;T-EGvO.LklM{rSMf0Iq' );
define( 'SECURE_AUTH_SALT', '8yfY}xns *p5W[V|d5pH$6-AVi_E(xWwPw]_<;#,aJZ$0YHg56n}.Q1{IKjH^^X{' );
define( 'LOGGED_IN_SALT',   '.4O8p[^XT|>M,W!i>^L{JC|6Y>|/L)`S~y=>CD]$jrVX)}$)0gM?*_e7b`9+ /{4' );
define( 'NONCE_SALT',       '#,O`[d*;z`Pk2j%{YjneY(LZ<f?I,R}7(6ltOBoy&4^p 7]FC{2g~K8Y-[Qt.],A' );

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
