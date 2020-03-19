<?php
get_header(); ?>

<div id="main">

  <?php 
    while ( have_posts() ) : the_post(); 
      $page_header_image = get_field('page_header_image');
      $page_color = get_field('page_color');
      
      if ($page_header_image): 
       $header_image = wp_get_attachment_image_src($page_header_image, 'header-large' ); ?>
        <img src="<?php echo $header_image[0]; ?>" class="header_image" />
    <?php 
      endif; ?>

  <div class="main_section_wrapper section_<?php the_ID(); ?>">
    <h1 class="page-title <?php echo $page_color ?>"><?php the_title(); ?></h1>

    <div class="l-grid l-grid--content l-grid--large-gutters u-pad--triple--top u-pad--zero--bottom u-pad-at-md--triple--bottom c-blog">
      <div class="l-grid-item main_content c-blog-entry">
        <?php the_content();?>
        
        <hr>

        <div class="u-flex u-items-center u-space--y c-blog-nav">
          <div class="u-pad-at-md--half--right">
            <?php
            $has_prev_post = get_previous_post_link();
            $previous_post_url = get_permalink( get_adjacent_post(false,'',true)->ID );
            $prevID = get_previous_post()->ID; 
            $page_header_image = get_field( 'page_header_image', $prevID );
            if ($page_header_image && $has_prev_post):  
              $img = wp_get_attachment_image_src($page_header_image, 'blog-nav' ); ?>
              <a class="u-border--none" href="<?php echo $previous_post_url ?>">
                <img src="<?php echo $img[0]; ?>" class="u-full-width o-post-nav-img" alt="previous entry" />
              </a>
            <?php 
            endif;
            if ( $prevID ) : ?>
            &lsaquo;
            <?php 
             previous_post_link( '<strong class="o-post-nav-link">%link</strong>' );
            endif;
            ?>
          </div>
          <div class="u-width-at-md--half u-align-at-md--right u-pad-at-md--half--left">
            <?php
              $has_next_post = get_next_post_link();
              $next_post_url = get_permalink( get_adjacent_post(false,'',false)->ID );
              $nextID = get_next_post()->ID;
              $page_header_image = get_field( 'page_header_image', $nextID );
              if ($page_header_image && $has_next_post ):  
                $img = wp_get_attachment_image_src($page_header_image, 'blog-nav' ); ?>
                <a class="u-border--none" href="<?php echo $next_post_url ?>">
                  <img src="<?php echo $img[0]; ?>" class="u-full-width o-post-nav-img" alt="next entry" />
                </a>
              <?php 
              endif;
              next_post_link( '<strong class="o-post-nav-link">%link</strong>' ); ?>
            <?php if ( $nextID ) : ?> &rsaquo; <?php endif; ?>
          </div>
        </div>

      </div>
      <div class="l-grid-item c-blog__sidebar">
        <?php 
          get_template_part('templates/sidebar-blog'); ?>
      </div>
    </div>
  </div><!-- .main_content_wrapper -->  
<?php endwhile; // End the loop ?>
</div><!-- #main -->   
 


<?php get_footer(); ?>
