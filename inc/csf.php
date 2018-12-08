<?php

function cust_csf_settings($options){

	$options      = array();

	$options[]    = array(
		'name'        => 'customizer_csf_section1',
		'title'       => __('CodeStar Demo','customizer'),
		'settings'    => array(
			array(
				'name'    => 'about_heading',
				'control' => array(
					'label' => __('About Heading','customizer'),
					'type'  => 'text',
				),
				'transport'	=> 'postMessage'
			),
			array(
				'name'    => 'about_description',
				'control' => array(
					'label' => __('About description','customizer'),
					'type'  => 'textarea',
				)
			),
			array(
				'name'    => 'demo_control1',
				'control' => array(
					'label' => __('File upload','customizer'),
					'type'  => 'file',
				)
			),
			array(
				'name'    => 'demo_control2',
				'control' => array(
					'label' => __('Color Picker','customizer'),
					'type'  => 'color',
				)
			),
			array(
				'name'    => 'demo_control3',
				'control' => array(
					'label' => __('Media','customizer'),
					'type'  => 'media',
				)
			)
		)
	);



	$options[]  = array(
		'name'        => 'customizer_csf_section2',
		'title'       => __('CodeStar Controls','customizer'),
		'settings'    => array(
			array(
				'name'    => 'switcher',
				'control' => array(					
					'type'  => 'cs_field',
					'options' => array(
						'title' => __('Switcher','customizer'),
						'type'	=> 'switcher'
					)
				)
			),
			array(
				'name'    => 'dummy_text',
				'control' => array(
					'label' => __('Dummy Text','customizer'),
					'type'  => 'text',
					'active_callback' => function(){
						if (cs_get_customize_option('switcher')) {
							return true;
						}
						return false;
					}
				)
			),
			array(
				'name'    => 'icon',
				'control' => array(					
					'type'  => 'cs_field',
					'options' => array(
						'title' => __('Select Icon','customizer'),
						'type'	=> 'icon'
					)
				)
			),
			
		)
	);

	return $options;

}
add_filter( "cs_customize_options", "cust_csf_settings" );