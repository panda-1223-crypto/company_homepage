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
define( 'DB_NAME', 'local' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', 'root' );

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
define( 'AUTH_KEY',          'O2 w5O.ltE?Y M#d?_bf|iq:$Ag7z4y97/z^3>]gwluWsY{5Lh_J5?NAi Gs,KvH' );
define( 'SECURE_AUTH_KEY',   'dbPA-rfm$?AleT<Ev7nk@#[Wy]LTGBn|{H:ckPlr(&&4hA8LBX:FG3Pkp W$/>u$' );
define( 'LOGGED_IN_KEY',     'o#&+e[t^Oj&_!IQyW)>U@N!(k_[~ZdM1VBb0vFEf[?vz}m^g/iXq;_eQ%7+%&x+[' );
define( 'NONCE_KEY',         '7#ti;[!3Q(/:~TSuUmsUH/f{`iMX%/.|]@tnl}h.DGw1(17(drOrY3]% TD{P%9b' );
define( 'AUTH_SALT',         '*$cyrJZ%.3TR0H~O#pyz79fg%dJ>>^<(4_CV9+A7(}gOer(7QAn*,Z4r-INWY,y[' );
define( 'SECURE_AUTH_SALT',  '$7ICCB=J|=PNHQcB$CG=y-7OgN(c%E=-%CeJ{)Tm>;?N,._Hy_Jrg0tT|wBoK<{a' );
define( 'LOGGED_IN_SALT',    'i f.sG;q[Y7t7SboM_?S4Fpz<U4%K!C22;5^N2{@5A,NZvePlti=+D9rKw#WJKMj' );
define( 'NONCE_SALT',        '.Q));3We~Vb@74MilBQwnFH)i.<fw|_rfd-p~?d?4M,`?(N8%:-OPc@%t;dNeOc(' );
define( 'WP_CACHE_KEY_SALT', '%XMGG1MWy IztQ@h0&y$nB&W.{iGQKobRnw-!j}7ZtzsTi $:+7_#b[4he+Q#8:p' );


/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';


/* Add any custom values between this line and the "stop editing" line. */



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
if ( ! defined( 'WP_DEBUG' ) ) {
	define( 'WP_DEBUG', false );
}

define( 'WP_ENVIRONMENT_TYPE', 'local' );
/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
