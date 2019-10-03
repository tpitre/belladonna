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


   <title><?php
  /*
   * Print the <title> tag based on what is being viewed.
   */
  global $page, $paged;

  wp_title( '|', true, 'right' );


  // Add a page number if necessary:
  if ( $paged >= 2 || $page >= 2 )
    echo ' | ' . sprintf( __( 'Page %s', 'bootstrapwp' ), max( $paged, $page ) );

  ?></title>
    <meta charset="<?php bloginfo( 'charset' ); ?>" />
    <!--<meta name="viewport" content="width=device-width, initial-scale=1.0, target-densitydpi=medium-dpi" />-->

    <meta name="viewport" content="initial-scale=1.0, width=device-width" />

    <link href="<?php bloginfo('template_url'); ?>/css/main.css?v=0.1" rel="stylesheet" type="text/css" />


    <link rel="profile" href="http://gmpg.org/xfn/11" />
    <link href="https://fonts.googleapis.com/css?family=Roboto+Condensed:400,400i,700,700i&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://use.typekit.net/jod6wrq.css">
    <?php if ( is_singular() && get_option( 'thread_comments' ) ) wp_enqueue_script( 'comment-reply' ); ?>
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />

  <!-- Le fav and touch icons -->
    <link rel="shortcut icon" href="<?php bloginfo( 'template_url' );?>/images/favicon.ico?v=2" />
    <!--<link rel="apple-touch-icon" href="<?php bloginfo( 'template_url' );?>/images/paradox_icon_57x57.png" />-->


    <meta name="p:domain_verify" content="59c1b9f9b1739a7e5142127e0118c65b"/>

  <!--[if lt IE 9]>
<script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->




  <?php wp_head(); ?>



  </head>

  <body <?php body_class(); ?>>

  <div id="wrapper_all">
  <div id="wrapper">

      <header>
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



