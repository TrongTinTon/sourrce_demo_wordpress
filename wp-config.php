<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the website, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://wordpress.org/documentation/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'demo_wordpress' );

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
define( 'AUTH_KEY',         ']#=5+84[F#q)Tr]y)zo{ufyVOe#9JjuK>DmJ-2zyA:Bi:nKIe5vMgQ,x<dpZJK6t' );
define( 'SECURE_AUTH_KEY',  'j8^J^O01k~rMSU.Ap6%!eDWs/$3gGfc)%Tsc2.]4t[s(3S<m]G|-y=#W,5y*eFBi' );
define( 'LOGGED_IN_KEY',    'VM:ygG@+<gMH_[V@:cOTpvk$uo5 3ow8Rz><AmeS231~Nr.[4Fw<w:fVhDTV0D0@' );
define( 'NONCE_KEY',        ';ZM>#7@$3^%ax^<8*U3#` TQI 4:!$o?JA~6^qbc#KjEdu/^& #d[:#}s=D4?=K[' );
define( 'AUTH_SALT',        'l;!,?<,Dr#Q9uVh()v?RIo}rm~aSyx/x8;[Au&2z&Z=VB$ s:~Z</ocfWj!e3Y]a' );
define( 'SECURE_AUTH_SALT', 'HJS`*]42m+{N dFLV$njnRUqR,CAJ~wh]?>z#JkXbh[:!9X_%$0VgVwF$k%P`wS]' );
define( 'LOGGED_IN_SALT',   '@aet~Q[{{Nb,l.TE+6z=Mny]LiElp|PZ_-B^1b~(TNE3>%f<-9A>_tpW_iV,mk0r' );
define( 'NONCE_SALT',       'Z{$iQ?<Lna vT!5SSQ]a)^ j<xm_XrrMI22bbYIFBq2F3kS^?lOx4Ss,^cc)(dzI' );

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
 * @link https://wordpress.org/documentation/article/debugging-in-wordpress/
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
