<?php
/**
 * The template for displaying the footer
 *
 * Displays from <div class="footer"> to </html>
 *
 * @package WordPress
 * @subpackage UGDSB
 */
?>



</div><!--end container -->
<div class="stacked-bar-graph">
    <div style="width:20%" class="bar bar-red"></div>
    <div style="width:20%" class="bar bar-green"></div>
    <div style="width:20%" class="bar bar-purple"></div>
    <div style="width:20%" class="bar bar-orange"></div>
    <div style="width:20%" class="bar bar-yellow"></div>
</div>

<footer role="contentinfo"> 
<div id="top-row" class="footer"><!-- TOP ROW -->
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-4 col-sm-4" id="top-row-left">
              <!-- automate address -->

              <?php 
                // from plugin wrdsb_schools_contact.php
                if (function_exists('ugdsb4_school_info_display')) {
                    ugdsb4_school_info_display();
                }
                else {
                  ?>
                  <h2>Upper Grand District School Board</h2>
              <address>500 Victoria Road N.<br />
               Guelph, ON N1E 6K2<br />
              </address>
              <address>
                Switchboard: 519-822-4420<br />
                Toll-free: 1-800-321-4025<br />
                Email:<a href="mailto:inquiry@ugdsb.on.ca">inquiry<span style="display:none;">REMOVE</span>@ugdsb.on.ca</a>

              </address>
              <?php  
                }
              ?>
              <div class="social-icons">
                <?php if ( of_get_option('social_map', true) != "") { ?>
         <a target="_blank" href="<?php echo esc_url(of_get_option('social_map', true)); ?>" title="Google Map" ><span class="social-icon fa fa-map-marker" aria-hidden="true" title="Google Map"></span><span class="sr-only">Google Map</span></a>
               <?php } ?>
               <?php if ( of_get_option('social_email', true) != "") { ?>
         <a href="mailto:<?php echo of_get_option('social_email', true); ?>" title="Email Address" ><span class="social-icon fa fa-envelope-square" aria-hidden="true" title="Email us"></span><span class="sr-only">Email Us</span></a>
               <?php } ?>
                <?php if ( of_get_option('social_facebook', true) != "") { ?>
         <a target="_blank" href="<?php echo esc_url(of_get_option('social_facebook', true)); ?>" title="Facebook" ><span class="social-icon fa fa-facebook-square" aria-hidden="true" title="Facebook"></span><span class="sr-only">Follow Us on Facebook</span></a>
               <?php } ?>
              <?php if ( of_get_option('social_twitter', true) != "") { ?>
         <a target="_blank" href="<?php echo esc_url(of_get_option('social_twitter', true)); ?>" title="Twitter" ><span class="social-icon fa fa-twitter-square" aria-hidden="true" title="Twitter"></span><span class="sr-only">Follow Us on Twitter</span></a>
               <?php } ?>
              
               <?php if ( of_get_option('social_instagram', true) != "") { ?>
         <a target="_blank" href="<?php echo esc_url(of_get_option('social_instagram', true)); ?>" title="Instagram" ><span class="social-icon fa fa-instagram" aria-hidden="true" title="Instagram"></span><span class="sr-only">Follow Us on Instagram</span></a>
               <?php } ?>
               
                 <?php if ( of_get_option('social_google', true) != "") { ?>
         <a target="_blank" href="<?php echo esc_url(of_get_option('social_google', true)); ?>" title="Google Plus" ><span class="social-icon fa fa-google-plus-square" aria-hidden="true" title="Google Plus"></span><span class="sr-only">Follow Us on Google Plus</span></a>
               <?php } ?>
               <?php if ( of_get_option('social_feed', true) != "") { ?>
         <a target="_blank" href="<?php echo esc_url(of_get_option('social_feed', true)); ?>" title="RSS Feeds" ><span class="social-icon fa fa-rss-square" aria-hidden="true" title="Feed" ></span><span class="sr-only">Follow Us on FeedBurner</span></a>
               <?php } ?>
               <?php if ( of_get_option('social_pinterest', true) != "") { ?>
         <a target="_blank" href="<?php echo esc_url(of_get_option('social_pinterest', true)); ?>" title="Pinterest" ><span class="social-icon fa fa-pinterest-square" aria-hidden="true" title="pinterest"></span><span class="sr-only">Follow Us on Pinterest</span></a>
               <?php } ?>
                 <?php if ( of_get_option('social_linkedin', true) != "") { ?>
         <a target="_blank" href="<?php echo esc_url(of_get_option('social_linkedin', true)); ?>" title="LinkedIn" ><span class="social-icon fa fa-linkedin-square" aria-hidden="true" title="LinkedIn"></span><span class="sr-only">Follow Us on LinkedIn</span></a>
               <?php } ?>
               <?php if ( of_get_option('social_youtube', true) != "") { ?>
         <a target="_blank" href="<?php echo esc_url(of_get_option('social_youtube', true)); ?>" title="YouTube" ><span class="social-icon fa fa-youtube-square" aria-hidden="true" title="Youtube"></span><span class="sr-only">Follow Us on YouTube</span></a>
               <?php } ?>
               <?php if ( of_get_option('social_flickr', true) != "") { ?>
         <a target="_blank" href="<?php echo esc_url(of_get_option('social_flickr', true)); ?>" title="Flickr" ><span class="social-icon fa fa-flickr" aria-hidden="true" title="Flickr"></span><span class="sr-only">Follow Us on Flickr</span></a>
               <?php } ?>
              
               
                 </div><!-- SOCIAL LINKS -->
            </div><!-- end top row left -->
            <div class="col-md-8 col-sm-8" id="top-row-right">
                 <?php if ( is_active_sidebar( 'sidebar-footer2' ) ) : ?>
                  <div class="col-md-3 col-sm-3"><?php dynamic_sidebar( 'sidebar-footer2' ); ?></div>
                 <?php endif; ?>
                 <?php if ( is_active_sidebar( 'sidebar-footer3' ) ) : ?>
                  <div class="col-md-3 col-sm-3"><?php dynamic_sidebar( 'sidebar-footer3' ); ?></div>
                 <?php endif; ?>
                  <?php if ( is_active_sidebar( 'sidebar-footer' ) ) : ?>
                  <div class="col-md-4  col-sm-4"><?php dynamic_sidebar( 'sidebar-footer' ); ?></div>
                 <?php endif; ?>
            </div><!-- top row right -->
          </div><!-- row -->
        </div><!-- container -->
</div><!-- footer top row -->
      
<!-- boottom go here -->
<div id="bottom_footer">
          <div class="container">
              <div class="col-md-12 pull-left">
                    <ul class="list-inline">
                    <li><a href="https://www.ugdsb.ca/login" target="_blank" class="footer-text">Admin Login</a></li>
                    <li><a href="https://www.ugdsb.ca/board/copyright-and-usage" target="_blank">Copyright</a></li>
                    <li><a href="https://www.ugdsb.ca/board/personal-information-and-privacy/" target="_blank">Privacy</a></li>
                  <?php
          if ( (function_exists( 'of_get_option' ) && (of_get_option('custom_footer_text', true) != 1) ) ) {
          
            echo "<li>".of_get_option('custom_footer_text', true)."</li>"; } 
          
            ?> 
                     <!--<li><span id="monitor"></span></li>-->
                  </ul>
                    <a href="#top" id="smoothup" title="Back to top"><span class="sr-only">Go to Top</span></a>
                </div>
             </div> 
             
</div><!-- footer bottom row -->
<!-- boottom end here -->      
</footer>  
  

  <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script>window.jQuery || document.write('<script src="<?php echo get_template_directory_uri(); ?>/js/jquery.min.js"><\/script>')</script>

  <!-- Include all compiled plugins (below), or include individual files as needed -->  
  <script src="<?php echo get_template_directory_uri(); ?>/js/bootstrap.min.js"></script>
  <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
  <script src="<?php echo get_template_directory_uri(); ?>/js/ie10-viewport-bug-workaround.js"></script>
  
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
    	<script defer src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script defer src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->


<script>
    $(document).ready(function () {
        // bind a click event to the 'skip' link
        $(".skip-main").click(function (event) {
            // strip the leading hash and declare
            // the content we're skipping to
            var skipTo = "#" + this.href.split('#')[1];

            // Setting 'tabindex' to -1 takes an element out of normal 
            // tab flow but allows it to be focused via javascript
            $(skipTo).attr('tabindex', -1).on('blur focusout', function () {

                // when focus leaves this element, 
                // remove the tabindex attribute
                $(this).removeAttr('tabindex');

            }).focus(); // focus on the content container
        });
          //to open pdf or link in a new window
        $('a[href$=".pdf"]').attr('target', '_blank');

    });
   

	 //this script to get the viewport size of the device and display on the  <span id="monitor"></span>
  
      $('#monitor').html($(window).width());
      $(window).resize(function () {
          var viewportWidth = $(window).width();
          $('#monitor').html(viewportWidth);
      });

      //for iframe height
      $('.ifr-environment').on('load', function(){
          this.style.height=this.contentDocument.body.scrollHeight +'px';
      });
	  
    
</script>   
    
<?php wp_footer(); ?>

</body>
</html>