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
define( 'DB_NAME', 'phongphu_new' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', '' );

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
define( 'AUTH_KEY',         '<]:/`!A 3g+bpWlsBAqOIc(e8p)sG~b-|ojSB* iph;]<dX8P@,~;MyICTG[ZkG8' );
define( 'SECURE_AUTH_KEY',  'jYpBDp`S9mIvq*([4AmMv[z~ulfDKT aZ<,Ay#hgBE8^tSSwZam ~F*,An1XFEQ#' );
define( 'LOGGED_IN_KEY',    '-CnJ>Ec~SD5VBoQxFnE#e#]%ZeuaGrb[3C7vLp(-/u`{O=X>]-U,KR+Ot:riu3{a' );
define( 'NONCE_KEY',        'wW8W3?)M{mB7l:YL*lP=lJ&:HRZzeqcnAkTz.Nta?.*tJype#5QP)*/QEfzOl6NF' );
define( 'AUTH_SALT',        '&8UJw?TX}#X}D){u0 qL7<k#8hbbc.njZb#8&f:5Q{a@ v6bJk>?hzH2bqo]3+3g' );
define( 'SECURE_AUTH_SALT', ' sb{wM*i/VV1.!MH^6m?8^>ra<ERH_cna~.&QG!^X2MP?>oMYzF[9yAbOpJSsU|c' );
define( 'LOGGED_IN_SALT',   ')qhSth6BS-Hw]SY>+ndFUVuRDbHTMg{lD?*YKu&PT!-PCwg!$q4sKUM2V#/z%^k8' );
define( 'NONCE_SALT',       'nBy9x)?YM3vYxT=&zy0z7i-sIy0.NgifvvN_JC=!t^Y3{I^cz#w-wF6cJ+RHWY$#' );

/**#@-*/

/**
 * WordPress Database Table prefix.
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
