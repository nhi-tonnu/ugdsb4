<?php
//define ('CSSMEU_VERSION', '5.0.0');

if ( ! isset( $content_width ) ) {
	$content_width = 740; /* pixels */
}

/**
 * Set the content width for full width pages with no sidebar.
 */
function ugdsb4_content_width() {
  if ( is_page_template( 'page-fullwidth.php' ) || is_page_template( 'front-page.php' ) ) {
    global $content_width;
    $content_width = 1140; /* pixels */
  }
}
add_action( 'template_redirect', 'ugdsb4_content_width' );

if ( ! function_exists( 'ugdsb4_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function ugdsb4_setup() {

	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on _s, use a find and replace
	 * to change 'unite' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'ugdsb4', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );
	
	// Enable support for Post Formats.
	//add_theme_support( 'post-formats', array( 'aside', 'image', 'video', 'quote', 'link' ) );
	//add_theme_support( 'post-formats', array( 'image' ) );

	// Enable support for Featured Images (Post Thumbnails) in pages and posts, and declare sizes.
    //add_theme_support( 'post-thumbnails', array( 'post', 'page' ) );
  	add_theme_support('post-thumbnails');
  	set_post_thumbnail_size( 150, 9999, false);
	add_image_size('tab-small', 165, 9999);
	add_image_size('ugdsb4-featured', 767, 366, false);/*big promo, image size of 767px x 366px*/
  	add_image_size('spotlight-schools',200, 9999, false);


  	//add except for pages
  	add_post_type_support( 'page', 'excerpt' );


	
	// Add theme support for document Title tag
	add_theme_support( 'title-tag' );

	// Add theme support for custom CSS in the TinyMCE visual editor
	//Nhi March 29, 2016 force tinymce to show in visual setting first
	add_filter( 'wp_default_editor', create_function('', 'return "tinymce";') );
	
	//Nhi added July11, 2019 to disable Gutenberg editor
	add_filter('use_block_editor_for_post', '__return_false');
	
	//Nhi added Jan1, 2022 for remove Widget block Editor
	add_filter( 'use_widgets_block_editor', '__return_false' );

	

	/*
   * Switch default core markup for search form, comment form, and comments
   * to output valid HTML5.
   */
	add_theme_support( 'html5', array(
			'search-form', 'comment-form', 'comment-list',
	) );
	
	// register navigation
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'ugdsb4' ),
    	'board_menu' => __( 'Board Menu', 'ugdsb4' ),
    	'school_menu' => __( 'School Menu', 'ugdsb4' ),
    	'planning_menu' => __( 'Planning Menu', 'ugdsb4' ),
    	'community_menu' => __( 'Community Menu', 'ugdsb4' ),
    	'student_menu' => __( 'Students Menu', 'ugdsb4' ),
    	'parent_menu' => __( 'Parents Menu', 'ugdsb4' ),
    	'program_menu' => __( 'Program Menu', 'ugdsb4' ),
    	'career_menu' => __( 'Career Menu', 'ugdsb4' ),
		'esl_menu' => __( 'ESL (ContEd) Menu', 'ugdsb4' ),
		'esl2_menu' => __( 'ESL (Board page) Menu', 'ugdsb4' ),
		'reopening_menu' => __( 'Reopening Schools Menu', 'ugdsb4' ), //new menu July21,2020
		'pathw_menu' => __( 'Pathways Menu', 'ugdsb4' ), //new Pathways page June 23, 2023
		'equity_menu' => __( 'Equity-Inclusive Menu', 'ugdsb4' ), //new menu Jan13,2022
		'other_menu' => __( 'Others Menu', 'ugdsb4' ), //new menu July21,2020
	) );
}
endif; //ugdsb4_setup
add_action('after_setup_theme', 'ugdsb4_setup');



function ugdsb4_scripts() {
	//wp_enqueue_style( 'ugdsb4-fonts', 'https://fonts.googleapis.com/css?family=Open+Sans:300,400,700,600|Amarante|Crimson+Text|Open+Sans+Condensed|Roboto+Slab|Loster|Oxygen|Fenix|Oswald|Merriweather', false);

	wp_enqueue_script( 'smoothup', get_template_directory_uri() . '/js/smoothscroll.js', array( 'jquery' ), '',  true );

}//end
add_action( 'wp_enqueue_scripts', 'ugdsb4_scripts' );



/**
*	custom background
*
*/
function ugdsb4_custom_background() {
    $args = array(
        'default-color' => 'FFFFFF',
    );
 
    $args = apply_filters( 'ugdsb4_custom_background_args', $args );
 
    if ( function_exists( 'wp_get_theme' ) ) {
        add_theme_support( 'custom-background', $args );
    } else {
        define( 'BACKGROUND_COLOR', $args['default-color'] );
        define( 'BACKGROUND_IMAGE', $args['default-image'] );
        add_custom_background();
    }
}
add_action( 'after_setup_theme', 'ugdsb4_custom_background' );



//to add https onto the function get_theme_mod
function get_theme_mod_img($mod_name){
   return str_replace("http://", "https://", get_theme_mod($mod_name));
}

/**********************************
*Add iframe
***********************************************************/
function add_iframe($initArray) {
    $initArray['extended_valid_elements'] = "iframe[id|class|title|style|align|frameborder|height|longdesc|marginheight|marginwidth|name|scrolling|src|width]";
    return $initArray;
}
add_filter('tiny_mce_before_init', 'add_iframe');



/**
 * Register widgetized area and update sidebar with default widgets.
 */

function ugdsb4_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Page Sidebar (Right)', 'ugdsb4' ),
		'id'            => 'sidebar-right',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	
	register_sidebar( array(
		'name'          => __( 'Page Sidebar (Left)', 'ugdsb4' ),
		'id'            => 'sidebar-left',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	
  
  register_sidebar(array(
		'id'            => 'sidebar-home',
		'name'          => 'Homepage Sidebar',
		'description'   => 'Used only on the homepage page template.',
		'before_widget' => '<div id="%1$s" class="sidebar-widget">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
  ));
	register_sidebar(array(
		'id'            => 'sidebar-council',
		'name'          => 'Board Page Widget',
		'description'   => 'Used only on the Board Page.',
		'before_widget' => '<div class="sidebar-widget">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
  	));

  register_sidebar(array(
    'id'            => 'sidebar-schools',
    'name'          => 'Schools Page Widget',
    'description'   => 'Used only on the Schools Page.',
    'before_widget' => '<div class="sidebar-widget">',
    'after_widget'  => '</div>',
    'before_title'  => '<h3 class="widget-title">',
    'after_title'   => '</h3>',
    ));

    /*programs*/
     register_sidebar(array(
    'id'            => 'sidebar-programs',
    'name'          => 'Programs Page Widget',
    'description'   => 'Used only on the Programs Page.',
    'before_widget' => '<div class="sidebar-widget">',
    'after_widget'  => '</div>',
    'before_title'  => '<h3 class="widget-title">',
    'after_title'   => '</h3>',
    ));

     /*parents*/
     register_sidebar(array(
    'id'            => 'sidebar-parents',
    'name'          => 'Parents Page Widget',
    'description'   => 'Used only on the Parents Page.',
    'before_widget' => '<div class="sidebar-widget">',
    'after_widget'  => '</div>',
    'before_title'  => '<h3 class="widget-title">',
    'after_title'   => '</h3>',
    ));
     /*students*/
     register_sidebar(array(
    'id'            => 'sidebar-students',
    'name'          => 'Students Page Widget',
    'description'   => 'Used only on the Students Page.',
    'before_widget' => '<div class="sidebar-widget">',
    'after_widget'  => '</div>',
    'before_title'  => '<h3 class="widget-title">',
    'after_title'   => '</h3>',
    ));

     /*Community*/
     register_sidebar(array(
    'id'            => 'sidebar-community',
    'name'          => 'Community Page Widget',
    'description'   => 'Used only on the Community Page.',
    'before_widget' => '<div class="sidebar-widget">',
    'after_widget'  => '</div>',
    'before_title'  => '<h3 class="widget-title">',
    'after_title'   => '</h3>',
    ));

     /*Planning*/
     register_sidebar(array(
    'id'            => 'sidebar-planning',
    'name'          => 'Planning Page Widget',
    'description'   => 'Used only on the Planning Page.',
    'before_widget' => '<div class="sidebar-widget">',
    'after_widget'  => '</div>',
    'before_title'  => '<h3 class="widget-title">',
    'after_title'   => '</h3>',
    ));

     /*career*/
      register_sidebar(array(
    'id'            => 'sidebar-career',
    'name'          => 'Career Page Widget',
    'description'   => 'Used only on the Careers Page.',
    'before_widget' => '<div class="sidebar-widget">',
    'after_widget'  => '</div>',
    'before_title'  => '<h3 class="widget-title">',
    'after_title'   => '</h3>',
    ));

	 /*reopening schools*/
      register_sidebar(array(
    'id'            => 'sidebar-reopening',
    'name'          => 'Reopening School Page Widget',
    'description'   => 'Used only on the Reopening Page.',
    'before_widget' => '<div class="sidebar-widget">',
    'after_widget'  => '</div>',
    'before_title'  => '<h3 class="widget-title">',
    'after_title'   => '</h3>',
    ));
	
	 /*Pathways*/
      register_sidebar(array(
    'id'            => 'sidebar-pathw',
    'name'          => 'Pathways Page Widget',
    'description'   => 'Used only on the Pathways page.',
    'before_widget' => '<div class="sidebar-widget">',
    'after_widget'  => '</div>',
    'before_title'  => '<h3 class="widget-title">',
    'after_title'   => '</h3>',
    ));
	
	/*Equity and Inclusive schools*/
      register_sidebar(array(
    'id'            => 'sidebar-equity',
    'name'          => 'Equitable and Inclusive Page Widget',
    'description'   => 'Used only on the Equity Page.',
    'before_widget' => '<div class="sidebar-widget">',
    'after_widget'  => '</div>',
    'before_title'  => '<h3 class="widget-title">',
    'after_title'   => '</h3>',
    ));
	
	/*ESL (Board)page*/
	 register_sidebar(array(
    'id'            => 'sidebar-esl2',
    'name'          => 'ESL (Board) Page Widget',
    'description'   => 'Used only on Board Page, section ESL',
    'before_widget' => '<div class="sidebar-widget">',
    'after_widget'  => '</div>',
    'before_title'  => '<h3 class="widget-title">',
    'after_title'   => '</h3>',
    ));
	
	
	 /*other page*/
      register_sidebar(array(
    'id'            => 'sidebar-other',
    'name'          => 'Other Page Widget',
    'description'   => 'Used only on the Other Page (different from anything).',
    'before_widget' => '<div class="sidebar-widget">',
    'after_widget'  => '</div>',
    'before_title'  => '<h3 class="widget-title">',
    'after_title'   => '</h3>',
    ));

	/*ESL page*/
	 register_sidebar(array(
    'id'            => 'sidebar-esl',
    'name'          => 'ContEd ESL Page Widget',
    'description'   => 'Used only on the Continuing Education Page.',
    'before_widget' => '<div class="sidebar-widget">',
    'after_widget'  => '</div>',
    'before_title'  => '<h3 class="widget-title">',
    'after_title'   => '</h3>',
    ));
	
	/*ContEd Course Guide - Guelph*/
	 register_sidebar(array(
    'id'            => 'sidebar-cont-guelph',
    'name'          => 'ContEd Interest & Leisure Page (Guelph) Widget',
    'description'   => 'Used only on the Continuing Education Page.',
    'before_widget' => '<div class="sidebar-widget">',
    'after_widget'  => '</div>',
    'before_title'  => '<h3 class="widget-title">',
    'after_title'   => '</h3>',
    ));
	
	/*ContEd Course Guide - North*/
	 register_sidebar(array(
    'id'            => 'sidebar-cont-north',
    'name'          => 'ContEd Interest & Leisure Page (North) Widget',
    'description'   => 'Used only on the Continuing Education Page.',
    'before_widget' => '<div class="sidebar-widget">',
    'after_widget'  => '</div>',
    'before_title'  => '<h3 class="widget-title">',
    'after_title'   => '</h3>',
    ));
	
	/*ContEd Course Guide - Dufferin*/
	 register_sidebar(array(
    'id'            => 'sidebar-cont-dufferin',
    'name'          => 'ContEd Interest & Leisure Page (Dufferin) Widget',
    'description'   => 'Used only on the Continuing Education Page.',
    'before_widget' => '<div class="sidebar-widget">',
    'after_widget'  => '</div>',
    'before_title'  => '<h3 class="widget-title">',
    'after_title'   => '</h3>',
    ));
	
	

  	register_sidebar(array(
		'id'            => 'sidebar-footer',
		'name'          => 'Footer Widget (Right)',
		'description'   => 'Used only on the Footer.',
		'before_widget' => '<div id="%1$s" class="footer-widget">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2>',
		'after_title'   => '</h2>',
  	));
    register_sidebar(array(
    'id'            => 'sidebar-footer2',
    'name'          => 'Footer Widget (Left)',
    'description'   => 'Used only on the Footer.',
    'before_widget' => '<div id="%1$s" class="footer-widget">',
    'after_widget'  => '</div>',
    'before_title'  => '<h2>',
    'after_title'   => '</h2>',
    ));
    register_sidebar(array(
    'id'            => 'sidebar-footer3',
    'name'          => 'Footer Widget (Middle)',
    'description'   => 'Used only on the Footer.',
    'before_widget' => '<div id="%1$s" class="footer-widget">',
    'after_widget'  => '</div>',
    'before_title'  => '<h2>',
    'after_title'   => '</h2>',
    ));
}
add_action( 'widgets_init', 'ugdsb4_widgets_init' );

// Implement Custom Header features.
// http://codex.wordpress.org/Custom_Headers
//require get_template_directory() . '/inc/custom-header.php';
$custom_header_options = array(
  	'width'                  => 1170,
  	'flex-width'             => false,
  	'height'                 => 250,
  	'flex-height'            => false,
  	'default-image'        => get_template_directory_uri() . '/images/header.jpg',
  	'default-image'          => '',
 	'uploads'                => true,
 	'random-default'         => false,
 	'default-text-color'     => '',
 	'header-text'            => true,
 	'wp-head-callback'       => '',
 	'admin-head-callback'    => '',
  	'admin-preview-callback' => '',
);
add_theme_support('custom-header', $custom_header_options);

/***********************************************************
 * Loads the Options Panel
 *
 * If you're loading from a child theme use stylesheet_directory
 * instead of template_directory
 **********************************************************/

define( 'OPTIONS_FRAMEWORK_DIRECTORY', get_template_directory_uri() . '/inc/admin/' );
require_once dirname( __FILE__ ) . '/inc/admin/options-framework.php';
// Loads options.php from child or parent theme
$optionsfile = locate_template( 'options.php' );
load_template( $optionsfile );

/****************************************************************
*           the_breadcrumb
******************************************************************/
function the_breadcrumb() {
  global $post;
  echo '<div class="container-breadcrumb">';
  echo '<ol class="breadcrumb">';
  if (!is_front_page()) {
    echo '<li>';
    echo '<a href="';
    echo get_option('home');
    echo '">';
    echo 'Home';
    echo '</a>';
    echo '</li>';
    if (is_single()) {
      echo '<li><a href="'.ugdsb4_posts_page_url().'">News</a></li>';
      echo '<li>';
      the_title();
      echo '</li>';
    } elseif (is_page()) {
      if($post->post_parent){
        $anc = get_post_ancestors( $post->ID );
        $title = get_the_title();
        $output = '';
        foreach ( $anc as $ancestor ) {
          $output = '<li><a href="'.get_permalink($ancestor).'" title="'.get_the_title($ancestor).'">'.get_the_title($ancestor).'</a></li>'.$output;
        }
        echo $output;
        echo '<li>'.$title.'</li>';
      } else {
        echo '<li>'.get_the_title().'</li>';
      }
    } elseif (is_home()) {
      echo '<li>News &amp; Announcements</li>';
    }
  }
  elseif (is_tag()) {single_tag_title();}
  elseif (is_category()) {echo"<li>"; the_category(); echo'</li>';}
  elseif (is_day()) {echo"<li>Archive for "; the_time('F jS, Y'); echo'</li>';}
  elseif (is_month()) {echo"<li>Archive for "; the_time('F, Y'); echo'</li>';}
  elseif (is_year()) {echo"<li>Archive for "; the_time('Y'); echo'</li>';}
  elseif (is_author()) {echo"<li>Author Archive"; echo'</li>';}
  elseif (isset($_GET['paged']) && !empty($_GET['paged'])) {echo "<li>Blog Archives"; echo'</li>';}
  elseif (is_search()) {echo"<li>Search Results"; echo'</li>';}
  echo '</ol>';
  echo '</div>';
}
function ugdsb4_posts_page_url() {
  if (get_option('show_on_front') == 'page') {
    return get_permalink(get_option('page_for_posts'));
  } else {
    return get_bloginfo('url');
  }
}

//add search
function ugdsb4_wpsearch( $form ) {
    $form = '<form method="get" class="form-search" action="' . home_url( '/' ) . '">
  <div class="row">
    <div class="col-lg-12">
      <div class="input-group">
        <input type="text" class="form-control search-query" value="' . get_search_query() . '" name="s" id="s" placeholder="'. esc_attr__('Search...','ugdsb4') .'">
        <span class="input-group-btn">
          <button type="submit" class="btn btn-default" name="submit" id="searchsubmit" value="Go"><span class="glyphicon glyphicon-search"></span></button>
        </span>
      </div>
    </div>
  </div>
</form>';
    return $form;
} 
add_filter( 'get_search_form', 'ugdsb4_wpsearch' );


//body class
function ugdsb4_body_classes( $classes ) {
	// Adds a class of group-blog to blogs with more than 1 published author.
	if ( is_multi_author() ) {
		$classes[] = 'group-blog';
	}

	return $classes;
}
add_filter( 'body_class', 'ugdsb4_body_classes' );




//Bootstrap navigation
require_once(get_template_directory().'/inc/wp_bootstrap_navwalker.php');
//require_once(get_template_directory().'/inc/yamm-nav-walker.php');


//adding logo
require get_template_directory() . '/inc/customizer.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

// Custom template tags for this theme.
require get_template_directory() . '/inc/template-tags.php';

//to hide the admin bar from the theme
add_filter('show_admin_bar', '__return_false');

/**
 * Filter the except length to 100 characters.
 *
 * @param int $length Excerpt length.
 * @return int (Maybe) modified excerpt length.
 */
function ugdsb4_custom_excerpt_length( $length ) {
    return 50;
}
add_filter( 'excerpt_length', 'ugdsb4_custom_excerpt_length', 999 );



/******************************************************************
*  Function to display a teaser of Board news
*****************************************************************/
function break_text($text, $length){

    if(strlen($text)<$length+10) return $text;//don't cut if too short

    $break_pos = strpos($text, ' ', $length);//find next space after desired length
    $visible = substr($text, 0, $break_pos);
    return $visible . " […]";
} 


/*********************************limit the display of post/page content*******************
*
**************************************************************************************/
function content($limit) {
  global $post;
  $content = explode(' ', get_the_content(), $limit);
  if (count($content)>= $limit) {
    array_pop($content);	
    //$content = implode(" ",$content).' ... <a href="'. get_permalink($post->ID) . '">Read more</a>';
  	$content = implode(" ",$content);
  	$content .= " ...";
  	$content .= '<p class="readmore"><a href="'. get_permalink($post->ID) . '">Read more about <cite>'. get_the_title($post->ID) .'</cite> &#187;</a></p>';
	
  }else {
    $content = implode(" ",$content);
  }	
  $content = preg_replace('/\[.+\]/','', $content);
  $content = apply_filters('the_content', $content); 
  $content = str_replace(']]>', ']]&gt;', $content);
  return $content;
}//end

/****************************************************************************
*   display URL home url
****************************************************************************/
function ugdsb4_home_url(){
    $parsed_url = parse_url(site_url());
    $host = explode('.', $parsed_url['host']);
    $site = $parsed_url['path'];
    $sitepath = trim($site, '/');
  
    $url_4_solar = '';
  
    switch($sitepath){
      case "kindergarten":
        $url_4_solar = "https://www.ugdsb.ca";
        break;
      case "continuing-education":
        $url_4_solar = "https://www.ugdsb.ca";
        break;

      default: 
        $url_4_solar = "https://www.ugdsb.ca";
        break;
    }

    return $url_4_solar; 
}//end

/***************************************************************************
*     big promo page, category id is 9
***************************************************************************/
function ugdsb_big_promo(){
    global $switched;
    switch_to_blog(1); //switched to blog id 1
    // Get latest Post
    $latest_posts = get_posts('category=9&posts_per_page=1');
    $cnt =count($latest_posts);
   

    if($cnt != 0){

        foreach($latest_posts as $post) : setup_postdata($post);
            
            echo "<div class='col-md-8 col-sm-7 hidden-xs' id='bigpromo-pic'>";
			echo "<div id='bigpromo-pic-div'>";
            echo get_the_post_thumbnail( $post->ID,'ugdsb4-featured', array( 'loading'=>'lazy', 'class' => 'single-featured' ));
            //echo get_the_post_thumbnail($post->ID, array(767,366)); 
            echo "</div>";
			echo "</div>";
            echo "<div class='col-md-4 col-sm-5 col-xs-12'>";
            echo "<h2>";
            //echo "<a href='".$post->guid."' >";
            echo $post->post_title."</h2>";
            $content = break_text(get_the_content(), 370);

            //echo "<p class='promo'>".$content."</p>";
            echo $content;
            //echo $post->post_content;        
            echo "</div>";          
        endforeach; 
    }//if there are some posts then display   

    restore_current_blog(); //switched back to main site 
    wp_reset_postdata();
}
/*****************************************************************************
*       SPOTLIGHT ON SCHOOLS
*     spotlight category ID is 8
********************************************************************************/
function ugdsb_spotlight_on_schools(){

    global $switched;
    switch_to_blog(1); //switched to blog id 1
    // Get latest Post
    //$latest_posts = get_posts('category=8&posts_per_page=1');
    $url_address = home_url('/').'blog/category/spotlight-on-schools';
    $args = array(
            /*'category_name' => 'spotlight-on-schools',*/
            'cat' => 8,
            'posts_per_page' => 1,
            );
    $post = new WP_Query($args);

    $cnt =count($post);

    if($cnt != 0){
        echo "<div class='row'>";
        echo "<div id='spotlight'>";
        //foreach($latest_posts as $post) : setup_postdata($post);
        while($post->have_posts()) : $post->the_post();

            echo "<h2><span class='glyphicon glyphicon-star-empty' style='padding-top:5px;''></span> Spotlight on schools</h2>";
            echo "<div class='home-div'><h3><a href='";
            echo get_permalink()."' >";
            echo the_title()."</a></h3>";
            
            //the_post_thumbnail('spotlight-schools', array( 'class' => 'text-wrap-left'));
            
			if(has_post_thumbnail()){
                the_post_thumbnail('spotlight-schools', array('loading' => 'lazy', 'class' => 'text-wrap-right hidden-xs'));
            }


            if(has_excerpt()){
                  echo "<p>".the_excerpt()."</p>";
            }else{
                  echo "<p>".break_text(get_the_content(),260)."</p>";   
            }
            echo "</div>";
        //endforeach; 
        endwhile;
        echo "<div class='view-all-div'><span class='glyphicon glyphicon-share-alt pull-right pad-left'></span> <a href='".$url_address."'>View All Spotlights</a></div>";
        echo "</div>"; //end spotlight content

        echo "</div>"; 
    }//if there are some posts then display   
    wp_reset_postdata();
    restore_current_blog(); //switched back to main site 
}



/*************************************************************************
*               EMERGENCY FOR BOARD ONLY
*Get the posts/news from main site, blogID is 1, 
* Category ID for Emergency (board only) is BlogID 11, Emergency (School only) is ID = 10
*************************************************************************/
function ugdsb_display_emergency_2(){
  
    global $switched;
    switch_to_blog(1); //switched to blog id 1
    // Get latest Post
    $latest_posts = get_posts('category=11&posts_per_page=1');
    $cnt =count($latest_posts);
  
   if($cnt != 0){
        foreach($latest_posts as $post) : setup_postdata($post);
            echo "<div class='emergency'>";

            echo "<h3>";
            echo "<span class='glyphicon glyphicon-warning-sign'></span> ";
            echo $post->post_title."</h3>";
            $content = get_the_content();
            /*display text only, strip all images tag*/
            $content = preg_replace('/(<)([img])(\w+)([^>]*>)/', "", $content);
            $content = apply_filters('the_content', $content);
            $content = str_replace(']]>', ']]&gt;', $content);
            echo $content;
            
            //echo $post->post_content;        
            echo "</div>";          
        endforeach; 
    }//if there are some posts then display   

    restore_current_blog(); //switched back to main site 
}//end function

/********************
* DISPLAY SOME NEWS OTHER THAN EMERGENCY
*  category ID is 83 (newsFeed)
*********************/
function ugdsb_display_homenews(){
  
    global $switched;
    switch_to_blog(1); //switched to blog id 1
    // Get latest Post
    $latest_posts = get_posts('category=83&posts_per_page=1');
    $cnt =count($latest_posts);
  
   if($cnt != 0){
        foreach($latest_posts as $post) : setup_postdata($post);
            echo "<div class='newshome-div'>";
			//echo "<div class='emergency'>";
            echo "<h3>";
           // echo "<span class='glyphicon glyphicon-warning-sign'></span> ";
            echo $post->post_title."</h3>";
            $content = get_the_content();
            /*display text only, strip all images tag*/
            $content = preg_replace('/(<)([img])(\w+)([^>]*>)/', "", $content);
            $content = apply_filters('the_content', $content);
            $content = str_replace(']]>', ']]&gt;', $content);
            echo $content;
            
            //echo $post->post_content;        
            echo "</div>";          
        endforeach; 
    }//if there are some posts then display   

    restore_current_blog(); //switched back to main site 
}//end function


/************************************************
*	shortcode for adding Google Drive
*************************************************/
function gdrive_shortcode( $atts, $content = null ) {
return '<div class="ifr-environment" style="position:relative;height:0;overflow:hidden;padding-bottom:76.25%;padding-top:30px;"><iframe src="https://drive.google.com/embeddedfolderview?id=' . $content . '#grid" frameborder="0" style="position:absolute;width:100%;height:100%;top: 0;left: 0;overflow:hidden;" width="100%" height="2200" scrolling="yes"> </iframe></div>';
}
add_shortcode( 'gdrive', 'gdrive_shortcode' );

/***********************************************
*
*	short code for display a special page, listing elementary schools 
*	and secondary schools with their corresponding staff list page
**********************************************/
function ugdsb_elem_staff_sites() {
$args = array('site__not_in' => array(1,83,84,86,87,88,89,90,91,92,93,94,95,97,98,100,101,103,104,105,
									63,64,66,67,68,69,70,71,72,73,74),
				'orderby' => 'path',
				'order' => 'ASC'
			);

$subsites = get_sites($args); //creates variable using get_sites
if ( ! empty ( $subsites ) ) {

$html = ''; //sets up class
$html .= '<ul>';
foreach( $subsites as $subsite ) {
$subsite_id = $subsite->blog_id; //finds sites by id
$subsite_name = get_blog_details( $subsite_id )->blogname; //creates variable for site name
$subsite_link = get_blog_details( $subsite_id )->siteurl.'/staff'; //creates variable for site url
$html .= '<li class="site-' . $subsite_id . '"><a href="' . $subsite_link . '" target=\"_blank\">' . $subsite_name . '</a></li>'; 
sort($html);
}
$html .= '</ul>';
return $html; //returns the list
}//if
}
add_shortcode('ugdsb_elem_stafflist', 'ugdsb_elem_staff_sites'); //calls function and sets up

//list secondary schools with their STAFF List page
function ugdsb_secondary_staff_sites() {
$args = array(	
				/*'site__not_in' => array(1,83,84,86,87,88,89,90,91,92,93,94,95,97,98,100,101), //program site*/
				'site__in' => array(63,64,66,67,68,69,70,71,72,73,74,103),						
				'orderby' => 'path',
				'order' => 'ASC'
			);

$subsites = get_sites($args); //creates variable using get_sites
if ( ! empty ( $subsites ) ) {

$html = ''; //sets up class
$html .= '<ul>';
foreach( $subsites as $subsite ) {
$subsite_id = $subsite->blog_id; //finds sites by id
$subsite_name = get_blog_details( $subsite_id )->blogname; //creates variable for site name
$subsite_link = get_blog_details( $subsite_id )->siteurl.'/staff'; //creates variable for site url
$html .= '<li class="site-' . $subsite_id . '"><a href="' . $subsite_link . '" target=\"_blank\">' . $subsite_name . '</a></li>'; 
sort($html);
}
$html .= '</ul>';
return $html; //returns the list
}//if
}
add_shortcode('ugdsb_secondary_stafflist', 'ugdsb_secondary_staff_sites'); //calls function and sets up

/*************************************************************************************8
*		shortcode for displaying lists of schools (elementary or secondary)
*
***************************************************************************************/
function ugdsb_elem_sites() {
$args = array('site__not_in' => array(1,83,84,86,87,88,89,90,91,92,93,94,95,97,98,100,101,/*program*/
									63,64,66,67,68,69,70,71,72,73,74,103),
				'orderby' => 'path',
				'order' => 'ASC'
			);

$subsites = get_sites($args); //creates variable using get_sites
if ( ! empty ( $subsites ) ) {

$html = ''; //sets up class
$html .= '<ul>';
foreach( $subsites as $subsite ) {
$subsite_id = $subsite->blog_id; //finds sites by id
$subsite_name = get_blog_details( $subsite_id )->blogname; //creates variable for site name
$subsite_link = get_blog_details( $subsite_id )->siteurl; //creates variable for site url
$html .= '<li class="site-' . $subsite_id . '"><a href="' . $subsite_link . '" target=\"_blank\">' . $subsite_name . '</a></li>'; 
sort($html);
}
$html .= '</ul>';
return $html; //returns the list
}//if
}
add_shortcode('ugdsb_elem_list', 'ugdsb_elem_sites'); //calls function and sets up

//list secondary schools with their STAFF List page
function ugdsb_secondary_sites() {
$args = array(	
				/*'site__not_in' => array(1,83,84,86,87,88,89,90,91,92,93,94,95,97,98,100,101), //program site*/
				'site__in' => array(63,64,66,67,68,69,70,71,72,73,74),						
				'orderby' => 'path',
				'order' => 'ASC'
			);

$subsites = get_sites($args); //creates variable using get_sites
if ( ! empty ( $subsites ) ) {

$html = ''; //sets up class
$html .= '<ul>';
foreach( $subsites as $subsite ) {
$subsite_id = $subsite->blog_id; //finds sites by id
$subsite_name = get_blog_details( $subsite_id )->blogname; //creates variable for site name
$subsite_link = get_blog_details( $subsite_id )->siteurl; //creates variable for site url
$html .= '<li class="site-' . $subsite_id . '"><a href="' . $subsite_link . '" target=\"_blank\">' . $subsite_name . '</a></li>'; 
sort($html);
}
$html .= '</ul>';
return $html; //returns the list
}//if
}
add_shortcode('ugdsb_secondary_list', 'ugdsb_secondary_sites'); //calls function and sets up



/************************************* short-code for BOT **********************************/
function ugdsb_faq_bot_code(){

$html = '';

$html .="<script src='https://www.gstatic.com/dialogflow-console/fast/messenger/bootstrap.js?v=1'></script>";
$html .="<df-messenger
  intent=\"WELCOME\"
  chat-title=\"Backtoschool-Parents\"
  agent-id=\"1e7f1c36-a636-48ef-95bd-4de3ddb10f1b\"
  language-code=\"en\"
  chat-icon=\"https://storage.googleapis.com/upper-grand-prod-logo/UGDSB_logo_ver1-white-no-text.png\"></df-messenger>";

return $html;
}
add_shortcode('ugdsb_faq_bot', 'ugdsb_faq_bot_code'); //calls function and sets up


// Auto Add Image Attributes From Image Filename
function abl_mc_auto_image_attributes( $post_ID ) {
	$attachment = get_post( $post_ID );
	$attachment_title = $attachment->post_title;
	$attachment_title = str_replace( '-', ' ', $attachment_title ); // Hyphen Removal
	$attachment_title = ucwords( $attachment_title ); // Capitalize First Word
	$uploaded_image = array();
	$uploaded_image['ID'] = $post_ID;
	$uploaded_image['post_title'] = $attachment_title; // Image Title
	//$uploaded_image['post_excerpt'] = $attachment_title; // Image Caption
	$uploaded_image['post_content'] = $attachment_title; // Image Description
	update_post_meta( $post_ID, '_wp_attachment_image_alt', $attachment_title ); // Image Alt Text
	wp_update_post( $uploaded_image );
}
add_action( 'add_attachment', 'abl_mc_auto_image_attributes' );


/****** WP Job Manager *****/
// This will make sure expired jobs are deleted after XX days
add_filter( 'job_manager_delete_expired_jobs', '__return_true' );

// The default is 30 days, but you can change this with the following
add_filter( 'job_manager_delete_expired_jobs_days', 'change_job_manager_delete_expired_jobs_days' );

function change_job_manager_delete_expired_jobs_days() {
   return 3; // change this to the number of days you desired
}


//**********************************************************************
/*			Dashboard customization
/*************************************************************************/
function isa_disable_dashboard_widgets() {
	
  remove_meta_box('dashboard_quick_press','dashboard','side'); //Quick Press widget
  remove_meta_box('dashboard_recent_drafts','dashboard','side'); //Recent Drafts
  remove_meta_box('dashboard_primary','dashboard','side'); //WordPress.com Blog
  remove_meta_box('dashboard_secondary','dashboard','side'); //Other WordPress News
  remove_meta_box('dashboard_incoming_links','dashboard','normal'); //Incoming Links
  remove_meta_box('dashboard_plugins','dashboard','normal'); //Plugins
  remove_meta_box('dashboard_recent_comments','dashboard','normal'); //Recent Comments
  //remove_meta_box('dashboard_right_now','dashboard', 'normal'); //Right Now or At a Glance
  //remove_meta_box('rg_forms_dashboard','dashboard','normal'); //Gravity Forms
  //remove_meta_box('icl_dashboard_widget','dashboard','normal'); //Multi Language Plugin
  remove_meta_box('dashboard_activity','dashboard', 'normal'); //Activity
  remove_action('welcome_panel','wp_welcome_panel');
	
}
add_action('admin_menu', 'isa_disable_dashboard_widgets');


// Defer Javascripts
// Defer jQuery Parsing using the HTML5 defer property
add_filter( 'script_loader_tag', 'wsds_defer_scripts', 10, 3 );
function wsds_defer_scripts( $tag, $handle, $src ) {

	// The handles of the enqueued scripts we want to defer
	$defer_scripts = array( 
		'thickbox',
		'contact-form-7',
		'wpsm_tabs_r_bootstrap-js-front',
		'smoothup',
		'cssmenu-scripts',
		'do-etfw-twitter-widgets',
		'simcal-qtip',
		'simcal-fullcal-moment',
		'simcal-moment-timezone',
		'simcal-default-calendar',
		'google-maps',
		'ubermenu',
		'simplecalendar-imagesloaded',
	);

    if ( in_array( $handle, $defer_scripts ) ) {
        return '<script src="' . $src . '" defer="defer" type="text/javascript"></script>' . "\n";
    }
    
    return $tag;
}

/*function defer_parsing_of_js( $url ) {
    if ( is_user_logged_in() ) return $url; //don't break WP Admin
    if ( FALSE === strpos( $url, '.js' ) ) return $url;
    if ( strpos( $url, 'jquery.js' ) ) return $url;
    return str_replace( ' src', ' defer src', $url );
}
add_filter( 'script_loader_tag', 'defer_parsing_of_js', 10 );*/



//////////////////////////////////////////////////////////////////////////////////
/*			nhi added Sept6, 2019
*	Testing to have customed filter for pages
*
**************************************************************************************/
// __________________Post Columns ______________________________
add_action ( 'manage_posts_custom_column',	'rkv_post_columns_data',	10,	2	);
add_filter ( 'manage_edit-post_columns',	'rkv_post_columns_display'			);
function rkv_post_columns_data( $column, $post_id ) {
	switch ( $column ) {
	case 'modified':
		$m_orig		= get_post_field( 'post_modified', $post_id, 'raw' );
		$m_stamp	= strtotime( $m_orig );
		$modified	= date('n/j/y @ g:i a', $m_stamp );
	       	$modr_id	= get_post_meta( $post_id, '_edit_last', true );
	       	$auth_id	= get_post_field( 'post_author', $post_id, 'raw' );
	       	$user_id	= !empty( $modr_id ) ? $modr_id : $auth_id;
	       	$user_info	= get_userdata( $user_id );
	
	       	echo '<p class="mod-date">';
	       	echo '<em>'.$modified.'</em><br />';
	       	echo 'by <strong>'.$user_info->display_name.'<strong>';
	       	echo '</p>';
		break;
	// end all case breaks
	}
}
function rkv_post_columns_display( $columns ) {
	$columns['modified']	= 'Last Modified';
	return $columns;
}



//___________________PAGES ONLY___________________________________
add_action ( 'manage_pages_custom_column',	'rkv_heirch_columns',	10,	2	);
add_filter ( 'manage_edit-page_columns',	'rkv_page_columns'				);
function rkv_heirch_columns( $column, $post_id ) {
	switch ( $column ) {
	case 'modified':
		$m_orig		= get_post_field( 'post_modified', $post_id, 'raw' );
		$m_stamp	= strtotime( $m_orig );
		$modified	= date(get_option('date_format').'@'.get_option('time_format'), $m_stamp );
	       	$modr_id	= get_post_meta( $post_id, '_edit_last', true );
	       	$auth_id	= get_post_field( 'post_author', $post_id, 'raw' );
	       	$user_id	= !empty( $modr_id ) ? $modr_id : $auth_id;
	       	$user_info	= get_userdata( $user_id );
	
	       	echo '<p class="mod-date">';
	       	echo '<em>'.$modified.'</em><br />';
	       	echo 'by <strong>'.$user_info->display_name.'<strong>';
	       	echo '</p>';
		break;
	// end all case breaks
	}
}
function rkv_page_columns( $columns ) {
	$columns['modified']	= 'Last Modified';
	return $columns;
}
function last_modified_column_register_sortable( $columns ) {
	$columns["modified"] = "last_modified";
        return $columns;
}
add_filter( "manage_edit-post_sortable_columns", "last_modified_column_register_sortable" );
add_filter( "manage_edit-page_sortable_columns", "last_modified_column_register_sortable" );


//remove Block library CSS from loading
add_action('wp_enqueue_scripts','ugdsb_remove_plugin_scripts');
function ugdsb_remove_plugin_scripts(){
	wp_dequeue_style('wp-block-library');	//remove block library css from loading
	wp_deregister_style('wp-block-library');
	
	//don't load these if it is front page and mobile devices
	if(is_front_page()&& wp_is_mobile()){
		wp_dequeue_script('do-etfw-twitter-widgets');
		wp_deregister_script('do-etfw-twitter-widgets');	
	}
}


?>
