<?php
/**
/**
 * Template Name: Staff List
 *
 * This is the template that displays Staff List
 *
 * @package ugdsb4
 */
?>
<?php 

//$user_query = new WP_User_Query(array('meta_key' => 'wrdsb_display_in_staff_list', 'meta_value' => 1, 'order' => 'ASC')); 

//pagination vars
$current_page = get_query_var('paged') ? (int)get_query_var('paged') : 1;
$users_per_page = (isset($_GET["users_per_page"])) ? $_GET["users_per_page"] : 20;
$orderby = ! empty( $_GET['orderby'] ) ? $_GET['orderby'] : 'display_name';
$order   = ! empty( $_GET['order'] ) ? $_GET['order'] : 'desc';

//get search value 
$search = ( isset($_GET["as"]) ) ? sanitize_text_field($_GET["as"]) : false ;


if($search){
	$args = array(
	'number' => $users_per_page, //how many per page
	'paged' => $current_page, //what page to get, starting from page1
	'meta_key' => 'wrdsb_display_in_staff_list', 
	'meta_value' => 1, 
	'fields' => 'all',
	'order' => $order,
	'orderby' => $orderby,
	'search' => '*' . esc_attr($search) . '*',
	'search_columns' => array('first_name','last_name', 'description', 'email'),
	'meta_query' => array(
        'relation' => 'OR',
        array(
            'key'     => 'first_name',
            'value'   => $search,
            'compare' => 'LIKE'
        ),
        array(
            'key'     => 'last_name',
            'value'   => $search,
            'compare' => 'LIKE'
        ),
        array(
            'key' => 'description',
            'value' => $search,
            'compare' => 'LIKE'
        ),
		array(
            'key' => 'email',
            'value' => $search,
            'compare' => 'LIKE'
        )
    )
);
}else{
	$args = array(
	'number' => $users_per_page, //how many per page
	'paged' => $current_page, //what page to get, starting from page1
	'meta_key' => 'wrdsb_display_in_staff_list', 
	'meta_value' => 1, 
	'order' => $order,
	'orderby' => $orderby
	);
}



$user_query = new WP_User_Query($args);


$total_users = $user_query->get_total(); //how many users in total
$num_pages = ceil($total_users / $users_per_page);//How many pages of users we will need

if($total_users < $users_per_page){
	$users_per_page = $total_users;
}

?>
<?php get_header(); ?>

<?php $has_left = FALSE; ?>
<?php $has_right = FALSE; ?>
<?php //if (is_active_sidebar('sidebar-left') || has_nav_menu('left')) {$has_left = TRUE;} ?>
<?php //if (is_active_sidebar('sidebar-right') || has_nav_menu('right')) {$has_right = TRUE;} ?>







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


	 /*************** div for search form *******************/
	  ?>
      <div class="options-div row" style="margin-left: 5px;">
      <ul class="list-inline">
      <li><a href="<?php the_permalink(); ?>" class="btn btn-info">List All </a></li>
     
      <li>
      <form id="staff-filter" method="get" action="<?php the_permalink(); ?>">
            <!-- For plugins, we also need to ensure that the form posts back to our current page -->
            <select name="users_per_page" class="dropdown-primary">
            	<option selected>Per Page</option>
            	<option value="20">20</option>
                <option value="50">50</option>
                <option value="100">100</option> 
            </select>
            <!-- Now we can render the completed list table -->
            <button type="submit" class="btn btn-default" name="submit" id="user_per_pagesubmit" value="Filter" />Filter</button>
      </form>
      </li>
      <li>
      <form method="get" id="sul-searchform" action="<?php the_permalink(); ?>">
      <input type="text"  name="as" id="sul-s" placeholder="Search Name" class="input-sm" />
      <button type="submit"  name="submit" id="sul-searchsubmit" value="Search" class="btn btn-default"/>Search</button>
      </form>
	  </li>
      </ul>
      </div><!-- end option div -->
      
		
      <?php
      // User Loop
      if (!empty($user_query->results)) { ?>
        <p>
		<?php
			if($search){
				echo "Search Term: <em>".$search."</em></span>";	
			}
		?>
        <br />Displaying <?php echo $users_per_page; ?> of <?php echo $total_users; ?> users.</p>
        <div class="table-responsive hidden-sm hidden-xs list-staff-table" >
          <table class="table table-striped table-bordered table-fixed-head" data-toggle="table" data-sort-name="role">
            <thead>
              <tr>
                <th class="text-left" data-field="name" data-sortable="true">First Name 
                <a href="<?php echo esc_url(add_query_arg(array('orderby' => 'first_name', 'order' => 'asc'))); ?>">Up</a>
                <a href="<?php echo esc_url(add_query_arg(array('orderby' => 'first_name', 'order' => 'desc'))); ?>">Down</a>
                
                </th>
                <th class="text-left" data-field="lastname">Last Name
                <a href="<?php echo esc_url(add_query_arg(array('orderby' => 'last_name', 'order' => 'asc'))); ?>">Up</a>
                <a href="<?php echo esc_url(add_query_arg(array('orderby' => 'last_name', 'order' => 'desc'))); ?>">Down</a>
                </th>
                
                <th class="text-left" data-field="role" data-sortable="true">Role 
                <a href="<?php echo esc_url(add_query_arg(array('orderby' => 'role', 'order' => 'asc'))); ?>">Up</a>
                <a href="<?php echo esc_url(add_query_arg(array('orderby' => 'role', 'order' => 'desc'))); ?>">Down</a>
                
                </th>
                <th class="text-left" data-field="email" data-sortable="true">Email 
                <a href="<?php echo esc_url(add_query_arg(array('orderby' => 'email', 'order' => 'asc'))); ?>">Up</a>
                <a href="<?php echo esc_url(add_query_arg(array('orderby' => 'email', 'order' => 'desc'))); ?>">Down</a>
                </th>
                <th class="text-left" data-field="voicemail" data-sortable="true">Voicemail </th>
                <th class="text-left" data-field="website" data-sortable="true">Website </th>
              </tr>
            </thead>
            <tbody>
              <?php foreach($user_query->results as $user) { ?>
                <tr>
                  <td><?php echo $user->first_name; ?></td>
                  
                  <td><?php echo $user->last_name; ?></td>
                  <td>
                    
                    <?php //echo $user->wrdsb_job_title;
						echo $user->description;
					 ?>
                  </td>
                  <?php if ($user->wrdsb_contact_options == 'Email') { ?>
                    <td><?php echo $user->user_email; ?></td>
                    <td>&nbsp;</td>
                  <?php } elseif ($user->wrdsb_contact_options == 'Voicemail') { ?>
                    <td>&nbsp;</td>
                    <td><?php echo $user->wrdsb_voicemail; ?></td>
                  <?php } else { ?>
                    <td><?php echo $user->user_email; ?></td>
                    <td><?php echo $user->wrdsb_voicemail; ?></td>
                  <?php } ?>
                  <?php if ($user->wrdsb_website_url !== NULL) { ?>
                    <td><a href="<?php echo $user->wrdsb_website_url; ?>"><?php echo $user->wrdsb_website_url; ?></a></td>
                  <?php } else { ?>
                    <td>&nbsp;</td>
                  <?php } ?>
                </tr>
              <?php } ?>
            </tbody>
          </table>
        </div>
        
        <div class="visible-sm visible-xs">
          <ul class="table-list">
            <?php foreach($user_query->results as $user) { ?>
              <li>
                <p>
                  <?php echo $user->last_name; ?>, <?php echo $user->first_name; ?>
                  <br /><em><?php echo $user->wrdsb_job_title; ?></em>
                  <br />Email: <?php echo $user->user_email; ?>
                  <br />Ext: <?php echo $user->wrdsb_voicemail; ?>
                  <br />Website: <a href="<?php echo $user->user_url; ?>"><?php echo $user->user_url; ?></a>
                </p>
              </li>
            <?php } ?>
          </ul>
        </div>
        
        <div id="navigation-div">

        <ul class="pagination justify-content-center">
        	<?php
        	// Previous page
        		if ( $current_page > 1 ) {
            			echo '<li><a href="'. add_query_arg(array('paged' => $current_page-1)) .'">Previous Page</a></li>';
        		}

        		// Next page
        		if ( $current_page < $num_pages ) {
            		echo '<li><a href="'. add_query_arg(array('paged' => $current_page+1)) .'">Next Page</a></li>';
        		}
        ?>
        <li><span>Page <?php echo $current_page; ?> of <?php echo $num_pages; ?></span></li>
        </ul>
        
        </div>
        
      <?php
      } else {
	echo '<p>No user(s) found.</p>';
      } ?>
    
      

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




<?php get_footer(); ?>