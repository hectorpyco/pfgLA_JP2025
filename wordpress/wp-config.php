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
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'bd_noticias' );

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
define( 'AUTH_KEY',         'vG[wW1LWj=sw^@1&^qrLa5InGM<D/rtj@4iC![Yn`a:6zs_b^W&VFwEB2FN]pz8Q' );
define( 'SECURE_AUTH_KEY',  'C9,lE]yS?e6S%bf^Z[b.h&8Ti<FW#.z)i^[=adzE$rTlle=!zeX{$;;JP?+23?`)' );
define( 'LOGGED_IN_KEY',    'tlnuiXw-qd@&d1uo_p2p!Qyo/4 -?93Hc1fMyk+a*Vq=5^8!xo0qx,vbdInof2bV' );
define( 'NONCE_KEY',        'j~U`^THX3g#6s&F75j6LaXMoWRhyHEE.2xF?`D/zl|%GVzw7*u48.HY=SxU?]29-' );
define( 'AUTH_SALT',        '3oaO;m<wW!zgu7$pn>cs#HHzpNL9:kQD+Dm3Oo D>@/8b.t5}Qp[g)0zUkBoxA?g' );
define( 'SECURE_AUTH_SALT', 'RC~Kw{_ejOBKB|{@jYlJlT`8r24oB2RYA8{o5RgX;;1V,7i+mP0prFiVlm:|on,*' );
define( 'LOGGED_IN_SALT',   'lL_Ts;2}U$+ov2Z+E]xVMxl06gV3(#$ZdA53N.G`IxX9H5Rgea|^Pn=w@08`q|92' );
define( 'NONCE_SALT',       'Su{~s!&{sV)M^CyC1bb:M!+z:3jd8[dq&e`C0p~/l(tH,VB_:IBhxW,A[j9?n}.@' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 *
 * At the installation time, database tables are created with the specified prefix.
 * Changing this value after WordPress is installed will make your site think
 * it has not been installed.
 *
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/#table-prefix
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
 * @link https://developer.wordpress.org/advanced-administration/debug/debug-wordpress/
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
