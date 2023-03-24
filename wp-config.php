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
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'estera_test' );

/** Database username */
define( 'DB_USER', 'estera_test' );

/** Database password */
define( 'DB_PASSWORD', 'yFYLI0wk-11Q' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

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
define( 'AUTH_KEY',         'a-Ts3YO3X<FfuxY~$(oT~kv9Ihs2RW)izH>Bb6N$`w5Ug YLLg$ATiS4VraJy986' );
define( 'SECURE_AUTH_KEY',  '@uRU)pW&>/^Z*-l/ID!(ERS|)$r`n-U>W8}fSKpw;D_bH2y4YL^`HmjNqc7I=s/^' );
define( 'LOGGED_IN_KEY',    'cqvJYv_8Jiia#R4%Uy-VyfoLP;dZvg.Y6cehTAz+gef~!TNwDrX%0w-1O>WM[m?1' );
define( 'NONCE_KEY',        '&6zCrO&MZ6Iz#%(V,$[Ip.>Iv!?Rd#z7.~*mml_Jt=:_[I?2AKjPP)Ku=J^9E>46' );
define( 'AUTH_SALT',        '8ycJuot.@qe&XsS8u9Lzat$#,4W Fi4$cc+`r<1as81b FS7`%[.pS5YW-3(%uo`' );
define( 'SECURE_AUTH_SALT', '3azIK-/y!gW@wa,vWj=T:q47YzO}w*eDD;Ahn{ZSy%>ZM1J|/i5%J&M,imiK(f]q' );
define( 'LOGGED_IN_SALT',   'p>{gIbjp.*$#zgq]a=Hr.p^(0$<--je.onKfb_9W{}h1z=.tJ ZxPYU8D`Kk7B%f' );
define( 'NONCE_SALT',       '~nt01*fWn?fJG73:^?O*dz*2kgrJ`HwN?H(`>::@:f/oRpv2_KQl??Ry. }(`v:~' );

/**#@-*/

/**
 * WordPress database table prefix.
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
 * visit the documentation.
 *
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
