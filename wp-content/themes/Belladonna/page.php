<?php
get_header(); the_post();
$page_header_image = get_field('page_header_image');
$page_color = get_field('page_color');
$menu_section = get_field('menu_section');
$page_blocks = get_field('page_blocks');
?>

<div id="main">

    <?php if($page_header_image): ?>
        <?php $header_image = wp_get_attachment_image_src($page_header_image, 'header-large' ); ?>
        <img src="<?php echo $header_image[0]; ?>" class="header_image" />
    <?php endif; ?>

    <div class="main_section_wrapper">
        <h1 class="page-title <?= $page_color ?>"><?php the_title(); ?></h1>
        <div class="main_content">
            <?php if (get_the_content()): ?>
                <?php the_content();?>
            <?php endif; ?>
        </div><!--.main_content-->

    </div><!--.main_section_wrapper-->

    <?php if ($page_blocks): ?>
        <?php while(has_sub_field('page_blocks')): ?>
            <div class="section_blocks">
                <!-- Image block -->
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
                <!-- Double Image block -->
                <?php if (get_row_layout() == 'double_image_block'): ?>
                    <div class="main_section_wrapper">
                        <div class="main_content">
                            <?php if (get_sub_field('text_right') == '1'):
                                $text_right = 'right';
                            else:
                               $text_right = '';
                            endif; ?>
                            <div class="image_block  <?php echo $text_right;?>">
                                <div class="block_image_left">
                                    <?php if (get_sub_field('block_image')): ?>
                                        <?php $block_image = get_sub_field('block_image'); ?>
                                        <?php $image_block_left = wp_get_attachment_image_src($block_image, 'col-medium-wide' ); ?>
                                        <img src="<?php echo $image_block_left[0]; ?>" />
                                    <?php endif; ?>
                                    <div class="text_info">
                                        <?php if (get_sub_field('block_title')): ?>
                                            <h2 class="<?= $page_color ?>"><?= the_sub_field('block_title') ?></h2>
                                        <?php endif; ?>
                                        <?php if (get_sub_field('block_description')): ?>
                                            <p><?= the_sub_field('block_description') ?></p>
                                        <?php endif; ?>
                                        <?php if (get_sub_field('block_link')): ?>
                                            <a href="<?= the_sub_field('block_link') ?>" class="block_btn <?= $page_color ?>"><?= the_sub_field('block_link_title') ?></a>
                                        <?php endif; ?>
                                    </div><!--.text_info-->
                                </div><!--.block_image_left-->
                                <div class="block_image_right">
                                    <?php if (get_sub_field('block_image_2')): ?>
                                        <?php $block_image_2 = get_sub_field('block_image_2'); ?>
                                        <?php $image_block_right = wp_get_attachment_image_src($block_image_2, 'col-medium' ); ?>
                                        <img src="<?php echo $image_block_right[0]; ?>" />
                                    <?php endif; ?>
                                </div><!--.block_image_right-->
                            </div><!--.image_block-->
                        </div><!--.main_content-->
                    </div><!--.main_section_wrapper-->
                <?php endif; ?>
                <!-- Text block -->
                <?php if (get_row_layout() == 'text_block'): ?>
                    <div class="main_section_wrapper">
                        <div class="main_content">
                            <div class="text_block">
                                <?php if (get_sub_field('block_title')): ?>
                                    <h2><?= the_sub_field('block_title') ?></h2>
                                <?php endif; ?>
                                <?php if (get_sub_field('block_description')): ?>
                                    <p><?= the_sub_field('block_description') ?></p>
                                <?php endif; ?>
                            </div><!--.text_block-->
                        </div><!--.main_content-->
                    </div><!--.main_section_wrapper-->
                <?php endif; ?>
            </div><!--.section_blocks-->
        <?php endwhile; ?>
    <?php endif; ?>

    <div class="main_section_wrapper">
        <div class="main_content">
            <?php if ($menu_section): ?>
                <?php foreach($menu_section as $section): ?>

                    <div class="menu_section">
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
        </div><!--.main_content-->
    </div><!--.main_section_wrapper-->

</div><!-- #main -->


<?php get_footer(); ?>
