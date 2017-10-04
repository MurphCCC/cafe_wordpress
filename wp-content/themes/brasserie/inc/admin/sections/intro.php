<?php
/**
 * Welcome screen intro template
 */
?>
<?php
$brasserie = wp_get_theme( 'brasserie' );

?>
<div class="col two-col" style="margin-bottom: 1.618em; overflow: hidden;">
	<div class="col">
		<h1 style="margin-right: 0;"><?php echo '<strong>Brasserie</strong> <sup style="font-weight: bold; font-size: 50%; padding: 5px 10px; color: #666; background: #fff;">' . esc_attr( $brasserie['Version'] ) . '</sup>'; ?></h1>
		<p style="font-size: 1.2em;"><?php _e( 'Excellent! You\'ve activated <strong>Brasserie</strong>, we hope you enjoy this free Food based theme thats perfect for restaurants, cafes, bars and other eating establishments.', 'brasserie' ); ?></p>
		<p><?php _e( 'This page will help you get up and running quickly with <strong>Brasserie</strong>. Please use the <a href="https://wordpress.org/support/theme/brasserie">Wordpress Support Forums</a> if you have experience issues with this theme.', 'brasserie' ); ?></p>
	</div>

	<div class="col last-feature">
		<img src="<?php echo esc_url( get_template_directory_uri() ) . '/screenshot.png'; ?>" alt="Brasserie" class="image-50" width="440" />
	</div>
</div>
