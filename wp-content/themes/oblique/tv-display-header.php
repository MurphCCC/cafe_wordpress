<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package Oblique
 */
?>

<!DOCTYPE html>
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

    header#masthead, path, .svg-container.single-post-svg.svg-block, header.entry-header, .admin-bar .sidebar-toggle {
        display: none;    
    }
    
    html {
        margin-top: 0px !important;
    }

    .erm_menu:not(.type-erm_menu) {
        padding: 10px !important;
    }
</style>
</head>

<body <?php body_class(); ?>>

	<div id="content" class="site-content">
	<div class="container content-wrapper">
