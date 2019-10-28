</div><!-- #wrapper -->

<footer id="footer">

  <div class="footer_wrapper">

    <a href="<?php echo esc_url( home_url( '/' ) ); ?>"
      title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home" class="home_link">
      <img src="<?php bloginfo('template_url'); ?>/images/belladonna-logo-white.png" alt="Belladonna" />
    </a>

    <div class="footer_blocks">

      <div class="footer_hours">
        <h6>Hours of Operation</h6>
        <ul class="operation-days">
          <li class="bds-day ">
            <span><strong>Monday</strong> - 9:00 am to 6:00 pm</span>
          </li>
          <li class="bds-day ">
            <span><strong>Tuesday</strong> - 9:00 am to 6:00 pm</span>
          </li>
          <li class="bds-day ">
            <span><strong>Wednesday</strong> - 9:00 am to 8:00 pm</span>
          </li>
          <li class="bds-day is-current">
            <span><strong>Thursday</strong> - 9:00 am to 8:00 pm</span>
          </li>
          <li class="bds-day ">
            <span><strong>Friday</strong> - 9:00 am to 6:00 pm</span>
          </li>
          <li class="bds-day ">
            <span><strong>Saturday</strong> - 9:00 am to 6:00 pm</span>
          </li>
          <li class="bds-day ">
            <span><strong>Sunday</strong> - 12:00 pm to 5:00 pm</span>
          </li>
        </ul>
      </div>

      <div class="footer_contact">
        <p>Spa + Retail Therapy + Laser<br>
          2900 Magazine St.<br>
          New Orleans, LA 70115<br>
          504.891.4393</p>

        <div class="copyright">Copyright &copy; <?php echo date('Y') ?> <?php bloginfo( 'name' ); ?>. <br> All Rights Reserved.
    </div>
      </div>

      <div class="footer_signup">
        <h6>Sign Up for Exclusive Offers!</h6>
        <?php echo do_shortcode('[mc4wp_form id="226"]'); ?>
      </div>

    </div>

  </div><!-- .footer_wrapper -->

</footer>


</div><!-- #wrapper_all -->


<?php wp_footer(); ?>

<script src="<?php bloginfo('template_url'); ?>/js/respond.min.js"></script>
<script src="<?php bloginfo('template_url'); ?>/js/jquery-ui-1.10.3.js"></script>
<script src="<?php bloginfo('template_url'); ?>/js/jquery.scrollTo.min.js"></script>
<script src="<?php bloginfo('template_url'); ?>/js/responsive-img.min.js"></script>
<script src="<?php bloginfo('template_url'); ?>/js/script.js?v=0.1"></script>

</body>

</html>