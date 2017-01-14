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
define('DB_NAME', 'cl39-hwseqba');

/** MySQL database username */
define('DB_USER', 'cl39-hwseqba');

/** MySQL database password */
define('DB_PASSWORD', 'p8mEpeHdz7bFcF25');

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
define('AUTH_KEY',         '_Tcyl^XGQR^_2)0IO]HHo)w=n>(8Fr(a+fd|!Zz(_=_2m*foeks{$RX||HaOO9O*');
define('SECURE_AUTH_KEY',  'Kei4)x+./b[0#-8VsjF9O+Z-.4eKsj=FVaIyqBvAC`C2,-!&a1|nV71ey8gxK.{=');
define('LOGGED_IN_KEY',    'kc!r0e2]fE^a-97&/P+9C6OnQ#BE7EK*xW3NGP4Fp EQTq?ivx;>&*|[qO-,sQzh');
define('NONCE_KEY',        'K$EB3w#&M`Saz4OmV5~~}r2lzfv*B<:U`A/5vMjwVqr{ ^S%e,^D,rtBzt p8h]7');
define('AUTH_SALT',        'K)Jd/q(7% _,af~P-W;j}wD;~J-SWs7hrl:Mw}wg|!W>F0P7?;u;Z1bUJ#gnodx4');
define('SECURE_AUTH_SALT', '!ey/F^z*8CT%=Tdbi!B8R~C=^hL{7~z^aI(]tMSriP/k&leb<z3~Mc(fhzy@=*:x');
define('LOGGED_IN_SALT',   '8CqURLUp`2al+5CIchrt;!t .(XsIk,;rt%odiB#F#s$8=IuN+x)u2wZL_Sld-^-');
define('NONCE_SALT',       '22!*,] {Rg{Vm0Cz-FQ #:=A,T<wy.Yp}oJ}D~_-z?k@TkZi{7n2dB.Mzz #2p2*');

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
