<?php get_header(); ?>

<div class="container-fluid">
<div class="row-fluid">
<div class="span8">
<div class="well-intro">

<div class="alert">
  <?php _e('Sorry, but the page you were trying to view does not exist.', 'wpstrapgrid'); ?>
</div>

<p><?php _e('It looks like this was the result of either:', 'wpstrapgrid'); ?></p>
<ul>
  <li><?php _e('a mistyped address', 'wpstrapgrid'); ?></li>
  <li><?php _e('an out-of-date link', 'wpstrapgrid'); ?></li>
</ul>

<?php get_search_form(); ?>

</div>
</div>
<div class="span4 well-intro">
    <?php if ( is_active_sidebar( 'wpstrapgrid-sidebar-posts' ) ) : ?>
	    <?php dynamic_sidebar( 'wpstrapgrid-sidebar-posts' ); ?>
    <?php endif; // end sidebar widget area ?> 
</div>
</div>
<?php get_footer(); ?>