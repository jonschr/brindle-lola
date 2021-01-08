<?php

// Starts the engine.
require_once get_template_directory() . '/lib/init.php';

// Defines the child theme (do not remove).
define( 'CHILD_THEME_NAME', 'Urban' );
define( 'CHILD_THEME_URL', 'https://www.brindledigital.com' );
define( 'CHILD_THEME_VERSION', '1.0.0' );

// Sets up the Theme.
require_once get_stylesheet_directory() . '/lib/theme-defaults.php';

// Localization
add_action( 'after_setup_theme', 'genesis_sample_localization_setup' );
function genesis_sample_localization_setup() {
	load_child_theme_textdomain( 'genesis-sample', get_stylesheet_directory() . '/languages' );
}

// Adds helper functions.
require_once get_stylesheet_directory() . '/lib/helper-functions.php';

// Adds image upload and color select to Customizer.
require_once get_stylesheet_directory() . '/lib/customize.php';

// Includes Customizer CSS.
require_once get_stylesheet_directory() . '/lib/output.php';

// Adds WooCommerce support.
require_once get_stylesheet_directory() . '/lib/woocommerce/woocommerce-setup.php';

// Adds the required WooCommerce styles and Customizer CSS.
require_once get_stylesheet_directory() . '/lib/woocommerce/woocommerce-output.php';

// Adds the Genesis Connect WooCommerce notice.
require_once get_stylesheet_directory() . '/lib/woocommerce/woocommerce-notice.php';

// Header customizations
require_once get_stylesheet_directory() . '/lib/header.php';

// Gutenberg
require_once get_stylesheet_directory() . '/lib/gutenberg-init.php';

// First block customization (add body class for the first block for padding and remove the entry header)
require_once get_stylesheet_directory() . '/lib/gutenberg-first-block-logic.php';

// Last block customization (add body class for the last block for padding and remove the entry header)
require_once get_stylesheet_directory() . '/lib/gutenberg-last-block-logic.php';

// Footer customizations
require_once get_stylesheet_directory() . '/lib/footer.php';

// Theme colors
require_once  get_stylesheet_directory() . '/lib/theme-colors.php';

// Enqueues
require_once  get_stylesheet_directory() . '/lib/enqueue.php';

// Sidebar customizations (unregistering layouts, etc.)
require_once  get_stylesheet_directory() . '/lib/sidebar.php';

// Text sizes
require_once get_stylesheet_directory() . '/lib/text-sizes.php';

// Disable tags
require_once get_stylesheet_directory() . '/lib/disable-tags.php';

// Body classes for login state
require_once get_stylesheet_directory() . '/lib/body-class-logged-in-out.php';

// Adds support for HTML5 markup structure.
add_theme_support( 'html5', genesis_get_config( 'html5' ) );

// Adds support for accessibility.
add_theme_support( 'genesis-accessibility', genesis_get_config( 'accessibility' ) );

// Adds viewport meta tag for mobile browsers.
add_theme_support( 'genesis-responsive-viewport' );

// Adds custom logo in Customizer > Site Identity.
add_theme_support( 'custom-logo', genesis_get_config( 'custom-logo' ) );

// Renames primary and secondary navigation menus.
add_theme_support( 'genesis-menus', genesis_get_config( 'menus' ) );

// Adds image sizes.
add_image_size( 'blog', 780, 390, true );
add_image_size( 'blog-sidebar', 360, 180, true );

// Remove the edit link by default on posts/pages
add_filter ( 'genesis_edit_post_link' , '__return_false' );

//* Remove the entry footer markup (requires HTML5 theme support)
remove_action( 'genesis_entry_footer', 'genesis_entry_footer_markup_open', 5 );
remove_action( 'genesis_entry_footer', 'genesis_post_meta' );
remove_action( 'genesis_entry_footer', 'genesis_entry_footer_markup_close', 15 );

//* Add the color variables on both the frontend and the backend
// add_action( 'init', 'output_root_colors' );
function output_root_colors() {
	?>
	<style>
		:root {
			--pink: pink;
			--green: green;
		}
	</style>
	<?php
}