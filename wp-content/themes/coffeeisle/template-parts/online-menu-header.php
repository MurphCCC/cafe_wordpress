<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package Oblique
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<?php if ( ! function_exists( 'has_site_icon' ) || ! has_site_icon() ) : ?>
	<?php if ( get_theme_mod( 'site_favicon' ) ) : ?>
		<link rel="shortcut icon" href="<?php echo esc_url( get_theme_mod( 'site_favicon' ) ); ?>" />
	<?php endif; ?>
<?php endif; ?>

<?php wp_head(); ?>
<style>
.site-content {
    margin-bottom: 30px;
}

.site-header {
    background: url('/cafe_wordpress/wp-content/uploads/2017/10/cropped-m58logo-1-1.jpg') no-repeat;
    background-position: center top;
    background-attachment: fixed;
    background-size: cover;
    -webkit-clip-path: polygon(0 0, 100% 0, 100% 90%, 47% 100%, 0 81%);
    clip-path: polygon(0 0, 100% 0, 100% 90%, 47% 100%, 0 81%);
}
.page .hentry {
    -webkit-clip-path: polygon(0 93%, 101% 100%, 100% 2%, 46% 7%, 0% 0%);
    clip-path: polygon(0 93%, 101% 100%, 100% 2%, 46% 7%, 0% 0%);
}
/*button.nav:hover {
    background: #434343;
}*/

button.nav {
    background-color: #f8f9fb;
    border-radius: 10px;
    font-family: Oswald, sans-serif;
    font-weight: 100;
    text-align: center;
    color: black;
    padding: 5px;
}

div.navbar {
    color: #f8f9fb;
    text-align: center;
    padding: 10px;
    background: rgb(248, 249, 251);
    width: 100%;
    position: fixed;
    height: 5%;
    z-index: 10000;
}

.navbar {
	top: 0px;
	left: 0px;
	z-index: 10000;
}

	a.nav {
	color: black;
    font-family: 'Oswald', sans-serif;
    padding-left: 5em;
    padding-bottom: .2em;
	}

	/*Remove top admin bar*/
div#wpadminbar {
		display: none !important;
	}
}

</style>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

</head>

<body <?php body_class(); ?>>
<div id="page" class="hfeed site">
	<a class="skip-link screen-reader-text" href="#content"><?php _e( 'Skip to content', 'oblique' ); ?></a>

	<?php $menu_text = get_theme_mod( 'menu_text' ); ?>
	<div class="navbar">
	<?php if ( ! $menu_text || is_customize_preview() ) : ?>
		<i class="fa fa-bars<?php echo $menu_text && is_customize_preview() ? ' oblique-only-customizer' : ''; ?>"></i>
	<?php endif; ?>
	<?php if ( $menu_text || is_customize_preview() ) : ?>
		<?php echo '<span class="' . ( ! $menu_text && is_customize_preview() ? ' oblique-only-customizer' : '' ) . '">' . esc_html( $menu_text ) . '<span>'; ?>
		<?php endif; ?>
		<a class="nav btn-lunch">Lunch and Dinner Menu</a>
		<a class="nav btn-weekday">Weekday Breakfast Menu</a>
		<a class="nav btn-weekend">Weekend Breakfast Menu</a>
		<a class="nav btn-specials">Daily Specials</a>

	</div>

<!-- 	<div class="top-bar container">
		<?php if ( has_nav_menu( 'social' ) ) : ?>
			<nav class="social-navigation clearfix">
				<?php
				wp_nav_menu(
					array(
						'theme_location' => 'social',
						'link_before' => '<span class="screen-reader-text">',
						'link_after' => '</span>',
						'menu_class' => 'menu clearfix',
						'fallback_cb' => false,
					)
				);
				?>
			</nav>
		<?php endif; ?>
		<?php do_action( 'oblique_nav_search' ); ?>
		<?php if ( ! get_theme_mod( 'search_toggle' ) || is_customize_preview() ) : ?>
			<div class="header-search<?php echo get_theme_mod( 'search_toggle' ) && is_customize_preview() ? ' oblique-only-customizer' : ''; ?>">
				<?php get_search_form(); ?>
			</div> -->
		<?php endif; ?>
	</div>

	<?php do_action( 'oblique_nav_container' ); ?>
	<header id="masthead" class="site-header" role="banner">
		<div class="overlay"></div>
		<div class="container">
			<div class="site-branding">
				<?php $oblique_site_logo = get_theme_mod( 'site_logo' ); ?>
				<?php if ( ! empty( $oblique_site_logo ) && get_theme_mod( 'logo_style', 'hide-title' ) == 'hide-title' ) : /* Show only logo */ ?>
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>"><img class="site-logo" src="<?php echo esc_url( $oblique_site_logo ); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>" /></a>
				<?php elseif ( get_theme_mod( 'logo_style', 'hide-title' ) == 'show-title' ) : ?>
					<?php if ( ! empty( $oblique_site_logo ) ) { ?>
						<a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>"><img class="site-logo show-title" src="<?php echo esc_url( $oblique_site_logo ); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>" /></a>
					<?php } ?>
					<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
					<h2 class="site-description"><?php bloginfo( 'description' ); ?></h2>
				<?php else : /* Show only site title and description */ ?>
					<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
					<h2 class="site-description"><?php bloginfo( 'description' ); ?></h2>
				<?php endif; ?>
			</div><!-- .site-branding -->
		</div>
	</header><!-- #masthead -->

	<div id="content" class="site-content">
	<div class="container content-wrapper">

