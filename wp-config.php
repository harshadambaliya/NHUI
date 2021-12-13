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
define( 'DB_NAME', 'nhui' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', '' );

/** MySQL hostname */
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
define( 'AUTH_KEY',         '6Ndk9Q-jOl&k|.wY8eXJ9`IW8Fu&4h;9tLMFcg63CzZuTTctb$P.I^(?wQ+*iLok' );
define( 'SECURE_AUTH_KEY',  'o$#>qm:)>wPpLl}EoR~3#=vk$BxJ?zrIwo8vQWWY,x%LUA;=@(=yn&8z7-q(V]LX' );
define( 'LOGGED_IN_KEY',    '+xLe )HK#P11QglFLy!Yo&3xBy_|{w#&c %w*5(3m61tT-CMX7#eE1HERKSwP]1H' );
define( 'NONCE_KEY',        'We=<l[HE1?iz_cF3n|yQ@+Rjy$(nY5c B_ZHdoE(i>,@:ocIX7k.|)qM}z/^mX{h' );
define( 'AUTH_SALT',        '!P`l(h#PB@c  A2+Jd7K}yN{S1+TVJ1X ~f0u$T;Qp(iXc>L{_f,DDtZB#<E|->G' );
define( 'SECURE_AUTH_SALT', 'sw1CG4TJc/^<rdpN-Fuz,,^++IzhYEIN&(G$6cuQzM5&]}fdBbOTO!WC0:li cXT' );
define( 'LOGGED_IN_SALT',   'fLltM.0BUz`>r74Q*W<vTL^l-di~)1bmt>iaTCa(cCFPc&YeJLa^?I(6p$^=UzW9' );
define( 'NONCE_SALT',       'hF)>2u2.GHgtd)X>![voZGbRt=(|KP-YN`JlOGPM6AKExXslJy$p{5s>ZL1|=[SE' );

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
