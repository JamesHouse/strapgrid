<div class="search-form">
<?php do_action( 'wpstrapgrid_pre_searchform' ); ?>
<form role="search" method="get" id="searchform" class="form-search" action="<?php echo esc_url(home_url( '/' )); ?>">
  <label class="hide" for="s"><?php _e( 'Search for:', 'wpstrapgrid' ); ?></label>
  <input type="text" value="<?php if ( is_search() ) echo get_search_query(); ?>" name="s" id="s" class="search-query" placeholder="<?php _e( 'Search', 'wpstrapgrid' ); ?> <?php bloginfo( 'name' ); ?>">
  <input type="submit" id="searchsubmit" value="<?php _e('Search', 'wpstrapgrid'); ?>" class="btn">
</form>
<?php do_action('wpstrapgrid_after_searchform'); ?>
</div>