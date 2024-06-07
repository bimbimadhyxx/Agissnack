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
define( 'DB_NAME', 'agis_snack' );

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
define( 'AUTH_KEY',         '97GfS]qvM|N;UCMf.rcQX`:Vl>JWK6Y%d9a&Q{P0<XQP3FQ3ra@I1Or%Uh}~4fz|' );
define( 'SECURE_AUTH_KEY',  'vtn*Rr+@r1@WA5fk+kwmg7u<S{mJPv~ez2Wc0`5u^bBJ{c1f4qK>tmk<{V!@J.gh' );
define( 'LOGGED_IN_KEY',    's(L1Q.ae.|&w+orziF{Z@*pPk!QQkY+Oe?Be=.+Oxbwz`$a<f B[^OW#%fhfmGjg' );
define( 'NONCE_KEY',        'H@)hn3@KVeHIl>g@x8-d6&IIF&{F)-dXE)MxyY;N9o[M}xf%z8{iEe3R,|KGnSLb' );
define( 'AUTH_SALT',        'g/~pL1mhzq({.BSOv@<!fGGP2+d(v$@%qVTf63aNIA9DD[3(6Xk&Sz0(oJsrGvvM' );
define( 'SECURE_AUTH_SALT', '$9LpcCXsK#8*FTk0-@b73JPPV}>]Hd(}eiXHz*1uQ@6YqFgu0LN6,?8g6rPeUrzm' );
define( 'LOGGED_IN_SALT',   '56&rTy`t7zpFi4_D:rBgCM,cFbw{9U7r}M]>x<uKEk;!$?Kh&&m;>y/pftBkmr.D' );
define( 'NONCE_SALT',       'o>`JXeOCU4+E`7ni7ljGX5>0O~{<p9+Sv1Pdksr UY}_KB.Dw~m%KPT9WlD~4+:z' );

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
