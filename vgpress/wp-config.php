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
define( 'DB_NAME', 'vgpress' );

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
define( 'AUTH_KEY',         'V5)lTR2[vj=mS!k:gT ]qK,%- TAsKUW}RH|Q-L%BasZ9:`~!sw&EY8#[d7:r&zV' );
define( 'SECURE_AUTH_KEY',  '_6#*91W;,Bl[H]Y;sR.BHFxW7k5?~)wR&UafxilPg(#gajm#i-QpYB1#o46?i-s.' );
define( 'LOGGED_IN_KEY',    'MWukL>AwnxH}w+>PglFZ_^(.T]Vf>o)k<^:%]`$sx.I?jZ<:%<lE$f96yHV`_cXG' );
define( 'NONCE_KEY',        'wB1iEU]~m7,u<.M5[).lyNWp<w{McO@CyA4xA[PJI=/gLP>841;o[&ME|B ^HME.' );
define( 'AUTH_SALT',        'n{<!jXDtLo-sfpWl_EY1B`U3TyYP0b9eacFN&1k~1U1M:r>+yf@A.xy`,[6p5@dr' );
define( 'SECURE_AUTH_SALT', '+&AD!iKe@!HZ.f5PfT/,%<+^s[8Xo=1]e-r29a woCUNlx.n$Ln2o!|8o%hM8[d8' );
define( 'LOGGED_IN_SALT',   'f=2H=`QwL7BQG@@XkD9sz>t6x6@FH;4S?#ze um;lUX0nTKeP;rxi<pzYnq?]Mw}' );
define( 'NONCE_SALT',       ']5DwoEGOs%7#7@Msi7VJ`vhLEqoE&DSN>3SbRl3^9Ay5QzR@*u}s)Y*zFti:|ve]' );

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
