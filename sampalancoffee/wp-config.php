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
define( 'DB_NAME', 'sampalancoffee' );

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
define( 'AUTH_KEY',         '`$dVvP.~YR(3?t3CZh^>;Xw2*t8ZD`ysFg/8:GHLyrG ]wRaW7~,%,m}fkjdsQSJ' );
define( 'SECURE_AUTH_KEY',  '-:l{JH#y{D4cbwShS+lyS:{f@$/v(Yfmu1,{4,;N03{VjEgm{Q8Ug/|rC)^YHvh.' );
define( 'LOGGED_IN_KEY',    'Y37Ff(Tyv-N42RqS4m_@3zI4.?Yr.5,?G{XLjquMX]crivmN:PsWJW#3zgf=P.gw' );
define( 'NONCE_KEY',        ',jbubpSwoNG/=~0!,-;+VpdM=)BLe jZMUHsz&.N{L<9Py] blNm6p4d~)Y1eA}S' );
define( 'AUTH_SALT',        '|P}76)>/.{pehnMiajpFLh_ R`4!Kkp+&Ow1SLXg:Rbu.-wb8/p}oG=UhC~k+|&>' );
define( 'SECURE_AUTH_SALT', 'Ac.<X^t4c%o9*s%x)iH`pteod4+P^B06)A?i>if}VvUFj8kN6j0z&gwVLoqbj^6v' );
define( 'LOGGED_IN_SALT',   'L)g?&FvDm!;3f6bn[sM%xy_WS[&6k-9WP6N@!~fg,tnLi#Wz#)aB<Al$fvmozTI0' );
define( 'NONCE_SALT',       'c$K`YG:uZ,H4iSCJ(f@Y}C%]eI%IJUp6/m:/Ng6La6:D}]eXP|@6e++?3 +/44[D' );

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
