<?php
/**
 * Digital Agency Lite Theme Customizer
 *
 * @package Digital Agency Lite
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */

function digital_agency_lite_custom_controls() {
	load_template( trailingslashit( get_template_directory() ) . '/inc/custom-controls.php' );
}
add_action( 'customize_register', 'digital_agency_lite_custom_controls' );

function digital_agency_lite_customize_register( $wp_customize ) {

	load_template( trailingslashit( get_template_directory() ) . '/inc/icon-picker.php' );

	$wp_customize->get_setting( 'blogname' )->transport = 'postMessage'; 
	$wp_customize->get_setting( 'blogdescription' )->transport = 'postMessage';

	//Selective Refresh
	$wp_customize->selective_refresh->add_partial( 'blogname', array( 
		'selector' => '.logo .site-title a', 
	 	'render_callback' => 'digital_agency_lite_customize_partial_blogname', 
	)); 

	$wp_customize->selective_refresh->add_partial( 'blogdescription', array( 
		'selector' => 'p.site-description', 
		'render_callback' => 'digital_agency_lite_customize_partial_blogdescription', 
	));

	//Homepage Settings
	$wp_customize->add_panel( 'digital_agency_lite_homepage_panel', array(
		'title' => esc_html__( 'Homepage Settings', 'digital-agency-lite' ),
		'panel' => 'digital_agency_lite_panel_id',
		'priority' => 20,
	));

	//Slider
	$wp_customize->add_section( 'digital_agency_lite_slidersettings' , array(
    	'title'      => __( 'Slider Settings', 'digital-agency-lite' ),
    	'description' => __('Free theme has 3 slides options, For unlimited slides and more options </br> <a class="go-pro-btn" target="blank" href="https://www.vwthemes.com/themes/digital-marketing-wordpress-theme/">GO PRO</a>','digital-agency-lite'),
		'panel' => 'digital_agency_lite_homepage_panel'
	) );

	$wp_customize->add_setting( 'digital_agency_lite_slider_arrows',array(
    	'default' => 0,
      	'transport' => 'refresh',
      	'sanitize_callback' => 'digital_agency_lite_switch_sanitization'
    ));  
    $wp_customize->add_control( new Digital_Agency_Lite_Toggle_Switch_Custom_Control( $wp_customize, 'digital_agency_lite_slider_arrows',array(
      	'label' => esc_html__( 'Show / Hide Slider','digital-agency-lite' ),
      	'section' => 'digital_agency_lite_slidersettings'
    )));

    $wp_customize->add_setting('digital_agency_lite_slider_type',array(
        'default' => 'Default slider',
        'sanitize_callback' => 'digital_agency_lite_sanitize_choices'
	) );
	$wp_customize->add_control('digital_agency_lite_slider_type', array(
        'type' => 'select',
        'label' => __('Slider Type','digital-agency-lite'),
        'section' => 'digital_agency_lite_slidersettings',
        'choices' => array(
            'Default slider' => __('Default slider','digital-agency-lite'),
            'Advance slider' => __('Advance slider','digital-agency-lite'),
        ),
	));

	$wp_customize->add_setting('digital_agency_lite_advance_slider_shortcode',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('digital_agency_lite_advance_slider_shortcode',array(
		'label'	=> __('Add Slider Shortcode','digital-agency-lite'),
		'section'=> 'digital_agency_lite_slidersettings',
		'type'=> 'text',
		'active_callback' => 'digital_agency_lite_advance_slider'
	));

    //Selective Refresh
    $wp_customize->selective_refresh->add_partial('digital_agency_lite_slider_arrows',array(
		'selector'        => '#slider .carousel-caption h1',
		'render_callback' => 'digital_agency_lite_customize_partial_digital_agency_lite_slider_arrows',
	));

	for ( $count = 1; $count <= 3; $count++ ) {
		$wp_customize->add_setting( 'digital_agency_lite_slider_page' . $count, array(
			'default'           => '',
			'sanitize_callback' => 'digital_agency_lite_sanitize_dropdown_pages'
		) );
		$wp_customize->add_control( 'digital_agency_lite_slider_page' . $count, array(
			'label'    => __( 'Select Slider Page', 'digital-agency-lite' ),
			'description' => __('Slider image size (435 x 435)','digital-agency-lite'),
			'section'  => 'digital_agency_lite_slidersettings',
			'type'     => 'dropdown-pages',
			'active_callback' => 'digital_agency_lite_default_slider'
		) );
	}

	$wp_customize->add_setting('digital_agency_lite_slider_button_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('digital_agency_lite_slider_button_text',array(
		'label'	=> __('Add Slider Button Text','digital-agency-lite'),
		'input_attrs' => array(
            'placeholder' => __( 'READ MORE', 'digital-agency-lite' ),
        ),
		'section'=> 'digital_agency_lite_slidersettings',
		'type'=> 'text',
		'active_callback' => 'digital_agency_lite_default_slider'
	));

	$wp_customize->add_setting( 'digital_agency_lite_slider_content_hide_show',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'digital_agency_lite_switch_sanitization'
    ));  
    $wp_customize->add_control( new Digital_Agency_Lite_Toggle_Switch_Custom_Control( $wp_customize, 'digital_agency_lite_slider_content_hide_show',array(
		'label' => esc_html__( 'Show / Hide Slider Content','digital-agency-lite' ),
		'section' => 'digital_agency_lite_slidersettings',
		'active_callback' => 'digital_agency_lite_default_slider'
    )));

	//content layout
	$wp_customize->add_setting('digital_agency_lite_slider_content_option',array(
        'default' => 'Left',
        'sanitize_callback' => 'digital_agency_lite_sanitize_choices'
	));
	$wp_customize->add_control(new Digital_Agency_Lite_Image_Radio_Control($wp_customize, 'digital_agency_lite_slider_content_option', array(
        'type' => 'select',
        'label' => __('Slider Content Layouts','digital-agency-lite'),
        'section' => 'digital_agency_lite_slidersettings',
        'choices' => array(
            'Left' => esc_url(get_template_directory_uri()).'/assets/images/slider-content1.png',
            'Center' => esc_url(get_template_directory_uri()).'/assets/images/slider-content2.png',
            'Right' => esc_url(get_template_directory_uri()).'/assets/images/slider-content3.png',
    ),
    	'active_callback' => 'digital_agency_lite_default_slider'
	)));

    //Slider excerpt
	$wp_customize->add_setting( 'digital_agency_lite_slider_excerpt_number', array(
		'default'              => 20,
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'digital_agency_lite_sanitize_number_range'
	) );
	$wp_customize->add_control( 'digital_agency_lite_slider_excerpt_number', array(
		'label'       => esc_html__( 'Slider Excerpt length','digital-agency-lite' ),
		'section'     => 'digital_agency_lite_slidersettings',
		'type'        => 'range',
		'settings'    => 'digital_agency_lite_slider_excerpt_number',
		'input_attrs' => array(
			'step'             => 5,
			'min'              => 0,
			'max'              => 50,
		),'active_callback' => 'digital_agency_lite_default_slider'
	) );

	$wp_customize->add_setting( 'digital_agency_lite_slider_speed', array(
		'default'  => 4000,
		'sanitize_callback'	=> 'digital_agency_lite_sanitize_float'
	) );
	$wp_customize->add_control( 'digital_agency_lite_slider_speed', array(
		'label' => esc_html__('Slider Transition Speed','digital-agency-lite'),
		'section' => 'digital_agency_lite_slidersettings',
		'type'  => 'number',
		'active_callback' => 'digital_agency_lite_default_slider'
	) );
 
	//Services
	$wp_customize->add_section('digital_agency_lite_services',array(
		'title'	=> __('Services Section','digital-agency-lite'),
		'description' => __('For more options of the services section <a class="go-pro-btn" target="blank" href="https://www.vwthemes.com/themes/digital-marketing-wordpress-theme/">GO PRO</a>','digital-agency-lite'),
		'panel' => 'digital_agency_lite_homepage_panel',
	));

	//Selective Refresh
	$wp_customize->selective_refresh->add_partial( 'digital_agency_lite_section_title', array( 
		'selector' => '.heading-text h2', 
		'render_callback' => 'digital_agency_lite_customize_partial_digital_agency_lite_section_title',
	));

	$wp_customize->add_setting('digital_agency_lite_section_title',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('digital_agency_lite_section_title',array(
		'label'	=> __('Section Title','digital-agency-lite'),
		'input_attrs' => array(
            'placeholder' => __( 'OUR SERVICES', 'digital-agency-lite' ),
        ),
		'section'=> 'digital_agency_lite_services',
		'type'=> 'text'
	));

	$wp_customize->add_setting('digital_agency_lite_section_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('digital_agency_lite_section_text',array(
		'label'	=> __('Section Text','digital-agency-lite'),
		'input_attrs' => array(
            'placeholder' => __( 'Lorem Ipsum is simply dummy text of the printing and typesetting industry', 'digital-agency-lite' ),
        ),
		'section'=> 'digital_agency_lite_services',
		'type'=> 'text'
	));	

	$categories = get_categories();
		$cat_posts = array();
			$i = 0;
			$cat_posts[]='Select';	
		foreach($categories as $category){
			if($i==0){
			$default = $category->slug;
			$i++;
		}
		$cat_posts[$category->slug] = $category->name;
	}

	$wp_customize->add_setting('digital_agency_lite_services_category',array(
		'default'	=> 'select',
		'sanitize_callback' => 'digital_agency_lite_sanitize_choices',
	));
	$wp_customize->add_control('digital_agency_lite_services_category',array(
		'type'    => 'select',
		'choices' => $cat_posts,
		'label' => __('Select Category to display Latest Post','digital-agency-lite'),
		'section' => 'digital_agency_lite_services',
	));

	//Services excerpt
	$wp_customize->add_setting( 'digital_agency_lite_services_excerpt_number', array(
		'default'              => 20,
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'digital_agency_lite_sanitize_number_range'
	) );
	$wp_customize->add_control( 'digital_agency_lite_services_excerpt_number', array(
		'label'       => esc_html__( 'Services Excerpt length','digital-agency-lite' ),
		'section'     => 'digital_agency_lite_services',
		'type'        => 'range',
		'settings'    => 'digital_agency_lite_services_excerpt_number',
		'input_attrs' => array(
			'step'             => 5,
			'min'              => 0,
			'max'              => 50,
		),
	) );

	//About Us Section
	$wp_customize->add_section('digital_agency_lite_about', array(
		'title'       => __('About Us Section', 'digital-agency-lite'),
		'description' => __('<p class="premium-opt">Premium Theme Features</p>','digital-agency-lite'),
		'priority'    => null,
		'panel'       => 'digital_agency_lite_homepage_panel',
	));

	$wp_customize->add_setting('digital_agency_lite_about_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('digital_agency_lite_about_text',array(
		'description' => __('<p>1. More options for about section.</p>
			<p>2. Unlimited images options.</p>
			<p>3. Color options for about section.</p>','digital-agency-lite'),
		'section'=> 'digital_agency_lite_about',
		'type'=> 'hidden'
	));

	$wp_customize->add_setting('digital_agency_lite_about_btn',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('digital_agency_lite_about_btn',array(
		'description' => "<a class='go-pro' target='_blank' href='". admin_url('themes.php?page=digital_agency_lite_guide') ." '>More Info</a>",
		'section'=> 'digital_agency_lite_about',
		'type'=> 'hidden'
	));

	// Pricing Plan Section
	$wp_customize->add_section('digital_agency_lite_pricing_plan', array(
		'title'       => __('Pricing Plan Section', 'digital-agency-lite'),
		'description' => __('<p class="premium-opt">Premium Theme Features</p>','digital-agency-lite'),
		'priority'    => null,
		'panel'       => 'digital_agency_lite_homepage_panel',
	));

	$wp_customize->add_setting('digital_agency_lite_pricing_plan_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('digital_agency_lite_pricing_plan_text',array(
		'description' => __('<p>1. More options for Pricing Plan section.</p>
			<p>2. Unlimited images options.</p>
			<p>3. Color options for Pricing Plan section.</p>','digital-agency-lite'),
		'section'=> 'digital_agency_lite_pricing_plan',
		'type'=> 'hidden'
	));

	$wp_customize->add_setting('digital_agency_lite_pricing_plan_btn',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('digital_agency_lite_pricing_plan_btn',array(
		'description' => "<a class='go-pro' target='_blank' href='". admin_url('themes.php?page=digital_agency_lite_guide') ." '>More Info</a>",
		'section'=> 'digital_agency_lite_pricing_plan',
		'type'=> 'hidden'
	));

	// Testimonial Section
	$wp_customize->add_section('digital_agency_lite_testimonial', array(
		'title'       => __('Testimonial Section', 'digital-agency-lite'),
		'description' => __('<p class="premium-opt">Premium Theme Features</p>','digital-agency-lite'),
		'priority'    => null,
		'panel'       => 'digital_agency_lite_homepage_panel',
	));

	$wp_customize->add_setting('digital_agency_lite_testimonial_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('digital_agency_lite_testimonial_text',array(
		'description' => __('<p>1. More options for Testimonial section.</p>
			<p>2. Unlimited images options.</p>
			<p>3. Color options for Testimonial section.</p>','digital-agency-lite'),
		'section'=> 'digital_agency_lite_testimonial',
		'type'=> 'hidden'
	));

	$wp_customize->add_setting('digital_agency_lite_testimonial_btn',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('digital_agency_lite_testimonial_btn',array(
		'description' => "<a class='go-pro' target='_blank' href='". admin_url('themes.php?page=digital_agency_lite_guide') ." '>More Info</a>",
		'section'=> 'digital_agency_lite_testimonial',
		'type'=> 'hidden'
	));

	// Project Partners Section
	$wp_customize->add_section('digital_agency_lite_project_partners', array(
		'title'       => __('Project Partners Section', 'digital-agency-lite'),
		'description' => __('<p class="premium-opt">Premium Theme Features</p>','digital-agency-lite'),
		'priority'    => null,
		'panel'       => 'digital_agency_lite_homepage_panel',
	));

	$wp_customize->add_setting('digital_agency_lite_project_partners_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('digital_agency_lite_project_partners_text',array(
		'description' => __('<p>1. More options for Project Partners section.</p>
			<p>2. Unlimited images options.</p>
			<p>3. Color options for Project Partners section.</p>','digital-agency-lite'),
		'section'=> 'digital_agency_lite_project_partners',
		'type'=> 'hidden'
	));

	$wp_customize->add_setting('digital_agency_lite_project_partners_btn',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('digital_agency_lite_project_partners_btn',array(
		'description' => "<a class='go-pro' target='_blank' href='". admin_url('themes.php?page=digital_agency_lite_guide') ." '>More Info</a>",
		'section'=> 'digital_agency_lite_project_partners',
		'type'=> 'hidden'
	));

	// Our Team Section
	$wp_customize->add_section('digital_agency_lite_team', array(
		'title'       => __('Our Team Section', 'digital-agency-lite'),
		'description' => __('<p class="premium-opt">Premium Theme Features</p>','digital-agency-lite'),
		'priority'    => null,
		'panel'       => 'digital_agency_lite_homepage_panel',
	));

	$wp_customize->add_setting('digital_agency_lite_team_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('digital_agency_lite_team_text',array(
		'description' => __('<p>1. More options for Our Team section.</p>
			<p>2. Unlimited images options.</p>
			<p>3. Color options for Our Team section.</p>','digital-agency-lite'),
		'section'=> 'digital_agency_lite_team',
		'type'=> 'hidden'
	));

	$wp_customize->add_setting('digital_agency_lite_team_btn',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('digital_agency_lite_team_btn',array(
		'description' => "<a class='go-pro' target='_blank' href='". admin_url('themes.php?page=digital_agency_lite_guide') ." '>More Info</a>",
		'section'=> 'digital_agency_lite_team',
		'type'=> 'hidden'
	));

	// How We Work Section
	$wp_customize->add_section('digital_agency_lite_how_we_work', array(
		'title'       => __('How We Work Section', 'digital-agency-lite'),
		'description' => __('<p class="premium-opt">Premium Theme Features</p>','digital-agency-lite'),
		'priority'    => null,
		'panel'       => 'digital_agency_lite_homepage_panel',
	));

	$wp_customize->add_setting('digital_agency_lite_how_we_work_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('digital_agency_lite_how_we_work_text',array(
		'description' => __('<p>1. More options for How We Work section.</p>
			<p>2. Unlimited images options.</p>
			<p>3. Color options for How We Work section.</p>','digital-agency-lite'),
		'section'=> 'digital_agency_lite_how_we_work',
		'type'=> 'hidden'
	));

	$wp_customize->add_setting('digital_agency_lite_how_we_work_btn',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('digital_agency_lite_how_we_work_btn',array(
		'description' => "<a class='go-pro' target='_blank' href='". admin_url('themes.php?page=digital_agency_lite_guide') ." '>More Info</a>",
		'section'=> 'digital_agency_lite_how_we_work',
		'type'=> 'hidden'
	));

	// Our Faqs Section
	$wp_customize->add_section('digital_agency_lite_faqs', array(
		'title'       => __('Our Faqs Section', 'digital-agency-lite'),
		'description' => __('<p class="premium-opt">Premium Theme Features</p>','digital-agency-lite'),
		'priority'    => null,
		'panel'       => 'digital_agency_lite_homepage_panel',
	));

	$wp_customize->add_setting('digital_agency_lite_faqs_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('digital_agency_lite_faqs_text',array(
		'description' => __('<p>1. More options for Our Faqs section.</p>
			<p>2. Unlimited images options.</p>
			<p>3. Color options for Our Faqs section.</p>','digital-agency-lite'),
		'section'=> 'digital_agency_lite_faqs',
		'type'=> 'hidden'
	));

	$wp_customize->add_setting('digital_agency_lite_faqs_btn',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('digital_agency_lite_faqs_btn',array(
		'description' => "<a class='go-pro' target='_blank' href='". admin_url('themes.php?page=digital_agency_lite_guide') ." '>More Info</a>",
		'section'=> 'digital_agency_lite_faqs',
		'type'=> 'hidden'
	));

	// Our Skills Section
	$wp_customize->add_section('digital_agency_lite_our_skills', array(
		'title'       => __('Our Skills Section', 'digital-agency-lite'),
		'description' => __('<p class="premium-opt">Premium Theme Features</p>','digital-agency-lite'),
		'priority'    => null,
		'panel'       => 'digital_agency_lite_homepage_panel',
	));

	$wp_customize->add_setting('digital_agency_lite_our_skills_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('digital_agency_lite_our_skills_text',array(
		'description' => __('<p>1. More options for Our Skills section.</p>
			<p>2. Unlimited images options.</p>
			<p>3. Color options for Our Skills section.</p>','digital-agency-lite'),
		'section'=> 'digital_agency_lite_our_skills',
		'type'=> 'hidden'
	));

	$wp_customize->add_setting('digital_agency_lite_our_skills_btn',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('digital_agency_lite_our_skills_btn',array(
		'description' => "<a class='go-pro' target='_blank' href='". admin_url('themes.php?page=digital_agency_lite_guide') ." '>More Info</a>",
		'section'=> 'digital_agency_lite_our_skills',
		'type'=> 'hidden'
	));

	// Our Blogs Section
	$wp_customize->add_section('digital_agency_lite_our_blog', array(
		'title'       => __('Our Blogs Section', 'digital-agency-lite'),
		'description' => __('<p class="premium-opt">Premium Theme Features</p>','digital-agency-lite'),
		'priority'    => null,
		'panel'       => 'digital_agency_lite_homepage_panel',
	));

	$wp_customize->add_setting('digital_agency_lite_our_blog_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('digital_agency_lite_our_blog_text',array(
		'description' => __('<p>1. More options for Our Blogs section.</p>
			<p>2. Unlimited images options.</p>
			<p>3. Color options for Our Blogs section.</p>','digital-agency-lite'),
		'section'=> 'digital_agency_lite_our_blog',
		'type'=> 'hidden'
	));

	$wp_customize->add_setting('digital_agency_lite_our_blog_btn',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('digital_agency_lite_our_blog_btn',array(
		'description' => "<a class='go-pro' target='_blank' href='". admin_url('themes.php?page=digital_agency_lite_guide') ." '>More Info</a>",
		'section'=> 'digital_agency_lite_our_blog',
		'type'=> 'hidden'
	));

	// Why Choose Us Section
	$wp_customize->add_section('digital_agency_lite_why_choose_us', array(
		'title'       => __('Why Choose Us Section', 'digital-agency-lite'),
		'description' => __('<p class="premium-opt">Premium Theme Features</p>','digital-agency-lite'),
		'priority'    => null,
		'panel'       => 'digital_agency_lite_homepage_panel',
	));

	$wp_customize->add_setting('digital_agency_lite_why_choose_us_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('digital_agency_lite_why_choose_us_text',array(
		'description' => __('<p>1. More options for Why Choose Us section.</p>
			<p>2. Unlimited images options.</p>
			<p>3. Color options for Why Choose Us section.</p>','digital-agency-lite'),
		'section'=> 'digital_agency_lite_why_choose_us',
		'type'=> 'hidden'
	));

	$wp_customize->add_setting('digital_agency_lite_why_choose_us_btn',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('digital_agency_lite_why_choose_us_btn',array(
		'description' => "<a class='go-pro' target='_blank' href='". admin_url('themes.php?page=digital_agency_lite_guide') ." '>More Info</a>",
		'section'=> 'digital_agency_lite_why_choose_us',
		'type'=> 'hidden'
	));

	//Footer Text
	$wp_customize->add_section('digital_agency_lite_footer',array(
		'title'	=> __('Footer Settings','digital-agency-lite'),
		'description' => __('For more options of the footer section <a class="go-pro-btn" target="blank" href="https://www.vwthemes.com/themes/digital-marketing-wordpress-theme/">GO PRO</a>','digital-agency-lite'),
		'panel' => 'digital_agency_lite_homepage_panel',
	));	

	$wp_customize->add_setting('digital_agency_lite_footer_background_color', array(
		'default'           => '#111111',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'digital_agency_lite_footer_background_color', array(
		'label'    => __('Footer Background Color', 'digital-agency-lite'),
		'section'  => 'digital_agency_lite_footer',
	)));

	// footer padding
	$wp_customize->add_setting('digital_agency_lite_footer_padding',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('digital_agency_lite_footer_padding',array(
		'label'	=> __('Footer Top Bottom Padding','digital-agency-lite'),
		'description'	=> __('Enter a value in pixels. Example:20px','digital-agency-lite'),
		'input_attrs' => array(
      'placeholder' => __( '10px', 'digital-agency-lite' ),
    ),
		'section'=> 'digital_agency_lite_footer',
		'type'=> 'text'
	));

	$wp_customize->add_setting('digital_agency_lite_footer_widgets_heading',array(
        'default' => 'Left',
        'transport' => 'refresh',
        'sanitize_callback' => 'digital_agency_lite_sanitize_choices'
	));
	$wp_customize->add_control('digital_agency_lite_footer_widgets_heading',array(
        'type' => 'select',
        'label' => __('Footer Widget Heading','digital-agency-lite'),
        'section' => 'digital_agency_lite_footer',
        'choices' => array(
        	'Left' => __('Left','digital-agency-lite'),
            'Center' => __('Center','digital-agency-lite'),
            'Right' => __('Right','digital-agency-lite')
        ),
	) );

	$wp_customize->add_setting('digital_agency_lite_footer_widgets_content',array(
        'default' => 'Left',
        'transport' => 'refresh',
        'sanitize_callback' => 'digital_agency_lite_sanitize_choices'
	));
	$wp_customize->add_control('digital_agency_lite_footer_widgets_content',array(
        'type' => 'select',
        'label' => __('Footer Widget Content','digital-agency-lite'),
        'section' => 'digital_agency_lite_footer',
        'choices' => array(
        	'Left' => __('Left','digital-agency-lite'),
            'Center' => __('Center','digital-agency-lite'),
            'Right' => __('Right','digital-agency-lite')
        ),
	) );

	//Selective Refresh
	$wp_customize->selective_refresh->add_partial('digital_agency_lite_footer_text', array( 
		'selector' => '.copyright p', 
		'render_callback' => 'digital_agency_lite_customize_partial_digital_agency_lite_footer_text', 
	));
	
	$wp_customize->add_setting('digital_agency_lite_footer_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('digital_agency_lite_footer_text',array(
		'label'	=> __('Copyright Text','digital-agency-lite'),
		'input_attrs' => array(
            'placeholder' => __( 'Copyright 2019, .....', 'digital-agency-lite' ),
        ),
		'section'=> 'digital_agency_lite_footer',
		'type'=> 'text'
	));

	$wp_customize->add_setting('digital_agency_lite_copyright_font_size',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('digital_agency_lite_copyright_font_size',array(
		'label'	=> __('Copyright Font Size','digital-agency-lite'),
		'description'	=> __('Enter a value in pixels. Example:20px','digital-agency-lite'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'digital-agency-lite' ),
        ),
		'section'=> 'digital_agency_lite_footer',
		'type'=> 'text'
	));

	$wp_customize->add_setting('digital_agency_lite_copyright_alingment',array(
        'default' => 'center',
        'sanitize_callback' => 'digital_agency_lite_sanitize_choices'
	));
	$wp_customize->add_control(new Digital_Agency_Lite_Image_Radio_Control($wp_customize, 'digital_agency_lite_copyright_alingment', array(
        'type' => 'select',
        'label' => __('Copyright Alignment','digital-agency-lite'),
        'section' => 'digital_agency_lite_footer',
        'settings' => 'digital_agency_lite_copyright_alingment',
        'choices' => array(
            'left' => esc_url(get_template_directory_uri()).'/assets/images/copyright1.png',
            'center' => esc_url(get_template_directory_uri()).'/assets/images/copyright2.png',
            'right' => esc_url(get_template_directory_uri()).'/assets/images/copyright3.png'
    ))));

    $wp_customize->add_setting('digital_agency_lite_copyright_padding_top_bottom',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('digital_agency_lite_copyright_padding_top_bottom',array(
		'label'	=> __('Copyright Padding Top Bottom','digital-agency-lite'),
		'description'	=> __('Enter a value in pixels. Example:20px','digital-agency-lite'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'digital-agency-lite' ),
        ),
		'section'=> 'digital_agency_lite_footer',
		'type'=> 'text'
	));

	 // footer social icon
  	$wp_customize->add_setting( 'digital_agency_lite_footer_icon',array(
		'default' => false,
		'transport' => 'refresh',
		'sanitize_callback' => 'digital_agency_lite_switch_sanitization'
    ) );
  	$wp_customize->add_control( new Digital_Agency_Lite_Toggle_Switch_Custom_Control( $wp_customize, 'digital_agency_lite_footer_icon',array(
		'label' => esc_html__( 'Footer Social Icon','digital-agency-lite' ),
		'section' => 'digital_agency_lite_footer'
    ))); 

	$wp_customize->add_setting( 'digital_agency_lite_footer_scroll',array(
    	'default' => 1,
      	'transport' => 'refresh',
      	'sanitize_callback' => 'digital_agency_lite_switch_sanitization'
    ));  
    $wp_customize->add_control( new Digital_Agency_Lite_Toggle_Switch_Custom_Control( $wp_customize, 'digital_agency_lite_footer_scroll',array(
      	'label' => esc_html__( 'Show / Hide Scroll to Top','digital-agency-lite' ),
      	'section' => 'digital_agency_lite_footer'
    )));

    //Selective Refresh
	$wp_customize->selective_refresh->add_partial('digital_agency_lite_scroll_to_top_icon', array( 
		'selector' => '.scrollup i', 
		'render_callback' => 'digital_agency_lite_customize_partial_digital_agency_lite_scroll_to_top_icon', 
	));

    $wp_customize->add_setting('digital_agency_lite_scroll_to_top_icon',array(
		'default'	=> 'fas fa-long-arrow-alt-up',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new Digital_Agency_Lite_Fontawesome_Icon_Chooser(
        $wp_customize,'digital_agency_lite_scroll_to_top_icon',array(
		'label'	=> __('Add Scroll to Top Icon','digital-agency-lite'),
		'transport' => 'refresh',
		'section'	=> 'digital_agency_lite_footer',
		'setting'	=> 'digital_agency_lite_scroll_to_top_icon',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting('digital_agency_lite_scroll_to_top_font_size',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('digital_agency_lite_scroll_to_top_font_size',array(
		'label'	=> __('Icon Font Size','digital-agency-lite'),
		'description'	=> __('Enter a value in pixels. Example:20px','digital-agency-lite'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'digital-agency-lite' ),
        ),
		'section'=> 'digital_agency_lite_footer',
		'type'=> 'text'
	));

	$wp_customize->add_setting('digital_agency_lite_scroll_to_top_padding',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('digital_agency_lite_scroll_to_top_padding',array(
		'label'	=> __('Icon Top Bottom Padding','digital-agency-lite'),
		'description'	=> __('Enter a value in pixels. Example:20px','digital-agency-lite'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'digital-agency-lite' ),
        ),
		'section'=> 'digital_agency_lite_footer',
		'type'=> 'text'
	));

	$wp_customize->add_setting('digital_agency_lite_scroll_to_top_width',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('digital_agency_lite_scroll_to_top_width',array(
		'label'	=> __('Icon Width','digital-agency-lite'),
		'description'	=> __('Enter a value in pixels Example:20px','digital-agency-lite'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'digital-agency-lite' ),
        ),
		'section'=> 'digital_agency_lite_footer',
		'type'=> 'text'
	));

	$wp_customize->add_setting('digital_agency_lite_scroll_to_top_height',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('digital_agency_lite_scroll_to_top_height',array(
		'label'	=> __('Icon Height','digital-agency-lite'),
		'description'	=> __('Enter a value in pixels. Example:20px','digital-agency-lite'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'digital-agency-lite' ),
        ),
		'section'=> 'digital_agency_lite_footer',
		'type'=> 'text'
	));

	$wp_customize->add_setting( 'digital_agency_lite_scroll_to_top_border_radius', array(
		'default'              => '',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'digital_agency_lite_sanitize_number_range'
	) );
	$wp_customize->add_control( 'digital_agency_lite_scroll_to_top_border_radius', array(
		'label'       => esc_html__( 'Icon Border Radius','digital-agency-lite' ),
		'section'     => 'digital_agency_lite_footer',
		'type'        => 'range',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 1,
			'max'              => 50,
		),
	) );

    $wp_customize->add_setting('digital_agency_lite_scroll_top_alignment',array(
        'default' => 'Right',
        'sanitize_callback' => 'digital_agency_lite_sanitize_choices'
	));
	$wp_customize->add_control(new Digital_Agency_Lite_Image_Radio_Control($wp_customize, 'digital_agency_lite_scroll_top_alignment', array(
        'type' => 'select',
        'label' => __('Scroll To Top','digital-agency-lite'),
        'section' => 'digital_agency_lite_footer',
        'settings' => 'digital_agency_lite_scroll_top_alignment',
        'choices' => array(
            'Left' => esc_url(get_template_directory_uri()).'/assets/images/layout1.png',
            'Center' => esc_url(get_template_directory_uri()).'/assets/images/layout2.png',
            'Right' => esc_url(get_template_directory_uri()).'/assets/images/layout3.png'
    ))));

	//Blog Post Settings
	$wp_customize->add_panel( 'digital_agency_lite_blog_post_parent_panel', array(
		'title' => esc_html__( 'Blog Post Settings', 'digital-agency-lite' ),
		'panel' => 'digital_agency_lite_panel_id',
		'priority' => 20,
	));

	// Add example section and controls to the middle (second) panel
	$wp_customize->add_section( 'digital_agency_lite_post_settings', array(
		'title' => __( 'Post Settings', 'digital-agency-lite' ),
		'panel' => 'digital_agency_lite_blog_post_parent_panel',
	));

	//Selective Refresh
	$wp_customize->selective_refresh->add_partial('digital_agency_lite_toggle_postdate', array( 
		'selector' => '.post-main-box h2 a', 
		'render_callback' => 'digital_agency_lite_customize_partial_digital_agency_lite_toggle_postdate', 
	));

	$wp_customize->add_setting('digital_agency_lite_toggle_postdate_icon',array(
		'default'	=> 'fas fa-calendar-alt',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new Digital_Agency_Lite_Fontawesome_Icon_Chooser(
        $wp_customize,'digital_agency_lite_toggle_postdate_icon',array(
		'label'	=> __('Add Post Date Icon','digital-agency-lite'),
		'transport' => 'refresh',
		'section'	=> 'digital_agency_lite_post_settings',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting( 'digital_agency_lite_toggle_postdate',array(
        'default' => 1,
        'transport' => 'refresh',
        'sanitize_callback' => 'digital_agency_lite_switch_sanitization'
    ) );
    $wp_customize->add_control( new Digital_Agency_Lite_Toggle_Switch_Custom_Control( $wp_customize, 'digital_agency_lite_toggle_postdate',array(
        'label' => esc_html__( 'Post Date','digital-agency-lite' ),
        'section' => 'digital_agency_lite_post_settings'
    )));

    $wp_customize->add_setting('digital_agency_lite_toggle_author_icon',array(
		'default'	=> 'far fa-user',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new Digital_Agency_Lite_Fontawesome_Icon_Chooser(
        $wp_customize,'digital_agency_lite_toggle_author_icon',array(
		'label'	=> __('Add Author Icon','digital-agency-lite'),
		'transport' => 'refresh',
		'section'	=> 'digital_agency_lite_post_settings',
		'type'		=> 'icon'
	)));

    $wp_customize->add_setting( 'digital_agency_lite_toggle_author',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'digital_agency_lite_switch_sanitization'
    ) );
    $wp_customize->add_control( new Digital_Agency_Lite_Toggle_Switch_Custom_Control( $wp_customize, 'digital_agency_lite_toggle_author',array(
		'label' => esc_html__( 'Author','digital-agency-lite' ),
		'section' => 'digital_agency_lite_post_settings'
    )));

    $wp_customize->add_setting('digital_agency_lite_toggle_comments_icon',array(
		'default'	=> 'fas fa-comments',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new Digital_Agency_Lite_Fontawesome_Icon_Chooser(
        $wp_customize,'digital_agency_lite_toggle_comments_icon',array(
		'label'	=> __('Add Comments Icon','digital-agency-lite'),
		'transport' => 'refresh',
		'section'	=> 'digital_agency_lite_post_settings',
		'type'		=> 'icon'
	)));

    $wp_customize->add_setting( 'digital_agency_lite_toggle_comments',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'digital_agency_lite_switch_sanitization'
    ) );
    $wp_customize->add_control( new Digital_Agency_Lite_Toggle_Switch_Custom_Control( $wp_customize, 'digital_agency_lite_toggle_comments',array(
		'label' => esc_html__( 'Comments','digital-agency-lite' ),
		'section' => 'digital_agency_lite_post_settings'
    )));

    $wp_customize->add_setting('digital_agency_lite_toggle_time_icon',array(
		'default'	=> 'fas fa-clock',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new Digital_Agency_Lite_Fontawesome_Icon_Chooser(
        $wp_customize,'digital_agency_lite_toggle_time_icon',array(
		'label'	=> __('Add Time Icon','digital-agency-lite'),
		'transport' => 'refresh',
		'section'	=> 'digital_agency_lite_post_settings',
		'type'		=> 'icon'
	)));

    $wp_customize->add_setting( 'digital_agency_lite_toggle_time',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'digital_agency_lite_switch_sanitization'
    ) );
    $wp_customize->add_control( new Digital_Agency_Lite_Toggle_Switch_Custom_Control( $wp_customize, 'digital_agency_lite_toggle_time',array(
		'label' => esc_html__( 'Time','digital-agency-lite' ),
		'section' => 'digital_agency_lite_post_settings'
    )));

    $wp_customize->add_setting( 'digital_agency_lite_featured_image_hide_show',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'digital_agency_lite_switch_sanitization'
	));
    $wp_customize->add_control( new Digital_Agency_Lite_Toggle_Switch_Custom_Control( $wp_customize, 'digital_agency_lite_featured_image_hide_show', array(
		'label' => esc_html__( 'Featured Image','digital-agency-lite' ),
		'section' => 'digital_agency_lite_post_settings'
    )));

    $wp_customize->add_setting( 'digital_agency_lite_featured_image_border_radius', array(
		'default'              => '0',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'digital_agency_lite_sanitize_number_range'
	) );
	$wp_customize->add_control( 'digital_agency_lite_featured_image_border_radius', array(
		'label'       => esc_html__( 'Featured Image Border Radius','digital-agency-lite' ),
		'section'     => 'digital_agency_lite_post_settings',
		'type'        => 'range',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 1,
			'max'              => 50,
		),
	) );

	$wp_customize->add_setting( 'digital_agency_lite_featured_image_box_shadow', array(
		'default'              => '0',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'digital_agency_lite_sanitize_number_range'
	) );
	$wp_customize->add_control( 'digital_agency_lite_featured_image_box_shadow', array(
		'label'       => esc_html__( 'Featured Image Box Shadow','digital-agency-lite' ),
		'section'     => 'digital_agency_lite_post_settings',
		'type'        => 'range',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 1,
			'max'              => 50,
		),
	) );

    $wp_customize->add_setting( 'digital_agency_lite_excerpt_number', array(
		'default'              => 30,
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'digital_agency_lite_sanitize_number_range'
	) );
	$wp_customize->add_control( 'digital_agency_lite_excerpt_number', array(
		'label'       => esc_html__( 'Excerpt length','digital-agency-lite' ),
		'section'     => 'digital_agency_lite_post_settings',
		'type'        => 'range',
		'settings'    => 'digital_agency_lite_excerpt_number',
		'input_attrs' => array(
			'step'             => 5,
			'min'              => 0,
			'max'              => 50,
		),
	) );

	$wp_customize->add_setting('digital_agency_lite_meta_field_separator',array(
		'default'=> '|',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('digital_agency_lite_meta_field_separator',array(
		'label'	=> __('Add Meta Separator','digital-agency-lite'),
		'description' => __('Add the seperator for meta box. Example: "|", "/", etc.','digital-agency-lite'),
		'section'=> 'digital_agency_lite_post_settings',
		'type'=> 'text'
	));

	//Blog layout
    $wp_customize->add_setting('digital_agency_lite_blog_layout_option',array(
        'default' => 'Default',
        'sanitize_callback' => 'digital_agency_lite_sanitize_choices'
    ));
    $wp_customize->add_control(new Digital_Agency_Lite_Image_Radio_Control($wp_customize, 'digital_agency_lite_blog_layout_option', array(
        'type' => 'select',
        'label' => __('Blog Layouts','digital-agency-lite'),
        'section' => 'digital_agency_lite_post_settings',
        'choices' => array(
            'Default' => esc_url(get_template_directory_uri()).'/assets/images/blog-layout1.png',
            'Center' => esc_url(get_template_directory_uri()).'/assets/images/blog-layout2.png',
            'Left' => esc_url(get_template_directory_uri()).'/assets/images/blog-layout3.png',
    ))));

    $wp_customize->add_setting('digital_agency_lite_excerpt_settings',array(
        'default' => 'Excerpt',
        'transport' => 'refresh',
        'sanitize_callback' => 'digital_agency_lite_sanitize_choices'
	));
	$wp_customize->add_control('digital_agency_lite_excerpt_settings',array(
        'type' => 'select',
        'label' => __('Post Content','digital-agency-lite'),
        'section' => 'digital_agency_lite_post_settings',
        'choices' => array(
        	'Content' => __('Content','digital-agency-lite'),
            'Excerpt' => __('Excerpt','digital-agency-lite'),
            'No Content' => __('No Content','digital-agency-lite')
        ),
	) );

	$wp_customize->add_setting('digital_agency_lite_excerpt_suffix',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('digital_agency_lite_excerpt_suffix',array(
		'label'	=> __('Add Excerpt Suffix','digital-agency-lite'),
		'input_attrs' => array(
            'placeholder' => __( '[...]', 'digital-agency-lite' ),
        ),
		'section'=> 'digital_agency_lite_post_settings',
		'type'=> 'text'
	));

	$wp_customize->add_setting( 'digital_agency_lite_blog_pagination_hide_show',array(
      'default' => 1,
      'transport' => 'refresh',
      'sanitize_callback' => 'digital_agency_lite_switch_sanitization'
    ));  
    $wp_customize->add_control( new Digital_Agency_Lite_Toggle_Switch_Custom_Control( $wp_customize, 'digital_agency_lite_blog_pagination_hide_show',array(
      'label' => esc_html__( 'Show / Hide Blog Pagination','digital-agency-lite' ),
      'section' => 'digital_agency_lite_post_settings'
    )));

	$wp_customize->add_setting( 'digital_agency_lite_blog_pagination_type', array(
        'default'			=> 'blog-page-numbers',
        'sanitize_callback'	=> 'digital_agency_lite_sanitize_choices'
    ));
    $wp_customize->add_control( 'digital_agency_lite_blog_pagination_type', array(
        'section' => 'digital_agency_lite_post_settings',
        'type' => 'select',
        'label' => __( 'Blog Pagination', 'digital-agency-lite' ),
        'choices'		=> array(
            'blog-page-numbers'  => __( 'Numeric', 'digital-agency-lite' ),
            'next-prev' => __( 'Older Posts/Newer Posts', 'digital-agency-lite' ),
    )));

    // Button Settings
	$wp_customize->add_section( 'digital_agency_lite_button_settings', array(
		'title' => __( 'Button Settings', 'digital-agency-lite' ),
		'panel' => 'digital_agency_lite_blog_post_parent_panel',
	));

	$wp_customize->add_setting('digital_agency_lite_button_padding_top_bottom',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('digital_agency_lite_button_padding_top_bottom',array(
		'label'	=> __('Padding Top Bottom','digital-agency-lite'),
		'description'	=> __('Enter a value in pixels. Example:20px','digital-agency-lite'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'digital-agency-lite' ),
        ),
		'section'=> 'digital_agency_lite_button_settings',
		'type'=> 'text'
	));

	$wp_customize->add_setting('digital_agency_lite_button_padding_left_right',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('digital_agency_lite_button_padding_left_right',array(
		'label'	=> __('Padding Left Right','digital-agency-lite'),
		'description'	=> __('Enter a value in pixels. Example:20px','digital-agency-lite'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'digital-agency-lite' ),
        ),
		'section'=> 'digital_agency_lite_button_settings',
		'type'=> 'text'
	));

	$wp_customize->add_setting( 'digital_agency_lite_button_border_radius', array(
		'default'              => '',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'digital_agency_lite_sanitize_number_range'
	) );
	$wp_customize->add_control( 'digital_agency_lite_button_border_radius', array(
		'label'       => esc_html__( 'Button Border Radius','digital-agency-lite' ),
		'section'     => 'digital_agency_lite_button_settings',
		'type'        => 'range',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 1,
			'max'              => 50,
		),
	) );

		// font size button
	$wp_customize->add_setting('digital_agency_lite_button_font_size',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('digital_agency_lite_button_font_size',array(
		'label'	=> __('Button Font Size','digital-agency-lite'),
		'description'	=> __('Enter a value in pixels. Example:20px','digital-agency-lite'),
		'input_attrs' => array(
      'placeholder' => __( '10px', 'digital-agency-lite' ),
    ),
    'type'        => 'text',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 1,
			'max'              => 50,
		),
		'section'=> 'digital_agency_lite_button_settings',
	));

	// text trasform
	$wp_customize->add_setting('digital_agency_lite_button_text_transform',array(
		'default'=> 'Uppercase',
		'sanitize_callback'	=> 'digital_agency_lite_sanitize_choices'
	));
	$wp_customize->add_control('digital_agency_lite_button_text_transform',array(
		'type' => 'radio',
		'label'	=> __('Button Text Transform','digital-agency-lite'),
		'choices' => array(
            'Uppercase' => __('Uppercase','digital-agency-lite'),
            'Capitalize' => __('Capitalize','digital-agency-lite'),
            'Lowercase' => __('Lowercase','digital-agency-lite'),
        ),
		'section'=> 'digital_agency_lite_button_settings',
	));

	//Selective Refresh
	$wp_customize->selective_refresh->add_partial('digital_agency_lite_button_text', array( 
		'selector' => '.post-main-box .more-btn a', 
		'render_callback' => 'digital_agency_lite_customize_partial_digital_agency_lite_button_text', 
	));

    $wp_customize->add_setting('digital_agency_lite_button_text',array(
		'default'=> esc_html__( 'READ MORE', 'digital-agency-lite' ),
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('digital_agency_lite_button_text',array(
		'label'	=> __('Add Button Text','digital-agency-lite'),
		'input_attrs' => array(
            'placeholder' => __( 'READ MORE', 'digital-agency-lite' ),
        ),
		'section'=> 'digital_agency_lite_button_settings',
		'type'=> 'text'
	));

	// Related Post Settings
	$wp_customize->add_section( 'digital_agency_lite_related_posts_settings', array(
		'title' => __( 'Related Posts Settings', 'digital-agency-lite' ),
		'panel' => 'digital_agency_lite_blog_post_parent_panel',
	));

	//Selective Refresh
	$wp_customize->selective_refresh->add_partial('digital_agency_lite_related_post_title', array( 
		'selector' => '.related-post h3', 
		'render_callback' => 'digital_agency_lite_customize_partial_digital_agency_lite_related_post_title', 
	));

    $wp_customize->add_setting( 'digital_agency_lite_related_post',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'digital_agency_lite_switch_sanitization'
    ) );
    $wp_customize->add_control( new Digital_Agency_Lite_Toggle_Switch_Custom_Control( $wp_customize, 'digital_agency_lite_related_post',array(
		'label' => esc_html__( 'Related Post','digital-agency-lite' ),
		'section' => 'digital_agency_lite_related_posts_settings'
    )));

    $wp_customize->add_setting('digital_agency_lite_related_post_title',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('digital_agency_lite_related_post_title',array(
		'label'	=> __('Add Related Post Title','digital-agency-lite'),
		'input_attrs' => array(
            'placeholder' => __( 'Related Post', 'digital-agency-lite' ),
        ),
		'section'=> 'digital_agency_lite_related_posts_settings',
		'type'=> 'text'
	));

   	$wp_customize->add_setting('digital_agency_lite_related_posts_count',array(
		'default'=> '3',
		'sanitize_callback'	=> 'digital_agency_lite_sanitize_float'
	));
	$wp_customize->add_control('digital_agency_lite_related_posts_count',array(
		'label'	=> __('Add Related Post Count','digital-agency-lite'),
		'input_attrs' => array(
            'placeholder' => __( '3', 'digital-agency-lite' ),
        ),
		'section'=> 'digital_agency_lite_related_posts_settings',
		'type'=> 'number'
	));

	// Single Posts Settings
	$wp_customize->add_section( 'digital_agency_lite_single_blog_settings', array(
		'title' => __( 'Single Post Settings', 'digital-agency-lite' ),
		'panel' => 'digital_agency_lite_blog_post_parent_panel',
	));

	$wp_customize->add_setting( 'digital_agency_lite_single_post_breadcrumb',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'digital_agency_lite_switch_sanitization'
    ) );
    $wp_customize->add_control( new Digital_Agency_Lite_Toggle_Switch_Custom_Control( $wp_customize, 'digital_agency_lite_single_post_breadcrumb',array(
		'label' => esc_html__( 'Single Post Breadcrumb','digital-agency-lite' ),
		'section' => 'digital_agency_lite_single_blog_settings'
    )));

      // Single Posts Category
  	$wp_customize->add_setting( 'digital_agency_lite_single_post_category',array(
		'default' => true,
		'transport' => 'refresh',
		'sanitize_callback' => 'digital_agency_lite_switch_sanitization'
    ) );
  	$wp_customize->add_control( new Digital_Agency_Lite_Toggle_Switch_Custom_Control( $wp_customize, 'digital_agency_lite_single_post_category',array(
		'label' => esc_html__( 'Single Post Category','digital-agency-lite' ),
		'section' => 'digital_agency_lite_single_blog_settings'
    )));

	$wp_customize->add_setting('digital_agency_lite_single_post_meta_field_separator',array(
		'default'=> '|',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('digital_agency_lite_single_post_meta_field_separator',array(
		'label'	=> __('Add Meta Separator','digital-agency-lite'),
		'description' => __('Add the seperator for meta box. Example: "|", "/", etc.','digital-agency-lite'),
		'section'=> 'digital_agency_lite_single_blog_settings',
		'type'=> 'text'
	));

	$wp_customize->add_setting( 'digital_agency_lite_toggle_tags',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'digital_agency_lite_switch_sanitization'
	));
    $wp_customize->add_control( new Digital_Agency_Lite_Toggle_Switch_Custom_Control( $wp_customize, 'digital_agency_lite_toggle_tags', array(
		'label' => esc_html__( 'Tags','digital-agency-lite' ),
		'section' => 'digital_agency_lite_single_blog_settings'
    )));

	$wp_customize->add_setting( 'digital_agency_lite_single_blog_post_navigation_show_hide',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'digital_agency_lite_switch_sanitization'
	));
    $wp_customize->add_control( new Digital_Agency_Lite_Toggle_Switch_Custom_Control( $wp_customize, 'digital_agency_lite_single_blog_post_navigation_show_hide', array(
		'label' => esc_html__( 'Post Navigation','digital-agency-lite' ),
		'section' => 'digital_agency_lite_single_blog_settings'
    )));

	//navigation text
	$wp_customize->add_setting('digital_agency_lite_single_blog_prev_navigation_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('digital_agency_lite_single_blog_prev_navigation_text',array(
		'label'	=> __('Post Navigation Text','digital-agency-lite'),
		'input_attrs' => array(
            'placeholder' => __( 'PREVIOUS', 'digital-agency-lite' ),
        ),
		'section'=> 'digital_agency_lite_single_blog_settings',
		'type'=> 'text'
	));

	$wp_customize->add_setting('digital_agency_lite_single_blog_next_navigation_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('digital_agency_lite_single_blog_next_navigation_text',array(
		'label'	=> __('Post Navigation Text','digital-agency-lite'),
		'input_attrs' => array(
            'placeholder' => __( 'NEXT', 'digital-agency-lite' ),
        ),
		'section'=> 'digital_agency_lite_single_blog_settings',
		'type'=> 'text'
	));

	$wp_customize->add_setting('digital_agency_lite_single_blog_comment_title',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));

	$wp_customize->add_control('digital_agency_lite_single_blog_comment_title',array(
		'label'	=> __('Add Comment Title','digital-agency-lite'),
		'input_attrs' => array(
            'placeholder' => __( 'Leave a Reply', 'digital-agency-lite' ),
        ),
		'section'=> 'digital_agency_lite_single_blog_settings',
		'type'=> 'text'
	));

	$wp_customize->add_setting('digital_agency_lite_single_blog_comment_button_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));

	$wp_customize->add_control('digital_agency_lite_single_blog_comment_button_text',array(
		'label'	=> __('Add Comment Button Text','digital-agency-lite'),
		'input_attrs' => array(
            'placeholder' => __( 'Post Comment', 'digital-agency-lite' ),
        ),
		'section'=> 'digital_agency_lite_single_blog_settings',
		'type'=> 'text'
	));

	$wp_customize->add_setting('digital_agency_lite_single_blog_comment_width',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('digital_agency_lite_single_blog_comment_width',array(
		'label'	=> __('Comment Form Width','digital-agency-lite'),
		'description'	=> __('Enter a value in %. Example:50%','digital-agency-lite'),
		'input_attrs' => array(
            'placeholder' => __( '100%', 'digital-agency-lite' ),
        ),
		'section'=> 'digital_agency_lite_single_blog_settings',
		'type'=> 'text'
	));

	//Others Settings
	$wp_customize->add_panel( 'digital_agency_lite_others_panel', array(
		'title' => esc_html__( 'Others Settings', 'digital-agency-lite' ),
		'panel' => 'digital_agency_lite_panel_id',
		'priority' => 20,
	));

	// Layout
	$wp_customize->add_section( 'digital_agency_lite_left_right', array(
    	'title'      => esc_html__( 'General Settings', 'digital-agency-lite' ),
		'panel' => 'digital_agency_lite_others_panel'
	) );

	$wp_customize->add_setting('digital_agency_lite_width_option',array(
        'default' => 'Full Width',
        'sanitize_callback' => 'digital_agency_lite_sanitize_choices'
	));
	$wp_customize->add_control(new Digital_Agency_Lite_Image_Radio_Control($wp_customize, 'digital_agency_lite_width_option', array(
        'type' => 'select',
        'label' => __('Width Layouts','digital-agency-lite'),
        'description' => __('Here you can change the width layout of Website.','digital-agency-lite'),
        'section' => 'digital_agency_lite_left_right',
        'choices' => array(
            'Full Width' => esc_url(get_template_directory_uri()).'/assets/images/full-width.png',
            'Wide Width' => esc_url(get_template_directory_uri()).'/assets/images/wide-width.png',
            'Boxed' => esc_url(get_template_directory_uri()).'/assets/images/boxed-width.png',
    ))));

	$wp_customize->add_setting('digital_agency_lite_theme_options',array(
        'default' => 'Right Sidebar',
        'sanitize_callback' => 'digital_agency_lite_sanitize_choices'
	));
	$wp_customize->add_control('digital_agency_lite_theme_options',array(
        'type' => 'select',
        'label' => __('Post Sidebar Layout','digital-agency-lite'),
        'description' => __('Here you can change the sidebar layout for posts. ','digital-agency-lite'),
        'section' => 'digital_agency_lite_left_right',
        'choices' => array(
            'Left Sidebar' => __('Left Sidebar','digital-agency-lite'),
            'Right Sidebar' => __('Right Sidebar','digital-agency-lite'),
            'One Column' => __('One Column','digital-agency-lite'),
            'Three Columns' => __('Three Columns','digital-agency-lite'),
            'Four Columns' => __('Four Columns','digital-agency-lite'),
            'Grid Layout' => __('Grid Layout','digital-agency-lite')
        ),
	) );

	$wp_customize->add_setting('digital_agency_lite_page_layout',array(
        'default' => 'One Column',
        'sanitize_callback' => 'digital_agency_lite_sanitize_choices'
	));
	$wp_customize->add_control('digital_agency_lite_page_layout',array(
        'type' => 'select',
        'label' => __('Page Sidebar Layout','digital-agency-lite'),
        'description' => __('Here you can change the sidebar layout for pages. ','digital-agency-lite'),
        'section' => 'digital_agency_lite_left_right',
        'choices' => array(
            'Left Sidebar' => __('Left Sidebar','digital-agency-lite'),
            'Right Sidebar' => __('Right Sidebar','digital-agency-lite'),
            'One Column' => __('One Column','digital-agency-lite')
        ),
	) );

	$wp_customize->add_setting( 'digital_agency_lite_header_search',array(
    	'default' => 1,
      	'transport' => 'refresh',
      	'sanitize_callback' => 'digital_agency_lite_switch_sanitization'
    ));  
    $wp_customize->add_control( new Digital_Agency_Lite_Toggle_Switch_Custom_Control( $wp_customize, 'digital_agency_lite_header_search',array(
      	'label' => esc_html__( 'Show / Hide Search','digital-agency-lite' ),
      	'section' => 'digital_agency_lite_left_right'
    )));

    $wp_customize->add_setting('digital_agency_lite_search_icon',array(
		'default'	=> 'fas fa-search',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new Digital_Agency_Lite_Fontawesome_Icon_Chooser(
        $wp_customize,'digital_agency_lite_search_icon',array(
		'label'	=> __('Add Search Icon','digital-agency-lite'),
		'transport' => 'refresh',
		'section'	=> 'digital_agency_lite_left_right',
		'setting'	=> 'digital_agency_lite_search_icon',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting('digital_agency_lite_search_close_icon',array(
		'default'	=> 'fa fa-window-close',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new Digital_Agency_Lite_Fontawesome_Icon_Chooser(
        $wp_customize,'digital_agency_lite_search_close_icon',array(
		'label'	=> __('Add Search Close Icon','digital-agency-lite'),
		'transport' => 'refresh',
		'section'	=> 'digital_agency_lite_left_right',
		'setting'	=> 'digital_agency_lite_search_close_icon',
		'type'		=> 'icon'
	)));

    $wp_customize->add_setting('digital_agency_lite_search_font_size',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('digital_agency_lite_search_font_size',array(
		'label'	=> __('Search Font Size','digital-agency-lite'),
		'description'	=> __('Enter a value in pixels. Example:20px','digital-agency-lite'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'digital-agency-lite' ),
        ),
		'section'=> 'digital_agency_lite_left_right',
		'type'=> 'text'
	));

    //Sticky Header
	$wp_customize->add_setting( 'digital_agency_lite_sticky_header',array(
        'default' => 0,
        'transport' => 'refresh',
        'sanitize_callback' => 'digital_agency_lite_switch_sanitization'
    ) );
    $wp_customize->add_control( new Digital_Agency_Lite_Toggle_Switch_Custom_Control( $wp_customize, 'digital_agency_lite_sticky_header',array(
        'label' => esc_html__( 'Sticky Header','digital-agency-lite' ),
        'section' => 'digital_agency_lite_left_right'
    )));

    $wp_customize->add_setting('digital_agency_lite_sticky_header_padding',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('digital_agency_lite_sticky_header_padding',array(
		'label'	=> __('Sticky Header Padding','digital-agency-lite'),
		'description'	=> __('Enter a value in pixels. Example:20px','digital-agency-lite'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'digital-agency-lite' ),
        ),
		'section'=> 'digital_agency_lite_left_right',
		'type'=> 'text'
	));

	$wp_customize->add_setting('digital_agency_lite_navigation_menu_font_size',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('digital_agency_lite_navigation_menu_font_size',array(
		'label'	=> __('Menus Font Size','digital-agency-lite'),
		'description'	=> __('Enter a value in pixels. Example:20px','digital-agency-lite'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'digital-agency-lite' ),
        ),
		'section'=> 'digital_agency_lite_left_right',
		'type'=> 'text'
	));

	$wp_customize->add_setting('digital_agency_lite_navigation_menu_font_weight',array(
        'default' => 'Default',
        'transport' => 'refresh',
        'sanitize_callback' => 'digital_agency_lite_sanitize_choices'
	));
	$wp_customize->add_control('digital_agency_lite_navigation_menu_font_weight',array(
        'type' => 'select',
        'label' => __('Menus Font Weight','digital-agency-lite'),
        'section' => 'digital_agency_lite_left_right',
        'choices' => array(
        	'Default' => __('Default','digital-agency-lite'),
            'Normal' => __('Normal','digital-agency-lite')
        ),
	) );

	$wp_customize->add_setting('digital_agency_lite_header_menus_color', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'digital_agency_lite_header_menus_color', array(
		'label'    => __('Menus Color', 'digital-agency-lite'),
		'section'  => 'digital_agency_lite_left_right',
	)));

	$wp_customize->add_setting('digital_agency_lite_header_menus_hover_color', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'digital_agency_lite_header_menus_hover_color', array(
		'label'    => __('Menus Hover Color', 'digital-agency-lite'),
		'section'  => 'digital_agency_lite_left_right',
	)));

	$wp_customize->add_setting('digital_agency_lite_header_submenus_color', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'digital_agency_lite_header_submenus_color', array(
		'label'    => __('Sub Menus Color', 'digital-agency-lite'),
		'section'  => 'digital_agency_lite_left_right',
	)));

	$wp_customize->add_setting('digital_agency_lite_header_submenus_hover_color', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'digital_agency_lite_header_submenus_hover_color', array(
		'label'    => __('Sub Menus Hover Color', 'digital-agency-lite'),
		'section'  => 'digital_agency_lite_left_right',
	)));

	$wp_customize->add_setting( 'digital_agency_lite_single_page_breadcrumb',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'digital_agency_lite_switch_sanitization'
    ) );
    $wp_customize->add_control( new Digital_Agency_Lite_Toggle_Switch_Custom_Control( $wp_customize, 'digital_agency_lite_single_page_breadcrumb',array(
		'label' => esc_html__( 'Single Page Breadcrumb','digital-agency-lite' ),
		'section' => 'digital_agency_lite_left_right'
    )));

	//Wow Animation
	$wp_customize->add_setting( 'digital_agency_lite_animation',array(
        'default' => 1,
        'transport' => 'refresh',
        'sanitize_callback' => 'digital_agency_lite_switch_sanitization'
    ));
    $wp_customize->add_control( new Digital_Agency_Lite_Toggle_Switch_Custom_Control( $wp_customize, 'digital_agency_lite_animation',array(
        'label' => esc_html__( 'Animation ','digital-agency-lite' ),
        'description' => __('Here you can disable overall site animation effect','digital-agency-lite'),
        'section' => 'digital_agency_lite_left_right'
    )));

    $wp_customize->add_setting('digital_agency_lite_reset_all_settings',array(
      'sanitize_callback'	=> 'sanitize_text_field',
   	));
   	$wp_customize->add_control(new Digital_Agency_Lite_Reset_Custom_Control($wp_customize, 'digital_agency_lite_reset_all_settings',array(
      'type' => 'reset_control',
      'label' => __('Reset All Settings', 'digital-agency-lite'),
      'description' => 'digital_agency_lite_reset_all_settings',
      'section' => 'digital_agency_lite_left_right'
   	)));

    //Pre-Loader
	$wp_customize->add_setting( 'digital_agency_lite_loader_enable',array(
        'default' => 0,
        'transport' => 'refresh',
        'sanitize_callback' => 'digital_agency_lite_switch_sanitization'
    ) );
    $wp_customize->add_control( new Digital_Agency_Lite_Toggle_Switch_Custom_Control( $wp_customize, 'digital_agency_lite_loader_enable',array(
        'label' => esc_html__( 'Pre-Loader','digital-agency-lite' ),
        'section' => 'digital_agency_lite_left_right'
    )));

	$wp_customize->add_setting('digital_agency_lite_preloader_bg_color', array(
		'default'           => '#fa5a56',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'digital_agency_lite_preloader_bg_color', array(
		'label'    => __('Pre-Loader Background Color', 'digital-agency-lite'),
		'section'  => 'digital_agency_lite_left_right',
	)));

	$wp_customize->add_setting('digital_agency_lite_preloader_border_color', array(
		'default'           => '#ffffff',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'digital_agency_lite_preloader_border_color', array(
		'label'    => __('Pre-Loader Border Color', 'digital-agency-lite'),
		'section'  => 'digital_agency_lite_left_right',
	)));

    //404 Page Setting
	$wp_customize->add_section('digital_agency_lite_404_page',array(
		'title'	=> __('404 Page Settings','digital-agency-lite'),
		'panel' => 'digital_agency_lite_others_panel',
	));	

	$wp_customize->add_setting('digital_agency_lite_404_page_title',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));

	$wp_customize->add_control('digital_agency_lite_404_page_title',array(
		'label'	=> __('Add Title','digital-agency-lite'),
		'input_attrs' => array(
            'placeholder' => __( '404 Not Found', 'digital-agency-lite' ),
        ),
		'section'=> 'digital_agency_lite_404_page',
		'type'=> 'text'
	));

	$wp_customize->add_setting('digital_agency_lite_404_page_content',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));

	$wp_customize->add_control('digital_agency_lite_404_page_content',array(
		'label'	=> __('Add Text','digital-agency-lite'),
		'input_attrs' => array(
            'placeholder' => __( 'Looks like you have taken a wrong turn, Dont worry, it happens to the best of us.', 'digital-agency-lite' ),
        ),
		'section'=> 'digital_agency_lite_404_page',
		'type'=> 'text'
	));

	$wp_customize->add_setting('digital_agency_lite_404_page_button_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('digital_agency_lite_404_page_button_text',array(
		'label'	=> __('Add Button Text','digital-agency-lite'),
		'input_attrs' => array(
            'placeholder' => __( 'GO BACK', 'digital-agency-lite' ),
        ),
		'section'=> 'digital_agency_lite_404_page',
		'type'=> 'text'
	));

	//No Result Page Setting
	$wp_customize->add_section('digital_agency_lite_no_results_page',array(
		'title'	=> __('No Results Page Settings','digital-agency-lite'),
		'panel' => 'digital_agency_lite_others_panel',
	));	

	$wp_customize->add_setting('digital_agency_lite_no_results_page_title',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));

	$wp_customize->add_control('digital_agency_lite_no_results_page_title',array(
		'label'	=> __('Add Title','digital-agency-lite'),
		'input_attrs' => array(
            'placeholder' => __( 'Nothing Found', 'digital-agency-lite' ),
        ),
		'section'=> 'digital_agency_lite_no_results_page',
		'type'=> 'text'
	));

	$wp_customize->add_setting('digital_agency_lite_no_results_page_content',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));

	$wp_customize->add_control('digital_agency_lite_no_results_page_content',array(
		'label'	=> __('Add Text','digital-agency-lite'),
		'input_attrs' => array(
            'placeholder' => __( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'digital-agency-lite' ),
        ),
		'section'=> 'digital_agency_lite_no_results_page',
		'type'=> 'text'
	));

	//Social Icon Setting
	$wp_customize->add_section('digital_agency_lite_social_icon_settings',array(
		'title'	=> __('Social Icons Settings','digital-agency-lite'),
		'panel' => 'digital_agency_lite_others_panel',
	));	

	$wp_customize->add_setting('digital_agency_lite_social_icon_font_size',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('digital_agency_lite_social_icon_font_size',array(
		'label'	=> __('Icon Font Size','digital-agency-lite'),
		'description'	=> __('Enter a value in pixels. Example:20px','digital-agency-lite'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'digital-agency-lite' ),
        ),
		'section'=> 'digital_agency_lite_social_icon_settings',
		'type'=> 'text'
	));

	$wp_customize->add_setting('digital_agency_lite_social_icon_padding',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('digital_agency_lite_social_icon_padding',array(
		'label'	=> __('Icon Padding','digital-agency-lite'),
		'description'	=> __('Enter a value in pixels. Example:20px','digital-agency-lite'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'digital-agency-lite' ),
        ),
		'section'=> 'digital_agency_lite_social_icon_settings',
		'type'=> 'text'
	));

	$wp_customize->add_setting('digital_agency_lite_social_icon_width',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('digital_agency_lite_social_icon_width',array(
		'label'	=> __('Icon Width','digital-agency-lite'),
		'description'	=> __('Enter a value in pixels. Example:20px','digital-agency-lite'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'digital-agency-lite' ),
        ),
		'section'=> 'digital_agency_lite_social_icon_settings',
		'type'=> 'text'
	));

	$wp_customize->add_setting('digital_agency_lite_social_icon_height',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('digital_agency_lite_social_icon_height',array(
		'label'	=> __('Icon Height','digital-agency-lite'),
		'description'	=> __('Enter a value in pixels. Example:20px','digital-agency-lite'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'digital-agency-lite' ),
        ),
		'section'=> 'digital_agency_lite_social_icon_settings',
		'type'=> 'text'
	));

	$wp_customize->add_setting( 'digital_agency_lite_social_icon_border_radius', array(
		'default'              => '',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'digital_agency_lite_sanitize_number_range'
	) );
	$wp_customize->add_control( 'digital_agency_lite_social_icon_border_radius', array(
		'label'       => esc_html__( 'Icon Border Radius','digital-agency-lite' ),
		'section'     => 'digital_agency_lite_social_icon_settings',
		'type'        => 'range',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 1,
			'max'              => 50,
		),
	) );

	//Responsive Media Settings
	$wp_customize->add_section('digital_agency_lite_responsive_media',array(
		'title'	=> __('Responsive Media','digital-agency-lite'),
		'panel' => 'digital_agency_lite_others_panel',
	));

    $wp_customize->add_setting( 'digital_agency_lite_stickyheader_hide_show',array(
      'default' => 0,
      'transport' => 'refresh',
      'sanitize_callback' => 'digital_agency_lite_switch_sanitization'
    ));  
    $wp_customize->add_control( new Digital_Agency_Lite_Toggle_Switch_Custom_Control( $wp_customize, 'digital_agency_lite_stickyheader_hide_show',array(
      'label' => esc_html__( 'Sticky Header','digital-agency-lite' ),
      'section' => 'digital_agency_lite_responsive_media'
    )));

    $wp_customize->add_setting( 'digital_agency_lite_resp_slider_hide_show',array(
      'default' => 0,
      'transport' => 'refresh',
      'sanitize_callback' => 'digital_agency_lite_switch_sanitization'
    ));  
    $wp_customize->add_control( new Digital_Agency_Lite_Toggle_Switch_Custom_Control( $wp_customize, 'digital_agency_lite_resp_slider_hide_show',array(
      'label' => esc_html__( 'Show / Hide Slider','digital-agency-lite' ),
      'section' => 'digital_agency_lite_responsive_media'
    )));

    $wp_customize->add_setting( 'digital_agency_lite_sidebar_hide_show',array(
      'default' => 1,
      'transport' => 'refresh',
      'sanitize_callback' => 'digital_agency_lite_switch_sanitization'
    ));  
    $wp_customize->add_control( new Digital_Agency_Lite_Toggle_Switch_Custom_Control( $wp_customize, 'digital_agency_lite_sidebar_hide_show',array(
      'label' => esc_html__( 'Show / Hide Sidebar','digital-agency-lite' ),
      'section' => 'digital_agency_lite_responsive_media'
    )));

    $wp_customize->add_setting( 'digital_agency_lite_resp_scroll_top_hide_show',array(
      'default' => 1,
      'transport' => 'refresh',
      'sanitize_callback' => 'digital_agency_lite_switch_sanitization'
    ));  
    $wp_customize->add_control( new Digital_Agency_Lite_Toggle_Switch_Custom_Control( $wp_customize, 'digital_agency_lite_resp_scroll_top_hide_show',array(
      'label' => esc_html__( 'Show / Hide Scroll To Top','digital-agency-lite' ),
      'section' => 'digital_agency_lite_responsive_media'
    )));

    $wp_customize->add_setting('digital_agency_lite_res_menu_open_icon',array(
		'default'	=> 'fas fa-bars',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new Digital_Agency_Lite_Fontawesome_Icon_Chooser(
        $wp_customize,'digital_agency_lite_res_menu_open_icon',array(
		'label'	=> __('Add Open Menu Icon','digital-agency-lite'),
		'transport' => 'refresh',
		'section'	=> 'digital_agency_lite_responsive_media',
		'setting'	=> 'digital_agency_lite_res_menu_open_icon',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting('digital_agency_lite_res_menu_close_icon',array(
		'default'	=> 'fas fa-times',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new Digital_Agency_Lite_Fontawesome_Icon_Chooser(
        $wp_customize,'digital_agency_lite_res_menu_close_icon',array(
		'label'	=> __('Add Close Menu Icon','digital-agency-lite'),
		'transport' => 'refresh',
		'section'	=> 'digital_agency_lite_responsive_media',
		'setting'	=> 'digital_agency_lite_res_menu_close_icon',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting('digital_agency_lite_resp_menu_toggle_btn_color', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'digital_agency_lite_resp_menu_toggle_btn_color', array(
		'label'    => __('Toggle Button Color', 'digital-agency-lite'),
		'section'  => 'digital_agency_lite_responsive_media',
	)));

    //Woocommerce settings
	$wp_customize->add_section('digital_agency_lite_woocommerce_section', array(
		'title'    => __('WooCommerce Layout', 'digital-agency-lite'),
		'priority' => null,
		'panel'    => 'woocommerce',
	));

	//Selective Refresh
	$wp_customize->selective_refresh->add_partial( 'digital_agency_lite_woocommerce_shop_page_sidebar', array( 'selector' => '.post-type-archive-product #sidebar', 
		'render_callback' => 'digital_agency_lite_customize_partial_digital_agency_lite_woocommerce_shop_page_sidebar', ) );

    //Woocommerce Shop Page Sidebar
	$wp_customize->add_setting( 'digital_agency_lite_woocommerce_shop_page_sidebar',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'digital_agency_lite_switch_sanitization'
    ) );
    $wp_customize->add_control( new Digital_Agency_Lite_Toggle_Switch_Custom_Control( $wp_customize, 'digital_agency_lite_woocommerce_shop_page_sidebar',array(
		'label' => esc_html__( 'Shop Page Sidebar','digital-agency-lite' ),
		'section' => 'digital_agency_lite_woocommerce_section'
    )));

    //Selective Refresh
	$wp_customize->selective_refresh->add_partial( 'digital_agency_lite_woocommerce_single_product_page_sidebar', array( 'selector' => '.single-product #sidebar', 
		'render_callback' => 'digital_agency_lite_customize_partial_digital_agency_lite_woocommerce_single_product_page_sidebar', ) );

    //Woocommerce Single Product page Sidebar
	$wp_customize->add_setting( 'digital_agency_lite_woocommerce_single_product_page_sidebar',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'digital_agency_lite_switch_sanitization'
    ) );
    $wp_customize->add_control( new Digital_Agency_Lite_Toggle_Switch_Custom_Control( $wp_customize, 'digital_agency_lite_woocommerce_single_product_page_sidebar',array(
		'label' => esc_html__( 'Single Product Sidebar','digital-agency-lite' ),
		'section' => 'digital_agency_lite_woocommerce_section'
    )));

    //Related Products
	$wp_customize->add_setting( 'digital_agency_lite_related_product_show_hide',array(
        'default' => 1,
        'transport' => 'refresh',
        'sanitize_callback' => 'digital_agency_lite_switch_sanitization'
    ) );
    $wp_customize->add_control( new Digital_Agency_Lite_Toggle_Switch_Custom_Control( $wp_customize, 'digital_agency_lite_related_product_show_hide',array(
        'label' => esc_html__( 'Related product','digital-agency-lite' ),
        'section' => 'digital_agency_lite_woocommerce_section'
    )));

    //Products per page
    $wp_customize->add_setting('digital_agency_lite_products_per_page',array(
		'default'=> '9',
		'sanitize_callback'	=> 'digital_agency_lite_sanitize_float'
	));
	$wp_customize->add_control('digital_agency_lite_products_per_page',array(
		'label'	=> __('Products Per Page','digital-agency-lite'),
		'description' => __('Display on shop page','digital-agency-lite'),
		'input_attrs' => array(
            'step'             => 1,
			'min'              => 0,
			'max'              => 50,
        ),
		'section'=> 'digital_agency_lite_woocommerce_section',
		'type'=> 'number',
	));

    //Products per row
    $wp_customize->add_setting('digital_agency_lite_products_per_row',array(
		'default'=> '3',
		'sanitize_callback'	=> 'digital_agency_lite_sanitize_choices'
	));
	$wp_customize->add_control('digital_agency_lite_products_per_row',array(
		'label'	=> __('Products Per Row','digital-agency-lite'),
		'description' => __('Display on shop page','digital-agency-lite'),
		'choices' => array(
            '2' => '2',
			'3' => '3',
			'4' => '4',
        ),
		'section'=> 'digital_agency_lite_woocommerce_section',
		'type'=> 'select',
	));

	//Products padding
	$wp_customize->add_setting('digital_agency_lite_products_padding_top_bottom',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('digital_agency_lite_products_padding_top_bottom',array(
		'label'	=> __('Products Padding Top Bottom','digital-agency-lite'),
		'description'	=> __('Enter a value in pixels. Example:20px','digital-agency-lite'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'digital-agency-lite' ),
        ),
		'section'=> 'digital_agency_lite_woocommerce_section',
		'type'=> 'text'
	));

	$wp_customize->add_setting('digital_agency_lite_products_padding_left_right',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('digital_agency_lite_products_padding_left_right',array(
		'label'	=> __('Products Padding Left Right','digital-agency-lite'),
		'description'	=> __('Enter a value in pixels. Example:20px','digital-agency-lite'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'digital-agency-lite' ),
        ),
		'section'=> 'digital_agency_lite_woocommerce_section',
		'type'=> 'text'
	));

	//Products box shadow
	$wp_customize->add_setting( 'digital_agency_lite_products_box_shadow', array(
		'default'              => '',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'digital_agency_lite_sanitize_number_range'
	) );
	$wp_customize->add_control( 'digital_agency_lite_products_box_shadow', array(
		'label'       => esc_html__( 'Products Box Shadow','digital-agency-lite' ),
		'section'     => 'digital_agency_lite_woocommerce_section',
		'type'        => 'range',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 1,
			'max'              => 50,
		),
	) );

	//Products border radius
    $wp_customize->add_setting( 'digital_agency_lite_products_border_radius', array(
		'default'              => '0',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'digital_agency_lite_sanitize_number_range'
	) );
	$wp_customize->add_control( 'digital_agency_lite_products_border_radius', array(
		'label'       => esc_html__( 'Products Border Radius','digital-agency-lite' ),
		'section'     => 'digital_agency_lite_woocommerce_section',
		'type'        => 'range',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 1,
			'max'              => 50,
		),
	) );

	$wp_customize->add_setting('digital_agency_lite_products_btn_padding_top_bottom',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('digital_agency_lite_products_btn_padding_top_bottom',array(
		'label'	=> __('Products Button Padding Top Bottom','digital-agency-lite'),
		'description'	=> __('Enter a value in pixels. Example:20px','digital-agency-lite'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'digital-agency-lite' ),
        ),
		'section'=> 'digital_agency_lite_woocommerce_section',
		'type'=> 'text'
	));

	$wp_customize->add_setting('digital_agency_lite_products_btn_padding_left_right',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('digital_agency_lite_products_btn_padding_left_right',array(
		'label'	=> __('Products Button Padding Left Right','digital-agency-lite'),
		'description'	=> __('Enter a value in pixels. Example:20px','digital-agency-lite'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'digital-agency-lite' ),
        ),
		'section'=> 'digital_agency_lite_woocommerce_section',
		'type'=> 'text'
	));

	$wp_customize->add_setting( 'digital_agency_lite_products_button_border_radius', array(
		'default'              => '0',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'digital_agency_lite_sanitize_number_range'
	) );
	$wp_customize->add_control( 'digital_agency_lite_products_button_border_radius', array(
		'label'       => esc_html__( 'Products Button Border Radius','digital-agency-lite' ),
		'section'     => 'digital_agency_lite_woocommerce_section',
		'type'        => 'range',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 1,
			'max'              => 50,
		),
	) );

	//Products Sale Badge
	$wp_customize->add_setting('digital_agency_lite_woocommerce_sale_position',array(
        'default' => 'right',
        'sanitize_callback' => 'digital_agency_lite_sanitize_choices'
	));
	$wp_customize->add_control('digital_agency_lite_woocommerce_sale_position',array(
        'type' => 'select',
        'label' => __('Sale Badge Position','digital-agency-lite'),
        'section' => 'digital_agency_lite_woocommerce_section',
        'choices' => array(
            'left' => __('Left','digital-agency-lite'),
            'right' => __('Right','digital-agency-lite'),
        ),
	) );

	$wp_customize->add_setting('digital_agency_lite_woocommerce_sale_font_size',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('digital_agency_lite_woocommerce_sale_font_size',array(
		'label'	=> __('Sale Font Size','digital-agency-lite'),
		'description'	=> __('Enter a value in pixels. Example:20px','digital-agency-lite'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'digital-agency-lite' ),
        ),
		'section'=> 'digital_agency_lite_woocommerce_section',
		'type'=> 'text'
	));

	$wp_customize->add_setting('digital_agency_lite_woocommerce_sale_padding_top_bottom',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('digital_agency_lite_woocommerce_sale_padding_top_bottom',array(
		'label'	=> __('Sale Padding Top Bottom','digital-agency-lite'),
		'description'	=> __('Enter a value in pixels. Example:20px','digital-agency-lite'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'digital-agency-lite' ),
        ),
		'section'=> 'digital_agency_lite_woocommerce_section',
		'type'=> 'text'
	));

	$wp_customize->add_setting('digital_agency_lite_woocommerce_sale_padding_left_right',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('digital_agency_lite_woocommerce_sale_padding_left_right',array(
		'label'	=> __('Sale Padding Left Right','digital-agency-lite'),
		'description'	=> __('Enter a value in pixels. Example:20px','digital-agency-lite'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'digital-agency-lite' ),
        ),
		'section'=> 'digital_agency_lite_woocommerce_section',
		'type'=> 'text'
	));
	
	$wp_customize->add_setting( 'digital_agency_lite_woocommerce_sale_border_radius', array(
		'default'              => '0',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'digital_agency_lite_sanitize_number_range'
	) );
	$wp_customize->add_control( 'digital_agency_lite_woocommerce_sale_border_radius', array(
		'label'       => esc_html__( 'Sale Border Radius','digital-agency-lite' ),
		'section'     => 'digital_agency_lite_woocommerce_section',
		'type'        => 'range',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 1,
			'max'              => 50,
		),
	) );

    // Has to be at the top
	$wp_customize->register_panel_type( 'Digital_Agency_Lite_WP_Customize_Panel' );
	$wp_customize->register_section_type( 'Digital_Agency_Lite_WP_Customize_Section' );
}

add_action( 'customize_register', 'digital_agency_lite_customize_register' );

load_template( trailingslashit( get_template_directory() ) . '/inc/logo/logo-resizer.php' );

if ( class_exists( 'WP_Customize_Panel' ) ) {
  	class Digital_Agency_Lite_WP_Customize_Panel extends WP_Customize_Panel {
	    public $panel;
	    public $type = 'digital_agency_lite_panel';
	    public function json() {

	      $array = wp_array_slice_assoc( (array) $this, array( 'id', 'description', 'priority', 'type', 'panel', ) );
	      $array['title'] = html_entity_decode( $this->title, ENT_QUOTES, get_bloginfo( 'charset' ) );
	      $array['content'] = $this->get_content();
	      $array['active'] = $this->active();
	      $array['instanceNumber'] = $this->instance_number;
	      return $array;
    	}
  	}
}

if ( class_exists( 'WP_Customize_Section' ) ) {
  	class Digital_Agency_Lite_WP_Customize_Section extends WP_Customize_Section {
	    public $section;
	    public $type = 'digital_agency_lite_section';
	    public function json() {

	      $array = wp_array_slice_assoc( (array) $this, array( 'id', 'description', 'priority', 'panel', 'type', 'description_hidden', 'section', ) );
	      $array['title'] = html_entity_decode( $this->title, ENT_QUOTES, get_bloginfo( 'charset' ) );
	      $array['content'] = $this->get_content();
	      $array['active'] = $this->active();
	      $array['instanceNumber'] = $this->instance_number;

	      if ( $this->panel ) {
	        $array['customizeAction'] = sprintf( 'Customizing &#9656; %s', esc_html( $this->manager->get_panel( $this->panel )->title ) );
	      } else {
	        $array['customizeAction'] = 'Customizing';
	      }
	      return $array;
    	}
  	}
}

// Enqueue our scripts and styles
function digital_agency_lite_customize_controls_scripts() {
  wp_enqueue_script( 'customizer-controls', get_theme_file_uri( '/assets/js/customizer-controls.js' ), array(), '1.0', true );
}
add_action( 'customize_controls_enqueue_scripts', 'digital_agency_lite_customize_controls_scripts' );

/**
 * Singleton class for handling the theme's customizer integration.
 *
 * @since  1.0.0
 * @access public
 */
final class digital_agency_lite_Customize {

	/**
	 * Returns the instance.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return object
	 */
	public static function get_instance() {

		static $instance = null;

		if ( is_null( $instance ) ) {
			$instance = new self;
			$instance->setup_actions();
		}

		return $instance;
	}

	/**
	 * Constructor method.
	 *
	 * @since  1.0.0
	 * @access private
	 * @return void
	 */
	private function __construct() {}

	/**
	 * Sets up initial actions.
	 *
	 * @since  1.0.0
	 * @access private
	 * @return void
	 */
	private function setup_actions() {

		// Register panels, sections, settings, controls, and partials.
		add_action( 'customize_register', array( $this, 'sections' ) );

		// Register scripts and styles for the controls.
		add_action( 'customize_controls_enqueue_scripts', array( $this, 'enqueue_control_scripts' ), 0 );
	}

	/**
	 * Sets up the customizer sections.
	 *
	 * @since  1.0.0
	 * @access public
	 * @param  object  $manager
	 * @return void
	*/
	public function sections( $manager ) {

		// Load custom sections.
		load_template( trailingslashit( get_template_directory() ) . '/inc/section-pro.php' );

		// Register custom section types.
		$manager->register_section_type( 'Digital_Agency_Lite_Customize_Section_Pro' );

		// Register sections.
		$manager->add_section( new Digital_Agency_Lite_Customize_Section_Pro( $manager,'digital_agency_lite_upgrade_pro_link', array(
			'priority'   => 1,
			'title'    => esc_html__( 'Digital Agency Pro', 'digital-agency-lite' ),
			'pro_text' => esc_html__( 'UPGRADE PRO', 'digital-agency-lite' ),
			'pro_url'  => esc_url('https://www.vwthemes.com/themes/digital-marketing-wordpress-theme/'),
		) )	);

		// Register sections.
		$manager->add_section(new Digital_Agency_Lite_Customize_Section_Pro($manager,'digital_agency_lite_get_started_link',array(
			'priority'   => 1,
			'title'    => esc_html__( 'Documentation', 'digital-agency-lite' ),
			'pro_text' => esc_html__( 'DOCS', 'digital-agency-lite' ),
			'pro_url'  => esc_url('https://www.vwthemesdemo.com/docs/free-digital-agency/'),
		)));
	}

	/**
	 * Loads theme customizer CSS.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function enqueue_control_scripts() {

		wp_enqueue_script( 'digital-agency-lite-customize-controls', trailingslashit( esc_url(get_template_directory_uri()) ) . '/assets/js/customize-controls.js', array( 'customize-controls' ) );

		wp_enqueue_style( 'digital-agency-lite-customize-controls', trailingslashit( esc_url(get_template_directory_uri()) ) . '/assets/css/customize-controls.css' );

		wp_localize_script(
		'digital-agency-lite-customize-controls',
		'digital_agency_lite_customizer_params',
		array(
			'ajaxurl' =>	admin_url( 'admin-ajax.php' )
		));
	}
}

// Doing this customizer thang!
digital_agency_lite_Customize::get_instance();