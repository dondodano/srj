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
define( 'DB_NAME', 'enkybmuf_srjdb' );

/** Database username */
define( 'DB_USER', 'enkybmuf_spamastrj' );

/** Database password */
define( 'DB_PASSWORD', 'spamastrj@2022' );

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
define( 'AUTH_KEY',         'Dm U@%6U^WEQ[NFd p`wp[C,$2<nx#Zn(}$iX^GT/`5pW{+T-t{~V3{KR2iB]ksJ' );
define( 'SECURE_AUTH_KEY',  'oG,=Te4IIQDii|Z/+OvYA>1X$XX4<Y)$l(?Zo9919Yz61|qtjntt@RJnO,8PiN{D' );
define( 'LOGGED_IN_KEY',    '3qq)GSTSOYY<viT#j/RFita2~Q;`pMQ/8BgM4-s%%n41xJ>wK} tRT_$l+{PQ!1N' );
define( 'NONCE_KEY',        'y-=)C0`M,r!K`-6*PVBMKSH2s7Zaq(QB=p#]h~P.56=k3Y6Rok!?[uuG3P`?*6nO' );
define( 'AUTH_SALT',        'Q#p:U;{6@RM5xy6n3R&ZBN@p?=J!O_PySW[N6bb)ggXPw,)fwuhj>Ba*{/e3;L2C' );
define( 'SECURE_AUTH_SALT', '3B9,$-.=LmgjjU~$?ag<4l_5RV1#S*(QJ.w,Bzw):sO[gu4rHLh/c5:}]K}z{*Vf' );
define( 'LOGGED_IN_SALT',   'Li?@vi{@74Z(Q(2OepuH9w.#DPd9Ue!Wr?A8M|HZ?J+-M&r~;E>3Y1oC$Lrf!BhX' );
define( 'NONCE_SALT',       '7xw}9]08=s,b5S=Y%b]fSS t[q5dGCG[AG?.e9E9x)(0ZVQ7?gC86%$Vp7jEG-Ny' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'srj_';

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
