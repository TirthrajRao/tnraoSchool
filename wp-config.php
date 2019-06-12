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
define( 'DB_NAME', 'wpthemes' );

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
ini_set('display_errors','Off');
ini_set('error_reporting', E_ALL );
define('WP_DEBUG', false);
define('WP_DEBUG_DISPLAY', false);
/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'e&d$,5FsGLJ/hPAE`j_CK:s@3nFb|F$kY,492Rl^jvF7oY&S5~q:^g;Q)Au9rOE^' );
define( 'SECURE_AUTH_KEY',  'H86KNyz90CXFSONSH$!bfJc4SLVU3SLP}BLAoPf<%_vRZj,!~@U!>t(qAE9,,#^k' );
define( 'LOGGED_IN_KEY',    'fmb.6MJmw1^36X!YM#k+^/]#Ld8RSb6Iuw+Agho}Qw=p{[~qWwg5oZKtJ.6!EbmC' );
define( 'NONCE_KEY',        'pTV,;Jy2q-SnTwopE)Z=aS?5h?C5;TZWG2;u;vKp~9u&Hv`K,]vRxAe:mrrqI$|S' );
define( 'AUTH_SALT',        'X#nsqkuS88O@R=;LK{DO^<N`mfiaVCaDX$.n0IJQp9G} WR;kAd/p<jj&9P#<Y|c' );
define( 'SECURE_AUTH_SALT', '`$|_hw-/6,Q4Z7`IA*r6KwhI(TrTu`z(SI-h65uY%Qj${.W[u6b`!$yCEU52}[3:' );
define( 'LOGGED_IN_SALT',   '>*43yWQ[5!6tpUtd2/Vv[,]yV~~?P<z@9~MLeLxeAc1Nzng&pehWIZnUGr@p*} a' );
define( 'NONCE_SALT',       'c%%!T[dlx=masDFw[=P<~),+@^IHIqzM5^K7(]d<@TwLG+W(O=%(x85aI-`T}ZiZ' );

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_tnrao';

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
