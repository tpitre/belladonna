<?php

function custom_menu_order( $menu_ord ) {
  if ( !$menu_ord ) return true;
  return array(
    'index.php', // Dashboard
    'separator1', // First separator
    'edit.php?post_type=page', // Pages
    'edit.php?post_type=promo', // PROMO
    'edit.php?post_type=bd_team', // TEAM
    'edit.php?post_type=footer', // FOOTER
    'edit.php', // Posts
    'upload.php', // Media
    'edit-comments.php', // Comments
    'admin.php?page=acf-options-blog-sidebar',
    'separator2', // Second separator
    'themes.php', // Appearance
    'plugins.php', // Plugins
    'users.php', // Users
    'tools.php', // Tools
    'options-general.php', // Settings
    'separator-last', // Last separator
  );
}
add_filter( 'custom_menu_order', 'custom_menu_order' ); // Activate custom_menu_order
add_filter( 'menu_order', 'custom_menu_order' );
