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
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'fy' );

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

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'QG|h,4zmS[CA=!D%_#JS}WPG^aG*L[9g2}9c21Y98Y!fMx6|RG9`7fKPKfwlDz6y' );
define( 'SECURE_AUTH_KEY',  'PxBn>[<@ZlO,p<(/u0?Lg__n/|M^=/mK?D.$*`{I?Qzz<6^rT=aoNNI@LQhglD=M' );
define( 'LOGGED_IN_KEY',    'Og[B4x;{.UOEk.A$GsjcVo(AEzMX8{~ri$+g^g-rKW,+IXnX-BUl$8q3F9]1?%WM' );
define( 'NONCE_KEY',        'r?ApF |GI]euWzb_{K`>Y{@iwqN21,ob[dwu|:`2%C<25DH{Hosx!{(m}m@XF]x4' );
define( 'AUTH_SALT',        '(WUHU!KAWS(ZQ&pX6>;6]R%X8VYM32Kb~{vEZq|dlWQEibDN%+HERC&G/P(UWVM4' );
define( 'SECURE_AUTH_SALT', 'Pfxje&wXt,TOjq4/|x:!,va`]EMiRI5hHKq}vp5dbw/Rp(J!rQ/6qMOVn:t;M0#U' );
define( 'LOGGED_IN_SALT',   '}?>[uyiUXM{MwjEW%+j$u=aCIE[C8ImS5b=C`)`o2|ZFYFgwPEZ+`x#+JW9MQ`oV' );
define( 'NONCE_SALT',       'MC%PX%K0d,+KD7HcDVIn1N3@7{TDti K;7<LJU[;EN:kzk+2i8l/5M<{}I4vh8wI' );

/**#@-*/

/**
 * WordPress Database Table prefix.
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

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
