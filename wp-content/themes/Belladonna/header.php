<?php
/**
 *
 * Default Page Header
 *
 * @package
 * @subpackage
 * @since
 *
 *
 */ ?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
  <head>

    <title>
      <?php
        /*
         * Print the <title> tag based on what is being viewed.
         */
        global $page, $paged;

        wp_title( '|', true, 'right' );

        // Add a page number if necessary:
        if ( $paged >= 2 || $page >= 2 )
          echo ' | ' . sprintf( __( 'Page %s', 'bootstrapwp' ), max( $paged, $page ) );
      ?>
    </title>
    <meta charset="<?php bloginfo( 'charset' ); ?>" />
    <meta name="viewport" content="initial-scale=1.0, width=device-width" />

    <link href="<?php bloginfo('template_url'); ?>/css/main.css?v=0.3" rel="stylesheet" type="text/css" />

    <link rel="profile" href="http://gmpg.org/xfn/11" />
    <link href="https://fonts.googleapis.com/css?family=Roboto+Condensed:400,400i,700,700i&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://use.typekit.net/jod6wrq.css">
    <?php if ( is_singular() && get_option( 'thread_comments' ) ) wp_enqueue_script( 'comment-reply' ); ?>
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />

    <link rel="shortcut icon" href="<?php bloginfo( 'template_url' );?>/images/favicon.ico?v=2" />
    <link rel="apple-touch-icon" href="<?php bloginfo( 'template_url' );?>/images/paradox_icon_57x57.png" />

    <meta name="p:domain_verify" content="59c1b9f9b1739a7e5142127e0118c65b"/>

    <?php wp_head(); ?>

    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-91493314-1"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());

      gtag('config', 'UA-91493314-1');
    </script>

  </head>

  <body <?php body_class(); ?>>

  <?php
  if (is_page()):
    $cur_page = get_post();

    // WP_Query arguments
    $args = array (
      'post_type'   => array( 'promo' ),
      'post_status' => array( 'publish' ),
      'meta_query'  => array(
        'relation'  => 'AND',
        // Promos targeted to current page id.
        array(
          'key'     => 'page_to_display',
          'value'   => '"' . $cur_page->ID . '"',
          'compare' => 'LIKE'
        ),
        // Promos end date after today's date.
        array(
          'key'     => 'end_date',
          'value'   => date('Ymd'), // Format is important.
          'compare' => '>',
          'type'    => 'DATE'
        ),
        // Promos start date before or equal to today's date.
        array(
          'key'     => 'start_date',
          'value'   => date('Ymd'), // Format is important.
          'compare' => '<=',
          'type'    => 'DATE'
        ),
      ),
      'posts_per_page'  => -1,
      'meta_key'        => 'start_date',
      'orderby'         => 'meta_value',
      'order'           => 'DESC'
    );

    // The Query
    $promos = new WP_Query( $args );

    set_query_var( 'promos', $promos );
    get_template_part('promo', 'carousel');
  endif;
  ?>

  <div id="wrapper_all">
  <div id="wrapper" class="<?php if (!empty($promos) && $promos->have_posts()): print 'has-promos'; endif; ?>">

  <?php wp_reset_postdata(); ?>

    <header class="header">
      <h1 id="site_title">
        <a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home" class="home_link">
          <?php if ( is_front_page() ) { ?>
            <img src="<?php bloginfo('template_url'); ?>/images/belladonna-logo-white.png" alt="Belladonna" />
          <?php } else { ?>
            <img src="<?php bloginfo('template_url'); ?>/images/belladonna-logo.png" alt="Belladonna" />
          <?php } ?>
        </a>
        <span class="sitetitle"><?php bloginfo( 'name' ); ?></span>
      </h1>
      <hgroup id="headergroup">
        <?php wp_nav_menu( array( 'theme_location' => 'primary-menu' ) ); ?>
      </hgroup>
  </header>



