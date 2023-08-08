<?php
/**
/**
 * Template Name: Right Sidebar Page
 *
 * This is the template that displays full width page without sidebar
 *
 * @package ugdsb4
 */
?>
<?php get_header(); ?>

<?php $has_left = FALSE; ?>
<?php $has_right = FALSE; ?>
<?php //if (is_active_sidebar('sidebar-left') || has_nav_menu('left')) {$has_left = TRUE;} ?>
<?php if (is_active_sidebar('sidebar-right') || has_nav_menu('right')) {$has_right = TRUE;} ?>







<?php
    # Both sidebars
    # content area
    if (($has_left == TRUE) and ($has_right == TRUE)):
      echo '<div class="col-sm-7 col-sm-push-3" id="mainContent">';
    # Just left sidebar
    elseif (($has_left == TRUE) and ($has_right == FALSE)):
      echo '<div class="col-sm-9 col-sm-push-3" id="mainContent">';
    # Just right sidebar
    elseif (($has_left == FALSE) and ($has_right == TRUE)):
      echo '<div class="col-sm-9" id="mainContent">';
    # No sidebars
    elseif (($has_left == FALSE) and ($has_right == FALSE)):
      echo '<div class="col-md-12" id="mainContent">';
    endif;
    ?>



      <?php
      // Start the Loop.
      while ( have_posts() ) : the_post();
      ?>

      <h1 class="headings"><?php the_title(); ?></h1>
        <p><?php the_content(); ?></p>
        
      <?php   
      endwhile;
      wp_reset_query();
      ?>

      </div> <!-- end content area primary-->

<?php

    # Both sidebars
    # left column
    if (($has_left == TRUE) and ($has_right == TRUE)):
    echo '<div class="col-sm-3 col-sm-pull-7 ldiv">';
    if(is_front_page()){
        //echo "<p>Display something here (left sidebar and right sidebar)</p>";
    }//end if
    
    if (!is_front_page()) {
          get_sidebar('lmenu');//display left menu, sidebar-lmenu.php
    }
    get_sidebar('left');//display sidebar-left.php
    echo '</div>';

    # Just left sidebar
    elseif (($has_left == TRUE) and ($has_right == FALSE)):
      echo '<div class="col-sm-3 col-sm-pull-9 ldiv">';
      if(is_front_page()){
          //echo "<p>Display something here (left sidebar) - Just left sidebar</p>";
      }//end if
    
      if (!is_front_page()) {
          get_sidebar('lmenu');//display left menu
      }
      get_sidebar('left');//display sidebar-left.php
      echo '</div>';

    # Just right sidebar
    elseif (($has_left == FALSE) and ($has_right == TRUE)):
      # Nothing to do

    # No sidebars
    elseif (($has_left == FALSE) and ($has_right == FALSE)):
      # Nothing to do

    endif;

 ?>




<?php
    # Both sidebars
    # right column

    if (($has_left == TRUE) and ($has_right == TRUE)):
      echo '<div class="col-sm-2 rdiv">';
      if (!is_front_page()) {
        get_sidebar('rmenu');
      }
      get_sidebar('right');
      echo '</div>';

    # Just left sidebar
      # Nothing to do

    # Just right sidebar
    elseif (($has_left == FALSE) and ($has_right == TRUE)):
      echo '<div class="col-sm-3 rdiv">';
      if (is_front_page()) {
          //echo "Echo something for the right sidebar!!";
      }
      if (!is_front_page()) {
        get_sidebar('rmenu');
      }
      
      get_sidebar('right');
      echo '</div>';

    # No sidebars
      # Nothing to do

    endif;
    ?>

  
  </div>
</div>



<div class='clear'></div>


<?php get_footer(); ?>