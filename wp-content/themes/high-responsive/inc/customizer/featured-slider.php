<?php
/**
 * Featured Slider Options
 *
 * @package High_Responsive
 */

/**
 * Add hero content options to theme options
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function highresponsive_slider_options( $wp_customize ) {
	$wp_customize->add_section( 'highresponsive_featured_slider', array(
			'panel' => 'highresponsive_theme_options',
			'title' => esc_html__( 'Featured Slider', 'highresponsive' ),
		)
	);

	highresponsive_register_option( $wp_customize, array(
			'name'              => 'highresponsive_slider_option',
			'default'           => 'disabled',
			'sanitize_callback' => 'highresponsive_sanitize_select',
			'choices'           => highresponsive_section_visibility_options(),
			'label'             => esc_html__( 'Enable on', 'highresponsive' ),
			'section'           => 'highresponsive_featured_slider',
			'type'              => 'select',
		)
	);

	highresponsive_register_option( $wp_customize, array(
			'name'              => 'highresponsive_slider_transition_effect',
			'default'           => 'fade',
			'sanitize_callback' => 'highresponsive_sanitize_select',
			'active_callback'   => 'highresponsive_is_slider_active',
			'choices'           => highresponsive_slider_transition_effects(),
			'label'             => esc_html__( 'Transition Effect', 'highresponsive' ),
			'section'           => 'highresponsive_featured_slider',
			'type'              => 'select',
		)
	);

	highresponsive_register_option( $wp_customize, array(
			'name'              => 'highresponsive_slider_transition_delay',
			'default'           => '4',
			'sanitize_callback' => 'absint',
			'active_callback'   => 'highresponsive_is_slider_active',
			'description'       => esc_html__( 'seconds(s)', 'highresponsive' ),
			'input_attrs'       => array(
				'style' => 'width: 40px;',
			),
			'label'             => esc_html__( 'Transition Delay', 'highresponsive' ),
			'section'           => 'highresponsive_featured_slider',
		)
	);

	highresponsive_register_option( $wp_customize, array(
			'name'              => 'highresponsive_slider_transition_length',
			'default'           => '1',
			'sanitize_callback' => 'absint',

			'active_callback'   => 'highresponsive_is_slider_active',
			'description'       => esc_html__( 'seconds(s)', 'highresponsive' ),
			'input_attrs'       => array(
				'style' => 'width: 100px;',
			),
			'label'             => esc_html__( 'Transition Length', 'highresponsive' ),
			'section'           => 'highresponsive_featured_slider',
		)
	);

	highresponsive_register_option( $wp_customize, array(
			'name'              => 'highresponsive_slider_image_loader',
			'default'           => 'false',
			'sanitize_callback' => 'highresponsive_sanitize_select',
			'active_callback'   => 'highresponsive_is_slider_active',
			'choices'           => highresponsive_slider_image_loader(),
			'label'             => esc_html__( 'Image Loader', 'highresponsive' ),
			'section'           => 'highresponsive_featured_slider',
			'type'              => 'select',
		)
	);

	highresponsive_register_option( $wp_customize, array(
			'name'              => 'highresponsive_slider_number',
			'default'           => '4',
			'sanitize_callback' => 'highresponsive_sanitize_number_range',

			'active_callback'   => 'highresponsive_is_slider_active',
			'description'       => esc_html__( 'Save and refresh the page if No. of Slides is changed (Max no of slides is 20)', 'highresponsive' ),
			'input_attrs'       => array(
				'style' => 'width: 45px;',
				'min'   => 0,
				'max'   => 20,
				'step'  => 1,
			),
			'label'             => esc_html__( 'No of Slides', 'highresponsive' ),
			'section'           => 'highresponsive_featured_slider',
			'type'              => 'number',
			'transport'         => 'postMessage',
		)
	);

	$slider_number = get_theme_mod( 'highresponsive_slider_number', 4 );

	for ( $i = 1; $i <= $slider_number ; $i++ ) {
		// Page Sliders
		highresponsive_register_option( $wp_customize, array(
				'name'              =>'highresponsive_slider_page_' . $i,
				'sanitize_callback' => 'highresponsive_sanitize_post',
				'active_callback'   => 'highresponsive_is_slider_active',
				'label'             => esc_html__( 'Page', 'highresponsive' ) . ' # ' . $i,
				'section'           => 'highresponsive_featured_slider',
				'type'              => 'dropdown-pages',
			)
		);
	} // End for().
}
add_action( 'customize_register', 'highresponsive_slider_options' );


/**
 * Returns an array of feature slider transition effects
 *
 * @since High Responsive 1.0
 */
function highresponsive_slider_transition_effects() {
	$options = array(
		'fade'       => esc_html__( 'Fade', 'highresponsive' ),
		'fadeout'    => esc_html__( 'Fade Out', 'highresponsive' ),
		'none'       => esc_html__( 'None', 'highresponsive' ),
		'scrollHorz' => esc_html__( 'Scroll Horizontal', 'highresponsive' ),
		'scrollVert' => esc_html__( 'Scroll Vertical', 'highresponsive' ),
		'flipHorz'   => esc_html__( 'Flip Horizontal', 'highresponsive' ),
		'flipVert'   => esc_html__( 'Flip Vertical', 'highresponsive' ),
		'tileSlide'  => esc_html__( 'Tile Slide', 'highresponsive' ),
		'tileBlind'  => esc_html__( 'Tile Blind', 'highresponsive' ),
		'shuffle'    => esc_html__( 'Shuffle', 'highresponsive' ),
	);

	return apply_filters( 'highresponsive_slider_transition_effects', $options );
}


/**
 * Returns an array of featured slider image loader options
 *
 * @since High Responsive 1.0
 */
function highresponsive_slider_image_loader() {
	$options = array(
		'true'  => esc_html__( 'True', 'highresponsive' ),
		'wait'  => esc_html__( 'Wait', 'highresponsive' ),
		'false' => esc_html__( 'False', 'highresponsive' ),
	);

	return apply_filters( 'highresponsive_slider_image_loader', $options );
}

/** Active Callback Functions */

if( ! function_exists( 'highresponsive_is_slider_active' ) ) :
	/**
	* Return true if slider is active
	*
	* @since High Responsive 1.0
	*/
	function highresponsive_is_slider_active( $control ) {
		global $wp_query;

		$page_id = $wp_query->get_queried_object_id();

		// Front page display in Reading Settings
		$page_for_posts = get_option('page_for_posts');

		$enable = $control->manager->get_setting( 'highresponsive_slider_option' )->value();

		//return true only if previwed page on customizer matches the type of slider option selected
		return ( 'entire-site' == $enable || ( ( is_front_page() || ( is_home() && $page_for_posts != $page_id ) ) && 'homepage' == $enable )
			);
	}
endif;
