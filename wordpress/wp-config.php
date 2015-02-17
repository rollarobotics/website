<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, WordPress Language, and ABSPATH. You can find more information
 * by visiting {@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('WP_CACHE', true); //Added by WP-Cache Manager
define( 'WPCACHEHOME', '/home/patriot4964/rollarobotics.com/wordpress/wp-content/plugins/wp-super-cache/' ); //Added by WP-Cache Manager
define('DB_NAME', 'rollarobotics_com');

/** MySQL database username */
define('DB_USER', 'rollaroboticscom');

/** MySQL database password */
define('DB_PASSWORD', 'LX25CiDe');

/** MySQL hostname */
define('DB_HOST', 'bulldog.rollarobotics.com');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

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
define('AUTH_KEY',         ':Pn$6iB;C!jj4&GkKX1`blb*iXunlHJZa2vU%9*vEqtN2:8^~7o#`k0olHL/u:wT');
define('SECURE_AUTH_KEY',  'E3^AlW3Lo5D2E2ihdn9dUX~KV63b?LUXPF7L8~iu@o$HX5wrVMPoE$!G^*ahjHGQ');
define('LOGGED_IN_KEY',    'l+7a%GoCieSm#fi:/0Q:SLG~_%eKZ|OWACFrT;P^Q8i+Ty*UaQGPq4qA(3FNk5vU');
define('NONCE_KEY',        'Y)x_2tRAx_*2bM5NwuEM9AE(sls`$6A:|2i!zsRsSK/E1#opg7uU*uq/L%O$xX0Z');
define('AUTH_SALT',        'c+Ja)A1UY;_@huWRpn95FQq/MVa!P4^G:K~`9!cd2a@(#g^j$H1NJ8Z*K6:`pWCk');
define('SECURE_AUTH_SALT', 'ZI*IJwYMaozd9xh8XC2f~jdLqk0t&%n4vuzBP`j&&KF_^iAql!e3bN/$/ON1j)5$');
define('LOGGED_IN_SALT',   'Tha(7a^^USA5%jr`0(cCX|+nBqejPf+kL/iU5^Edl#5u5ihp4BlY3vr|0X!j;LHZ');
define('NONCE_SALT',       '9mpC"XvLLwOX*$~cuCGtCO78#/NIm2|FU$QA#fcuv?fPMjN$u/To*ueNvQ(msN4y');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_btgnnp_';

/**
 * Limits total Post Revisions saved per Post/Page.
 * Change or comment this line out if you would like to increase or remove the limit.
 */
define('WP_POST_REVISIONS',  10);

/**
 * WordPress Localized Language, defaults to English.
 *
 * Change this to localize WordPress. A corresponding MO file for the chosen
 * language must be installed to wp-content/languages. For example, install
 * de_DE.mo to wp-content/languages and set WPLANG to 'de_DE' to enable German
 * language support.
 */
define('WPLANG', '');

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');

