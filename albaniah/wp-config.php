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
define( 'DB_NAME', 'albaniah' );

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
define( 'AUTH_KEY',         '@TNQ#Z@BF`rL |OC`TTjm6b>)TJzfbD_mXA`&e(_(`{H-S$~@@$a6;/AV@O7%kM]' );
define( 'SECURE_AUTH_KEY',  'F(=Nij*K6Da~Tj5qE=]q8}e}tpy7IrSP>|1JOuwBD5||KU;vqvW0cm61NRw=q}R#' );
define( 'LOGGED_IN_KEY',    'SO*H>-3^dFV 0gW=!Ofs0SIP!+ezuV1)h$8qT!U?%ZRkR$%ueBu!$<OFyS4ZXi6%' );
define( 'NONCE_KEY',        '&UkT!YBkGPty;taNp!)8k_=7MQNt9cy(:t0Klrm+@GcW*6lb<b>frp1ouNf7Z4Lp' );
define( 'AUTH_SALT',        '+uWU?@UV~b3HQ)Zk^o$w&?^ajJESjT1gNC^Gm(D=a~{rxi4D%SH%#:QTVtD-u3YC' );
define( 'SECURE_AUTH_SALT', 'qZC,>26^oU@o8zia>)/Lw_0Y*6ksma~kzZweuDKRYez_`W!qTvcr$+[cJl4yFB<i' );
define( 'LOGGED_IN_SALT',   'V5qWxaJ3T_e;K*,RIkZMC`IFynd/F}aYwl[MI;^g&*&/>kpkGLN@WN}62,p{p8-S' );
define( 'NONCE_SALT',       '.D0]RIY@?xBDF1u! %N`RZfA+K=cw/ljmeMg0lPdIp!4`cRhinpTuA]f{LhXws`Q' );

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
