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
define( 'DB_NAME', 'garage' );

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
define( 'AUTH_KEY',         'w_kPkS;j)$CjCa=i`!=X`3#d<G2fI52Zc=*7%dX0U0DLl3~hB*Vqr7dj(w/?#f!y' );
define( 'SECURE_AUTH_KEY',  'g6T5:KC@p=9!c9,rB=Pw;V9.Zt9Qu7=Y3/RY%x046 GW06{ F&.b*(/mPala3XB4' );
define( 'LOGGED_IN_KEY',    ')HQ%Slv$wFYySt7H(LbVGubfNjq]ld5zVx12;YSE4Dfj:VH}yjd+Gy=Pw<;Qy<Zq' );
define( 'NONCE_KEY',        's8|*p+aI@v3&WT1/pq!pr2|urw<:CPdSVX><R?$MCN2swUbve$9AKR<g9P%clTLt' );
define( 'AUTH_SALT',        '2.zN:d#+uY21-Z7w:3c.dHo!:kS}Qix[OIKV0UzPy>Mc<qh9!d$5<0sDDdYl.J43' );
define( 'SECURE_AUTH_SALT', '#yZdd$(RR+T-zk.;q0lKSi|Zmp*zZy^ vm;qhh^T%infe8ps(&UD$CzHngX0{Oq[' );
define( 'LOGGED_IN_SALT',   '2[~m`^(GY }-RoVnUg|@<k#LZS>jg,d7p>iKc+~ !pPw ;#F(I|2udD(:^bA)2l}' );
define( 'NONCE_SALT',       'ivT$ z{ &cZ5UZ+8ghzXEl(;G1LcxVO<+(U|b M(H1tw6)H|=1;kzHrW^#&DdQ}%' );

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_garage';

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
