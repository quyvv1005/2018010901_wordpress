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
define('DB_NAME', 'project_whq');

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
define('AUTH_KEY',         '$U6*{_m=Ub(fE%QRrew<t/?bHy_<*<S/NEkqX@H(Vua7FWMsY0dxU+~25%@-[BOU');
define('SECURE_AUTH_KEY',  's(BGZO6]e(HRWYpj-cV|g(aX7i+v&J5m(TK<_vU3KVP2$x8J%V`%BpX!6UZ)@3`z');
define('LOGGED_IN_KEY',    ',O#SP[l5kvaKfta;7j/uC<`Zzg]^k:QzZC?Q]a5@[-32#/f_IQzn[s-&Z%)jwwrP');
define('NONCE_KEY',        '{Qgy.Oe&@k#g ng:[LXBo{&.^=T;{a#n_Xr=I6ViDQd-1?vJ|o e1ce7oM(Y:{ax');
define('AUTH_SALT',        'Y 3@@h0H5:Hi3`3iq7 g8dsHP;oExYV`3F~;u>!RSSU=nnJoUUY/q<5&jHTsD2Ta');
define('SECURE_AUTH_SALT', 'vYXz,vU]2bJ?eG|kEL~ec~sw]twb$(<!TLdV+aj0wB]F+@~byNf2eN>q4!((R.& ');
define('LOGGED_IN_SALT',   'l^lG<rK;Wb{VO*ByM4r5:4U[~s!EBQl^T,f6Qwkh7vpSs9MGY!lCbwSy>2yXW3Ib');
define('NONCE_SALT',       'CnxUnn &:K7CH_;sy9BBi:A287s#@rHIfc7cPfhDcrcNTI;obT0W7cTEvsqrsiXq');

/**#@-*/
// custom link url in site
define('WP_HOME','http://localhost/wdev');
define('WP_SITEURL','http://localhost/wdev/');
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
