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
define( 'DB_NAME', 'portfolio_onboarding' );

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
define( 'AUTH_KEY',         '>uUS1T&=l>px_VNmaide/N|e]%FKO#ujQ5[y)G)M}Y5uNn|E~^ZtFwlusL^voOZ)' );
define( 'SECURE_AUTH_KEY',  ']L  #ZCd <@V[xiCOexbxF-EVqRMP[ORWq,(z%m wf;y:.(OH8 Ye?doC^fIU2HP' );
define( 'LOGGED_IN_KEY',    '7>n`UTi|O$Yc9Y_9O>rk-gvId8KQWM;aV]tDnWlwqp.;^okls:kAF?B!@5uPcNCS' );
define( 'NONCE_KEY',        '@ZK)Nj6)V-laBEK^^jygK%Pw~]TbY%v_`Bd0_Js76J.k{i7j-YB4@iKCNuVux]cg' );
define( 'AUTH_SALT',        'WqQ1n8~Yv`>::p0-!}CoH^&S*47.aH2QJigl6El$_yi&,?e+fL1XWPD%t{yUw4[z' );
define( 'SECURE_AUTH_SALT', '=,#`pyQ!xiG1<R{uqi,uw2UiU37=[(Om>}lxq4z E:$!p:S/:-q$3xJdKX07=888' );
define( 'LOGGED_IN_SALT',   '+4%/4s0K2G4c6$FGHeN%b2UiRtA@tvA]9z=:%_y96U?0Gj9JGcLC(i4m{|-N]Z4]' );
define( 'NONCE_SALT',       'fq?*Go0r>I6tfA)l/za@t5,n,W]__pWK1q+{`>[4c_.CBOuT$ZsQx/UWAu~~QKn`' );

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
