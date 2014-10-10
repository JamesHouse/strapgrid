<?php

 if (!have_posts()) : ?>
   <!--<div class="alert alert-block fade in">
    <a class="close" data-dismiss="alert">&times;</a>
    <p><?php _e('Sorry, no results were found.', 'wpstrapgrid'); ?></p>
  </div>-->

<?php endif; ?>

<?php while (have_posts()) : the_post(); ?>

<div class="well-grid span3">
  <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<div class="entry-title">
      <?php if ( has_post_thumbnail() && ! is_single() && ! post_password_required() ) : ?>
		<div class="entry-thumbnail">
		  <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" >
		  <?php the_post_thumbnail(); ?>
		  </a>
		</div>
	  <?php endif; ?>
	  <h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
	  <div class="entry-meta">
		<?php wpstrapgrid_entry_meta(); ?>
	  </div><!-- .entry-meta -->
    </div>   
	<div class="entry-content">
	    <?php the_excerpt(); ?>
	    <?php wpstrapgrid_clearboth(); ?>
	</div><!-- .entry-content -->
	
    <footer class="entry-meta">
		<?php if ( comments_open() ) : ?>
			<div class="comments-link">
				<?php comments_popup_link( '<span class="leave-reply">' . __( 'Leave a comment', 'wpstrapgrid' ) . '</span>', __( 'One comment so far', 'wpstrapgrid' ), __( 'View all % comments', 'wpstrapgrid' ) ); ?>
			</div><!-- .comments-link -->
		<?php endif; // comments_open() ?>

		<?php if ( is_single() && get_the_author_meta( 'description' ) && is_multi_author() ) : ?>
			<?php get_template_part( '/templates/author-bio' ); ?>
		<?php endif; ?>
      
	  <?php wpstrapgrid_link_pages( array( 'before' => '<div class="page-links">' . __( 'Pages:', 'wpstrapgrid' ), 'after' => '</div>' ) ); ?>
	<!--<div class="separator"></div>-->
	</footer>
 </article>	
</div>

<?php endwhile; ?>