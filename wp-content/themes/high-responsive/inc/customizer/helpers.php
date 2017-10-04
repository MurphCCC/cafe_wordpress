<?php

/**
 * Function to register control and setting
 */
function highresponsive_register_option( $wp_customize, $option ) {

	// Initialize Setting.
	$wp_customize->add_setting( $option['name'], array(
		'sanitize_callback'    => $option['sanitize_callback'],
		'default'              => isset( $option['default'] ) ? $option['default'] : '',
		'transport'            => isset( $option['transport'] ) ? $option['transport'] : 'refresh',
		'theme_supports'       => isset( $option['theme_supports'] ) ? $option['theme_supports'] : '',
	) );

	$control = array(
		'label'    => $option['label'],
		'section'  => $option['section'],
		'settings' => $option['name'],
	);

	if ( isset( $option['active_callback'] ) ) {
		$control['active_callback'] = $option['active_callback'];
	}

	if ( isset( $option['priority'] ) ) {
		$control['priority'] = $option['priority'];
	}

	if ( isset( $option['choices'] ) ) {
		$control['choices'] = $option['choices'];
	}

	if ( isset( $option['type'] ) ) {
		$control['type'] = $option['type'];
	}

	if ( isset( $option['input_attrs'] ) ) {
		$control['input_attrs'] = $option['input_attrs'];
	}

	if ( isset( $option['description'] ) ) {
		$control['description'] = $option['description'];
	}

	if ( isset( $option['custom_control'] ) ) {
		$wp_customize->add_control( new $option['custom_control']( $wp_customize, $option['name'], $control ) );
	} else {
		$wp_customize->add_control( $option['name'], $control );
	}
}

/**
 * Function to reset date with respect to condition
 */
function highresponsive_reset_data() {
	if ( get_theme_mod( 'highresponsive_reset_all_settings' ) ) {
		remove_theme_mods();

		return;
	}
}
add_action( 'customize_save_after', 'highresponsive_reset_data' );

/**
 * Alphabetically sort theme options sections
 *
 * @param  wp_customize object $wp_customize wp_customize object.
 */
function highresponsive_sort_sections_list( $wp_customize ) {
	foreach ( $wp_customize->sections() as $section_key => $section_object ) {
		if ( false !== strpos( $section_key, 'highresponsive_' ) && 'highresponsive_reset_all' !== $section_key && 'highresponsive_important_links' !== $section_key ) {
			$options[] = $section_key;
		}
	}

	sort( $options );

	$priority = 1;
	foreach ( $options as  $option ) {
		$wp_customize->get_section( $option )->priority = $priority++;
	}
}
add_action( 'customize_register', 'highresponsive_sort_sections_list' );

/**
 * Returns an array of visibility options for featured sections
 *
 * @since High Responsive 1.0
 */
function highresponsive_section_visibility_options() {
	$options = array(
		'homepage'    => esc_html__( 'Homepage / Frontpage', 'highresponsive' ),
		'entire-site' => esc_html__( 'Entire Site', 'highresponsive' ),
		'disabled'    => esc_html__( 'Disabled', 'highresponsive' ),
	);

	return apply_filters( 'highresponsive_section_visibility_options', $options );
}

/**
 * Returns an array of section types
 *
 * @since High Responsive 1.0
 */
function highresponsive_section_type_options() {
	$options = array(
		'demo' => esc_html__( 'Demo', 'highresponsive' ),
		'page' => esc_html__( 'Page', 'highresponsive' ),
	);

	return apply_filters( 'highresponsive_section_type_options', $options );
}

/**
 * Returns an array of color schemes registered for catchresponsive.
 *
 * @since High Responsive 1.0
 */
function highresponsive_get_pagination_types() {
	$pagination_types = array(
		'default'         => esc_html__( 'Default(Older Posts/Newer Posts)', 'highresponsive' ),
		'numeric'         => esc_html__( 'Numeric', 'highresponsive' ),
		'infinite-scroll' => esc_html__( 'Infinite Scroll', 'highresponsive' ),
	);

	return apply_filters( 'highresponsive_get_pagination_types', $pagination_types );
}

/**
 * Generate a list of all available post array
 *
 * @param  string $post_type post type.
 * @return post_array
 */
function highresponsive_generate_post_array( $post_type = 'post' ) {
	$output = array();
	$posts = get_posts( array(
		'post_type'        => $post_type,
		'post_status'      => 'publish',
		'suppress_filters' => false,
		'posts_per_page'   => -1,
		)
	);

	$output['0']= esc_html__( '-- Select --', 'highresponsive' );

	foreach ( $posts as $post ) {
		$output[ $post->ID ] = ! empty( $post->post_title ) ? $post->post_title : sprintf( __( '#%d (no title)', 'highresponsive' ), $post->ID );
	}

	return $output;
}
