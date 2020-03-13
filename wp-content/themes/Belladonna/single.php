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
      <div class="l-grid-item main_content">
        <?php the_content();?>
        <?php bootstrapwp_content_nav('nav-below'); ?>
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
