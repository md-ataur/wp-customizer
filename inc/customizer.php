<?php
function cust_customizer_settings($wp_customizer){

	/*
	* Landing page controls
	*/
	$wp_customizer->add_section('cust_services',array(
		'title'		=> __('Services','customizer'),
		'priority'	=> '30',
		'active_callback' => function(){
			return is_page_template( "page-templates/landing.php" );
		}
	));

	// Heading
	$wp_customizer->add_setting('cust_services_heading',array(
		'default'	=> __('Mission Statement','customizer'),
		'transport'	=> 'postMessage'
	));

	$wp_customizer->add_control('cust_services_heading_ctrl',array(
		'label'		=> __('Services Heading','customizer'),
		'section'	=> 'cust_services',
		'settings'	=> 'cust_services_heading',
		'type'		=> 'text'
	));

	// Description 
	$wp_customizer->add_setting('cust_services_subheading',array(
		'default'	=> __('Mission Description','customizer'),
		'transport'	=> 'refresh'
	));

	$wp_customizer->add_control('cust_services_subheading_ctrl',array(
		'label'		=> __('Services Description','customizer'),
		'section'	=> 'cust_services',
		'settings'	=> 'cust_services_subheading',
		'type'		=> 'textarea',
		'active_callback'=> function(){
			if (get_theme_mod('cust_services_display_subheading') == 1) {
				return true;
			}
			return false;
		}
	));

	// Heading display or not
	$wp_customizer->add_setting('cust_services_display_subheading',array(
		'default'	=> 1,
		'transport'	=> 'refresh'
	));

	$wp_customizer->add_control('cust_services_display_subheading_ctrl',array(
		'label'		=> __('Display Subheading','customizer'),
		'section'	=> 'cust_services',
		'settings'	=> 'cust_services_display_subheading',
		'type'		=> 'checkbox'
	));

	// Color picker
	$wp_customizer->add_setting('cust_services_icon_color',array(
		'default'	=> '#dd2d6a',
		'transport' => 'postMessage'
	));

	$wp_customizer->add_control(new WP_Customize_Color_Control($wp_customizer,'cust_icon_color_ctrl',array(
		'label'		=> __('Icon Color','customizer'),
		'section'	=> 'cust_services',
		'settings'	=> 'cust_services_icon_color',
		
	)));

	// Grid column
	$wp_customizer->add_setting('cust_services_column',array(
		'default'	=> 'col-md-4',
		'transport'	=> 'refresh'
	));

	$wp_customizer->add_control('cust_services_column_ctrl',array(
		'label'		=> __('Number of Items','customizer'),
		'section'	=> 'cust_services',
		'settings'	=> 'cust_services_column',
		'type'		=> 'select',
		'choices'	=> array(
			'col-md-4'	=> '3 Column',
			'col-md-6'	=> '2 Column'
		)
	));


	/*
	* About Page Controls
	*/
	$wp_customizer->add_section('cust_about',array(
		'title'		=> __('About Pages','customizer'),
		'priority'	=> '40',
		'active_callback' => function(){
			return is_page_template( "page-templates/about.php" );
		}
	));

	// Heading 
	$wp_customizer->add_setting('cust_about_heading',array(		
		'transport'	=> 'refresh'
	));

	$wp_customizer->add_control('cust_about_heading_ctrl',array(
		'label'		=> __('Heading','customizer'),
		'section'	=> 'cust_about',
		'settings'	=> 'cust_about_heading',
		'type'		=> 'text',	
		
	));

	// Heading edit option
	$wp_customizer->add_setting('cust_about_heading_edit',array(		
		'transport'	=> 'postMessage'
	));

	$wp_customizer->add_control('cust_about_heading_edit_ctrl',array(
		'label'		=> __('Heading Edit','customizer'),
		'section'	=> 'cust_about',
		'settings'	=> 'cust_about_heading_edit',
		'type'		=> 'text',	
		
	));

	$wp_customizer->selective_refresh->add_partial('about_section_heading',array(
		'selector' 	=> '.heading2',
		'settings'	=> 'cust_about_heading_edit',
		'render_callback' => function(){
			return get_theme_mod('cust_about_heading_edit');
		}
	));

	// Description edit option
	$wp_customizer->add_setting('cust_about_description_edit',array(		
		'transport'	=> 'postMessage'
	));

	$wp_customizer->add_control('cust_about_description_edit_ctrl',array(
		'label'		=> __('Description','customizer'),
		'section'	=> 'cust_about',
		'settings'	=> 'cust_about_description_edit',
		'type'		=> 'textarea',	
		
	));

	$wp_customizer->selective_refresh->add_partial('about_section_description',array(
		'selector' 	=> '.subheading2',
		'settings'	=> 'cust_about_description_edit',
		'render_callback' => function(){
			return apply_filters('the_content', get_theme_mod('cust_about_description_edit') );
		}
	));


	/*
	* Image upload
	*/
	$wp_customizer->add_section('cust_image_upload',array(
		'title'		=> __('Image Upload','customizer'),
		'priority'	=> '40',		
	));
	
	$wp_customizer->add_setting('cust_test_image',array(
		'default'	=> __('Upload image','customizer'),
		'transport'	=> 'refresh'
	));

	$wp_customizer->add_control(new WP_Customize_Image_Control($wp_customizer,'test_logo',array(
		'label'		=> __('Image Uploaod','customizer'),
		'section'	=> 'cust_image_upload',
		'settings'	=> 'cust_test_image',
		
	)));

	$wp_customizer->selective_refresh->add_partial('image_upload_section',array(
		'selector' 	=> '.image_upload',
		'settings'	=> 'cust_test_image',
		'render_callback' => function(){
			return get_theme_mod('cust_test_image');
		}
	));


	/*
	* Other Controls
	*/
	$wp_customizer->add_section('cust_others',array(
		'title'		=> __('Other Controls','customizer'),
		'priority'	=> '40'
	));

	// radio
	$wp_customizer->add_setting('cust_others_demo_radio',array(
		'default'	=> 'choice2',
		'transport'	=> 'refresh'
	));

	$wp_customizer->add_control('cust_others_demo_radio_ctrl',array(
		'label'		=> __('Radio Button','customizer'),
		'section'	=> 'cust_others',
		'settings'	=> 'cust_others_demo_radio',
		'type'		=> 'radio',
		'choices'	=> array(
			'choice1'	=> __('Choice One','customizer'),
			'choice2'	=> __('Choice Two','customizer'),
			'choice3'	=> __('Choice Three','customizer'),
			'choice4'	=> __('Choice Four','customizer'),
			'choice5'	=> __('Choice Five','customizer'),
		)
	));

	// dropdown select
	$wp_customizer->add_setting('cust_others_demo_select',array(
		'default'	=> 'choice1',
		'transport'	=> 'refresh'
	));

	$wp_customizer->add_control('cust_others_demo_select_ctrl',array(
		'label'		=> __('Select Option','customizer'),
		'section'	=> 'cust_others',
		'settings'	=> 'cust_others_demo_select',
		'type'		=> 'select',
		'choices'	=> array(
			'choice1'	=> __('Choice One','customizer'),
			'choice2'	=> __('Choice Two','customizer'),
			'choice3'	=> __('Choice Three','customizer'),
			'choice4'	=> __('Choice Four','customizer'),
			'choice5'	=> __('Choice Five','customizer'),
		)
	));

	// select pages
	$wp_customizer->add_setting('cust_others_demo_pages',array(		
		'transport'	=> 'refresh'
	));

	$wp_customizer->add_control('cust_others_demo_pages_ctrl',array(
		'label'		=> __('Select Page','customizer'),
		'section'	=> 'cust_others',
		'settings'	=> 'cust_others_demo_pages',
		'type'		=> 'dropdown-pages',
		'allow_addition'=> true
		
	));

	// html5 number
	$wp_customizer->add_setting('cust_others_html5_number',array(
		'default'=>'10',
		'transport'=>'refresh', //postMessage
	));
	$wp_customizer->add_control('cust_others_html5_number_ctrl',array(
		'label'=>__('Number Field','customizer'),
		'section'=>'cust_others',
		'settings'=>'cust_others_html5_number',
		'type'=>'number',
		'input_attrs'=>array(
			'min'=>10,
			'max'=>20,
			'step'=>2
		)
	));

	// html5 range
	$wp_customizer->add_setting('cust_others_html5_range',array(
		'default'=>'10',
		'transport'=>'refresh', //postMessage
	));
	$wp_customizer->add_control('cust_others_html5_range_ctrl',array(
		'label'=>__('Range Field','customizer'),
		'section'=>'cust_others',
		'settings'=>'cust_others_html5_range',
		'type'=>'range',
		'input_attrs'=>array(
			'min'=>10,
			'max'=>20,
			'step'=>2
		)
	));

	// html5 date
	$wp_customizer->add_setting('cust_others_html5_date',array(
		'transport'=>'refresh', //postMessage
	));
	$wp_customizer->add_control('cust_others_html5_date_ctrl',array(
		'label'=>__('Date Field','customizer'),
		'section'=>'cust_others',
		'settings'=>'cust_others_html5_date',
		'type'=>'date',
		'input_attrs'=>array(
			'min'=>10,
			'max'=>20,
			'step'=>2
		)
	));

	// html5 week
	$wp_customizer->add_setting('cust_others_html5_week',array(
		'transport'=>'refresh', //postMessage
	));
	$wp_customizer->add_control('cust_others_html5_week_ctrl',array(
		'label'=>__('Week Field','customizer'),
		'section'=>'cust_others',
		'settings'=>'cust_others_html5_week',
		'type'=>'week',
		'input_attrs'=>array(
			'min'=>10,
			'max'=>20,
			'step'=>2
		)
	));

}
add_action( "customize_register", "cust_customizer_settings" );
