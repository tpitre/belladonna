<?php
// SINGLE TEAM MEMBER POST

get_header(); ?>

<div id="main">

  <?php while ( have_posts() ) : the_post(); ?>
    <?php
      $page_header_image = get_field('page_header_image', 1189); // TEAM PAGE
      $page_color        = get_field('page_color', 1189);
    ?>

    <?php if($page_header_image): ?>
        <?php $header_image = wp_get_attachment_image_src( $page_header_image, 'header-large' ); ?>
        <img src="/wp-content/uploads/2019/08/fitness-header.jpg" class="header_image" />
    <?php endif; ?>

    <div class="main_section_wrapper section_<?php the_ID(); ?>">
        <h1 class="page-title <?= $page_color ?>">TEAM</h1>
        <div class="main_content">
           <div class="l-grid l-grid--content l-grid--large-gutters u-pad--triple--top u-pad--zero--bottom u-pad-at-md--triple--bottom u-items-center c-profile">
            <div class="l-grid-item">
              <img class="u-full-width" src="<?php echo get_the_post_thumbnail_url(get_the_ID(),'team-single') ?>" alt="">
            </div>
            <div class="l-grid-item">
              <h2><?php echo get_the_title() ?></h2>
              <h3><?php the_field( 'title' ) ?></h3>

              <ul class="u-pad--double--left u-pad--top">
              <?php
                if( have_rows('specialties') ):
                  while ( have_rows('specialties') ) : the_row();
                    echo '<li>'.get_sub_field('specialty').'</li>';   
                  endwhile;
                endif;
                ?>
              </ul>
            
              <p class="u-pad--top">
                <a class="button" href="#">BOOK SESSION</a>
              </p>              
            </div>
            <div class="l-grid-item">
              <h3>About</h3>
              <?php the_field( 'bio' ) ?>

              <div class="u-pad--top">
              <?php 
              if( have_rows('social_media') ) :
                $max =  count( get_field('social_media') );
                $dot = '<span class="u-pad--qtr--x">&middot;</span>';
                $cnt = 0;
                while ( have_rows('social_media') ) : the_row();  ?>
                  <a href="<?php the_sub_field('url') ?>"><?php the_sub_field('site') ?></a>                  
              <?php 
                 $cnt++;
                 if ( $cnt > 0 && $cnt < $max) echo $dot; 
                endwhile;
              endif;
              ?>
              </div>
            </div>
            <div class="l-grid-item">
              <blockquote class="u-pad--double--top u-pad-at-md--zero--top u-pad--zero--bottom  u-pad-at-md--double--bottom c-profile__quote">
                <?php the_field('quote'); ?>
              </blockquote>
            </div>
          </div>
        </div><!--.main_content-->
    </div><!--.main_section_wrapper-->
  <?php endwhile; // End the loop ?>
</div><!-- #main -->

<?php get_footer(); ?>
