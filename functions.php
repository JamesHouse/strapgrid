<?php

if (!defined('wpstrapgrid_VERSION'))
define('wpstrapgrid_VERSION', '1.0');


if ( ! isset( $content_width ) ) $content_width = 940;

/*
| -------------------------------------------------------------------
| Setup Theme
| -------------------------------------------------------------------
|
| */

function wpstrapgrid_theme_setup() {
  
 /**
  * Make theme available for translation
  * Translations can be filed in the /languages/ directory
  */
   load_theme_textdomain( 'wpstrapgrid', get_template_directory() . '/languages' );
  /**
   * Add editor stylesheet
   */
  //add_editor_style('editor-style.css'); //work in progress
  /**
   * Add default posts and comments RSS feed links to head
   */
  add_theme_support( 'automatic-feed-links' );
  add_theme_support('custom-background', array(
	'default-color' => 'e2e2e2',
  ));
  
  add_editor_style();
  
  /**
   * Adds custom menu with wp_page_menu fallback
   */
  register_nav_menus( array(
	'main-menu' => __( 'Main Menu', 'wpstrapgrid' ),
    ) );

/*
| -------------------------------------------------------------------
| Adding Post Thumbnails and Image Sizes
| -------------------------------------------------------------------
| */

  add_theme_support( 'post-thumbnails' );
  set_post_thumbnail_size( 250, 130, true ); // 260 pixels wide by 150 pixels high (cropped)

  add_image_size( 'wpstrapgrid-home-feature', 250, 150, true ); //(cropped)
  add_image_size( 'wpstrapgrid-post-feature', 728, 307, true ); //(cropped)
  add_image_size( 'wpstrapgrid-page-feature', 1230, 440, true ); //(cropped)
  add_image_size( 'wpstrapgrid-page-static', 1230, 410, true ); //(cropped)
}
add_action( 'after_setup_theme', 'wpstrapgrid_theme_setup' );
	
################################################################################
// Loading All CSS Stylesheets JS Files
################################################################################
function wpstrapgrid_scripts() {
global $wp_styles;
	// CSS Scripts
	wp_enqueue_style( 'wpstrapgrid-style', get_stylesheet_uri() );
	wp_enqueue_style('wpstrapgrid-bootstrap', get_template_directory_uri().'/assets/css/bootstrap.css', false ,'2.3.1', 'all' );
    wp_enqueue_style('wpstrapgrid-responsive', get_template_directory_uri().'/assets/css/bootstrap-responsive.css', false ,'2.3.1', 'all' );
	wp_enqueue_style('wpstrapgrid-custom', get_template_directory_uri().'/assets/css/custom.css', false ,'1.0.0', 'all' );
	

	// Comments Scripts
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
		
	// JS Scripts
	wp_enqueue_script('bootstrap.min.js', get_template_directory_uri().'/assets/js/bootstrap.min.js', array('jquery'),'2.3.1', true );
	wp_enqueue_script( 'bootstrap-carousel', get_template_directory_uri() . '/assets/js/bootstrap-carousel2.3.1.js', array( 'jquery' ), '2.3.1', true );
	wp_enqueue_script('wpstrapgrid-extras', get_template_directory_uri().'/assets/js/wpstrapgrid-scripts.js', array('jquery'),'1.0', true );
  }
add_action('wp_enqueue_scripts', 'wpstrapgrid_scripts');

/**
 * Creates a nicely formatted and more specific title element text
 * for output in head of document, based on current view.
 *
 * @since WPStrapHero 1.0.0
 *
 * @param string $title Default title text for current view.
 * @param string $sep Optional separator.
 * @return string Filtered title.
 */
function wpstrapgrid_wp_title( $title, $sep ) {
	global $paged, $page;

	if ( is_feed() )
		return $title;

	// Add the site name.
	$title .= get_bloginfo( 'name' );

	// Add the site description for the home/front page.
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) )
		$title = "$title $sep $site_description";

	// Add a page number if necessary.
	if ( $paged >= 2 || $page >= 2 )
		$title = "$title $sep " . sprintf( __( 'Page %s', 'wpstrapgrid' ), max( $paged, $page ) );

	return $title;
}
add_filter( 'wp_title', 'wpstrapgrid_wp_title', 10, 2 );

// Lets load our custom functions and scripts now

require( get_template_directory() . '/assets/inc/smart-widgets.php' );

/**
	 * Custom Nav Menu handler for the Navbar.
	 */
	require_once( get_template_directory() . '/assets/inc/nav-menu-walker.php' );

if ( ! function_exists( 'wpstrapgrid_comment' ) ) :
/**
 * Template for comments and pingbacks.
 *
 * To override this walker in a child theme without modifying the comments template
 * simply create your own wpstrapgrid_comment(), and that function will be used instead.
 *
 * Used as a callback by wp_list_comments() for displaying the comments.
 */
function wpstrapgrid_comment( $comment, $args, $depth ) {
	$GLOBALS['comment'] = $comment;
	switch ( $comment->comment_type ) :
		case 'pingback' :
		case 'trackback' :
		// Display trackbacks differently than normal comments.
	?>
	<li <?php comment_class(); ?> id="comment-<?php comment_ID(); ?>">
		<p><?php _e( 'Pingback:', 'wpstrapgrid' ); ?> <?php comment_author_link(); ?> <?php edit_comment_link( __( '(Edit)', 'wpstrapgrid' ), '<span class="edit-link">', '</span>' ); ?></p>
	<?php
			break;
		default :
		// Proceed with normal comments.
		global $post;
	?>
	<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
		<article id="comment-<?php comment_ID(); ?>" class="comment">
			<header class="comment-meta comment-author vcard">
				<?php
					echo get_avatar( $comment, 44 );
					printf( '<cite class="fn">%1$s %2$s</cite>',
						get_comment_author_link(),
						// If current post author is also comment author, make it known visually.
						( $comment->user_id === $post->post_author ) ? '<span> ' . __( 'Post author', 'wpstrapgrid' ) . '</span>' : ''
					);
					printf( '<a href="%1$s"><time datetime="%2$s">%3$s</time></a>',
						esc_url( get_comment_link( $comment->comment_ID ) ),
						get_comment_time( 'c' ),
						/* translators: 1: date, 2: time */
						sprintf( __( '%1$s at %2$s', 'wpstrapgrid' ), get_comment_date(), get_comment_time() )
					);
				?>
			</header><!-- .comment-meta -->

			<?php if ( '0' == $comment->comment_approved ) : ?>
				<p class="comment-awaiting-moderation"><?php _e( 'Your comment is awaiting moderation.', 'wpstrapgrid' ); ?></p>
			<?php endif; ?>

			<section class="comment-content comment">
				<?php comment_text(); ?>
				<?php edit_comment_link( __( 'Edit', 'wpstrapgrid' ), '<p class="edit-link">', '</p>' ); ?>
			</section><!-- .comment-content -->

			<div class="reply">
				<?php comment_reply_link( array_merge( $args, array( 'reply_text' => __( 'Reply', 'wpstrapgrid' ), 'after' => ' <span>&darr;</span>', 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
			</div><!-- .reply -->
		</article><!-- #comment-## -->
	<?php
		break;
	endswitch; // end comment_type check
}
endif;

if ( ! function_exists( 'wpstrapgrid_entry_meta' ) ) :
/**
 * Prints HTML with meta information for current post: categories, tags, permalink, author, and date.
 *
 * Create your own wpstrapgrid_entry_meta() to override in a child theme.
 *
 * @since WP StrapGrid Lite 1.0.0
 *
 * @return void
 */
function wpstrapgrid_entry_meta() {

	if ( is_sticky() && is_home() && ! is_paged() )
		echo '<span class="featured-post">' . __( 'Sticky', 'wpstrapgrid' ) . '</span>';

	if ( ! has_post_format( 'aside' ) && ! has_post_format( 'link' ) && 'post' == get_post_type() )
		wpstrapgrid_entry_date();

	// Translators: used between list items, there is a space after the comma.
	$categories_list = get_the_category_list( __( ', ', 'wpstrapgrid' ) );
	if ( $categories_list ) {
		echo '<span class="categories-links">' . $categories_list . '</span>';
	}

	// Translators: used between list items, there is a space after the comma.
	$tag_list = get_the_tag_list( '', __( ', ', 'wpstrapgrid' ) );
	if ( $tag_list ) {
		echo '<span class="tags-links">' . $tag_list . '</span>';
	}

	// Post author
	if ( 'post' == get_post_type() ) {
		printf( '<span class="author vcard"><a class="url fn n" href="%1$s" title="%2$s" rel="author">%3$s</a></span>',
			esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
			esc_attr( sprintf( __( 'View all posts by %s', 'wpstrapgrid' ), get_the_author() ) ),
			get_the_author()
		);
	}
}
endif;

if ( ! function_exists( 'wpstrapgrid_entry_date' ) ) :
/**
 * Prints HTML with date information for current post.
 *
 * Create your own wpstrapgrid_entry_date() to override in a child theme.
 *
 * @since WP StrapGrid Lite 1.0.0
 *
 * @param boolean $echo Whether to echo the date. Default true.
 * @return string
 */
function wpstrapgrid_entry_date( $echo = true ) {
	$format_prefix = ( has_post_format( 'chat' ) || has_post_format( 'status' ) ) ? _x( '%1$s on %2$s', '1: post format name. 2: date', 'wpstrapgrid' ): '%2$s';

	$date = sprintf( '<span class="date"><a href="%1$s" title="%2$s" rel="bookmark"><time class="entry-date" datetime="%3$s">%4$s</time></a></span>',
		esc_url( get_permalink() ),
		esc_attr( sprintf( __( 'Permalink to %s', 'wpstrapgrid' ), the_title_attribute( 'echo=0' ) ) ),
		esc_attr( get_the_date( 'c' ) ),
		esc_html( sprintf( $format_prefix, get_post_format_string( get_post_format() ), get_the_date() ) )
	);

	if ( $echo )
		echo $date;

	return $date;
}
endif;

/**
 * Display navigation to next/previous pages when applicable
 *
 */
if ( ! function_exists( 'wpstrapgrid_content_nav' ) ) :

function wpstrapgrid_content_nav() {
	global $wp_query, $wp_rewrite;

	$paged			=	( get_query_var( 'paged' ) ) ? intval( get_query_var( 'paged' ) ) : 1;

	$pagenum_link	=	html_entity_decode( get_pagenum_link() );
	$query_args		=	array();
	$url_parts		=	explode( '?', $pagenum_link );
	
	if ( isset( $url_parts[1] ) ) {
		wp_parse_str( $url_parts[1], $query_args );
	}
	$pagenum_link	=	remove_query_arg( array_keys( $query_args ), $pagenum_link );
	$pagenum_link	=	trailingslashit( $pagenum_link ) . '%_%';
	
	$format			=	( $wp_rewrite->using_index_permalinks() AND ! strpos( $pagenum_link, 'index.php' ) ) ? 'index.php/' : '';
	$format			.=	$wp_rewrite->using_permalinks() ? user_trailingslashit( 'page/%#%', 'paged' ) : '?paged=%#%';
	
	$links	=	paginate_links( array(
		'base'		=>	$pagenum_link,
		'format'	=>	$format,
		'total'		=>	$wp_query->max_num_pages,
		'current'	=>	$paged,
		'mid_size'	=>	3,
		'type'		=>	'list',
		'add_args'	=>	array_map( 'urlencode', $query_args )
	) );

	if ( $links ) {
		echo "<nav class=\"pagination pagination-centered clearfix\">{$links}</nav>";
	}
}
endif;

/**
 * Displays page links for paginated posts
 */
if ( ! function_exists( 'wpstrapgrid_link_pages' ) ) :

function wpstrapgrid_link_pages( $args = array() ) {
	wp_link_pages( array( 'echo' => 0 ));
	$defaults = array(
		'next_or_number'	=> 'number',
		'nextpagelink'		=> __('Next page', 'wpstrapgrid'),
		'previouspagelink'	=> __('Previous page', 'wpstrapgrid'),
		'pagelink'			=> '%',
		'echo'				=> true
	);

	$r = wp_parse_args( $args, $defaults );
	$r = apply_filters( 'wpstrapgrid_link_pages_args', $r );
	extract( $r, EXTR_SKIP );

	global $page, $numpages, $multipage, $more, $pagenow;

	$output = '';
	if ( $multipage ) {
		if ( 'number' == $next_or_number ) {
			$output .= '<nav class="pagination clear"><ul><li><span class="dots">' . __('Pages:', 'wpstrapgrid') . '</span></li>';
			for ( $i = 1; $i < ($numpages + 1); $i++ ) {
				$j = str_replace( '%', $i, $pagelink );
				if ( ($i != $page) || ((!$more) && ($page!=1)) ) {
					$output .= '<li>' . _wp_link_page($i) . $j . '</a></li>';
				}
				if ($i == $page) {
					$output .= '<li class="current"><span>' . $j . '</span></li>';
				}
				
			}
			$output .= '</ul></nav>';
		} else {
			if ( $more ) {
				$output .= '<nav class="pagination clear"><ul><li><span class="dots">' . __('Pages:', 'wpstrapgrid') . '</span></li>';
				$i = $page - 1;
				if ( $i && $more ) {
					$output .= '<li>' . _wp_link_page( $i ) . $previouspagelink. '</a></li>';
				}
				$i = $page + 1;
				if ( $i <= $numpages && $more ) {
					$output .= '<li>' . _wp_link_page( $i ) . $nextpagelink. '</a></li>';
				}
				$output .= '</ul></nav>';
			}
		}
	}

	if ( $echo )
		echo $output;

	return $output;
}
endif;

/**
 * Sets the post excerpt length to 80 words.
 */
//function wpstrapgrid_excerpt_length($length) {
//    return 20;
//}

//add_filter('excerpt_length', 'wpstrapgrid_excerpt_length');

// Custom Excerpt
function wpstrapgrid_trim_excerpt($text) {
  $raw_excerpt = $text;
  if ( '' == $text ) {
    $text = get_the_content(''); // Original Content
    $text = strip_shortcodes($text); // Minus Shortcodes
    $text = apply_filters('the_content', $text); // Filters
    $text = str_replace(']]>', ']]&gt;', $text); // Replace
    
    $excerpt_length = apply_filters('excerpt_length', 20); // Length
    $excerpt_more = apply_filters('excerpt_more', ' ' . '<a class="readmore" href="'. get_permalink() .'">&raquo;</a>');
    $text = wp_trim_words( $text, $excerpt_length, $excerpt_more );
    
    // Use First Video as Excerpt
    $postcustom = get_post_custom_keys();
    if ($postcustom){
      $i = 1;
      foreach ($postcustom as $key){
        if (strpos($key,'oembed')){
          foreach (get_post_custom_values($key) as $video){
            if ($i == 1){
              $text = $video.$text;
            }
          $i++;
          }
        }  
      }
    }
  }
  return apply_filters('wpstrapgrid_trim_excerpt', $text, $raw_excerpt);
}
remove_filter('get_the_excerpt', 'wp_trim_excerpt');
add_filter('get_the_excerpt', 'wpstrapgrid_trim_excerpt');

/**
 * Replaces "[...]" (appended to automatically generated excerpts) with an ellipsis and wpstrapblogger_read_more_link().
 */
function wpstrapgrid_auto_excerpt_more($more) {
    return '<span class="ellipsis">&hellip;<a href="' . get_permalink() . '">' . __(' Continue Reading &#8250;&#8250;', 'wpstrapgrid') . '</a></span>';
}

add_filter('excerpt_more', 'wpstrapgrid_auto_excerpt_more');

/**
 * Implement the Custom Header feature for use as a logo
 */
require( get_template_directory() . '/assets/inc/custom-header.php' );
// ADD THEME CUSTOMIZER UNDER APPEARANCE
require( get_template_directory() . '/assets/inc/strapcode-customizer.php' );

/* Clearing floats */

function wpstrapgrid_clearboth() { ?>
<div class="clearboth"> </div>
<?php } 