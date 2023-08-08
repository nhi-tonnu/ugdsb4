<?
/*
Description: Custom Page to display home page

*/
?>

<?php get_header(); ?>


<?php 
ugdsb_display_emergency_2(); //display emergency message
ugdsb_display_homenews(); //news not emergency ones, above Featured News
?>




<div id="big-promo" class="col-md-12">
    <?php ugdsb_big_promo();?>
</div>

<div id="primary-home" class="col-md-8">
    <main id="mainContent" role="main">
        <div id="home-news">
          <h1 class="home-headings2"><span class="glyphicon glyphicon-list-alt" style="padding-top:5px;"></span> News</h1>
          <div>
              


<?php
/*normal post exclude sticky post, display up to 8 posts*/
$url_address = home_url('/').'blog/category/news';
$query_args = array(
  'post_type' => 'post',
  'category_name' => 'news',
  /*'post__not_in' => get_option( 'sticky_posts' ),*/
  'posts_per_page' => 10,
  'paged' => $paged
);
$the_query = new WP_Query($query_args);
if ( $the_query->have_posts() ) : 
  while ( $the_query->have_posts() ) : $the_query->the_post(); 
   get_template_part( 'content', 'home');     
   endwhile;
endif;
 
//pagination
//ugdsb4_paging_nav($the_query->max_num_pages,"",$paged);
wp_reset_postdata();


 
?>   
    </div>
    <?php echo "<div class='view-all2'><span class='glyphicon glyphicon-share-alt pull-right pad-left'></span> <a href='".$url_address."'>View All News</a></div>"; ?>
    </div>
    </main><!-- #main -->

    <!-- /***********************spotlight on school **********//-->
       <?php ugdsb_spotlight_on_schools(); ?>
    <!-- spotlight on school -->
</div><!-- #primary -->

<div id="secondary" class="widget-area col-md-4" role="complementary">
  <?php if ( is_active_sidebar( 'sidebar-home' ) ) : ?>
    <?php dynamic_sidebar( 'sidebar-home' ); ?>
  <?php endif; ?>
   
<?php
      //ugdsb_display_rss_feed();
      //ugdsb_display_rss_feed2();
?>
    <!-- end Display RSS Feed from UGDSB site --> 
  
</div><!-- end side bar -->

<div class='clear'></div>


<?php  get_footer();  ?>

