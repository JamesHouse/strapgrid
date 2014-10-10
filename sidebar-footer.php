    <?php if ( is_active_sidebar( 'wpstrapgrid-footer-left' ) ) : ?>
		<div class="span3">
            <?php dynamic_sidebar( 'wpstrapgrid-footer-left' ); ?>
        </div>
	<?php endif; // end sidebar widget area ?>
        
    <?php if ( is_active_sidebar( 'wpstrapgrid-footer-middlel' ) ) : ?>
		<div class="span3">
            <?php dynamic_sidebar( 'wpstrapgrid-footer-middlel' ); ?>
        </div>
	<?php endif; // end sidebar widget area ?>	
        
	<?php if ( is_active_sidebar( 'wpstrapgrid-footer-middler' ) ) : ?>
		<div class="span3">
	        <?php dynamic_sidebar( 'wpstrapgrid-footer-middler' ); ?>
        </div>
	<?php endif; // end sidebar widget area ?>	
        
	<?php if ( is_active_sidebar( 'wpstrapgrid-footer-right' ) ) : ?>
		<div class="span3">
	        <?php dynamic_sidebar( 'wpstrapgrid-footer-right' ); ?>
        </div>
	<?php endif; // end sidebar widget area ?>