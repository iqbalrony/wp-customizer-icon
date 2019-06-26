# wp-customizer-icon
Create custom icon control for wordpress customizer.
<h3>Usage</h3> 
<pre>
/**
 * Customizer register
 */
add_action( 'customize_register', 'mytheme_customize_register' );
function mytheme_customize_register( $wp_customize ) {
	$wp_customize->add_section(
			'test_section',
			array(
				'title' => __('Icon', 'text-domain'),
				'priority' => 5,
			)
		);
	$wp_customize->add_setting(
			'test_icon',
			array(
				'default' => 'mdi mdi-access-point',
				'transport' => 'refresh',
			)
		);
	$wp_customize->add_control(
			new IR_Customize_Icon_Control(
				$wp_customize,
				'test_icon',
				array(
					'type'      => 'icon',
					'label' => __('Test Icon', 'text-domain'),
					'section' => 'test_section',
					'priority' => 10,
				))
	);
}

/**
 * Get Icon Class
 */
$icon_cls = get_theme_mod('test_icon');
echo '<i class="'.esc_attr( $icon_cls ).'"></i>';
</pre>
<h3>Add Extra Icon Class</h3>
<p>You can add extra CSS classes to the icon library. There is an filter hook named <code>IR_customizer_icons</code> by which you can add extra icons.</p>
<pre>
add_action('IR_customizer_icons','push_icon');
function push_icon($icon_array){
	$new_icon = array_merge(
		array(
			'mdi mdi-facebook' =>'mdi mdi-facebook'
		),$icon_array
	);
	return $new_icon;
}
</pre>
