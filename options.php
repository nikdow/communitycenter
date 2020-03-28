<?php
/**
 * A unique identifier is defined to store the options in the database and reference them from the theme.
 * By default it uses the theme name, in lowercase and without spaces, but this can be changed if needed.
 * If the identifier changes, it'll appear as if the options have been reset.
 */

function optionsframework_option_name() {

	// This gets the theme name from the stylesheet
	$themename = wp_get_theme();
	$themename = preg_replace("/\W/", "_", strtolower($themename) );

	$optionsframework_settings = get_option( 'optionsframework' );
	$optionsframework_settings['id'] = $themename;
	update_option( 'optionsframework', $optionsframework_settings );
}

/**
 * Defines an array of options that will be used to generate the settings page and be saved in the database.
 * When creating the 'id' fields, make sure to use all lowercase and no spaces.
 *
 * If you are making your theme translatable, you should replace 'rescue'
 * with the actual text domain for your theme.  Read more:
 * http://codex.wordpress.org/Function_Reference/load_theme_textdomain
 */

function optionsframework_options() {

	// Home Hero Background
	$hero_background = array(
		'image' => __('Image', 'rescue'),
		'video' => __('Video', 'rescue'),
	);

	// Test data
	$test_array = array(
		'one' => __('One', 'rescue'),
		'two' => __('Two', 'rescue'),
		'three' => __('Three', 'rescue'),
		'four' => __('Four', 'rescue'),
		'five' => __('Five', 'rescue')
	);

	// Multicheck Array
	$multicheck_array = array(
		'one' => __('French Toast', 'rescue'),
		'two' => __('Pancake', 'rescue'),
		'three' => __('Omelette', 'rescue'),
		'four' => __('Crepe', 'rescue'),
		'five' => __('Waffle', 'rescue')
	);

	// Multicheck Defaults
	$multicheck_defaults = array(
		'one' => '1',
		'five' => '1'
	);

	// Background Defaults
	$background_defaults = array(
		'color' => '',
		'image' => '',
		'repeat' => 'repeat',
		'position' => 'top center',
		'attachment'=>'scroll' );

	// Typography Defaults
	$typography_defaults = array(
		'size' => '15px',
		'face' => 'georgia',
		'style' => 'bold',
		'color' => '#bada55' );

	// Typography Options
	$typography_options = array(
		'sizes' => array( '6','12','14','16','20' ),
		'faces' => array( 'Helvetica Neue' => 'Helvetica Neue','Arial' => 'Arial' ),
		'styles' => array( 'normal' => 'Normal','bold' => 'Bold' ),
		'color' => false
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
	$imagepath =  get_template_directory_uri() . '/img/';

	$options = array();

/*----------------------------------------------------*/
/*	Header
/*----------------------------------------------------*/
	$options[] = array(
		'name' => __('Header', 'rescue'),
		'type' => 'heading');

	$options[] = array(
		'name' => __('Header Color', 'rescue'),
		'desc' => __('This will be the primary color used across the site. Default color is #599A76.', 'rescue'),
		'id' => 'header_color',
		'std' => '#599A76',
		'type' => 'color' );

	$options[] = array(
		'name' => __('Activate Sticky Navigation', 'rescue'),
		'desc' => __('', 'rescue'),
		'id' => 'sticky_nav_choice',
		'std' => '1',
		'type' => 'checkbox');

	$options[] = array(
		'name' => __('Logo Image', 'rescue'),
		'desc' => __('Upload your logo.', 'rescue'),
		'id' => 'logo_image',
		'std' => $imagepath.'logo.png',
		'type' => 'upload');

/*----------------------------------------------------*/
/*	Donation Button
/*----------------------------------------------------*/
	$options[] = array(
		'name' => __('Donation Button', 'rescue'),
		'type' => 'heading');

	$options[] = array(
		'name' => __('Activate Donation Button', 'rescue'),
		'desc' => __('', 'rescue'),
		'id' => 'button_choice',
		'std' => '1',
		'type' => 'checkbox');

	$options[] = array(
		'name' => __('Donation Button Text', 'rescue'),
		'desc' => __('Enter the donation button text.', 'rescue'),
		'id' => 'button_text',
		'std' => 'Donate',
		'type' => 'text');

	$options[] = array(
		'name' => __('Donation Button Link', 'rescue'),
		'desc' => __('Enter the where you want to link the donation button.', 'rescue'),
		'id' => 'button_link',
		'std' => '#',
		'type' => 'text');

	$options[] = array(
		'name' => __('Donation Button Color', 'rescue'),
		'desc' => __('Default color is #ffffff.', 'rescue'),
		'id' => 'donation_color',
		'std' => '#ffffff',
		'type' => 'color' );


/*----------------------------------------------------*/
/*	Home: Hero
/*----------------------------------------------------*/
	$options[] = array(
		'name' => __('Home: Hero', 'rescue'),
		'type' => 'heading');

	$options[] = array(
		'name' => __('Acivate Hero Section', 'rescue'),
		'desc' => __('', 'rescue'),
		'id' => 'home_hero_choice',
		'std' => '1',
		'type' => 'checkbox');

	$options[] = array(
		'name' => __('Background Image or Video', 'rescue'),
		'desc' => __('Select to use an image or video for the background.', 'rescue'),
		'id' => 'image_or_video',
		'std' => 'image',
		'type' => 'select',
		'options' => $hero_background);

	$options[] = array(
		'name' => __('Background Image', 'rescue'),
		'desc' => __('Set a static background image for home hero section.', 'rescue'),
		'id' => 'hero_background',
		'std' => $imagepath.'bg_home.jpg',
		'type' => 'upload');

	$options[] = array(
		'name' => __('Youtube Video ID', 'rescue'),
		'desc' => __('Enter a Youtube video ID. This ID is appended to the Youtube video URL. Example: Ul4CRfgRUsY', 'rescue'),
		'id' => 'youtube_video',
		'std' => '',
		'type' => 'text');

	$options[] = array(
		'name' => __('Vimeo Video ID', 'rescue'),
		'desc' => __('Enter a Vimeo video ID. This ID is appended to the Vimeo video URL. Example: 98037636', 'rescue'),
		'id' => 'vimeo_video',
		'std' => '',
		'type' => 'text');

	$options[] = array(
		'name' => __('Acivate Color Overlay', 'rescue'),
		'desc' => __('', 'rescue'),
		'id' => 'overlay_choice',
		'std' => '1',
		'type' => 'checkbox');

	$options[] = array(
		'name' => __('Overlay Color', 'rescue'),
		'desc' => __('Default color overlay is #66af8f.', 'rescue'),
		'id' => 'hero_color_overlay',
		'std' => '#66af8f',
		'type' => 'color' );

	$options[] = array(
		'name' => __('Color Overlay Opacity Level', 'rescue'),
		'desc' => __('Enter an opactiy level between 0-1. For example: .87', 'rescue'),
		'id' => 'hero_color_opacity',
		'std' => '0.87',
		'type' => 'text');

	/**
	 * For $settings options see:
	 * http://codex.wordpress.org/Function_Reference/wp_editor
	 *
	 * 'media_buttons' are not supported as there is no post to attach items to
	 * 'textarea_name' is set by the 'id' you choose
	 */
	$wp_editor_settings = array(
		'wpautop' => true, // Default
		'textarea_rows' => 10,
		'tinymce' => array( 'plugins' => 'wordpress' )
	);

	$options[] = array(
		'name' => __('Home Hero Content', 'rescue'),
		'desc' => __( 'Enter the content to display in the Home Hero section. Recommended plugin for shortcodes is <a href="https://rescuethemes.com/plugins/rescue-shortcodes-plugin/">Rescue Shortcodes</a>.', 'rescue'),
		'id' => 'hero_content',
		'type' => 'editor',
		'std' => '<div class="hero_icons">[rescue_animate type="slideInLeft" duration=".5s" delay="0s" iteration="1"]
[icon type="lightbulb-o" size="3x" pull="left" color="#fcfa43"]
[icon type="plus" pull="left" color="#fcfa43"]
[icon type="leaf" pull="left" color="#fcfa43"]
<span class="equals">=</span>
[/rescue_animate][rescue_animate type="fadeInRight" duration="2s" delay="1s" iteration="1"]
[icon type="heart" pull="left" color="#fcfa43"]
[/rescue_animate]</div>

[rescue_animate type="bounceInUp" duration="1s" delay="0s" iteration="1"]
<p style="text-align: center;">Lorem Ipsum Dolor Sit Amet Consectetur Elit Ipsum Dolor cupidatat habitasse minim eos mollitia quod nibh!</p>
[/rescue_animate]',
		'settings' => $wp_editor_settings );

/*----------------------------------------------------*/
/*	Home: Users
/*----------------------------------------------------*/
	$options[] = array(
		'name' => __('Home: Users', 'rescue'),
		'type' => 'heading');

	$options[] = array(
		'name' => __('Acivate Users Section', 'rescue'),
		'desc' => __('', 'rescue'),
		'id' => 'user_section_choice',
		'std' => '1',
		'type' => 'checkbox');

	$options[] = array(
		'name' => __('Section Title', 'rescue'),
		'desc' => __('Enter a title for the user home page section.', 'rescue'),
		'id' => 'home_user_title',
		'std' => 'Our Community of Advocators',
		'type' => 'text');

	$options[] = array(
		'name' => __('Exclude Users', 'rescue'),
		'desc' => __('ID of users who are not to be displayed in the home page user section separated by commas. Example: 7,52,23. <a href="http://d.pr/i/4V8m">How to locate a user\'s ID?</a>', 'rescue'),
		'id' => 'exclude_users',
		'std' => '',
		'type' => 'text');

	$options[] = array(
		'name' => __('Button Text', 'rescue'),
		'desc' => __('Enter the text for the user home page section button.', 'rescue'),
		'id' => 'home_user_button_title',
		'std' => 'Join the Discussion',
		'type' => 'text');

	$options[] = array(
		'name' => __('Button Link', 'rescue'),
		'desc' => __('Enter the link for the user home page section button.', 'rescue'),
		'id' => 'home_user_button_link',
		'std' => '',
		'type' => 'text');

/*----------------------------------------------------*/
/*	Home: Forums
/*----------------------------------------------------*/
	$options[] = array(
		'name' => __('Home: Forums', 'rescue'),
		'type' => 'heading');

	$options[] = array(
		'name' => __('Acivate Forum Section', 'rescue'),
		'desc' => __('', 'rescue'),
		'id' => 'forum_section_choice',
		'std' => '1',
		'type' => 'checkbox');

	$options[] = array(
		'name' => __('Forum Section Title', 'rescue'),
		'desc' => __('Enter the title for the forums home page section.', 'rescue'),
		'id' => 'home_forums_title',
		'std' => 'Latest from the forums',
		'type' => 'text');

	$options[] = array(
		'name' => __('Number of Forum Posts', 'rescue'),
		'desc' => __('Enter the number of forum posts to display on the home page post slider.', 'rescue'),
		'id' => 'forum_posts_num',
		'std' => '3',
		'type' => 'text');


/*----------------------------------------------------*/
/*	Home: Quote
/*----------------------------------------------------*/
	$options[] = array(
		'name' => __('Home: Quote', 'rescue'),
		'type' => 'heading');


	$options[] = array(
		'name' => __('Acivate Quote Section', 'rescue'),
		'desc' => __('', 'rescue'),
		'id' => 'quote_section_choice',
		'std' => '1',
		'type' => 'checkbox');

	$options[] = array(
		'name' => __('Background Image', 'rescue'),
		'desc' => __('Set a static background image for home quote section.', 'rescue'),
		'id' => 'quote_background',
		'std' => $imagepath.'bg_quote.jpg',
		'type' => 'upload');

	$options[] = array(
		'name' => __('Activate Color Overlay', 'rescue'),
		'desc' => __('', 'rescue'),
		'id' => 'quote_overlay_choice',
		'std' => '1',
		'type' => 'checkbox');

	$options[] = array(
		'name' => __('Overlay Color', 'rescue'),
		'desc' => __('Default color overlay is #3c90bf.', 'rescue'),
		'id' => 'quote_color_overlay',
		'std' => '#3c90bf',
		'type' => 'color' );

	$options[] = array(
		'name' => __('Color Overlay Opacity Level', 'rescue'),
		'desc' => __('Enter an opactiy level between 0-1. For example: .87', 'rescue'),
		'id' => 'quote_color_opacity',
		'std' => '0.87',
		'type' => 'text');

	/**
	 * For $settings options see:
	 * http://codex.wordpress.org/Function_Reference/wp_editor
	 *
	 * 'media_buttons' are not supported as there is no post to attach items to
	 * 'textarea_name' is set by the 'id' you choose
	 */

	$wp_editor_settings = array(
		'wpautop' => true, // Default
		'textarea_rows' => 10,
		'tinymce' => array( 'plugins' => 'wordpress' )
	);

	$options[] = array(
		'name' => __('Home Quote Content', 'rescue'),
		'desc' => __( 'Enter information to display in the home page quote section. Recommended plugin for shortcodes is <a href="https://rescuethemes.com/plugins/rescue-shortcodes-plugin">Rescue Shortcodes</a>.', 'rescue' ),
		'id' => 'quote_content',
		'type' => 'editor',
		'std' => '[rescue_animate type="fadeInUp" duration="2s" delay="0s" iteration="1"]

[rescue_spacing size="150px"]
<blockquote>
<p style="text-align: center;">"The interior joy we feel when we have done a good deed is the nourishment the soul requires."</p>
</blockquote>
<p style="text-align: center;"><cite>- Albert Schweitzer -
</cite></p>

[/rescue_animate]',
		'settings' => $wp_editor_settings );

/*----------------------------------------------------*/
/*	Home: Shop
/*----------------------------------------------------*/
	$options[] = array(
		'name' => __('Home: Shop', 'rescue'),
		'type' => 'heading');

	$options[] = array(
		'name' => __('Acivate Shop Section', 'rescue'),
		'desc' => __('', 'rescue'),
		'id' => 'shop_section_choice',
		'std' => '1',
		'type' => 'checkbox');

	$options[] = array(
		'name' => __('Shop Section Title', 'rescue'),
		'desc' => __('Enter the title for the home page shop section.', 'rescue'),
		'id' => 'home_shop_title',
		'std' => 'Shop and Support Our Cause',
		'type' => 'text');

	$options[] = array(
		'name' => __('Button Text', 'rescue'),
		'desc' => __('Enter the text for the home shop page section button.', 'rescue'),
		'id' => 'home_shop_button_title',
		'std' => 'More in our shop',
		'type' => 'text');

	$options[] = array(
		'name' => __('Shop Button Link', 'rescue'),
		'desc' => __('Enter the where you want to link the shop button.', 'rescue'),
		'id' => 'shop_link',
		'std' => '#',
		'type' => 'text');

/*----------------------------------------------------*/
/*	Footer
/*----------------------------------------------------*/
	$options[] = array(
		'name' => __('Footer', 'rescue'),
		'type' => 'heading');

	$options[] = array(
		'name' => __('Acivate Footer Section', 'rescue'),
		'desc' => __('', 'rescue'),
		'id' => 'footer_section_choice',
		'std' => '1',
		'type' => 'checkbox');

	$options[] = array(
		'name' => __('Copyright Text', 'rescue'),
		'desc' => __('Enter text for the bottom copyright section.', 'rescue'),
		'id' => 'copyright_text',
		'std' => 'Rescue Themes. All Rights Reserved.',
		'type' => 'textarea');


/*----------------------------------------------------*/
/*	Blog
/*----------------------------------------------------*/
	$options[] = array(
		'name' => __('Blog', 'rescue'),
		'type' => 'heading');

	$options[] = array(
		'name' => __('Heading', 'rescue'),
		'desc' => __('Enter the blog page header text.', 'rescue'),
		'id' => 'blog_header',
		'std' => 'Community News Center',
		'type' => 'text');

	$options[] = array(
		'name' => __('Sub-Heading', 'rescue'),
		'desc' => __('Enter the blog page sub-header text.', 'rescue'),
		'id' => 'blog_subheader',
		'std' => 'From around the globe and into your home.',
		'type' => 'text');

	$options[] = array(
		'name' => __('Background Image', 'rescue'),
		'desc' => __('Set a background image for the top of the blog page.', 'rescue'),
		'id' => 'blog_background',
		'std' => $imagepath.'bg_blog.jpg',
		'type' => 'upload');

	$options[] = array(
		'name' => __('Activate Color Overlay', 'rescue'),
		'desc' => __('', 'rescue'),
		'id' => 'blog_overlay_choice',
		'std' => '1',
		'type' => 'checkbox');

	$options[] = array(
		'name' => __('Overlay Color', 'rescue'),
		'desc' => __('Default color overlay is #66af8f.', 'rescue'),
		'id' => 'blog_color_overlay',
		'std' => '#66af8f',
		'type' => 'color' );

	$options[] = array(
		'name' => __('Color Overlay Opacity Level', 'rescue'),
		'desc' => __('Enter an opactiy level between 0-1. For example: .87', 'rescue'),
		'id' => 'blog_color_opacity',
		'std' => '0.87',
		'type' => 'text');


/*----------------------------------------------------*/
/*	Forum
/*----------------------------------------------------*/
	$options[] = array(
		'name' => __('Forum', 'rescue'),
		'type' => 'heading');

	$options[] = array(
		'name' => __('Main Title', 'rescue'),
		'desc' => __('Enter a title for your forums main page.', 'rescue'),
		'id' => 'forum_title',
		'std' => 'Community Forums',
		'type' => 'text');

	$options[] = array(
		'name' => __('Background Image', 'rescue'),
		'desc' => __('Set a background image for the top of the forum page.', 'rescue'),
		'id' => 'forum_background',
		'std' => $imagepath.'bg_blog.jpg',
		'type' => 'upload');

	$options[] = array(
		'name' => __('Activate Color Overlay', 'rescue'),
		'desc' => __('', 'rescue'),
		'id' => 'forum_overlay_choice',
		'std' => '1',
		'type' => 'checkbox');

	$options[] = array(
		'name' => __('Overlay Color', 'rescue'),
		'desc' => __('Default color overlay is #66af8f.', 'rescue'),
		'id' => 'forum_color_overlay',
		'std' => '#66af8f',
		'type' => 'color' );

	$options[] = array(
		'name' => __('Color Overlay Opacity Level', 'rescue'),
		'desc' => __('Enter an opactiy level between 0-1. For example: .87', 'rescue'),
		'id' => 'forum_color_opacity',
		'std' => '0.87',
		'type' => 'text');

/*----------------------------------------------------*/
/*	Custom Styles
/*----------------------------------------------------*/
	$options[] = array(
		'name' => __('Custom Styles', 'rescue'),
		'type' => 'heading');

	$options[] = array(
		'name' => __('Custom CSS', 'rescue'),
		'desc' => __('All default styles are located in /css/style.css but you can overide those styles by entering CSS here. It\'s recommended that a <a href="http://codex.wordpress.org/Child_Themes">child theme</a> is used but if that isn\'t possible, add your custom styles here.' , 'rescue'),
		'id' => 'custom_css',
		'type' => 'textarea');
	
/*----------------------------------------------------*/
/*	End of options
/*----------------------------------------------------*/

	return $options;
}