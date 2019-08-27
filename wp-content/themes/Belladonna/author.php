<?php
/**
 * The template for displaying Author Archive pages.
 *
 * @package WordPress
 * @subpackage WP-Bootstrap
 * @since WP-Bootstrap 0.1
 */

get_header(); ?>

<div id="main" class="clearfix">

<?php if ( have_posts() ) : ?>

	<?php
	/* Queue the first post, that way we know
	 * what author we're dealing with (if that is the case).
	 *
	 * We reset this later so we can run the loop
	 * properly with a call to rewind_posts().
	 */
	the_post();
	?>
	
	<header class="entry_header">
			<h1 class="page-title author"><?php printf( __( 'Author Archives: %s', 'bootstrapwp' ), '<span class="vcard"><a class="url fn n" href="' . get_author_posts_url( get_the_author_meta( "ID" ) ) . '" title="' . esc_attr( get_the_author() ) . '" rel="me">' . get_the_author() . '</a></span>' ); ?></h1>
	</header>
    
		<?php
		/* Since we called the_post() above, we need to
		 * rewind the loop back to the beginning that way
		 * we can run the loop properly, in full.
		 */
		rewind_posts();
		?>
		<div id="primary">
				<?php /* Start the Loop */ ?>
				<?php while ( have_posts() ) : the_post(); ?>
				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                
                <header>
                    <a href="<?php the_permalink(); ?>" title="<?php the_title();?>">
                        <h3><?php the_title();?></h3>
                    </a>
                    
                    <p class="meta"><?php echo bootstrapwp_posted_on();?></p>
                </header>
              
				 <?php if($image_thumbnail) { ?>
                    <a href="<?php the_permalink() ?>">
                        <img src="<?php echo $image_thumbnail[0]; ?>" class="alignleft" />
                    </a>
                <?php } ?>
                
                <?php the_excerpt();?>
              
           </article>	
           <?php endwhile; // End the loop ?>
           
		</div><!-- #primary -->
        
        <div id="secondary">
        	<?php get_sidebar('blog'); ?>
    	</div><!-- #secondary -->
        

<?php endif; ?>
<?php get_footer(); ?>