<?php
/**
 * The template for displaying all posts.
 *
 * Default Post Template
 *
 * Page template with a fixed 940px container and right sidebar layout
 *
 */

get_header(); ?>
<!-- Marketing messaging and featurettes
    ================================================== -->
    <!-- Wrap the rest of the page in another container to center all the content. -->

<div class="container-fluid">
<div class="row-fluid">
<div class="span8">
<div class="well-intro">
	<!-- Start the Loop -->
	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
	
		<!-- Begin the first article -->
		<article>
				
			<!-- Display the Title as a link to the Post's permalink. -->
			<h2>
				<?php the_title(); ?>
			</h2>
			
			<div class="entry-meta">
		        <?php wpstrapgrid_entry_meta(); ?>
		        <?php edit_post_link( __( 'Edit', 'wpstrapgrid' ), '<span class="edit-link">', '</span>' ); ?>
	        </div><!-- .entry-meta -->
			
			<!-- Display the Post's Content in a div box. -->
			<div class="entry">
		        <div class="single-thumbnail">
			        <?php if ( has_post_thumbnail() ) ?>
                    <?php the_post_thumbnail('wpstrapgrid-page-static');?>
		        </div>

				<?php the_content(); ?>
				<?php wpstrapgrid_clearboth(); ?>
			</div>
			<footer class="span8" style="margin-left: 0;">
				<?php wpstrapgrid_link_pages( array( 'before' => '<div class="page-links">' . __( 'Pages:', 'wpstrapgrid' ), 'after' => '</div>' ) ); ?>
	        </footer>
				<?php wpstrapgrid_clearboth(); ?>
		<!-- Begin Comments -->
		<?php comments_template('/templates/comments.php'); ?>
	    <!-- End Comments -->
		
		<!-- Closes the first article -->
		<nav class="post-nav">
            <ul class="pager">
		        <li class="previous"><?php previous_post_link( '%link', '<span class="meta-nav">' . _x( '&larr;', 'Previous post link', 'wpstrapgrid' ) . '</span> %title' ); ?></li>
		        <li class="next"><?php next_post_link( '%link', '%title <span class="meta-nav">' . _x( '&rarr;', 'Next post link', 'wpstrapgrid' ) . '</span>' ); ?></li>
            </ul>
        </nav><!-- .nav-single -->
		</article>
		
	    
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
<div class="span4 well-intro">
    <?php if ( is_active_sidebar( 'wpstrapgrid-sidebar-posts' ) ) : ?>
	    <?php dynamic_sidebar( 'wpstrapgrid-sidebar-posts' ); ?>
    <?php endif; // end sidebar widget area ?> 
</div>
</div>
<!-- end row -->
</div>
<!-- end container -->

<?php get_footer(); ?>