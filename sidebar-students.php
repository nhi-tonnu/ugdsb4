<?php
/**
 * The menu on the left of the content.
 * Contains a page menu by default.
 * Optionally, replaces page menu with custom menu.
 *
 * @package WordPress
 * @subpackage UGDSB
 * @since UGDSB 1.0
*/
global $post;
?>


<?php /******************************************************************************************************/ ?>
<?php if ( is_active_sidebar( 'sidebar-students' ) ) : ?>
  <div id="sidebar-student" class="sidebar-left widget-area" role="complementary">
    <?php dynamic_sidebar( 'sidebar-students' ); ?>
  </div>
<?php endif; ?>
      

