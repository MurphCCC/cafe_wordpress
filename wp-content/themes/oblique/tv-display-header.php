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
    html {overflow: hidden;}
    header#masthead, path, .svg-container.single-post-svg.svg-block, header.entry-header, .admin-bar .sidebar-toggle {
        display: none;    
    }
    
    html {
        margin-top: -17px !important;
    }

    .erm_menu:not(.type-erm_menu) {
        padding: 10px !important;
    }
    .erm_menu .erm_title {
    margin-top: 5px;
    margin-bottom: 10px;
    font-family: Oswald, sans-serif;
    float: right;
}
    .page .hentry {
        background: #f8f9fb;
    }
    
    .container {
        width: 100% !important;
    }
.page div.entry-content p {
    margin: -10px 0 40px;
    /* font-family: "Athiti", sans-serif; */
    font-family: -apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,Oxygen-Sans,Ubuntu,Cantarell,"Helvetica Neue",sans-serif;
    line-height: 23px;
    font-weight: 200px;
    color: #b3b1b1;
    font-size: 1.62em;
}	
ul>li.erm_product.no_image:nth-child(odd) {
    background: #f5f5f5;
    /* color: black !important; */
    border: 1px solid;
    border-radius: 10px;
    padding-left: 15px;
    margin-bottom: -25px;

}
ul>li.erm_product.no_image:nth-child(even) {
    margin-bottom: -20px;
}
</style>
</head>

<body <?php body_class(); ?>>

	<div id="content" class="site-content">
	<div class="container content-wrapper">
