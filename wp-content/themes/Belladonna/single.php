<?php
/**
 * The template for displaying all posts.
 *
 * Default Post Template
 *
 * @package WordPress
 * @subpackage WP-Bootstrap
 * @since WP-Bootstrap 0.1
 */

get_header(); ?>

<div id="main">

  <?php while ( have_posts() ) : the_post(); ?>
    <?php
      $page_header_image = get_field('page_header_image');
      $page_color = get_field('page_color');
    ?>

    <?php if($page_header_image): ?>
        <?php $header_image = wp_get_attachment_image_src($page_header_image, 'header-large' ); ?>
        <img src="<?php echo $header_image[0]; ?>" class="header_image" />
    <?php endif; ?>

    <div class="main_section_wrapper section_<?php the_ID(); ?>">
        <h1 class="page-title <?= $page_color ?>"><?php the_title(); ?></h1>
        <div class="main_content">
            <?php if (get_the_content()): ?>
                <?php the_content();?>
            <?php endif; ?>
        </div><!--.main_content-->
    </div><!--.main_section_wrapper-->
  <?php endwhile; // End the loop ?>

  <?php bootstrapwp_content_nav('nav-below');?>
</div><!-- #main -->

<?php get_footer(); ?>
