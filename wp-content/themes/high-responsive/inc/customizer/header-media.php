<?php
/**
 * Header Media Options
 *
 * @package High_Responsive
 */

/**
 * Add Header Media options
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function highresponsive_header_media_options( $wp_customize ) {
	$wp_customize->get_section( 'header_image' )->description = esc_html__( 'If you add video, it will only show up on Homepage/FrontPage. Other Pages will use Header/Post/Page Image depending on your selection of option. Header Image will be used as a fallback while the video loads ', 'highresponsive' );

	highresponsive_register_option( $wp_customize, array(
			'name'              => 'highresponsive_header_media_option',
			'default'           => 'homepage',
			'sanitize_callback' => 'highresponsive_sanitize_select',
			'choices'           => array(
				'homepage'               => esc_html__( 'Homepage / Frontpage', 'highresponsive' ),
				'exclude-home'           => esc_html__( 'Excluding Homepage', 'highresponsive' ),
				'exclude-home-page-post' => esc_html__( 'Excluding Homepage, Page/Post Featured Image', 'highresponsive' ),
				'entire-site'            => esc_html__( 'Entire Site', 'highresponsive' ),
				'entire-site-page-post'  => esc_html__( 'Entire Site, Page/Post Featured Image', 'highresponsive' ),
				'pages-posts'            => esc_html__( 'Pages and Posts', 'highresponsive' ),
				'disable'                => esc_html__( 'Disabled', 'highresponsive' ),
			),
			'label'             => esc_html__( 'Enable on ', 'highresponsive' ),
			'section'           => 'header_image',
			'type'              => 'select',
			'priority'          => 1,
		)
	);

	highresponsive_register_option( $wp_customize, array(
			'name'              => 'highresponsive_header_media_title',
			'default'           => esc_html__( 'Welcome to High Responsive', 'highresponsive' ),
			'sanitize_callback' => 'wp_kses_post',
			'label'             => esc_html__( 'Header Media Title', 'highresponsive' ),
			'section'           => 'header_image',
			'type'              => 'text',
		)
	);

    highresponsive_register_option( $wp_customize, array(
			'name'              => 'highresponsive_header_media_text',
			'default'           => esc_html__( 'Make things as simple as possible but no simpler.', 'highresponsive' ),
			'sanitize_callback' => 'wp_kses_post',
			'label'             => esc_html__( 'Header Media Text', 'highresponsive' ),
			'section'           => 'header_image',
			'type'              => 'textarea',
		)
	);

	highresponsive_register_option( $wp_customize, array(
			'name'              => 'highresponsive_header_media_url',
			'default'           => '#',
			'sanitize_callback' => 'esc_url_raw',
			'label'             => esc_html__( 'Header Media Url', 'highresponsive' ),
			'section'           => 'header_image',
		)
	);

	highresponsive_register_option( $wp_customize, array(
			'name'              => 'highresponsive_header_media_url_text',
			'default'           => esc_html__( 'Continue Reading', 'highresponsive' ),
			'sanitize_callback' => 'sanitize_text_field',
			'label'             => esc_html__( 'Header Media Url Text', 'highresponsive' ),
			'section'           => 'header_image',
		)
	);

	highresponsive_register_option( $wp_customize, array(
			'name'              => 'highresponsive_header_url_target',
			'sanitize_callback' => 'highresponsive_sanitize_checkbox',
			'label'             => esc_html__( 'Check to Open Link in New Window/Tab', 'highresponsive' ),
			'section'           => 'header_image',
			'type'              => 'checkbox',
		)
	);
}
add_action( 'customize_register', 'highresponsive_header_media_options' );
