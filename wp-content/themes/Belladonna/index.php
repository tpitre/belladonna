<?php


get_header(); ?>

    <div id="main" class="clearfix">
    
    	<header class="main_title">
        
            <h1>Blog</h1>
        
        </header>
    
    
    <div class="section_main_content clearfix">
    
        
        <div id="primary">	
		<?php while ( have_posts() ) : the_post(); 
		$image_thumbnail = wp_get_attachment_image_src(get_post_thumbnail_id( $post->ID ), 'thumbnail');
		?>
  		
        
        	 <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                
                <div class="news_category"><?php the_category(); ?></div>
                
                <div class="news_content">
                
                	<header>
                        <div class="news_date"><?php the_date();?></div>
                            <a href="<?php the_permalink(); ?>" title="<?php the_title();?>">
                                <h2><?php the_title();?></h2>
                            </a>
                    </header>
             
                	<?php the_content();?>
                
                </div><!--.news_content-->
              
           </article>	
        
        <?php endwhile; // End the loop ?>
    
        <?php bootstrapwp_content_nav('nav-below');?>
        
        </div><!-- #primary -->
    
    <div id="secondary">
        <?php get_sidebar('blog'); ?>
    </div><!-- #secondary -->
        
        
        
        </div><!-- .section_main_content -->
        
        
    </div><!-- #main -->    



<?php get_footer(); ?>