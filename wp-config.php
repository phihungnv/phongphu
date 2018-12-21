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
define('DB_NAME', 'phongphu');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8mb4');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'NS;Kxds}Mc_,Qg1TmB}b8tRjxx$-rIRGp9{CR/K`z6VRd}uAx=Od[h,>o)uX=QYN');
define('SECURE_AUTH_KEY',  'QFT[tM/IBb&&1EkrK/y~(R[/W#%o4BzP*Qe!:3fBI#)WmWIE+jk$6bd|n/[w7zW3');
define('LOGGED_IN_KEY',    'OH q76PD~LuS=[p::vnp8{RcOu$lL*_[+/|6X9T@C;-HhTr4cr,+%01H5XN7,NF=');
define('NONCE_KEY',        'e{9Rd~Gdxu(R [O5yRI/0oI)3^h/o@Km3hib33@:j&N5hQN${_-4l/GRdbA8WS;g');
define('AUTH_SALT',        'CxMdTt.i#A~cJ6NJuf)_p@UGIdDR_x{}(y`?U(m0,1d0K><mWkSu0YJ-`*h~H(}6');
define('SECURE_AUTH_SALT', 'PsV*g,z}9wuAL5oZ=8cU&??G$h//1Q=3wkTvgF5i)k}g*-np}Ab#x+!P:JV;kD-3');
define('LOGGED_IN_SALT',   'd!QytY%|fK|R3mRh_l;DZe0_*wKfWo&H>qT*f=:=F]x8BEz`M-VJ763J<}fW+)qy');
define('NONCE_SALT',       '/n3V/JO?9bb&a[eFbAJ!I}-GgPn]bQ.]ND$)}9[apL3Pk]ZP0_vp&@]Y7DD_3-D?');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

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
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
