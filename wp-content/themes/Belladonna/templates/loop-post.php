<article class="u-pad--bottom c-archive-post">
  <h2 class="c-archive-post__title">
    <a href="<?php the_permalink() ?>"><?php the_title() ?></a>
  </h2>
  <?php
    $img = get_field('page_header_image');
    if ($img) :
  ?>
  <div class="c-archive-post__image">
    <img class="u-full-width" src="<?php echo wp_get_attachment_image_src( $img, 'blog-thumb' )[0] ?>" alt="">
  </div>
  <?php
    endif; 
  ?>

  <div class="c-archive-post__summary">
  <?php the_excerpt(); ?>

  <p><a class="color-red" href="<?php the_permalink() ?>">read more</a></p>
  </div>
</article>

