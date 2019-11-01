</div><!-- #wrapper -->

<footer id="footer">

  <div class="footer_wrapper">

    <a href="<?php echo esc_url( home_url( '/' ) ); ?>"
      title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home" class="home_link">
      <img src="<?php bloginfo('template_url'); ?>/images/belladonna-logo-white-tag.png" alt="Belladonna" />
    </a>

    <!-- Footer blocks -->
    <?php

    // WP_Query arguments
    $args = array (
    'post_type'       => array( 'footer' ),
    'post_status'     => array( 'publish' ),
    'posts_per_page'  => 1,
    'page'            => 1,
    'order'           => 'DESC',
    'orderby'         => 'modified',
    );

    // The Query
    $footer = new WP_Query( $args );
    $hours = !empty($footer->posts) ? get_field('footer_hours', $footer->posts[0]->ID) : '';
    $info = !empty($footer->posts) ? get_field('footer_company_info', $footer->posts[0]->ID) : '';
    $subscribe = !empty($footer->posts) ? get_field('footer_subscribe', $footer->posts[0]->ID) : '';

    ?>

    <div class="footer_blocks">

      <div class="footer_hours">
        <?php print $hours ?>
      </div>

      <div class="footer_contact">
        <?php print $info ?>
      </div>

      <div class="footer_signup">
        <?php print $subscribe ?>
      </div>

    </div>

    <div class="footer_nav">
      <?php wp_nav_menu( array( 'theme_location' => 'footer-menu' ) ); ?>
    </div>

    <div class="copyright">Copyright &copy; <?php echo date('Y') ?> <?php bloginfo( 'name' ); ?>. All Rights Reserved.</div>

  </div><!-- .footer_wrapper -->

</footer>


</div><!-- #wrapper_all -->


<?php wp_footer(); ?>

<script src="<?php bloginfo('template_url'); ?>/js/respond.min.js"></script>
<script src="<?php bloginfo('template_url'); ?>/js/jquery-ui-1.10.3.js"></script>
<script src="<?php bloginfo('template_url'); ?>/js/jquery.scrollTo.min.js"></script>
<script src="<?php bloginfo('template_url'); ?>/js/responsive-img.min.js"></script>
<script src="<?php bloginfo('template_url'); ?>/js/script.js?v=0.2"></script>

</body>

</html>