<div class="c-blog-sidebar">

  <div class="c-blog-sidebar__signup">
    <p>SIGN UP FOR NEWS + OFFERS!</p>
    <?php 
      echo do_shortcode( '[mc4wp_form id="226"]' ); ?>
  </div>

  <p class="c-blog-sidebar__title">Categories</p>

  <ul class="c-blog-sidebar__links">
    <?php wp_list_categories( array(
        'title_li' => ''
    ) ); ?>
  </ul>

  <p class="c-blog-sidebar__title">Recent Posts</p>

  <ul class="c-blog-sidebar__links">
    <?php 
    $args = array(
      'post_type'   => 'post',
      'limitposts'  => 5,
    ); 
    $q = new WP_Query( $args );
    if ( $q->have_posts() ) :
      while ( $q->have_posts() ) :
        $q->the_post();
        echo '<li><a href="'.get_the_permalink().'">' . get_the_title() . '</a></li>';
      endwhile;
      wp_reset_postdata();      
    endif;
    ?>
  </ul>

</div>
