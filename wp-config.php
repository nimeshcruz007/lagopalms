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
 * * Localized language
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'lagopalms' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', '' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

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
define( 'AUTH_KEY',          '<P%-n$MF6r$Q-6*7YT3.yI8O!A(gG-X4b9l%o:(pm`BC}5!UPcr>Y(bc[@;_TBOo' );
define( 'SECURE_AUTH_KEY',   'a@ekT1GIg3Ot%RDEd`;ZE_SL8hMW4.1HMh-EGT=ogKQR/Ll,LQ?iX~qf9O$MoA#+' );
define( 'LOGGED_IN_KEY',     '&;3n@yiS6y*ppOlvHI}Kp61!RvjK-G>y=?Ssr>Z60/[`PVQ*TqR|Vo$i`Pq/vSu4' );
define( 'NONCE_KEY',         'Sg`4T]O&uR5Q[GwISt:~$>O]eP2cHk?E/LjewAWvQ`M{7|WZ6jF;LGoM(jru)7v#' );
define( 'AUTH_SALT',         'q]EWAm^qF}/am1ds:@lowp,C[V B[^ZkIk7]%:idW*/>y}v:3$p0-:|D*E!qi~@&' );
define( 'SECURE_AUTH_SALT',  'oAwY4Y,Y|452t3GP21O)C/lu]qXCtH;&K$3,IjLG=An+E7C(h&&nQ5}~H6eWkDi9' );
define( 'LOGGED_IN_SALT',    'cJP>D+T[OXZ5uZ2c#k5C|KRvb~OiZn>GRB0,?+AV^xt~t2r{v#CB.E}Q%#:vRCo4' );
define( 'NONCE_SALT',        '0y.X$iu6!G3gP#*EM3Mohld)tsWww $Yqbcc3+``2l=P{Pvtc0lD$%XBSJxZ/TPx' );
define( 'WP_CACHE_KEY_SALT', 'n#$e!& O$s)H_hfRvu!c*RX//S4/{5z`KQckap%|^aE8v7EfU4_d>4Iikq_ASXzu' );


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
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', true );


/* Add any custom values between this line and the "stop editing" line. */



define( 'FS_METHOD', 'direct' );
define( 'WP_AUTO_UPDATE_CORE', 'minor' );
/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
