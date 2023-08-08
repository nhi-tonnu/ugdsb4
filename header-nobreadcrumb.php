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

  <link href="<?php echo get_template_directory_uri(); ?>/css/style.css" rel="stylesheet"><!-- will use custom.css instead of style.css -->
  <link href="<?php echo get_template_directory_uri(); ?>/css/googleapis-fonts.css" rel="stylesheet"><!-- google fonts -->
  
  <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
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
 
  
  <!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-2579289-10"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());
  gtag('config', 'UA-2579289-10');
</script>


<!-- Start : Pstgi Custom Header Tag -->
<script type="text/javascript" src=" https://schoollocator.ugdsb.on.ca/SchoolLocatorHelper/Scripts/jquery-1.7.1.min.js"></script>
<script type="text/javascript" src=" https://schoollocator.ugdsb.on.ca/SchoolLocatorHelper/Scripts/jquery.colorbox.js"></script>
<link rel="stylesheet" href=" https://schoollocator.ugdsb.on.ca/SchoolLocatorHelper/Styles/colorboxjs/colorbox.css" />
 
<script type="text/javascript" src=" https://schoollocator.ugdsb.on.ca/SchoolLocatorHelper/Scripts/json2.js" type="text/javascript"></script>
<script type="text/javascript" src=" https://schoollocator.ugdsb.on.ca/SchoolLocatorHelper/Scripts/pmrpc.js" type="text/javascript"></script>
<script type="text/javascript" src="  https://schoollocator.ugdsb.on.ca/SchoolLocatorHelper/Scripts/SchoolDetails2.js"></script>
<!-- End : Pstgi Custom Header Tag -->



<?php wp_head();?>
</head>
<body id="top" <?php body_class(); ?>>
<a href="#mainContent" class="skip-main hidden-print">Skip to Main Content</a><!-- skip link -->

<div id="mini-topnav" class="navbar navbar-inverse" role="navigation">
    <div class="container">
        <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#stickyNav">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        </button>
        </div>

        <div class="collapse navbar-collapse" id="stickyNav">
            <ul class="nav navbar-nav">
                <li><a href="http://www.stwdsts.ca/" target="_blank" title="Bus Transportation Information"><img src="<?php echo get_template_directory_uri(); ?>/images/nav_school_bus2.gif" alt="Bus Transportation Information"  width="26" height="14"></a></li>
                <li><a href="http://ugdsb18.maps.arcgis.com/apps/webappviewer/index.html?id=b6f7c8bdc8954bd1a3b6eae416811cc8" target="_blank" title="Map Locator tool"><img src="<?php echo get_template_directory_uri(); ?>/images/map-locator.png" alt="Map Locator tool" width="12" height="18"></a></li>
                <li><a href="https://www.ugdsb.ca/careers" title="Careers Employment">Careers</a></li>   
                <li><a href="https://www.ugdsb.ca/schools/admission-registration/" title="Registration and Admission">Registration</a></li> 
                <li><a href="https://www.ugdsb.ca/staff-resources/" title="Staff Resources">Staff</a></li> 
                <li><a href="https://www.ugdsb.ca/board/contact-us/" title="Contact Us">Contact Us</a></li>  
                
            </ul>
           <ul class="nav navbar-nav pull-right">
                  <li>
                 
                    <div id="google_translate_element"></div>
                   <script type="text/javascript">
                    function googleTranslateElementInit() {
                        new google.translate.TranslateElement({pageLanguage: 'en', layout: google.translate.TranslateElement.FloatPosition.TOP_RIGHT, gaTrack: true, gaId: 'UA-72910739-3'}, 'google_translate_element');
                    }
                    </script>
                    <script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
                  </li>
                  <li>
                      <form role="search" class="search-form2" action="<?php echo esc_url(home_url('/')); ?>">
                      <label for="s" class="sr-only">Search box</label>
                      <input type="search" class="search-field" placeholder="<?php _e( 'Search', 'ugdsb' );?>..."  value="" name="s" title="Search after:">
                      <input type="submit" class="search-submit" value="Search">
                      </form>
                  </li>
            </ul>

          </div>
          
            
        
    </div><!-- end container -->
</div><!-- end mini nav -->

<div id="header-div" class="container" role="banner">
        <div class="col-md-12 col-sm-12">
            <?php if(get_theme_mod('school_logo')) { ?>
            <a href="<?php echo esc_url( ugdsb4_home_url()); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">
            <?php
                echo "<img src='".get_theme_mod_img('school_logo')."' title='".esc_attr(get_bloginfo( 'name','display' ) )."' alt='".esc_attr(get_bloginfo( 'name','display' ) )."' width='400' height='97'></a>"; 
            }
            else { ?>
                  <div class="site-title"><a href="<?php echo home_url(); ?>/" class="site-title-link"><h1><?php echo get_bloginfo('name'); ?></h1></div>
              <?php } ?> 
        </div><!-- end schoolLogo -->

</div><!-- end header-div -->


<div class="container" id="topNav" role="navigation">

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

  <?php if (!is_front_page()) { ?>
    <?php the_breadcrumb(); ?>
  <?php } ?>