<?php get_header(); ?>
<?php if (!have_posts()) : ?>
  <div class="well-intro">
  <div class="alert alert-block fade in">
    <a class="close" data-dismiss="alert">&times;</a>
    <p><?php _e('Sorry, no results were found that search term.', 'wpstrapgrid'); ?></p>
	<p><?php _e('You could try searching again with different keywords or navigate thorugh the site via the menu above.', 'wpstrapgrid'); ?></p>
  </div>
    <?php get_search_form(); ?>
  </div>
<?php endif; ?>
<!-- Start of Home Intro Widget Section - Single Wide -->
<?php if ( is_active_sidebar( 'wpstrapgrid-home-intro' ) ) : ?>
<div class="container">

  <div class="home-intro well-intro">
    <?php dynamic_sidebar( 'wpstrapgrid-home-intro' ); ?>  
  </div>

</div><!-- End of Home Intro -->
<?php endif; ?>

  <div class="container-fluid">    
     <div class="well-intro">
	 <div class="row-fluid">
	   <?php get_sidebar( 'top' ); ?>
	 </div>
	 </div>
  </div>
  <div class="clearfix"></div>

    <!-- Wrap the rest of the page in another container to center all the content. -->
<div class="container">

	<div class="row">
    <!-- Start Of Our Posts -->
        <?php get_template_part('/templates/content', 'home'); ?>
    <!-- End Of Our Posts Section -->
    </div><!-- /.row -->
</div>

<div class="container pagination">
    <?php 
		$big = 999999999; // need an unlikely integer
		echo paginate_links(array(
	    	'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
			'format' => '?paged=%#%',
				'current' => max( 1, get_query_var('paged') ),
				'total' => $wp_query->max_num_pages
		));
	?>
</div>
<?php get_footer(); ?>