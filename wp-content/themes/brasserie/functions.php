<?php
/**
 * brasserie functions and definitions
 *
 * @package brasserie
 * @since brasserie 1.0
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 *
 * @since brasserie 1.0
 */


if ( ! isset( $content_width ) )
	$content_width = 654; /* pixels */

if ( ! function_exists( 'brasserie_setup' ) ):
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which runs
 * before the init hook. The init hook is too late for some features, such as indicating
 * support post thumbnails.
 *
 * @since brasserie 1.0
 */
function brasserie_setup() {

	/**
	 * Custom template tags for this theme.
	 */
	require( get_template_directory() . '/inc/template-tags.php' );

	/**
	 * Custom functions that act independently of the theme templates
	 */
	require( get_template_directory() . '/inc/tweaks.php' );

	/**
	 * Make theme available for translation
	 * Translations can be filed in the /languages/ directory
	 * If you're building a theme based on brasserie, use a find and replace
	 * to change 'brasserie' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'brasserie', get_template_directory() . '/languages' );

	/**
	 * Add default posts and comments RSS feed links to head
	 */
	add_theme_support( 'automatic-feed-links' );

	/**
	 * This theme uses wp_nav_menu() in one location.
	 */
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'brasserie' ),
	) );

	/**
	 * Add support for post thumbnails
	 */
	add_theme_support('post-thumbnails');
	add_image_size( 100, 300, true);
	add_image_size( 'recent', 670, 400, true );

	// link a custom stylesheet file to the TinyMCE visual editor
	add_editor_style( array('style.css', 'css/editor-style.css') );

	/**
	 * Add Team role
	 */
	$result = add_role('team_member', __( 'Team Member', 'brasserie' ), array(
	        'read'         => true,  // true allows this capability
	        'edit_posts'   => true,
	        'delete_posts' => false, // Use false to explicitly deny
	));

	/**
	 * Add support for the Aside Post Formats
	 */
	add_theme_support( 'post-formats', array( 'aside', ) );

	// Display Title in theme
	add_theme_support( 'title-tag' );

	// Support for Woocommerce
	add_theme_support( 'woocommerce' );

	// link a custom stylesheet file to the TinyMCE visual editor
    $font_url = str_replace( ',', '%2C', '//fonts.googleapis.com/css?family=Open+Sans' );
	add_editor_style( array('style.css', 'css/editor-style.css', $font_url) );
}
endif; // brasserie_setup
add_action( 'after_setup_theme', 'brasserie_setup' );

/**
 * Setup the WordPress core custom background feature.
 *
 * Use add_theme_support to register support for WordPress 3.4+
 * as well as provide backward compatibility for previous versions.
 * Use feature detection of wp_get_theme() which was introduced
 * in WordPress 3.4.
 *
 * Hooks into the after_setup_theme action.
 *
 * @since brasserie 1.0
 */
function brasserie_register_custom_background() {
	$args = array(
		'default-color' => 'EEE',
	);

	$args = apply_filters( 'brasserie_custom_background_args', $args );

	if ( function_exists( 'wp_get_theme' ) ) {
		add_theme_support( 'custom-background', $args );
	} else {
		define( 'BACKGROUND_COLOR', $args['default-color'] );
		define( 'BACKGROUND_IMAGE', $args['default-image'] );
		add_theme_support( 'custom-background', $args );
	}
}
add_action( 'after_setup_theme', 'brasserie_register_custom_background' );


/**
 * Register widgetized area and update sidebar with default widgets
 *
 * @since brasserie 1.0
 */
function brasserie_widgets_init() {
	register_sidebar( array(
		'name' => __( 'Primary Sidebar', 'brasserie' ),
		'id' => 'sidebar-1',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h1 class="widget-title">',
		'after_title' => '</h1>',
	) );

	register_sidebar( array(
		'name' => __( 'Shop Sidebar', 'brasserie' ),
		'id' => 'woocommerce_sidebar',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h1 class="widget-title">',
		'after_title' => '</h1>',
	) );

	register_sidebar( array(
		'name' => __( 'Secondary Sidebar', 'brasserie' ),
		'id' => 'sidebar-2',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h1 class="widget-title">',
		'after_title' => '</h1>',
	) );

	register_sidebar( array(
		'name' => __( 'Left Sidebar', 'brasserie' ),
		'id' => 'sidebar-3',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h1 class="widget-title">',
		'after_title' => '</h1>',
	) );

	register_sidebar(array(
			'name' => __( 'Left Footer Column', 'brasserie' ),
			'id'   => 'left_column',
			'description'   => __( 'Widget area for footer left column', 'brasserie' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h4>',
			'after_title'   => '</h4>'
		));
		register_sidebar(array(
			'name' => __( 'Center Footer Column', 'brasserie' ),
			'id'   => 'center_column',
			'description'   => __( 'Widget area for footer center column', 'brasserie' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h4>',
			'after_title'   => '</h4>'
		));
		register_sidebar(array(
			'name' => __( 'Right Footer Column', 'brasserie' ),
			'id'   => 'right_column',
			'description'   => __( 'Widget area for footer right column', 'brasserie' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h4>',
			'after_title'   => '</h4>'
		));

}
add_action( 'widgets_init', 'brasserie_widgets_init' );

/**
	 * Customizer additions
	 */
	require( get_template_directory() . '/inc/customizer.php' );

/**
 * Enqueue scripts and styles
 */
function brasserie_scripts() {

	wp_enqueue_style( 'style', get_stylesheet_uri(), '' ,rand() );
	wp_enqueue_style('font-awesome', get_template_directory_uri().'/css/font-awesome.min.css');
	wp_enqueue_style('animate', get_template_directory_uri() . '/css/animate.min.css');

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
	if ( is_singular() && wp_attachment_is_image() ) {
		wp_enqueue_script( 'keyboard-image-navigation', get_template_directory_uri() . '/js/keyboard-image-navigation.js', array( 'jquery' ), '20120202' );
	}
	if (!is_admin()) {
		wp_enqueue_script( 'tooltipsy', get_template_directory_uri() . '/js/tooltipsy.js', array( 'jquery' ), '20120208', true );
		wp_enqueue_script( 'small-menu', get_template_directory_uri() . '/js/small-menu.js', array( 'jquery' ), '20120206', true );
		wp_enqueue_script( 'keyboard-image-navigation', get_template_directory_uri() . '/js/keyboard-image-navigation.js', array( 'jquery' ), '20120202' );
		wp_enqueue_script( 'smoothup', get_template_directory_uri() . '/js/smoothscroll.js', array( 'jquery' ), '',  true );
		wp_enqueue_script( 'inview', get_template_directory_uri() . '/js/inview.js', array( 'jquery' ), '',  true );
		wp_enqueue_script( 'main', get_template_directory_uri() . '/js/main.js', array( 'jquery', 'imagesloaded', 'masonry'), '',  true );
	}
	// Implement brasserie homepage Flexsliders
	if (is_page_template( 'page-templates/custom_home.php' )) {
	    wp_enqueue_script('flexslider', get_template_directory_uri().'/js/jquery.flexslider-min.js', array('jquery'));
	    wp_enqueue_script('flexslider-init', get_template_directory_uri().'/js/flexslider-init.js', array('jquery', 'flexslider'));
	    wp_enqueue_style('flexslider', get_template_directory_uri().'/css/flexslider.css', '', rand());
	}

}
add_action( 'wp_enqueue_scripts', 'brasserie_scripts' );

/**
 * Implement excerpt for homepage slider
 */
function brasserie_get_slider_excerpt(){
$excerpt = get_the_content();
$excerpt = preg_replace(" (\[.*?\])",'',$excerpt);
$excerpt = strip_shortcodes($excerpt);
$excerpt = strip_tags($excerpt);
$excerpt = substr($excerpt, 0, 120);
$excerpt = substr($excerpt, 0, strripos($excerpt, " "));
$excerpt = trim(preg_replace( '/\s+/', ' ', $excerpt));
return $excerpt;
}

/**
 * Implement excerpt for homepage recent posts
 */
function brasserie_get_recentposts_excerpt(){
$excerpt = get_the_content();
$excerpt = preg_replace(" (\[.*?\])",'',$excerpt);
$excerpt = strip_shortcodes($excerpt);
$excerpt = strip_tags($excerpt);
$excerpt = substr($excerpt, 0, 100);
$excerpt = substr($excerpt, 0, strripos($excerpt, " "));
$excerpt = trim(preg_replace( '/\s+/', ' ', $excerpt));
return $excerpt;
}

/**
 * Implement excerpt for homepage thumbnails
 */
function content($limit) {
  $content = explode(' ', get_the_content(), $limit);
  if (count($content)>=$limit) {
    array_pop($content);
    $content = implode(" ",$content).'...';
  } else {
    $content = implode(" ",$content);
  }
  $content = preg_replace('/\[.+\]/','', $content);
  $content = apply_filters('the_content', $content);
  $content = str_replace(']]>', ']]&gt;', $content);
  return $content;
}

/**
 * Social Media Links on Contributors template
 */
function author_social_media( $socialmedialinks ) {

    $socialmedialinks['google_profile'] = 'Google+ URL';
    $socialmedialinks['twitter_profile'] = 'Twitter URL';
    $socialmedialinks['instagram_profile'] = 'Instagram URL';
    $socialmedialinks['facebook_profile'] = 'Facebook URL';
    $socialmedialinks['linkedin_profile'] = 'Linkedin URL';

 return $socialmedialinks;
 }

add_filter( 'user_contactmethods', 'author_social_media', 10, 1);

/**
 * Custom "more" link format
 */
function new_excerpt_more($more) {
       global $post;
	return '...';
}
add_filter('excerpt_more', 'new_excerpt_more');

/**
 * Pro Link
 */
 function brasserie_get_pro_link( $content ) {
	return esc_url( 'https://www.templateexpress.com/brasseriepro-theme' );
}

/**
 * Implement the Custom Header feature
 */
add_theme_support( 'custom-header' );
function brasserie_custom_header_setup() {
	$args = array(
		'default-image'          => '',
		'default-text-color'     => '222',
		'width'                  => 1700,
		'height'                 => 500,
		'flex-height'            => true,
		'wp-head-callback'       => 'brasserie_header_style',
		'admin-head-callback'    => 'brasserie_admin_header_style',
		'admin-preview-callback' => 'brasserie_admin_header_image',
	);

	$args = apply_filters( 'brasserie_custom_header_args', $args );

	if ( function_exists( 'wp_get_theme' ) ) {
		add_theme_support( 'custom-header', $args );
	}
}
add_action( 'after_setup_theme', 'brasserie_custom_header_setup' );

if ( ! function_exists( 'brasserie_header_style' ) ) :
/**
 * Styles the header image and text displayed on the blog
 *
 * @see brasserie_custom_header_setup().
 *
 * @since brasserie 1.0
 */
function brasserie_header_style() {

	// If no custom options for text are set, let's bail
	// get_header_textcolor() options: HEADER_TEXTCOLOR is default, hide text (returns 'blank') or any hex value
	if ( HEADER_TEXTCOLOR == get_header_textcolor() && '' == get_header_image() )
		return;
	// If we get this far, we have custom styles. Let's do this.
	?>
	<style type="text/css">
	<?php
		// Do we have a custom header image?
		if ( '' != get_header_image() ) :
	?>
		.site-header img {
			display: block;
			margin: 0 auto 0;
		}
	<?php endif;

		// Has the text been hidden?
		if ( 'blank' == get_header_textcolor() ) :
	?>
		.site-title,
		.site-description {
			position: absolute !important;
			clip: rect(1px 1px 1px 1px); /* IE6, IE7 */
			clip: rect(1px, 1px, 1px, 1px);
		}
		.site-header hgroup {
			background: none;
			padding: 0;
		}
	<?php
		// If the user has set a custom color for the text use that
		else :
	?>
		.site-title a,
		.site-description {
			color: #<?php echo get_header_textcolor(); ?> !important;
		}
	<?php endif; ?>
	</style>
	<?php
}
endif; // brasserie_header_style

if ( ! function_exists( 'brasserie_admin_header_style' ) ) :
/**
 * Styles the header image displayed on the Appearance > Header admin panel.
 *
 * @see brasserie_custom_header_setup().
 *
 * @since brasserie 1.0
 */
function brasserie_admin_header_style() {
?>
	<style type="text/css">
	.appearance_page_custom-header #headimg {
		background: #FFF;
		border: none;
		min-height: 200px;
	}
	#headimg h1 {
		font-size: 20px;
		font-family: 'open_sansbold', sans-serif;
		font-weight: normal;
		padding: 0.8em 0.5em 0;
	}
	#desc {
		padding: 0 2em 2em;
	}
	#headimg h1 a,
	#desc {
		color: #222;
		text-decoration: none;
	}
	#headimg img {
	}
	</style>
<?php
}
endif; // brasserie_admin_header_style

if ( ! function_exists( 'brasserie_admin_header_image' ) ) :
/**
 * Custom header image markup displayed on the Appearance > Header admin panel.
 *
 * @see brasserie_custom_header_setup().
 *
 * @since brasserie 1.0
 */
function brasserie_admin_header_image() { ?>
	<div id="headimg">
		<?php
		if ( 'blank' == get_header_textcolor() || '' == get_header_textcolor() )
			$style = ' style="display:none;"';
		else
			$style = ' style="color:#' . get_header_textcolor() . ';"';
		?>
		<h1><a id="name"<?php echo $style; ?> onclick="return false;" href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php bloginfo( 'name' ); ?></a></h1>
		<div id="desc"<?php echo $style; ?>><?php bloginfo( 'description' ); ?></div>
		<?php $header_image = get_header_image();
		if ( ! empty( $header_image ) ) : ?>
			<img src="<?php echo esc_url( $header_image ); ?>" alt="" />
		<?php endif; ?>
	</div>
<?php }
endif; // brasserie_admin_header_image


/**
 * /////////// WooCommerce /////////////////////
 */

/*  Query WooCommerce activation */
if ( ! function_exists( 'is_woocommerce_activated' ) ) {
	function is_woocommerce_activated() {
		return class_exists( 'woocommerce' ) ? true : false;
	}
}

/*  Get woocommerce custom theme code */
if ( is_woocommerce_activated() ) {
	require get_template_directory() . '/inc/woocommerce/hooks.php';

  function brasserie_header_add_to_cart_fragment( $fragments ) {
    global $woocommerce;
    ob_start();
    ?>
    <a class="cart-contents" href="<?php echo $woocommerce->cart->get_cart_url(); ?>" title="<?php _e('View your shopping cart', 'brasserie'); ?>">
      <?php echo sprintf(_n('%d item', '%d items', $woocommerce->cart->cart_contents_count, 'brasserie'), $woocommerce->cart->cart_contents_count);?> - <?php echo $woocommerce->cart->get_cart_total(); ?>
      <i class="fa fa-shopping-cart"></i>
    </a>
    <?php

    $fragments['a.cart-contents'] = ob_get_clean();

    return $fragments;

  }
  add_filter('add_to_cart_fragments', 'brasserie_header_add_to_cart_fragment');

}


/* Integrate the restaurant-reservations plugin */
include_once( 'inc/integrations/restaurant-reservations.php' );


/**
 * Show Welcome screen on activation
*/
if ( is_admin() ) {
	require get_template_directory() . '/inc/admin/welcome-screen.php';
}
function brasserie_welcome_redirect(){
  global $pagenow;
  if ( is_admin() && 'themes.php' == $pagenow && isset( $_GET['activated'] ) ) {
  	wp_redirect( admin_url( 'themes.php?page=brasserie-welcome' ) );
  }
}
add_action('after_setup_theme', 'brasserie_welcome_redirect');


/**
 * This file represents an example of the code that themes would use to register
 * the required plugins.
 *
 * @see http://tgmpluginactivation.com/configuration/ for detailed documentation.
 *
 * @package    TGM-Plugin-Activation
 * @subpackage Example
 * @version    2.6.1 for parent theme Brasserie for publication on WordPress.org
 * @author     Thomas Griffin, Gary Jones, Juliette Reinders Folmer
 * @copyright  Copyright (c) 2011, Thomas Griffin
 * @license    http://opensource.org/licenses/gpl-2.0.php GPL v2 or later
 * @link       https://github.com/TGMPA/TGM-Plugin-Activation
 */

/**
 * Include the TGM_Plugin_Activation class.
 *
 */
require_once get_template_directory() . '/inc/class-tgm-plugin-activation.php';

add_action( 'tgmpa_register', 'brasserie_register_required_plugins' );

/**
 * Register the required plugins for this theme.
 *
 * In this example, we register five plugins:
 * - one included with the TGMPA library
 * - two from an external source, one from an arbitrary source, one from a GitHub repository
 * - two from the .org repo, where one demonstrates the use of the `is_callable` argument
 *
 * The variables passed to the `tgmpa()` function should be:
 * - an array of plugin arrays;
 * - optionally a configuration array.
 * If you are not changing anything in the configuration array, you can remove the array and remove the
 * variable from the function call: `tgmpa( $plugins );`.
 * In that case, the TGMPA default settings will be used.
 *
 * This function is hooked into `tgmpa_register`, which is fired on the WP `init` action on priority 10.
 */
function brasserie_register_required_plugins() {
	/*
	 * Array of plugin arrays. Required keys are name and slug.
	 * If the source is NOT from the .org repo, then source is also required.
	 */
	$plugins = array(

		// This is an example of how to include a plugin from the WordPress Plugin Repository.
		array(
			'name'      => 'Restaurant Reservations',
			'slug'      => 'restaurant-reservations',
			'required'  => false,
		),
		array(
			'name'      => 'Food And Drink Menu',
			'slug'      => 'food-and-drink-menu',
			'required'  => false,
		),

	);

	/*
	 * Array of configuration settings. Amend each line as needed.
	 *
	 * TGMPA will start providing localized text strings soon. If you already have translations of our standard
	 * strings available, please help us make TGMPA even better by giving us access to these translations or by
	 * sending in a pull-request with .po file(s) with the translations.
	 *
	 * Only uncomment the strings in the config array if you want to customize the strings.
	 */
	$config = array(
		'id'           => 'brasserie',                 // Unique ID for hashing notices for multiple instances of TGMPA.
		'default_path' => '',                      // Default absolute path to bundled plugins.
		'menu'         => 'tgmpa-install-plugins', // Menu slug.
		'has_notices'  => true,                    // Show admin notices or not.
		'dismissable'  => true,                    // If false, a user cannot dismiss the nag message.
		'dismiss_msg'  => '',                      // If 'dismissable' is false, this message will be output at top of nag.
		'is_automatic' => false,                   // Automatically activate plugins after installation or not.
		'message'      => '',                      // Message to output right before the plugins table.

		/*
		'strings'      => array(
			'page_title'                      => __( 'Install Required Plugins', 'brasserie' ),
			'menu_title'                      => __( 'Install Plugins', 'brasserie' ),
			/* translators: %s: plugin name. * /
			'installing'                      => __( 'Installing Plugin: %s', 'brasserie' ),
			/* translators: %s: plugin name. * /
			'updating'                        => __( 'Updating Plugin: %s', 'brasserie' ),
			'oops'                            => __( 'Something went wrong with the plugin API.', 'brasserie' ),
			'notice_can_install_required'     => _n_noop(
				/* translators: 1: plugin name(s). * /
				'This theme requires the following plugin: %1$s.',
				'This theme requires the following plugins: %1$s.',
				'brasserie'
			),
			'notice_can_install_recommended'  => _n_noop(
				/* translators: 1: plugin name(s). * /
				'This theme recommends the following plugin: %1$s.',
				'This theme recommends the following plugins: %1$s.',
				'brasserie'
			),
			'notice_ask_to_update'            => _n_noop(
				/* translators: 1: plugin name(s). * /
				'The following plugin needs to be updated to its latest version to ensure maximum compatibility with this theme: %1$s.',
				'The following plugins need to be updated to their latest version to ensure maximum compatibility with this theme: %1$s.',
				'brasserie'
			),
			'notice_ask_to_update_maybe'      => _n_noop(
				/* translators: 1: plugin name(s). * /
				'There is an update available for: %1$s.',
				'There are updates available for the following plugins: %1$s.',
				'brasserie'
			),
			'notice_can_activate_required'    => _n_noop(
				/* translators: 1: plugin name(s). * /
				'The following required plugin is currently inactive: %1$s.',
				'The following required plugins are currently inactive: %1$s.',
				'brasserie'
			),
			'notice_can_activate_recommended' => _n_noop(
				/* translators: 1: plugin name(s). * /
				'The following recommended plugin is currently inactive: %1$s.',
				'The following recommended plugins are currently inactive: %1$s.',
				'brasserie'
			),
			'install_link'                    => _n_noop(
				'Begin installing plugin',
				'Begin installing plugins',
				'brasserie'
			),
			'update_link' 					  => _n_noop(
				'Begin updating plugin',
				'Begin updating plugins',
				'brasserie'
			),
			'activate_link'                   => _n_noop(
				'Begin activating plugin',
				'Begin activating plugins',
				'brasserie'
			),
			'return'                          => __( 'Return to Required Plugins Installer', 'brasserie' ),
			'plugin_activated'                => __( 'Plugin activated successfully.', 'brasserie' ),
			'activated_successfully'          => __( 'The following plugin was activated successfully:', 'brasserie' ),
			/* translators: 1: plugin name. * /
			'plugin_already_active'           => __( 'No action taken. Plugin %1$s was already active.', 'brasserie' ),
			/* translators: 1: plugin name. * /
			'plugin_needs_higher_version'     => __( 'Plugin not activated. A higher version of %s is needed for this theme. Please update the plugin.', 'brasserie' ),
			/* translators: 1: dashboard link. * /
			'complete'                        => __( 'All plugins installed and activated successfully. %1$s', 'brasserie' ),
			'dismiss'                         => __( 'Dismiss this notice', 'brasserie' ),
			'notice_cannot_install_activate'  => __( 'There are one or more required or recommended plugins to install, update or activate.', 'brasserie' ),
			'contact_admin'                   => __( 'Please contact the administrator of this site for help.', 'brasserie' ),

			'nag_type'                        => '', // Determines admin notice type - can only be one of the typical WP notice classes, such as 'updated', 'update-nag', 'notice-warning', 'notice-info' or 'error'. Some of which may not work as expected in older WP versions.
		),
		*/
	);

	tgmpa( $plugins, $config );
}

