<?php
// Shortcodes
require_once('library/shortcodes.php');


// Disable the Admin Bar.
add_filter( 'show_admin_bar', '__return_false' );


// smart jquery inclusion
if (!is_admin()) {
	function mytheme_enqueue_scripts() {
	       wp_deregister_script('jquery');
	       wp_register_script('jquery', ("http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"), false, '1.9.1');
	       wp_enqueue_script('jquery');
	}
}
add_action('wp_enqueue_scripts', 'mytheme_enqueue_scripts');

add_filter('acf/settings/save_json', 'my_acf_json_save_point');
function my_acf_json_save_point( $path ) {
    // update path
    $path = get_stylesheet_directory() . '/acf-json';
    // return
    return $path;
}

add_filter('acf/settings/load_json', 'my_acf_json_load_point');
function my_acf_json_load_point( $paths ) {
    // remove original path (optional)
    unset($paths[0]);
    // append path
    $paths[] = get_stylesheet_directory() . '/acf-json';
    // return
    return $paths;
}

/**
 *
 *
 * @package WordPress
 * @subpackage WP-Bootstrap
 * @since WP-Bootstrap 0.1
 *
 */

 /**
 * Declaring the content width based on the theme's design and stylesheet.
 */

/**
 * Declaring the theme language domain
 */
load_theme_textdomain('bootstrapwp');

################################################################################
// Loading All CSS Stylesheets
################################################################################
  function bootstrapwp_css_loader() {
    wp_enqueue_style('bootstrap', get_template_directory_uri().'/style.css', false );
  }
add_action('wp_enqueue_scripts', 'bootstrapwp_css_loader');


/*
| -------------------------------------------------------------------
| Registering Navigation
| -------------------------------------------------------------------
| Adds custom menu with wp_page_menu fallback
| */

if ( function_exists( 'register_nav_menu' ) ) {
	register_nav_menu( 'primary-menu', 'Primary Navigation' );
	register_nav_menu( 'footer-menu', 'Footer Navigation' );
}

/**
 * Get our wp_nav_menu() fallback, wp_page_menu(), to show a home link.
 */
function bootstrapwp_page_menu_args( $args ) {
  $args['show_home'] = true;
  return $args;
}
add_filter( 'wp_page_menu_args', 'bootstrapwp_page_menu_args' );



/*
| -------------------------------------------------------------------
| Registering Widget Sections
| -------------------------------------------------------------------
|
*/


function bootstrapwp_theme_setup() {
	/**
	 * Add default posts and comments RSS feed links to head
	 */
	add_theme_support( 'automatic-feed-links' );

	/**
	 * Add support for the Aside and Gallery Post Formats
	 */
	add_theme_support( 'post-formats', array( 'aside', 'image', 'gallery' ) );
}
add_action( 'after_setup_theme', 'bootstrapwp_theme_setup' );

/*
| -------------------------------------------------------------------
| Adding Post Thumbnails and Image Sizes
| -------------------------------------------------------------------
| */
if ( function_exists( 'add_theme_support' ) ) {
  add_theme_support( 'post-thumbnails' );
  set_post_thumbnail_size( 216, 164, true ); // 216 pixels wide by 164 pixels high
}

if ( function_exists( 'add_image_size' ) ) {
  add_image_size( 'home_slide-medium', 720, 480, true); // Used for medium home page slides and background images
  add_image_size( 'home_slide-large', 1440, 960, true); // Used for large home page slides and background images
  add_image_size( 'header-large', 1440, 730, true); // Used for large page intro images
  add_image_size( 'item-medium', 460, 400, true); // Used for booking item images
  add_image_size( 'block-medium', 936, 542, true); // Used for block images
}





/*
| -------------------------------------------------------------------
| Revising Default Excerpt
| -------------------------------------------------------------------
| Adding filter to post excerpts to contain ...Continue Reading link
| */
function bootstrapwp_excerpt($more) {
       global $post;
  return '&nbsp; &nbsp;<a href="'. get_permalink($post->ID) . '">Read post</a>';
}
add_filter('excerpt_more', 'bootstrapwp_excerpt');



if ( ! function_exists( 'bootstrapwp_content_nav' ) ):
/**
 * Display navigation to next/previous pages when applicable
 */
function bootstrapwp_content_nav( $nav_id ) {
	global $wp_query;

	?>

	<?php if ( is_single() ) : // navigation links for single posts ?>
<ul class="pager">
		<?php previous_post_link( '<li class="previous">%link</li>',  _x( '', 'Previous post link', 'bootstrapwp' ) . '</span> Previous Project' ); ?>
		<?php next_post_link( '<li class="next">%link</li>', 'Next Project ' . _x( '', 'Next post link', 'bootstrapwp' ) . '</span>' ); ?>
</ul>
	<?php elseif ( $wp_query->max_num_pages > 1 && ( is_home() || is_archive() || is_search() ) ) : // navigation links for home, archive, and search pages ?>
<ul class="pager">
		<?php if ( get_next_posts_link() ) : ?>
		<li class="next"><?php next_posts_link( __( '<span class="meta-nav">&larr;</span> Older posts', 'bootstrapwp' ) ); ?></li>
		<?php endif; ?>

		<?php if ( get_previous_posts_link() ) : ?>
		<li class="previous"><?php previous_posts_link( __( 'Newer posts <span class="meta-nav">&rarr;</span>', 'bootstrapwp' ) ); ?></li>
		<?php endif; ?>
</ul>
	<?php endif; ?>

	<?php
}
endif; // bootstrapwp_content_nav


if ( ! function_exists( 'bootstrapwp_comment' ) ) :
/**
 * Template for comments and pingbacks.
 *
 * To override this walker in a child theme without modifying the comments template
 * simply create your own bootstrap_comment(), and that function will be used instead.
 *
 * Used as a callback by wp_list_comments() for displaying the comments.
 *
 * @since WP-Bootstrap .5
 */
function bootstrapwp_comment( $comment, $args, $depth ) {
	$GLOBALS['comment'] = $comment;
	switch ( $comment->comment_type ) :
		case 'pingback' :
		case 'trackback' :
	?>
	<li class="post pingback">
		<p><?php _e( 'Pingback:', 'bootstrap' ); ?> <?php comment_author_link(); ?><?php edit_comment_link( __( '(Edit)', 'bootstrap' ), ' ' ); ?></p>
	<?php
			break;
		default :
	?>
	<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
		<article id="comment-<?php comment_ID(); ?>" class="comment">
			<footer>
				<div class="comment-author vcard">
					<?php echo get_avatar( $comment, 40 ); ?>
					<?php printf( __( '%s <span class="says">says:</span>', 'bootstrap' ), sprintf( '<cite class="fn">%s</cite>', get_comment_author_link() ) ); ?>
				</div><!-- .comment-author .vcard -->
				<?php if ( $comment->comment_approved == '0' ) : ?>
					<em><?php _e( 'Your comment is awaiting moderation.', 'bootstrap' ); ?></em>
					<br />
				<?php endif; ?>

				<div class="comment-meta commentmetadata">
					<a href="<?php echo esc_url( get_comment_link( $comment->comment_ID ) ); ?>"><time pubdate datetime="<?php comment_time( 'c' ); ?>">
					<?php
						/* translators: 1: date, 2: time */
						printf( __( '%1$s at %2$s', 'bootstrap' ), get_comment_date(), get_comment_time() ); ?>
					</time></a>
					<?php edit_comment_link( __( '(Edit)', 'bootstrap' ), ' ' );
					?>
				</div><!-- .comment-meta .commentmetadata -->
			</footer>

			<div class="comment-content"><?php comment_text(); ?></div>

			<div class="reply">
				<?php comment_reply_link( array_merge( $args, array( 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
			</div><!-- .reply -->
		</article><!-- #comment-## -->

	<?php
			break;
	endswitch;
}
endif; // ends check for bootstrapwp_comment()

if ( ! function_exists( 'bootstrapwp_posted_on' ) ) :
/**
 * Prints HTML with meta information for the current post-date/time and author.
 * Create your own bootstrap_posted_on to override in a child theme
 *
 * @since WP-Bootstrap .5
 */
function bootstrapwp_posted_on() {
	printf( __( '<span class="sep">Posted on </span><a href="%1$s" title="%2$s" rel="bookmark"><time class="entry-date" datetime="%3$s" pubdate>%4$s</time></a><span class="byline"> <span class="sep"> by </span> <span class="author vcard"><a class="url fn n" href="%5$s" title="%6$s" rel="author">%7$s</a></span></span>', 'bootstrap' ),
		esc_url( get_permalink() ),
		esc_attr( get_the_time() ),
		esc_attr( get_the_date( 'c' ) ),
		esc_html( get_the_date() ),
		esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
		esc_attr( sprintf( __( 'View all posts by %s', 'bootstrap' ), get_the_author() ) ),
		esc_html( get_the_author() )
	);
}
endif;

/**
 * Adds custom classes to the array of body classes.
 *
 * @since WP-Bootstrap .5
 */
function bootstrapwp_body_classes( $classes ) {
	// Adds a class of single-author to blogs with only 1 published author
	if ( ! is_multi_author() ) {
		$classes[] = 'single-author';
	}

	return $classes;
}
add_filter( 'body_class', 'bootstrapwp_body_classes' );

/**
 * Returns true if a blog has more than 1 category
 *
 * @since WP-Bootstrap .5
 */
function bootstrapwp_categorized_blog() {
	if ( false === ( $all_the_cool_cats = get_transient( 'all_the_cool_cats' ) ) ) {
		// Create an array of all the categories that are attached to posts
		$all_the_cool_cats = get_categories( array(
			'hide_empty' => 1,
		) );

		// Count the number of categories that are attached to the posts
		$all_the_cool_cats = count( $all_the_cool_cats );

		set_transient( 'all_the_cool_cats', $all_the_cool_cats );
	}

	if ( '1' != $all_the_cool_cats ) {
		// This blog has more than 1 category so bootstrap_categorized_blog should return true
		return true;
	} else {
		// This blog has only 1 category so bootstrap_categorized_blog should return false
		return false;
	}
}

/**
 * Flush out the transients used in bootstrapwp_categorized_blog
 *
 * @since bootstrap 1.2
 */
function bootstrapwp_category_transient_flusher() {
  // Like, beat it. Dig?
  delete_transient( 'all_the_cool_cats' );
}
add_action( 'edit_category', 'bootstrapwp_category_transient_flusher' );
add_action( 'save_post', 'bootstrapwp_category_transient_flusher' );

/**
 * Filter in a link to a content ID attribute for the next/previous image links on image attachment pages
 */
function bootstrapwp_enhanced_image_navigation( $url ) {
	global $post;

	if ( wp_attachment_is_image( $post->ID ) )
		$url = $url . '#main';

	return $url;
}
add_filter( 'attachment_link', 'bootstrapwp_enhanced_image_navigation' );


/*
| -------------------------------------------------------------------
| Registering promo post type
| -------------------------------------------------------------------
|
*/
function post_type_promo() {
	$supports = array(
	'title', // post title
	'editor', // post content
	'author', // post author
	'thumbnail', // featured images
	'excerpt', // post excerpt
	'custom-fields', // custom fields
	'revisions', // post revisions
	);
	$labels = array(
	'name' => _x('promo', 'plural'),
	'singular_name' => _x('promo', 'singular'),
	'menu_name' => _x('Promo', 'admin menu'),
	'name_admin_bar' => _x('Promo', 'admin bar'),
	'add_new' => _x('Add New', 'add new'),
	'add_new_item' => __('Add New promo'),
	'new_item' => __('New promo'),
	'edit_item' => __('Edit promo'),
	'view_item' => __('View promo'),
	'all_items' => __('All promo'),
	'search_items' => __('Search promo'),
	'not_found' => __('No promo found.'),
	);
	$args = array(
	'show_in_rest' => true,
	'supports' => $supports,
	'labels' => $labels,
	'public' => true,
	'query_var' => true,
	'rewrite' => array('slug' => 'promo'),
	'has_archive' => true,
	'hierarchical' => false,
	);
	register_post_type('promo', $args);
}
add_action('init', 'post_type_promo');

/*
| -------------------------------------------------------------------
| Registering footer post type
| -------------------------------------------------------------------
|
*/
function post_type_footer() {
	$supports = array(
	'title', // post title
	'author', // post author
	'custom-fields', // custom fields
	'revisions', // post revisions
	);
	$labels = array(
	'name' => _x('Footer', 'plural'),
	'singular_name' => _x('Footer', 'singular'),
	'menu_name' => _x('Footer', 'admin menu'),
	'name_admin_bar' => _x('Footer', 'admin bar'),
	'add_new' => _x('Add New', 'add new'),
	'add_new_item' => __('Add New Footer'),
	'new_item' => __('New Footer'),
	'edit_item' => __('Edit Footer'),
	'view_item' => __('View Footer'),
	'all_items' => __('All Footer'),
	'search_items' => __('Search Footer'),
	'not_found' => __('No Footer found.'),
	);
	$args = array(
	'show_in_rest' => true,
	'supports' => $supports,
	'labels' => $labels,
	'public' => true,
	'query_var' => true,
	'has_archive' => false,
	'hierarchical' => false,
	);
	register_post_type('footer', $args);
}
add_action('init', 'post_type_footer');



