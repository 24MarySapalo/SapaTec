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
define( 'DB_NAME', 'unitelcode' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', '' );

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
define( 'AUTH_KEY',         '$mH:$ow-#-z9XEFN1!YaDW@`mCX_K^E3CaaF{0aJM,=xG@uZbOW3%L9tB~bF93WO' );
define( 'SECURE_AUTH_KEY',  'nfSgwaKAZFhU,V8n#Z|Ni)1%#h,]#cUl-$&i_%sQB9bpG4j?OP3-Z~|(^di6v_rM' );
define( 'LOGGED_IN_KEY',    '=[jA8Ux Y[_n#++FUA^`K34]@XEZc<h;~y(,Dx-cyG-6r?sa+qa8D!VL<:AXT yg' );
define( 'NONCE_KEY',        '*|QQ eP)8MmXrC{5]7]*ZcEKTn.LTP!&!Uqb@QTd0-8qfdajZYvo5A>,Y@Z^|L*.' );
define( 'AUTH_SALT',        'k)joCsK576{Al)LHP`iCr$w`k.I{,goFE%zEo|2>R7J.x8-P4)=i*y#08#8bC1L-' );
define( 'SECURE_AUTH_SALT', 'eJ|=J4#FqBdN3o7Uk?])TYcV& =B)iaJ-shfd6K4*+3jxxGk-[QNRZ>?/gUQ::/S' );
define( 'LOGGED_IN_SALT',   'z[oEG*s_~TT<ZoMI|Q#[s5?}.XY{L)L}LTBu<!la^LlpTGZYVfH`li<ostq8 p#i' );
define( 'NONCE_SALT',       'l5qk5i+/0v}q_!fLrS,bsEj&[Im$6&7E@z)]{8s];W@DQ4:u2.1=ODuq`S+@z.:8' );

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
