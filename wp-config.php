<?php
/** Enable W3 Total Cache */
define('WP_CACHE', true); //Added by WP-Cache Manager


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
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
//define( 'WPCACHEHOME', '/var/www/ugdsb.ca/public_html/wp-content/plugins/wp-super-cache/' ); //Added by WP-Cache Manager
define('DB_NAME', 'wordpress162');

/** MySQL database username */
define('DB_USER', 'wordpressuser162');

/** MySQL database password */
define('DB_PASSWORD', 'm&YPolXs66#V');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'eBCdUw2ZLrZgEqANWPadu69UBRup8Gye4ZRx8KD7wE7A2gQQpP');
define('SECURE_AUTH_KEY',  'ZD6bENsAaWDKLgdYFtcABcUp67fVVhyjMffk9RvVnBL6CEzPp4');
define('LOGGED_IN_KEY',    'Lhva4YkPyFeKcLsMrz3uG3emCjfJwPUpMJhvGrpKZBHhwpgz2A');
define('NONCE_KEY',        'w4xBPQxHY6shSfjQPMSMTjA4nBmSxmunJZ8tU8BrAv6jdbPq9p');
define('AUTH_SALT',        'r3ygnrYqQEjfPewYn36YB3JTT6mwzQzpQqBYeq7m8UVGtCH6GD');
define('SECURE_AUTH_SALT', 'wrnLTQ2Rw3w2h5eaH8eyvLucUHv8DJkXuDx4a5j35gkKsd3xKL');
define('LOGGED_IN_SALT',   'wrnLTQ2Rw3w2h5eaH8eyvLucUHv8DJkXuDx4a5j35gkKsd3xKL');
define('NONCE_SALT',       'wrnLTQ2Rw3w2h5eaH8eyvLucUHv8DJkXuDx4a5j35gkKsd3xKL');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define('WP_DEBUG', true); // changed to true by RogerY 20161215
define('WP_DEBUG_DISPLAY', false);
define('WP_DEBUG_LOG', true);//save the error log inside wp-content folder
define('WP_MEMORY_LIMIT', '256M');//nhi March16, 2017 - frontend
//define('WP_MAX_MEMORY_LIST', '256M);//nhi May15,2017 - admin

/* Multisite */
define( 'WP_ALLOW_MULTISITE', true );
define('MULTISITE', true);
define('SUBDOMAIN_INSTALL', false);
define('DOMAIN_CURRENT_SITE', 'www.ugdsb.ca');
define('PATH_CURRENT_SITE', '/');
define('SITE_ID_CURRENT_SITE', 1);
define('BLOG_ID_CURRENT_SITE', 1);
define('EMPTY_TRASH_DAYS', 7);
define('ENABLE_CACHE', true);
define('WP_POST_REVISIONS',false);//Nhi added May12,2017
//define('DISALLOW_FILE_MODS',true);//to disable plugin and theme updates and installation as well as notification for updates from plugins and themes
 

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
 //Added by WP-Cache Manager
require_once(ABSPATH . 'wp-settings.php');

//define( 'MAGPIE_CACHE_AGE', 10 ); // Cache RSS feeds for only 10 seconds
define('CONCATENATE_SCRIPTS', false);//Nhi March 29, 2016
define( 'UPLOADS', 'wp-content/'.'uploads' );//nhi, jan 20, 2017

