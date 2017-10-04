<?php
/**
 * Welcome screen getting started template
 */
?>
<?php
// get theme customizer url
$url 	= admin_url() . 'customize.php?';
$url 	.= '&return=' . urlencode( admin_url() . 'themes.php?page=brasserie-welcome' );
$url 	.= '&brasserie-customizer=true';
?>
<div id="getting_started" class="col two-col panel" style="margin-bottom: 1.618em; padding-top: 1.618em; overflow: hidden;">

	<h2><?php echo sprintf( esc_html__( '%sBrasserie%s works for you', 'brasserie' ), '<strong>', '</strong>'); ?></h2>
	<p class="tagline"><?php _e( 'We\'ve made this theme simple and enjoyable to configure.', 'brasserie' ); ?></p>

	<div class="col-1">

		<!-- Plugins -->
		<div class="section plugins">
			<h4><?php _e( 'Install recommended plugins <span class="dashicons dashicons-admin-plugins"></span>' ,'brasserie' ); ?></h4>
			<p><?php echo sprintf( esc_html__( '%sBrasserie%s harnesses the power and functionality of the popular and free plugins built by %sTheme of the crop%s.', 'brasserie' ), '<strong>', '</strong>', '<a target="blank" href="' . esc_url('https://profiles.wordpress.org/natewr#content-plugins') . '"><strong>', '</strong></a>'); ?></p>
			<p><?php echo sprintf( esc_html__( 'With %sRestaurant Reservations%s you can accept restaurant reservations and table bookings online. Quickly confirm or reject bookings, send out custom email notifications, restrict booking times and more.', 'brasserie'), '<strong><a target="blank" href="' . esc_url('https://wordpress.org/plugins/restaurant-reservations/') . '">', '</a></strong>'); ?></p>
			<p><?php echo sprintf( esc_html__( 'Create a restaurant menu for cafes, bars and eateries, and display it in templates, posts, pages and widgets with the popular %sFood and Drink Menu%s plugin.', 'brasserie'), '<strong><a target="blank" href="' . esc_url('https://wordpress.org/plugins/food-and-drink-menu/') . '">', '</a></strong>'); ?></p>

			<p><a href="<?php echo esc_url( self_admin_url( 'themes.php?page=tgmpa-install-plugins' ) ); ?>" class="button button-primary"><?php _e( 'Install &amp; Activate Recommended Plugins', 'brasserie' ); ?></a></p>
		</div>

		<!-- HOMEPAGE -->
		<div class="section homepage">
			<h4><?php _e( 'Setup the homepage <span class="dashicons dashicons-admin-home"></span>', 'brasserie' ); ?></h4>
			<p><?php echo sprintf( esc_html__( 'Brasserie includes a custom homepage template that can be seen in use on our %sdemo site%s', 'brasserie' ), '<a target="_blank" href="' . esc_url('http://demos.templateexpress.com/brasserie/') . '">', '</a>'); ?></p>
			<p><?php echo sprintf( esc_html__( 'Create a new page and assign the %sCustom Home Page%s Template. Then set this new page as your Front page in the %sReading%s settings.', 'brasserie'), '<strong>', '</strong>', '<a href="' . esc_url( self_admin_url( 'options-reading.php' ) ) . '">', '</a>'); ?></p>
			<p><?php echo sprintf( esc_html__( 'You can then customize the homepage sections through the %scustomize section%s.', 'brasserie'),  '<a href="' . esc_url( self_admin_url( 'customize.php' ) ) . '">', '</a>'); ?></p>
			<p><a href="<?php echo esc_url( $url ); ?>" class="button"><?php _e( 'Open the Customizer', 'brasserie' ); ?></a></p>
		</div>

	</div>

	<div class="col-2 last-feature">
		<!-- CUSTOMIZER -->
		<h4><?php _e( 'Hundreds of options available <span class="dashicons dashicons-admin-generic"></span>' ,'brasserie' ); ?></h4>
		<p><?php _e( 'Using the WordPress Customizer you can change brasserie\'s appearance to match your brand and create a unique look.', 'brasserie' ); ?></p>
		<p><a href="<?php echo esc_url( $url ); ?>" class="button"><?php _e( 'Open the Customizer', 'brasserie' ); ?></a></p>

		<!-- MENUS -->
		<h4><?php _e( 'Configure menu location <span class="dashicons dashicons-menu"></span>' ,'brasserie' ); ?></h4>
		<p><?php _e( 'Brasserie includes the ability to customize your menu structure. Add pages, custom links, categories to your menu then assign it to the Primary Menu Location.', 'brasserie' ); ?></p>
		<p><a href="<?php echo esc_url( self_admin_url( 'nav-menus.php' ) ); ?>" class="button"><?php _e( 'Configure menus', 'brasserie' ); ?></a></p>

		<!-- DOCUMENTATION -->
		<h4><?php _e( 'View documentation <span class="dashicons dashicons-welcome-learn-more"></span>', 'brasserie' ); ?></h4>
		<p><?php _e( 'You can read detailed information on Brasserie\'s features and how to develop on top of it in the documentation.', 'brasserie' ); ?></p>
		<p><?php echo sprintf( esc_html('%sView documentation%s', 'brasserie'), '<a target="_blank" href="http://templateexpress.com/docs/brasserie/" class="button button-primary">', '</a>'); ?></p>

	</div>
</div>
