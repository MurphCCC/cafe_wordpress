<?php
/**
 * Welcome screen add-ons template
 */
?>
<div id="add_ons" class="brasserie-add-ons panel" style="padding-top: 1.618em; clear: both;">
	<h2><?php echo sprintf( esc_html__( 'Go further with %sBrasserie Pro%s', 'brasserie' ), '<strong>', '</strong>'); ?></h2>

	<p class="tagline">
		<?php echo sprintf( esc_html__( 'Below is a selection of all the wonderful features you can enjoy with %sBrasserie Pro%s', 'brasserie' ), '<strong>', '</strong>'); ?>
	</p>

	<div class="add-on">
		<h4><?php _e( 'Premium Support Access', 'brasserie' ); ?></h4>
		<div class="content">
			<ul>
				<li><?php _e('<span class="dashicons dashicons-plus"></span> Fast and in-depth Support Access', 'brasserie'); ?></li>
				<li><?php _e('<span class="dashicons dashicons-plus"></span> More Custom Templates', 'brasserie'); ?></li>
				<li><?php _e('<span class="dashicons dashicons-plus"></span> More Social Media Options', 'brasserie'); ?></li>
				<li><?php _e('<span class="dashicons dashicons-plus"></span> More Google fonts', 'brasserie'); ?></li>
				<li><?php _e('<span class="dashicons dashicons-plus"></span> Loads more color options', 'brasserie'); ?></li>
				<li><?php _e('<span class="dashicons dashicons-plus"></span> Free Future Extensions', 'brasserie'); ?></li>
				<li><?php _e('<span class="dashicons dashicons-plus"></span> Simple Theme updates', 'brasserie'); ?></li>
			</ul>
			<p><?php  _e( 'Template Express prides itself on its quick and comprehensive support network. With the pro version you have access to our support forums.' , 'brasserie' );?></p>
			<p><?php echo sprintf( esc_html__( '%sMore Info%s', 'brasserie' ), '<a target="_blank" href="https://www.templateexpress.com/brasseriepro-theme" class="button button-primary">', '</a>'); ?></p>
		</div>
	</div>

	<hr style="clear: both;" />

	<p style="font-size: 1.2em; margin: 2.618em 0;">
		<?php echo sprintf( esc_html__( 'Don\'t forget that when you purchase Brasserie Pro you will recieve automatic updates and premium support for 12 months. You can also use the theme on as many sites as you need. %sFind out More%s.', 'brasserie' ), '<a target="_blank" href="http://www.templateexpress.com/brasserie-pro-theme">', '</a>' ); ?>
	</p>
</div>
