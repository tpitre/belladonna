<?php
get_header(); 
// THIS HAS INCOMING POSTS ARRAY SO LET'S GRAB THIS SPECIFICALLY
$pid               = get_option( 'page_for_posts' );
$page_header_image = get_field( 'page_header_image', $pid );
$page_color        = get_field( 'page_color', $pid );
?>

<div id="main">
<?php
if ($page_header_image) : ?>
<img src="<?php echo wp_get_attachment_url( $page_header_image, 'header-large' ) ?>" class="header_image" alt="Belladonna Blog" />
<?php endif; ?>

  <div class="main_section_wrapper section_<?php the_ID(); ?>">
  <h1 class="page-title <?php echo $page_color ?>">
  <?php
    if ( is_category() ) : 
      echo single_cat_title();
    else :
      echo 'BLOG';
    endif; ?>
  </h1>

 
    <div class="l-grid l-grid--content l-grid--large-gutters u-pad--triple--top u-pad--zero--bottom u-pad-at-md--triple--bottom c-blog">
      <div class="l-grid-item c-blog__archive">
        <?php 
          while ( have_posts() ) : the_post(); 
            get_template_part( 'templates/loop-post' );
          endwhile; 

          bootstrapwp_content_nav('nav-below'); ?>
      </div>
      <div class="l-grid-item c-blog__sidebar">
        <?php 
          get_template_part('templates/sidebar-blog'); ?>
      </div>
    </div>
  </div><!-- .main_content -->  
</div><!-- #main -->    



<?php get_footer(); ?>
