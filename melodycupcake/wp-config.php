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
define( 'DB_NAME', 'melodycupcake' );

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
define( 'AUTH_KEY',         '-*=, alk~%OIuw[iB84PprEN*A%{VQV^o|}mn5:1uSS?geO{!TyF(_p:-T9*~ l^' );
define( 'SECURE_AUTH_KEY',  'ZCS Sa?Xq7&#&e?bX5-x> mUVi|SnQYs]Rpjrt|?wI_6GIayEq`Qh~k/.ecFz`~l' );
define( 'LOGGED_IN_KEY',    'JA@B_Dsr,!vYqdE9AI.s+VoV9]{X;^*oyOF{Z2IqZ>mlE1#O.y0D9fBK5rz>6tb>' );
define( 'NONCE_KEY',        'o&az {aCgLTP5:Y2!%LQvP./Ja(rsYob2%nS*`0L7Mg$ymICu(9cn4UV#J^5rYG/' );
define( 'AUTH_SALT',        '^<(yjvYFFhoF):YKc+3JFG}B{|t1|^6_T_-_YYktS[[)aVP*JsZU46>S4SmF0su7' );
define( 'SECURE_AUTH_SALT', 'C{a6oG>>-Q?O[iGZ3gH`uEg>{Wqe;g<e`Hh}E,A6Z t/Qn_$}(_XRnV/UZ(({cXL' );
define( 'LOGGED_IN_SALT',   'tsP-JS7ykV95~^[8LTF&Q9.(z[DV4%3&JD+y*7G1|prMbQ;Uctql:>AH)X^tIz=2' );
define( 'NONCE_SALT',       'ElyL2)Fc:(*BQ&3W<K51l[!!^$wb#iR]q:(l@[$ cCHg%/<$%A6.w(4$@cYc%Fo ' );

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
