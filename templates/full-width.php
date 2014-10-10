<?php 
/**
 * Template Name: Full-width Page Template, No Sidebar
*/

get_header(); ?>
<!-- Marketing messaging and featurettes
    ================================================== -->
    <!-- Wrap the rest of the page in another container to center all the content. -->

    <div class="container-fluid">
 
    	<div class="row-fluid">
        	<div class="span12 well-intro">
        	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
		<!-- Begin the first div -->
	
				
			<h2>
				<?php the_title(); ?>
			</h2>
			
			<!-- Display the Page's Content in a div box. -->
			<div class="entry">
				<?php the_content(); ?>
			</div>
	
		<!-- Closes the first div -->
	
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
    </div>
	<!-- end row -->
  </div>    
<!-- end container -->

<?php get_footer(); ?>