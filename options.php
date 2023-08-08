<?php
/**
 * A unique identifier is defined to store the options in the database and reference them from the theme.
 * By default it uses the theme name, in lowercase and without spaces, but this can be changed if needed.
 * If the identifier changes, it'll appear as if the options have been reset.
 *
 */

function optionsframework_option_name() {
	return 'ugdsb4';
}

/**
 * Defines an array of options that will be used to generate the settings page and be saved in the database.
 * When creating the 'id' fields, make sure to use all lowercase and no spaces.
 *
 */

function optionsframework_options() {

	// Option to switch between the_excerpt and the_content
	//$blog_layout = array('1' => __('Display full content for each post', 'ugdsb4'),'2' => __('Display excerpt for each post', 'ugdsb4'));

	// Color schemes
	//$site_layout = array('pull-left' => __('Right Sidebar', 'ugdsb4'),'pull-right' => __('Left Sidebar', 'ugdsb4'));

		// Test data
	$test_array = array(
		'one'   => __('One', 'options_framework_theme'),
		'two'   => __('Two', 'options_framework_theme'),
		'three' => __('Three', 'options_framework_theme'),
		'four'  => __('Four', 'options_framework_theme'),
		'five'  => __('Five', 'options_framework_theme')
	);

	// Multicheck Array
	$multicheck_array = array(
		'one'   => __('French Toast', 'options_framework_theme'),
		'two'   => __('Pancake', 'options_framework_theme'),
		'three' => __('Omelette', 'options_framework_theme'),
		'four'  => __('Crepe', 'options_framework_theme'),
		'five'  => __('Waffle', 'options_framework_theme')
	);

	// Multicheck Defaults
	$multicheck_defaults = array(
		'one'  => '1',
		'five' => '1'
	);

	// Typography Defaults
	$typography_defaults = array(
		'size'  => '15px',
		'face'  => 'Helvetica Neue',
		'style' => 'normal',
		'color' => '#6B6B6B' );

	// Typography Options
	$typography_options = array(
	  'sizes' => array( '6','10','12','14','15','16','18','20','24','28','32','36','42','48' ),
	  'faces' => array(
			'arial'          => 'Arial',
			'verdana'        => 'Verdana, Geneva',
			'trebuchet'      => 'Trebuchet',
			'georgia'        => 'Georgia',
			'times'          => 'Times New Roman',
			'tahoma'         => 'Tahoma, Geneva',
			'palatino'       => 'Palatino',
			'helvetica'      => 'Helvetica',
			'Helvetica Neue' => 'Helvetica Neue'
	),
	  'styles' => array( 'normal' => 'Normal','bold' => 'Bold' ),
	  'color' => true
	);

	// Pull all the categories into an array
	$options_categories = array();
	$options_categories_obj = get_categories();
	foreach ($options_categories_obj as $category) {
	  $options_categories[$category->cat_ID] = $category->cat_name;
	}

	// Pull all tags into an array
	$options_tags = array();
	$options_tags_obj = get_tags();
	foreach ( $options_tags_obj as $tag ) {
	  $options_tags[$tag->term_id] = $tag->name;
	}


	// Pull all the pages into an array
	$options_pages = array();
	$options_pages_obj = get_pages('sort_column=post_parent,menu_order');
	$options_pages[''] = 'Select a page:';
	foreach ($options_pages_obj as $page) {
	  $options_pages[$page->ID] = $page->post_title;
	}

	// If using image radio buttons, define a directory path
	$imagepath =  get_template_directory_uri() . '/images/';


	// fixed or scroll position
	$fixed_scroll = array('scroll' => 'Scroll', 'fixed' => 'Fixed');

	$options = array();

	$options[] = array(
		'name' => __('Main', 'ugdsb4'),
		'type' => 'heading'
	);

	//Contact information and address
	$options[] = array(
		'name' => __('Address Information Line 1', 'ugdsb4'),
		'desc' => __('Ex: 123 Anywhere St', 'ugdsb4'),
		'id'   => 'custom_header_address1_text',
		'std'  => '',
		'type' => 'text'
	);
	$options[] = array(
		'name' => __('City', 'ugdsb4'),
		'desc' => __('Ex: Guelph', 'ugdsb4'),
		'id'   => 'custom_header_address2_text',
		'std'  => '',
		'type' => 'text'
	);
	$options[] = array(
		'name' => __('Province and Postal Code', 'ugdsb4'),
		'desc' => __('Ex: Ontario N2G 1G1', 'ugdsb4'),
		'id'   => 'custom_header_address3_text',
		'std'  => '',
		'type' => 'text'
	);
	
	$options[] = array(
		'name' => __('Contact Phone', 'ugdsb4'),
		'desc' => __('Ex: (519)333-3333', 'ugdsb4'),
		'id'   => 'custom_header_phone_text',
		'std'  => '',
		'type' => 'text'
	);
	
	$options[] = array(
		'name' => __('Attendance Line', 'ugdsb4'),
		'desc' => __('Ex: (519)333-3333 x000', 'ugdsb4'),
		'id'   => 'custom_phone_attendance_text',
		'std'  => '',
		'type' => 'text'
	);
	$options[] = array(
		'name' => __('Fax Information', 'ugdsb4'),
		'desc' => __('Ex: (519)333-4444', 'ugdsb4'),
		'id'   => 'custom_header_fax_text',
		'std'  => '',
		'type' => 'text'
	);
	$options[] = array(
		'name' => __('Email Address', 'ugdsb4'),
		'desc' => __('Ex: ourschool.ps@ugdsb4.on.ca', 'ugdsb4'),
		'id'   => 'custom_header_email_text',
		'std'  => '',
		'type' => 'text'
	);
	
	$options[] = array(
		'name' => __('School Hours', 'ugdsb4'),
		'desc' => __('Ex: 8:50 a.m. - 3:10 p.m.', 'ugdsb4'),
		'id'   => 'custom_school_hours_text',
		'std'  => '',
		'type' => 'text'
	);
	$options[] = array(
		'name' => __('Office Hours', 'ugdsb4'),
		'desc' => __('Ex: 8:50 a.m. - 3:10 p.m.', 'ugdsb4'),
		'id'   => 'custom_office_hours_text',
		'std'  => '',
		'type' => 'text'
	);
	
	$options[] = array(
		'name' => __('Nutrition Break 1', 'ugdsb4'),
		'desc' => __('Ex: 10:50 a.m. - 11:30 a.m.', 'ugdsb4'),
		'id'   => 'custom_nuttrition1_hours_text',
		'std'  => '',
		'type' => 'text'
	);
	$options[] = array(
		'name' => __('Nutrition Break 2', 'ugdsb4'),
		'desc' => __('Ex: 1:00 p.m. - 1:30 p.m.', 'ugdsb4'),
		'id'   => 'custom_nuttrition2_hours_text',
		'std'  => '',
		'type' => 'text'
	);
	$options[] = array(
		'name' => __('Principal', 'ugdsb4'),
		'desc' => __('Ex: Mr. John John', 'ugdsb4'),
		'id'   => 'custom_principal_text',
		'std'  => '',
		'type' => 'text'
	);
	$options[] = array(
		'name' => __('Vice Principal(s)', 'ugdsb4'),
		'desc' => __('Ex: Mr. John Smith', 'ugdsb4'),
		'id'   => 'custom_vp_text',
		'std'  => '',
		'type' => 'text'
	);
	$options[] = array(
		'name' => __('Office Coordinator', 'ugdsb4'),
		'desc' => __('Ex: Mrs. Jane Smith', 'ugdsb4'),
		'id'   => 'custom_secretary_text',
		'std'  => '',
		'type' => 'text'
	);
	
	
	
	/*$options[] = array(
		'name' => __('Home Page Settings', 'ugdsb4'),
		'id'      => 'blog_settings',
		'std'     => '1',
		'type'    => 'select',
		'options' => $blog_layout
	);

	$options[] = array(
		"name" => __('Website Layout Options', 'ugdsb4'),
		"desc"    => __('Choose between Left and Right sidebar options to be used as default', 'ugdsb4'),
		"id"      => "site_layout",
		"std"     => "pull-left",
		"type"    => "select",
		"class"   => "mini",
		"options" => $site_layout
	);

	$options[] = array(
		'name' => __('Element color', 'ugdsb4'),
		'desc' => __('Default used if no color is selected', 'ugdsb4'),
		'id'   => 'element_color',
		'std'  => '',
		'type' => 'color'
	);

	$options[] = array(
		'name' => __('Element color on hover', 'ugdsb4'),
		'desc' => __('Default used if no color is selected', 'ugdsb4'),
		'id'   => 'element_color_hover',
		'std'  => '',
		'type' => 'color'
	);

	$options[] = array(
		'name' => __('Custom Favicon', 'ugdsb4'),
		'desc' => __('Upload a 32px x 32px PNG/GIF image that will represent your websites favicon', 'ugdsb4'),
		'id'   => 'custom_favicon',
		'std'  => '',
		'type' => 'upload'
	);*/

	
	$options[] = array(
		'name' => __('Typography', 'ugdsb4'),
		'type' => 'heading'
	);

	/*$options[] = array(
		'name'    => __('Main Body Text', 'ugdsb4'),
		'desc'    => __('Used in P tags', 'ugdsb4'),
		'id'      => 'main_body_typography',
		'std'     => $typography_defaults,
		'type'    => 'typography',
		'options' => $typography_options
	);
	
	//upload
	$this->settings['st_upload'] = array(
    'title'   => __( 'Example upload Input' ),
    'desc'    => __( 'This is a description for the upload input.' ),
    'std'     => 'My logo',
    'type'    => 'upload',
    'section' => 'general'
	);*/

	
	$options[] = array(
		'name' => __('Heading Color', 'ugdsb4'),
		'desc' => __('This is for Heading Styles (H1, H2, H3 ...). Default used if no color is selected', 'ugdsb4'),
		'id'   => 'heading_color',
		'std'  => '',
		'type' => 'color'
	);
	

	
	/*
	$options[] = array(
		'name' => __('Link Color', 'ugdsb4'),
		'desc' => __('Default used if no color is selected', 'ugdsb4'),
		'id'   => 'link_color',
		'std'  => '',
		'type' => 'color'
	);


	$options[] = array(
		'name' => __('Link:hover Color', 'ugdsb4'),
		'desc' => __('Default used if no color is selected', 'ugdsb4'),
		'id'   => 'link_hover_color',
		'std'  => '',
		'type' => 'color'
	);

    
	$options[] = array(
		'name' => __('Link:active Color', 'ugdsb4'),
		'desc' => __('Default used if no color is selected', 'ugdsb4'),
		'id'   => 'link_active_color',
		'std'  => '',
		'type' => 'color'
	);
	*/
	$options[] = array(
		'name' => __('Navigation', 'ugdsb4'),
		'type' => 'heading'
	);
	
	$options[] = array(
		'name' => __('Main Top Navigation Background Color', 'ugdsb4'),
		'desc' => __('Default used if no color is selected', 'ugdsb4'),
		'id'   => 'topnav_background_color',
		'std'  => '',
		'type' => 'color'
	);
	$options[] = array(
		'name' => __('Main Top Navigation - Link Color', 'ugdsb4'),
		'desc' => __('Default used if no color is selected', 'ugdsb4'),
		'id'   => 'topnav_link_color',
		'std'  => '',
		'type' => 'color'
	);
	
	//sidebar background
	$options[] = array(
		'name' => __('Sidebar (Right side panel) Background Color', 'ugdsb4'),
		'desc' => __('Default used if no color is selected. Choose similar color as the main top navigation background.', 'ugdsb4'),
		'id'   => 'sidebar_bg_color',
		'std'  => '',
		'type' => 'color'
	);
	$options[] = array(
		'name' => __('Sidebar (right side panel) - Header Color', 'ugdsb4'),
		'desc' => __('Default used if no color is selected', 'ugdsb4'),
		'id'   => 'sidebar_link_color',
		'std'  => '',
		'type' => 'color'
	);

	//sidebar background for BOARD PAGE
	$options[] = array(
		'name' => __('Background Color (Board Page) - Sidebar', 'ugdsb4'),
		'desc' => __('Default used if no color is selected. Choose similar color as the main top navigation background.', 'ugdsb4'),
		'id'   => 'sidebar_board_bg_color',
		'std'  => '',
		'type' => 'color'
	);
	$options[] = array(
		'name' => __('Header Color (Board Page) - Sidebar', 'ugdsb4'),
		'desc' => __('Default used if no color is selected', 'ugdsb4'),
		'id'   => 'sidebar_board_link_color',
		'std'  => '',
		'type' => 'color'
	);
	

	//sidebar background for SCHOOL PAGE
	$options[] = array(
		'name' => __('Background Color (SCHOOL Page) - Sidebar', 'ugdsb4'),
		'desc' => __('Default used if no color is selected. Choose similar color as the main top navigation background.', 'ugdsb4'),
		'id'   => 'sidebar_school_bg_color',
		'std'  => '',
		'type' => 'color'
	);
	$options[] = array(
		'name' => __('Header Color (School Page) - Sidebar', 'ugdsb4'),
		'desc' => __('Default used if no color is selected', 'ugdsb4'),
		'id'   => 'sidebar_school_link_color',
		'std'  => '',
		'type' => 'color'
	);

	//sidebar background for SPROGRAM PAGE
	$options[] = array(
		'name' => __('Background Color (Program Page) - Sidebar', 'ugdsb4'),
		'desc' => __('Default used if no color is selected. Choose similar color as the main top navigation background.', 'ugdsb4'),
		'id'   => 'sidebar_program_bg_color',
		'std'  => '',
		'type' => 'color'
	);
	$options[] = array(
		'name' => __('Header Color (Program Page) - Sidebar', 'ugdsb4'),
		'desc' => __('Default used if no color is selected', 'ugdsb4'),
		'id'   => 'sidebar_program_link_color',
		'std'  => '',
		'type' => 'color'
	);

	//sidebar background for STUDENT PAGE
	$options[] = array(
		'name' => __('Background Color (Students Page) - Sidebar', 'ugdsb4'),
		'desc' => __('Default used if no color is selected. Choose similar color as the main top navigation background.', 'ugdsb4'),
		'id'   => 'sidebar_student_bg_color',
		'std'  => '',
		'type' => 'color'
	);
	$options[] = array(
		'name' => __('Header Color (Students Page) - Sidebar', 'ugdsb4'),
		'desc' => __('Default used if no color is selected', 'ugdsb4'),
		'id'   => 'sidebar_student_link_color',
		'std'  => '',
		'type' => 'color'
	);

	//sidebar background for PARENTS PAGE
	$options[] = array(
		'name' => __('Background Color (Parents Page) - Sidebar', 'ugdsb4'),
		'desc' => __('Default used if no color is selected. Choose similar color as the main top navigation background.', 'ugdsb4'),
		'id'   => 'sidebar_parent_bg_color',
		'std'  => '',
		'type' => 'color'
	);
	$options[] = array(
		'name' => __('Header Color (Parents Page) - Sidebar', 'ugdsb4'),
		'desc' => __('Default used if no color is selected', 'ugdsb4'),
		'id'   => 'sidebar_parent_link_color',
		'std'  => '',
		'type' => 'color'
	);

	//sidebar background for COMMUNITY PAGE
	$options[] = array(
		'name' => __('Background Color (Community Page) - Sidebar', 'ugdsb4'),
		'desc' => __('Default used if no color is selected. Choose similar color as the main top navigation background.', 'ugdsb4'),
		'id'   => 'sidebar_community_bg_color',
		'std'  => '',
		'type' => 'color'
	);
	$options[] = array(
		'name' => __('Header Color (Community Page) - Sidebar', 'ugdsb4'),
		'desc' => __('Default used if no color is selected', 'ugdsb4'),
		'id'   => 'sidebar_community_link_color',
		'std'  => '',
		'type' => 'color'
	);





	//for calendar
	$options[] = array(
		'name' => __('Calendar (Homepage) Background Color', 'ugdsb4'),
		'desc' => __('Default used if no color is selected. Choose similar color as the main top navigation background.', 'ugdsb4'),
		'id'   => 'calendar_bg_color',
		'std'  => '',
		'type' => 'color'
	);
	$options[] = array(
		'name' => __('Calendar (Homepage) - Header Color', 'ugdsb4'),
		'desc' => __('Default used if no color is selected', 'ugdsb4'),
		'id'   => 'calendar_link_color',
		'std'  => '',
		'type' => 'color'
	);
	
	
	
	
	$options[] = array(
		'name' => __('Footer Background Color', 'ugdsb4'),
		'desc' => __('This is for Footer Background Color. Please choose darker shade of your favourite color, since the text will be in white. Default used if no color is selected', 'ugdsb4'),
		'id'   => 'footer_background_color',
		'std'  => '',
		'type' => 'color'
	);
	
	
	
	

	$options[] = array(
		'name' => __('Footer information', 'ugdsb4'),
		'desc' => __('Copyright text in footer ', 'ugdsb4'),
		'id'   => 'custom_footer_text',
		'std'  => '<a href="' . esc_url( home_url( '/' ) ) . '" title="' . esc_attr( get_bloginfo( 'name', 'display' ) ) . '" >' . get_bloginfo( 'name', 'display' ) . '</a>.  Part of <a href="http://www.ugdsb.on.ca/" target="_blank">Upper Grand District School Board</a>. All rights reserved.',
		'type' => 'textarea'
	);
	

	$options[] = array(
		'name' => __('Social', 'ugdsb4'),
		'type' => 'heading'
	);

	
	//Facebook
	$options[] = array(
		'name'  => __('Add full URL for your social network profiles', 'ugdsb4'),
		'desc'  => __('Facebook', 'ugdsb4'),
		'id'    => 'social_facebook',
		'std'   => '',
		'class' => 'mini',
		'type'  => 'text'
	);
	
	//Twitter
	$options[] = array(
		'name'  => __('Add full URL for your Twitter account (www.twitter.com/abc)', 'ugdsb4'),
		'desc'  => __('Twitter', 'ugdsb4'),
		'id'    => 'social_twitter',
		
		'std'   => '',
		'class' => 'mini',
		'type'  => 'text'
	);
	

	
	//Google plus
	$options[] = array(
		'id'    => 'social_google',
		'desc'  => __('Google+', 'ugdsb4'),
		'std'   => '',
		'class' => 'mini',
		'type'  => 'text'
	);
	//youtube
	$options[] = array(
		'id'    => 'social_youtube',
		'desc'  => __('Youtube', 'ugdsb4'),
		'std'   => '',
		'class' => 'mini',
		'type'  => 'text'
	);
	//linkedin
	$options[] = array(
		'id'    => 'social_linkedin',
		'desc'  => __('LinkedIn', 'ugdsb4'),
		'std'   => '',
		'class' => 'mini',
		'type'  => 'text'
	);

	$options[] = array(
		'id'    => 'social_pinterest',
		'desc'  => __('Pinterest', 'ugdsb4'),
		'std'   => '',
		'class' => 'mini',
		'type'  => 'text'
	);

	$options[] = array(
		'id'    => 'social_feed',
		'desc'  => __('RSS Feed', 'ugdsb4'),
		'std'   => '',
		'class' => 'mini',
		'type'  => 'text'
	);

	$options[] = array(
		'id'    => 'social_tumblr',
		'desc'  => __('Tumblr', 'ugdsb4'),
		'std'   => '',
		'class' => 'mini',
		'type'  => 'text'
	);

	$options[] = array(
		'id'    => 'social_flickr',
		'desc'  => __('Flickr', 'ugdsb4'),
		'std'   => '',
		'class' => 'mini',
		'type'  => 'text'
	);
	$options[] = array(
		'id'    => 'social_dribbble',
		'desc'  => __('Dribbble', 'ugdsb4'),
		'std'   => '',
		'class' => 'mini',
		'type'  => 'text'
	);

	$options[] = array(
		'id'    => 'social_skype',
		'desc'  => __('Skype', 'ugdsb4'),
		'std'   => '',
		'class' => 'mini',
		'type'  => 'text'
	);
	$options[] = array(
		'id'    => 'social_vimeo',
		'desc'  => __('Vimeo', 'ugdsb4'),
		'std'   => '',
		'class' => 'mini',
		'type'  => 'text'
	);
	
	$options[] = array(
		'id'    => 'social_instagram',
		'desc'  => __('Instagram', 'ugdsb4'),
		'std'   => '',
		'class' => 'mini',
		'type'  => 'text'
	);

	$options[] = array(
		'id'    => 'social_map',
		'desc'  => __('Map', 'ugdsb4'),
		'std'   => '',
		'class' => 'mini',
		'type'  => 'text'
	);
	$options[] = array(
		'id'    => 'social_email',
		'desc'  => __('Email', 'ugdsb4'),
		'std'   => '',
		'class' => 'mini',
		'type'  => 'text'
	);


	return $options;
}