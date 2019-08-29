<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the
 * installation. You don't have to use the web site, you can
 * copy this file to "wp-config.php" and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * MySQL settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'danao' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', 'root' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         '9oFPfMx.5Im4.sGUb?L5q #SJ.c_meP(87^=cb@N^_^qo{`MC%2KV:-/>AfuFGbb' );
define( 'SECURE_AUTH_KEY',  'DQQ7FF<&;X(Yv8[SPQG@-R[K#DVFZ!S57+evoWA#ut_V_]!Z)Ii@u|wmi9X9#vFh' );
define( 'LOGGED_IN_KEY',    '*:Cop#Hq|oKqREA[[N{t!0#z8om_]GY!_ZO KH2cpoO}S`/qzj1jeP[h=^e,Xu A' );
define( 'NONCE_KEY',        'Xx@euZjk4ud^_/L4kWkaA-<SH<KLIUBKmqODQ2[G|vg)k0N|BtSRKm-V6gQ,B};1' );
define( 'AUTH_SALT',        '#_>c,#iZWz%buU<!-H@nztCkP)[!Z)g6OkQR>4LZwF CJlSj@(3x%$8LwlTU~WZW' );
define( 'SECURE_AUTH_SALT', '4A}4<rDTlZ1&sm=xo-Uk]Jo*hdJ[*U~>[K[p(r`/yfB7R?&`1xlsi(o+yN5=b/Y|' );
define( 'LOGGED_IN_SALT',   'gFXe(+7:pf45W-6.x#XU]t.?,s|-?Uu=[E@J`%~<Qa(Ge]1g8}mG=D_Os_5!.a}3' );
define( 'NONCE_SALT',       'hPH|K^Z`.$b3^Z#sqjp_UndWYd;D{$>W@)[}k]kVe{R2_^51/ 8$yOJYjWjm_.{G' );

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'azoYP6X2Yw_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define( 'WP_DEBUG', false );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Sets up WordPress vars and included files. */
require_once( ABSPATH . 'wp-settings.php' );
