<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, and ABSPATH. You can find more information by visiting
 * {@link http://codex.wordpress.org/Editing_wp-config.php Editing wp-config.php}
 * Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'sokenWordpress');

/** MySQL database username */
define('DB_USER', 'sokenWordpress');

/** MySQL database password */
define('DB_PASSWORD', '$k%YzXnt+td6');

/** MySQL hostname */
define('DB_HOST', 'localhost');

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
define('AUTH_KEY',         '@w-/|dxjR= 4Z2qNAXmwMq-G}?*lJ+OrtzK[eZRyd~4rdXp}0O=7xQzALN{V3y3+');
define('SECURE_AUTH_KEY',  'F6$G)O>%T.K`D `=:(|QH# 5wpXs>B`n[*vx8pL(DL3&%7fTMLnqMDO0z-Pz}NR5');
define('LOGGED_IN_KEY',    '>1zwu p#^k?Z1oQ#B>4z_u18_S>^Qx^d-39f3<!sY_JO2%P/A>z/U$Y~AKQ^+}lB');
define('NONCE_KEY',        'pD*TV8@yTJ>>v6%{`qBc:_;-Uk[?v/_2UK|@bZZChVskHQf$-GH#<TmT+|8}-tHc');
define('AUTH_SALT',        'bd-Ee@r=_J2Y+CMx1ICvN@#)IR^w.$9D-TbY|.SVy5f|M1?j9=E7h?Ln07T4+x+F');
define('SECURE_AUTH_SALT', 'PQ-[lm5WjDqV,EULaanE;;?iv|[qnaNY:O7>FoT;_-%8[d2/]8!/wJ.in09^R8w|');
define('LOGGED_IN_SALT',   '!gc*Nx ~<r0@mZ_+/ZMBse|{K8.>|%f7[|( %nybQY~vut0A;Z+=gz{h-%[B` ?a');
define('NONCE_SALT',       'A-96X+c0&@>_Pv7[b.A:]c:fw|e0`t@hRulp*!5^}yH+v:j3<LZm]4H.@lj~SVl|');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

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

/* add mokafuji */
define('FS_METHOD','direct');