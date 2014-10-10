<?php
/**
 * The template for displaying all pages.
 *
 * Template Name: Default Page
 * Description: Page template with a content container and right sidebar
 *
 */

get_header(); ?>

    <div class="container-fluid">
 
    	<div class="row-fluid">
        	<div class="span8 well-intro">
        	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
		<!-- Begin the first div -->
	
				
			<h2>
				<?php the_title(); ?>
			</h2>
			
			<!-- Display the Page's Content in a div box. -->
			<div class="entry">
				<?php the_content(); ?>
				<?php wp_link_pages( array( 'before' => '<div class="page-links">' . __( 'Pages:', 'wpstrapgrid' ), 'after' => '</div>' ) ); ?>
			</div>
	
		<!-- Closes the first div -->
	<?php comments_template('/templates/comments.php'); ?>
	<!-- Stop The Loop (but note the "else:" - see next line). -->
	<?php endwhile; else: ?>
	
		<!-- The very first "if" tested to see if there were any Posts to -->
		<!-- display.  This "else" part tells what do if there weren't any. -->
		<div class="alert-box error">
			<?php _e('Sorry, no posts matched your criteria.', 'wpstraprid' ); ?>
		</div>
	
	<!--End the loop -->
	<?php endif; ?>
	
        </div>
       <div class="span4 well-intro">
       <?php if ( is_active_sidebar( 'wpstrapgrid-sidebar-page' ) ) : ?>
	        <?php dynamic_sidebar( 'wpstrapgrid-sidebar-page' ); ?>
        <?php endif; // end sidebar widget area ?> 
       </div>
    </div>
	<!-- end row -->
  </div>    
<!-- end container -->

<?php get_footer(); ?>