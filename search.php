<?php get_header(); ?>

<div id="primary" class="col-md-12">
  <main id="mainContent" role="main">

      
      
      
      <h2 class="headings"><?php printf(__( 'Search Results for: %s' ), '<span>' . get_search_query() . '</span>'); ?></h2>


      <?php if (have_posts()): ?>
        <?php while (have_posts()): the_post(); ?>
          <h3 class="search-results"><a href="<?php the_permalink() ?>">
          <?php //the_title();

              $title = get_the_title(); $keys= explode(" ",$s); $title = preg_replace('/('.implode('|', $keys) .')/iu', '<strong class="search-excerpt">\0</strong>', $title);
              echo $title;
          ?></a>
          </h3>
          <?php if ('post' == get_post_type()) { ?>
            <small class="gray-dark">Posted <?php echo get_the_date(); ?></small>
          <?php } ?>
          <?php the_excerpt(); ?>
        <?php endwhile; ?>
        <?php ugdsb4_paging_nav(); ?>
      <?php else: ?>
        <?php get_template_part( 'content', 'none' ); ?>
      <?php endif; ?>

    </main><!-- #main -->
</div><!-- #primary -->

<?php get_footer(); ?>