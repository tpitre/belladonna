<?php
/**
 * The template for displaying Archive pages.
 *
 * Used to display archive-type pages if nothing more specific matches a query.
 * For example, puts together date-based pages if no date.php file exists.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage WP-Bootstrap
 * @since WP-Bootstrap 0.6
 */

get_header(); ?>

	<div id="main" class="clearfix">
    
    	<header class="main_title">
        
            <h1><?php the_title(); ?></h1>
        
        </header>
    
    
    <div class="section_main_content">
	
	
		<?php if (have_posts() ) ;?>
        
            <div id="primary">
                <?php while ( have_posts() ) : the_post(); ?>
                
                 <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                        
                        <div class="news_category"><?php the_category(); ?></div>
                        
                        <div class="news_content">
                        
                            <header>
                                <div class="news_date"><?php the_date();?></div>
                                    <a href="<?php the_permalink(); ?>" title="<?php the_title();?>">
                                        <h2><?php the_title();?></h2>
                                    </a>
                            </header>
                     
                            <?php the_excerpt();?>
                        
                        </div><!--.news_content-->
                      
                </article>
              

      			<?php endwhile; // End the loop ?>
			</div><!-- #primary -->
            
            <div id="secondary">
				<?php get_sidebar('blog'); ?>
            </div><!-- #secondary -->   
    
    
    </div><!-- .section_main_content -->
        
        
    </div><!-- #main --> 
    

<?php get_footer(); ?>