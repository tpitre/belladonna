<?php
/**
 * The template for displaying 404 pages (Not Found).
 *
 * @package WordPress
 * @subpackage WP-Bootstrap
 * @since WP-Bootstrap 0.7
 *
 */
get_header(); ?>

<div id="main" class="clearfix">
  <div class="main_section_wrapper">
    <h1 class="page-title Red" style="margin-top: 20px;">Missing Page 😦</h1>

    <div class="main_content">

      <h2 style="text-align:left">It seems we can&rsquo;t find what you&rsquo;re looking for.</h2>

      <p>We apologize for any inconvenience. Perhaps one of the links below, can help.</p>

      <p>
        <h2 style="text-align:left">All Pages</h2>
        <?php wp_page_menu(); ?>
      </p>

    </div>
  </div>
</div>
