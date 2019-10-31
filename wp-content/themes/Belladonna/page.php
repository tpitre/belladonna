<?php
get_header(); the_post();
$page_header_image = get_field('page_header_image');
$page_color = get_field('page_color');
$menu_section = get_field('menu_section');
$page_blocks = get_field('page_blocks');
function format_section_title($str) {
    return str_replace(array(' '), '-', strtolower(trim($str)));
}

?>

<div id="main">

    <?php if($page_header_image): ?>
        <?php $header_image = wp_get_attachment_image_src($page_header_image, 'header-large' ); ?>
        <div class="header_container"><img src="<?php echo $header_image[0]; ?>" class="header_image" /></div>
    <?php endif; ?>

    <div class="main_section_wrapper section_<?php the_ID(); ?>">
        <h1 class="page-title <?= $page_color ?>"><?php the_title(); ?></h1>
        <div class="main_content">
            <?php if (get_the_content()): ?>
                <?php the_content();?>
            <?php endif; ?>

            <?php if ($page_blocks): ?>
                <?php while(has_sub_field('page_blocks')): ?>
                    <div class="section_blocks">
                        <!-- Image blocks -->
                        <?php if (get_row_layout() == 'image_block'): ?>
                            <?php $block_color = get_sub_field('block_color');
                            if (get_sub_field('image_left') == '1'):
                                $image_left = 'left';
                            else:
                               $image_left = '';
                            endif; ?>
                            <div class="image_block  <?php echo $image_left;?>">
                                <div class="block_info <?= $block_color ?>">
                                    <?php if (get_sub_field('block_title')): ?>
                                        <h2><?= the_sub_field('block_title') ?></h2>
                                    <?php endif; ?>
                                    <?php if (get_sub_field('block_description')): ?>
                                        <p><?= the_sub_field('block_description') ?></p>
                                    <?php endif; ?>
                                    <?php if (get_sub_field('block_link')): ?>
                                        <a href="<?= the_sub_field('block_link') ?>" class="block_btn"><?= the_sub_field('block_link_title') ?></a>
                                    <?php endif; ?>
                                </div><!--.block_image-->
                                <div class="block_image">
                                    <?php if (get_sub_field('block_image')): ?>
                                        <?php $block_image = get_sub_field('block_image'); ?>
                                        <?php $image_block = wp_get_attachment_image_src($block_image, 'block-medium' ); ?>
                                        <img src="<?php echo $image_block[0]; ?>" />
                                    <?php endif; ?>
                                </div><!--.block_image-->
                            </div><!--.image_block-->
                        <?php endif; ?>
                    </div><!--.section_blocks-->
                <?php endwhile; ?>
            <?php endif; ?>

            <?php if (get_the_ID() === 7): ?>
                <!-- SPA menu links -->
                <div class="c-section-nav">
                    <?php foreach($menu_section as $section): ?>
                        <a class="c-section-nav__link" href="#<?= format_section_title($section['section_title']) ?>"><?= $section['section_title'] ?></a>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>

            <?php if ($menu_section): ?>
                <?php foreach($menu_section as $section): ?>

                    <div class="menu_section" <?php print get_the_ID() === 7 ? 'id="' . format_section_title($section['section_title']) . '"' : ''; ?>>
                        <?php if($section['section_title']): ?>
                            <h2><?= $section['section_title'] ?></h2>
                        <?php endif; ?>
                        <?php if($section['section_description']): ?>
                            <p class="section_intro"><?= $section['section_description'] ?></p>
                        <?php endif; ?>

                        <?php if($section['book_items']): ?>
                            <div class="menu_items">
                            <?php foreach($section['book_items'] as $menu_item):
                                if ($menu_item['wide_row'] == '1'):
                                    $wide_row = 'wide_row';
                                else:
                                   $wide_row = '';
                                endif; ?>
                                <div class="menu_item <?php echo $wide_row;?>">
                                    <?php if($menu_item['item_image']): ?>
                                        <?php $menu_image = wp_get_attachment_image_src($menu_item['item_image'], 'item-medium' ); ?>
                                        <img src="<?php echo $menu_image[0]; ?>" class="menu_image" />
                                    <?php endif; ?>
                                    <?php if (($menu_item['wide_row'] == '1') && ($menu_item['item_image'])): ?>
                                        <div class="text_info">
                                    <?php endif; ?>
                                        <div class="title_info">
                                            <?php if($menu_item['item_title']): ?>
                                                <h4><?= $menu_item['item_title'] ?></h4>
                                            <?php endif; ?>
                                            <?php if($menu_item['item_description']): ?>
                                                <p><?= $menu_item['item_description'] ?></p>
                                            <?php endif; ?>
                                        </div><!--.booking_info-->
                                        <div class="booking_info">
                                            <?php if($menu_item['time']): ?>
                                                <p class="desc_txt"><?= $menu_item['time'] ?></p>
                                            <?php endif; ?>
                                            <?php if($menu_item['price']): ?>
                                                <h4 class="price_txt"><?= $menu_item['price'] ?></h4>
                                            <?php endif; ?>
                                            <?php if($menu_item['booking_url']): ?>
                                                <a href="<?= $menu_item['booking_url'] ?>" class="booking_btn  <?= $page_color ?>" target="_blank">Book Now</a>
                                            <?php endif; ?>
                                        </div><!--.booking_info-->
                                    <?php if (($menu_item['wide_row'] == '1') && ($menu_item['item_image'])): ?>
                                        </div><!--.text_info-->
                                    <?php endif; ?>
                                </div><!--.menu_item-->
                            <?php endforeach; ?>
                            </div><!--.menu_all_items-->
                        <?php endif; ?>

                    </div><!--.menu_section-->

                <?php endforeach; ?>
            <?php endif; ?>

            <?php if (get_the_ID() === 15): ?>
                <!-- About promos -->
                <?php

                wp_enqueue_style( 'slick-style', get_template_directory_uri() . '/css/slick.css', false, '1.8.1', 'all');
                wp_enqueue_style( 'slick-theme', get_template_directory_uri() . '/css/slick-theme.css', false, '1.8.1', 'all');
                wp_enqueue_script( 'slick', get_template_directory_uri() . '/js/slick.min.js', array ( 'jquery' ), '1.8.1', false);

                // WP_Query arguments
                $args = array (
                'post_type'   => array( 'promo' ),
                'post_status' => array( 'publish' ),
                'meta_query'  => array(
                    'relation'  => 'AND',
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
                $all_promos = new WP_Query( $args );
                ?>

                <?php if (!empty($all_promos) && $all_promos->have_posts()) : ?>
                <!-- Promo Carousel -->
                <h2>Specials + Promos</h2>
                <div class="slider center">
                    <?php foreach ($all_promos->posts as $promo) : ?>
                        <div class="slide">
                            <?php
                            $slide_img = get_field('promo_image', $promo->ID);
                            if (!empty($slide_img)) :
                            ?>
                            <div class="slide__img" style="background-image: url(<?php print $slide_img; ?>)"></div>
                            <?php endif; ?>
                            <div class="slide__msg">
                                <?php print $promo->post_title ?>
                            </div>
                            <div class="slide__cta">
                                <?php print $promo->post_content ?>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
                <?php endif; ?>
            <?php endif; ?>

        </div><!--.main_content-->

    </div><!--.main_section_wrapper-->

</div><!-- #main -->


<?php get_footer(); ?>
