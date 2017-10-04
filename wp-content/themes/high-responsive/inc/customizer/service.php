<?php
/**
* The template for adding Service Settings in Customizer
*
 * @package High_Responsive
*/

function highresponsive_service_options( $wp_customize ) {
	// Add note to Jetpack Portfolio Section
    highresponsive_register_option( $wp_customize, array(
            'name'              => 'highresponsive_jetpack_portfolio_cpt_note',
            'sanitize_callback' => 'sanitize_text_field',
            'custom_control'    => 'Highresponsive_Note_Control',
            'label'             => sprintf( esc_html__( 'For Service Options for High Responsive Theme, go %1$shere%2$s', 'highresponsive' ),
                 '<a href="javascript:wp.customize.section( \'highresponsive_service\' ).focus();">',
                 '</a>'
            ),
            'section'           => 'ect_service',
            'type'              => 'description',
            'priority'          => 1,
        )
    );

    $wp_customize->add_section( 'highresponsive_service', array(
			'panel'    => 'highresponsive_theme_options',
			'title'    => esc_html__( 'Service', 'highresponsive' ),
		)
	);

	highresponsive_register_option( $wp_customize, array(
            'name'              => 'highresponsive_service_note_1',
            'sanitize_callback' => 'sanitize_text_field',
            'custom_control'    => 'Highresponsive_Note_Control',
			'active_callback'   => 'highresponsive_is_ect_service_inactive',
            'label'             => sprintf( esc_html__( 'For Services, install %1$sEssential Content Types%2$s Plugin with Service Content Type Enabled', 'highresponsive' ),
                '<a target="_blank" href="https://wordpress.org/plugins/essential-content-types/">',
                '</a>'
            ),
            'section'           => 'highresponsive_service',
            'type'              => 'description',
            'priority'          => 1,
        )
    );

	highresponsive_register_option( $wp_customize, array(
			'name'              => 'highresponsive_service_option',
			'default'           => 'homepage',
			'sanitize_callback' => 'highresponsive_sanitize_select',
			'active_callback'   => 'highresponsive_is_ect_service_active',
			'choices'           => highresponsive_section_visibility_options(),
			'label'             => esc_html__( 'Enable on', 'highresponsive' ),
			'section'           => 'highresponsive_service',
			'type'              => 'select',
		)
	);

	highresponsive_register_option( $wp_customize, array(
			'name'              => 'highresponsive_service_main_image',
			'sanitize_callback' => 'absint',
			'custom_control'    => 'WP_Customize_Media_Control',
			'active_callback'   => 'highresponsive_is_service_active',
			'label'             => esc_html__( 'Main Image', 'highresponsive' ),
			'section'           => 'highresponsive_service',
			'mime_type'         => 'image',
		)
	);

	highresponsive_register_option( $wp_customize, array(
			'name'              => 'highresponsive_service_main_image_link',
			'sanitize_callback' => 'esc_url_raw',
			'active_callback'   => 'highresponsive_is_service_active',
			'label'             => esc_html__( 'Main Image Link', 'highresponsive' ),
			'section'           => 'highresponsive_service',
		)
	);

	highresponsive_register_option( $wp_customize, array(
			'name'              => 'highresponsive_service_main_image_target',
			'sanitize_callback' => 'highresponsive_sanitize_checkbox',
			'active_callback'   => 'highresponsive_is_service_active',
			'label'             => esc_html__( 'Check to Open Link in New Window/Tab', 'highresponsive' ),
			'section'           => 'highresponsive_service',
			'type'              => 'checkbox',
		)
	);

	highresponsive_register_option( $wp_customize, array(
			'name'              => 'highresponsive_service_headline',
			'default'           => esc_html__( 'Services', 'highresponsive' ),
			'sanitize_callback' => 'wp_kses_post',
			'active_callback'   => 'highresponsive_is_service_active',
			'label'             => esc_html__( 'Service Archive Title', 'highresponsive' ),
			'section'           => 'highresponsive_service',
			'type'              => 'text',
		)
	);

	highresponsive_register_option( $wp_customize, array(
			'name'              => 'highresponsive_service_subheadline',
			'sanitize_callback' => 'wp_kses_post',
			'active_callback'   => 'highresponsive_is_service_active',
			'label'             => esc_html__( 'Service Archive Content', 'highresponsive' ),
			'section'           => 'highresponsive_service',
			'type'              => 'textarea',
		)
	);

	highresponsive_register_option( $wp_customize, array(
				'name'              => 'highresponsive_service_number',
				'default'           => 4,
				'sanitize_callback' => 'highresponsive_sanitize_number_range',
				'active_callback'   => 'highresponsive_is_service_active',
				'description'       => esc_html__( 'Save and refresh the page if No. of Service is changed', 'highresponsive' ),
				'input_attrs'       => array(
					'style' => 'width: 45px;',
					'min'   => 0,
				),
				'label'             => esc_html__( 'No of Service', 'highresponsive' ),
				'section'           => 'highresponsive_service',
				'type'              => 'number',
		)
	);

	$number = get_theme_mod( 'highresponsive_service_number', '4' );

	for ( $i = 1; $i <= $number ; $i++ ) {
		highresponsive_register_option( $wp_customize, array(
				'name'              => 'highresponsive_service_cpt_' . $i,
				'sanitize_callback' => 'highresponsive_sanitize_post',
				'default'           => 0,
				'active_callback'   => 'highresponsive_is_service_active',
				'label'             => esc_html__( 'Service ', 'highresponsive' ) . ' ' . $i ,
				'section'           => 'highresponsive_service',
				'type'              => 'select',
				'choices'           => highresponsive_generate_post_array( 'ect-service' ),
			)
		);
	} // End for().
}
add_action( 'customize_register', 'highresponsive_service_options' );

if ( ! function_exists( 'highresponsive_is_service_active' ) ) :
	/**
	* Return true if service is active
	*
	* @since High Responsive 1.0
	*/
	function highresponsive_is_service_active( $control ) {
		$enable = $control->manager->get_setting( 'highresponsive_service_option' )->value();

		//return true only if previwed page on customizer matches the type of content option selected
		return ( highresponsive_check_section( $enable ) && ( class_exists( 'Essential_Content_Service' ) || class_exists( 'Essential_Content_Pro_Service' ) ) );
	}
endif;

if ( ! function_exists( 'highresponsive_is_ect_service_active' ) ) :
    /**
    * Return true if testimonial is active
    *
    * @since High Responsive 1.0
    */
    function highresponsive_is_ect_service_active( $control ) {
        return ( class_exists( 'Essential_Content_Service' ) || class_exists( 'Essential_Content_Pro_Service' ) );
    }
endif;

if ( ! function_exists( 'highresponsive_is_ect_service_inactive' ) ) :
    /**
    * Return true if testimonial is active
    *
    * @since High Responsive 1.0
    */
    function highresponsive_is_ect_service_inactive( $control ) {
        return ! ( class_exists( 'Essential_Content_Service' ) || class_exists( 'Essential_Content_Pro_Service' ) );
    }
endif;
