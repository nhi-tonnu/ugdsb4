<?php
/**
 * The Header for our theme
 *
 * 
 *
 * @package WordPress
 * @subpackage UGDSB
 */

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <?php if (is_front_page()) { ?> 
    <title><?php bloginfo('name'); ?></title>
  <?php } else { ?>
    <title><?php wp_title(''); ?> (<?php bloginfo('name'); ?>)</title>
  <?php } ?>

  
  <!-- Bootstrap -->
  <link href="<?php echo get_template_directory_uri(); ?>/css/bootstrap.css" rel="stylesheet" media="all"><!-- version 3.3.6 -->
  <link href="<?php echo get_template_directory_uri(); ?>/css/bootstrap-theme.css" rel="stylesheet">
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css" rel="stylesheet">
  
  <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
  <link href="<?php echo get_template_directory_uri(); ?>/css/ie10-viewport-bug-workaround.css" rel="stylesheet">

  <link href="<?php echo get_template_directory_uri(); ?>/images/Icon-60X60.png" rel="apple-touch-icon" />
  <link href="<?php echo get_template_directory_uri(); ?>/images/Icon-76X76.png" rel="apple-touch-icon" sizes="76x76" />
  <link href="<?php echo get_template_directory_uri(); ?>/images/Icon-120X120.png" rel="apple-touch-icon" sizes="120x120" />

  <link href="<?php echo get_template_directory_uri(); ?>/css/style.css" rel="stylesheet"><!-- will use custom.css instead of style.css -->
  <link href="<?php echo get_template_directory_uri(); ?>/css/icon-styles.css" rel="stylesheet">

  <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
  <script async src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script>window.jQuery || document.write('<script src="<?php echo get_template_directory_uri(); ?>/js/jquery.min.js"><\/script>')</script>

<!-- Include all compiled plugins (below), or include individual files as needed -->  
  <script src="<?php echo get_template_directory_uri(); ?>/js/bootstrap.min.js"></script>
  <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
  <script src="<?php echo get_template_directory_uri(); ?>/js/ie10-viewport-bug-workaround.js"></script>
  
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
    	<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
 
  <!-- Do we have a custom header image? -->
  <style type="text/css">
      <?php
	     if ( 'blank' != get_header_textcolor() ) :
	   ?>
        .site-title a,
		    .site-title a h1,
        .site-description,
		    span.dhs2{ color: #<?php echo get_header_textcolor(); ?> !important;}
        #mainContent h1, #mainContent h1.headings, #mainContent h1.home-headings{color: #<?php echo get_header_textcolor(); ?> !important;}
    <?php endif; ?>
  </style>

  <!-- add GOOGLE ANALYTICS CODE HERE SOON -->
  <script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-2579289-9', 'auto');
  ga('send', 'pageview');

  </script>
  <?php wp_head();?>
</head>
<body id="top" <?php body_class(); ?>>
<a href="#mainContent" class="skip-main hidden-print">Skip to Main Content</a><!-- skip link -->

<div id="mini-topnav">
    <div class="container">
        <div class="col-md-9 col-sm-9 col-xs-6" style="margin-top:-10px;">
            <ul class="list-inline">
                <li class="hidden-xs"><a href="http://www.stwdsts.ca/" target="_blank" title="Bus Transportation Information"><img src="<?php echo get_template_directory_uri(); ?>/images/nav_school_bus.gif" alt="Bus Transportation Information" style="margin-top:8px;" width="26" height="26"></a></li>
                <li class="hidden-xs"><a href="http://www.ugdsb.ca/careers" title="Careers Employment">Careers</a></li>   
                <li class="hidden-xs"><a href="http://www.ugdsb.ca/schools/admission-registration/" title="Registration and Admission">Registration</a></li> 
                <li class="hidden-xs"><a href="http://www.ugdsb.ca/staff-resources/" title="Staff Resources">Staff</a></li> 
                <li class="hidden-xs"><a href="http://www.ugdsb.ca/board/contact-us/" title="Contact Us">Contact Us</a></li>  
                <li>
                   <!-- google translation -->
                    <div id="google_translate_element"></div>
                   <script type="text/javascript">
                    function googleTranslateElementInit() {
                        new google.translate.TranslateElement({pageLanguage: 'en', layout: google.translate.TranslateElement.FloatPosition.TOP_RIGHT, gaTrack: true, gaId: 'UA-72910739-3'}, 'google_translate_element');
                    }
                    </script>
                    <script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
               </li><!-- end google translation --> 
            </ul>
          </div><!-- /.navbar-collapse --> 
          <div class="col-md-3 col-sm-3 col-xs-6">  
            <form role="search" class="search-form2" action="<?php echo esc_url(home_url('/')); ?>">
                  <label for="s" class="sr-only">Search box</label>
                   <input type="search" class="search-field" placeholder="<?php _e( 'Search', 'ugdsb' );?>..."  
                  value="" name="s" 
                  title="Search after:">
                <input type="submit" class="search-submit" value="Search">
            </form>
          </div> 
    </div><!-- end container -->
</div><!-- end mini nav -->

<div id="header-div" class="container">
        <div class="col-md-12 col-sm-12">
            <?php if(get_theme_mod('school_logo')) { ?>
            <a href="<?php echo esc_url( ugdsb4_home_url()); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">
            <?php
                echo "<img src='".get_theme_mod('school_logo')."' title='".esc_attr(get_bloginfo( 'name','display' ) )."' alt='".esc_attr(get_bloginfo( 'name','display' ) )."'></a>"; 
            }
            else { ?>
                  <div class="site-title"><a href="<?php echo home_url(); ?>/" class="site-title-link"><h1><?php echo get_bloginfo('name'); ?></h1></div>
              <?php } ?> 
        </div><!-- end schoolLogo -->

</div><!-- end header-div -->


<div class="container" id="topNav">

<?php if( function_exists( 'ubermenu' ) ): ?>
  <?php ubermenu( 'main' , array( 'theme_location' => 'primary' ) ); ?>
<?php else: ?>
  <nav class="navbar navbar-inverse" role="navigation">
    <?php wp_nav_menu( array(
      'container' => false,
      'theme_location' => 'primary'
    ) ); ?>
  </nav>
<?php endif; ?>
</div><!-- end topNav -->

<div class="container" id="bodyContainer2">
<div class="container-breadcrumb">
<ol class="breadcrumb"><li><a href="http://www.ugdsb.ca">Home</a></li><li><a href="http://www.ugdsb.ca/careers">Careers</a></li></ol></div>