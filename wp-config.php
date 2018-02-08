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
define('DB_NAME', 'sbusiness');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '09021994');

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
define('AUTH_KEY',         'c9W!p)ct:_3_1G0rBAK|m1^w/f(5-&#Hc)qEQ~Sg[~$vM|s&|(Bl~rKSZ;qfurUB');
define('SECURE_AUTH_KEY',  '4CVZn}1,rdu/kl6FykD}N{ur}}aQ9P_HC$F-A@(cVjn`xy98B5ee%6}#BncXjzhm');
define('LOGGED_IN_KEY',    'eR+%<36AFhxCvn[Qqi]!Um[&9|cOzwL*|!}gbIb=AXn.9)A#h.o6F{Z?m`>f.Wso');
define('NONCE_KEY',        '!2K8utw/ N;Qm8FQ|HsdrN?H)c+%g/%*G&Zj9!0w..B#BnrWUsG*SXg$c4 I)C]d');
define('AUTH_SALT',        'N=|6O#s@]R)i$li<6`1_;Z4xs*N[5Wx{8P09eIas!Is(}BA[yo2*WKT*G)o*Ty*Y');
define('SECURE_AUTH_SALT', 'e#r6tH0YWj9.0jK_zA8 nSBUAQx`,S?`@%Ka<+kLA};_dLg@uH5^}a#0~M)!LWwP');
define('LOGGED_IN_SALT',   'GQRs*J`jB$W;| /]X+A@B.]xR56eB%h&{2:z [j-*ub.h$EDdW/B?T$V/bltLg.E');
define('NONCE_SALT',       '*Nsvr`Tx4+pjMTQE.@f1Ccfu7$ACF1S5/IK:Gm@!O#,r{!(rkX637t8/[EX2n5EX');

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
