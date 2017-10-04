<?php
/**
 * Theme Options
 *
 * @package High_Responsive
 */

/**
 * Add theme options
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function highresponsive_theme_options( $wp_customize ) {
	$wp_customize->add_panel( 'highresponsive_theme_options', array(
		'title'    => esc_html__( 'Theme Options', 'highresponsive' ),
		'priority' => 130,
	) );

	// Breadcrumb Option.
	$wp_customize->add_section( 'highresponsive_breadcrumb_options', array(
		'description'   => esc_html__( 'Breadcrumbs are a great way of letting your visitors find out where they are on your site with just a glance.', 'highresponsive' ),
		'panel'         => 'highresponsive_theme_options',
		'title'         => esc_html__( 'Breadcrumb', 'highresponsive' ),
	) );

	highresponsive_register_option( $wp_customize, array(
			'name'              => 'highresponsive_breadcrumb_option',
			'default'           => 1,
			'sanitize_callback' => 'highresponsive_sanitize_checkbox',
			'label'             => esc_html__( 'Check to enable Breadcrumb', 'highresponsive' ),
			'section'           => 'highresponsive_breadcrumb_options',
			'type'              => 'checkbox',
		)
	);

	highresponsive_register_option( $wp_customize, array(
			'name'              => 'highresponsive_latest_posts_title',
			'default'           => esc_html__( 'News', 'highresponsive' ),
			'sanitize_callback' => 'wp_kses_post',
			'label'             => esc_html__( 'Latest Posts Title', 'highresponsive' ),
			'section'           => 'highresponsive_theme_options',
		)
	);

	// Layout Options
	$wp_customize->add_section( 'highresponsive_layout_options', array(
		'title' => esc_html__( 'Layout Options', 'highresponsive' ),
		'panel' => 'highresponsive_theme_options',
		)
	);

	/* Layout Type */
	highresponsive_register_option( $wp_customize, array(
			'name'              => 'highresponsive_layout_type',
			'default'           => 'fluid',
			'sanitize_callback' => 'highresponsive_sanitize_select',
			'label'             => esc_html__( 'Site Layout', 'highresponsive' ),
			'section'           => 'highresponsive_layout_options',
			'type'              => 'radio',
			'choices'           => array(
				'fluid' => esc_html__( 'Fluid', 'highresponsive' ),
				'boxed' => esc_html__( 'Boxed', 'highresponsive' ),
			),
		)
	);

	/* Default Layout */
	highresponsive_register_option( $wp_customize, array(
			'name'              => 'highresponsive_default_layout',
			'default'           => 'right-sidebar',
			'sanitize_callback' => 'highresponsive_sanitize_select',
			'label'             => esc_html__( 'Default Layout', 'highresponsive' ),
			'section'           => 'highresponsive_layout_options',
			'type'              => 'radio',
			'choices'           => array(
				'right-sidebar'         => esc_html__( 'Right Sidebar ( Content, Primary Sidebar )', 'highresponsive' ),
				'no-sidebar'            => esc_html__( 'No Sidebar', 'highresponsive' ),
			),
		)
	);

	/* Homepage/Archive Layout */
	highresponsive_register_option( $wp_customize, array(
			'name'              => 'highresponsive_homepage_archive_layout',
			'default'           => 'right-sidebar',
			'sanitize_callback' => 'highresponsive_sanitize_select',
			'label'             => esc_html__( 'Homepage/Archive Layout', 'highresponsive' ),
			'section'           => 'highresponsive_layout_options',
			'type'              => 'radio',
			'choices'           => array(
				'right-sidebar'         => esc_html__( 'Right Sidebar ( Content, Primary Sidebar )', 'highresponsive' ),
				'no-sidebar'            => esc_html__( 'No Sidebar', 'highresponsive' ),
			),
		)
	);

	/* Archive Content Layout */
	highresponsive_register_option( $wp_customize, array(
			'name'              => 'highresponsive_content_layout',
			'default'           => 'excerpt-image-left',
			'sanitize_callback' => 'highresponsive_sanitize_select',
			'label'             => esc_html__( 'Archive Content Layout', 'highresponsive' ),
			'section'           => 'highresponsive_layout_options',
			'type'              => 'radio',
			'choices'           => array(
				'excerpt-image-left'     => esc_html__( 'Show Excerpt( Image Left)', 'highresponsive' ),
				'full-content'           => esc_html__( 'Show Full Content ( No Featured Image )', 'highresponsive' ),
			),
		)
	);

	/* Single Page/Post Image Layout */
	highresponsive_register_option( $wp_customize, array(
			'name'              => 'highresponsive_single_layout',
			'default'           => 'disabled',
			'sanitize_callback' => 'highresponsive_sanitize_select',
			'label'             => esc_html__( 'Single Page/Post Image Layout', 'highresponsive' ),
			'section'           => 'highresponsive_layout_options',
			'type'              => 'radio',
			'choices'           => array(
				'disabled'              => esc_html__( 'Disabled', 'highresponsive' ),
				'post-thumbnail'        => esc_html__( 'Enable (Post Thumbnail)', 'highresponsive' ),
			),
		)
	);

	// Excerpt Options.
	$wp_customize->add_section( 'highresponsive_excerpt_options', array(
		'panel'     => 'highresponsive_theme_options',
		'title'     => esc_html__( 'Excerpt Options', 'highresponsive' ),
	) );

	highresponsive_register_option( $wp_customize, array(
			'name'              => 'highresponsive_excerpt_length',
			'default'           => '20',
			'sanitize_callback' => 'absint',
			'description' => esc_html__( 'Excerpt length. Default is 30 words', 'highresponsive' ),
			'input_attrs' => array(
				'min'   => 10,
				'max'   => 200,
				'step'  => 5,
				'style' => 'width: 60px;',
			),
			'label'    => esc_html__( 'Excerpt Length (words)', 'highresponsive' ),
			'section'  => 'highresponsive_excerpt_options',
			'type'     => 'number',
		)
	);

	highresponsive_register_option( $wp_customize, array(
			'name'              => 'highresponsive_excerpt_more_text',
			'default'           => esc_html__( 'Continue reading &gt;', 'highresponsive' ),
			'sanitize_callback' => 'sanitize_text_field',
			'label'             => esc_html__( 'Read More Text', 'highresponsive' ),
			'section'           => 'highresponsive_excerpt_options',
			'type'              => 'text',
		)
	);

	// Excerpt Options.
	$wp_customize->add_section( 'highresponsive_search_options', array(
		'panel'     => 'highresponsive_theme_options',
		'title'     => esc_html__( 'Search Options', 'highresponsive' ),
	) );

	highresponsive_register_option( $wp_customize, array(
			'name'              => 'highresponsive_search_text',
			'default'           => esc_html__( 'Search', 'highresponsive' ),
			'sanitize_callback' => 'sanitize_text_field',
			'label'             => esc_html__( 'Search Text', 'highresponsive' ),
			'section'           => 'highresponsive_search_options',
			'type'              => 'text',
		)
	);

	// Header Top Options
	$wp_customize->add_section( 'highresponsive_header_top', array(
		'panel'       => 'highresponsive_theme_options',
		'title'       => esc_html__( 'Header Top Options', 'highresponsive' ),
	) );

	highresponsive_register_option( $wp_customize, array(
			'name'              => 'highresponsive_enable_date',
			'sanitize_callback' => 'highresponsive_sanitize_checkbox',
			'label'             => esc_html__( 'Enable Date', 'highresponsive' ),
			'section'           => 'highresponsive_header_top',
			'type'              => 'checkbox',
		)
	);

	highresponsive_register_option( $wp_customize, array(
			'name'              => 'highresponsive_email',
			'sanitize_callback' => 'sanitize_email',
			'label'             => esc_html__( 'Email', 'highresponsive' ),
			'section'           => 'highresponsive_header_top',
			'type'              => 'text',
		)
	);

	highresponsive_register_option( $wp_customize, array(
			'name'              => 'highresponsive_phone',
			'sanitize_callback' => 'sanitize_text_field',
			'label'             => esc_html__( 'Phone', 'highresponsive' ),
			'section'           => 'highresponsive_header_top',
			'type'              => 'text',
		)
	);

	// Homepage / Frontpage Options.
	$wp_customize->add_section( 'highresponsive_homepage_options', array(
		'description' => esc_html__( 'Only posts that belong to the categories selected here will be displayed on the front page', 'highresponsive' ),
		'panel'       => 'highresponsive_theme_options',
		'title'       => esc_html__( 'Homepage / Frontpage Options', 'highresponsive' ),
	) );

	highresponsive_register_option( $wp_customize, array(
			'name'              => 'highresponsive_front_page_category',
			'sanitize_callback' => 'highresponsive_sanitize_category_list',
			'custom_control'    => 'Highresponsive_Multi_Categories_Control',
			'label'             => esc_html__( 'Categories', 'highresponsive' ),
			'section'           => 'highresponsive_homepage_options',
			'type'              => 'dropdown-categories',
		)
	);

	// Pagination Options.
	$pagination_type = get_theme_mod( 'highresponsive_pagination_type', 'default' );

	$nav_desc = '';

	/**
	* Check if navigation type is Jetpack Infinite Scroll and if it is enabled
	*/
	$nav_desc = sprintf(
		wp_kses(
			__( 'Infinite Scroll Options requires %1$sJetPack Plugin%2$s with Infinite Scroll module Enabled.', 'highresponsive' ),
			array(
				'a' => array(
					'href' => array(),
					'target' => array(),
				),
				'br'=> array()
			)
		),
		'<a target="_blank" href="https://wordpress.org/plugins/jetpack/">',
		'</a>'
	);

	$nav_desc .= '&nbsp;' . sprintf(
		wp_kses(
			__( 'Once Jetpack is installed, Infinite Scroll Settings can be found %1$shere%2$s', 'highresponsive' ),
			array(
				'a' => array(
					'href' => array(),
					'target' => array(),
				),
				'br'=> array()
			)
		),
		'<a target="_blank" href="' . esc_url( admin_url( 'admin.php?page=jetpack#/settings' ) ) . '">',
		'</a>'
	);

	$wp_customize->add_section( 'highresponsive_pagination_options', array(
		'description' => $nav_desc,
		'panel'       => 'highresponsive_theme_options',
		'title'       => esc_html__( 'Pagination Options', 'highresponsive' ),
	) );

	highresponsive_register_option( $wp_customize, array(
			'name'              => 'highresponsive_pagination_type',
			'default'           => 'default',
			'sanitize_callback' => 'highresponsive_sanitize_select',
			'choices'           => highresponsive_get_pagination_types(),
			'label'             => esc_html__( 'Pagination type', 'highresponsive' ),
			'section'           => 'highresponsive_pagination_options',
			'type'              => 'select',
		)
	);

	/* Scrollup Options */
	$wp_customize->add_section( 'highresponsive_scrollup', array(
		'panel'    => 'highresponsive_theme_options',
		'title'    => esc_html__( 'Scrollup Options', 'highresponsive' ),
	) );

	highresponsive_register_option( $wp_customize, array(
			'name'              => 'highresponsive_disable_scrollup',
			'sanitize_callback' => 'highresponsive_sanitize_checkbox',
			'label'             => esc_html__( 'Disable Scroll Up', 'highresponsive' ),
			'section'           => 'highresponsive_scrollup',
			'type'              => 'checkbox',
		)
	);
}
add_action( 'customize_register', 'highresponsive_theme_options' );
