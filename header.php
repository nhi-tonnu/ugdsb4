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

<!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-MXRNFSZ');</script>
<!-- End Google Tag Manager -->


  
<!-- Bootstrap -->
<link href="<?php echo get_template_directory_uri(); ?>/css/bootstrap.css" rel="stylesheet" media="print" onload="this.media='all'"><!-- version 3.3.6 -->
<link href="<?php echo get_template_directory_uri(); ?>/css/style.css" rel="stylesheet" media="print" onload="this.media='all'">
  
  
 
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

<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-2579289-10"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());
  gtag('config', 'UA-2579289-10');
</script>
<?php wp_head();?>

<!-- Meta Pixel Code added Feb24,2023 -->
<script>
!function(f,b,e,v,n,t,s)
{if(f.fbq)return;n=f.fbq=function(){n.callMethod?
n.callMethod.apply(n,arguments):n.queue.push(arguments)};
if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
n.queue=[];t=b.createElement(e);t.async=!0;
t.src=v;s=b.getElementsByTagName(e)[0];
s.parentNode.insertBefore(t,s)}(window, document,'script',
'https://connect.facebook.net/en_US/fbevents.js');
fbq('init', '528180341196614');
fbq('track', 'PageView');
</script>
<noscript><img height="1" width="1" style="display:none"
src="https://www.facebook.com/tr?id=528180341196614&ev=PageView&noscript=1"
/></noscript>
<!-- End Meta Pixel Code -->


</head>
<body id="top" <?php body_class(); ?>>
<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-MXRNFSZ" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->

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
                <li><a href="https://stwdsts.ca/" target="_blank" title="Bus Transportation Information"><img src="<?php echo get_template_directory_uri(); ?>/images/nav_school_bus2.gif" alt="Bus Transportation Information"  width="26" height="14"></a></li>
                <li><a href="https://www.ugdsb.ca/schools/school-locator-instructions/" title="School Locator" target="_blank">School Locator</a></li>  
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
                        new google.translate.TranslateElement({pageLanguage: 'en', 
						autoDisplay: true,
						includedLanguages: 'ar,be,bg,bn,cs,cy,da,de,el,en,es,et,fa,fi,fr,hi,hr,hu,id,it,iw,ja,ko,lt,lv,mk,nl,no,pl,pt,ro,ru,sk,sl,sq,sr,sv,th,tl,tr,uk,ur,vi,zh-CN', 
						layout: google.translate.TranslateElement.InlineLayout.SIMPLE}, 'google_translate_element');
                    }
                    </script>
                    <script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
                  </li>
                  <li>
                      <form role="search" class="search-form2" action="<?php echo esc_url(home_url('/')); ?>">
                      <label for="s" class="sr-only">Search box</label>
                      <input type="search" class="search-field" placeholder="<?php _e( 'Search', 'ugdsb' );?>..." name="s" title="Search after:" aria-label="Search field">
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
                echo "<img src='".get_theme_mod_img('school_logo')."' title='".esc_attr(get_bloginfo( 'name','display' ) )."' alt='".esc_attr(get_bloginfo( 'name','display' ) )."' loading='lazy'></a>"; 
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