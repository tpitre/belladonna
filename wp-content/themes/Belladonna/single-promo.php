<?php
get_header();
$page_header_image = get_field('promo_image');
$page_color = get_field('page_color', 201);
$details = get_field('promo_details');
// $page_blocks = get_field('page_blocks');
function format_section_title($str) {
    return str_replace(array(' '), '-', strtolower(trim($str)));
}

?>

<div id="main">

    <?php if($page_header_image): ?>

        <div class="header_container"><img src="<?php echo $page_header_image; ?>" class="header_image" /></div>
    <?php endif; ?>

    <div class="main_section_wrapper section_<?php the_ID(); ?>">
        <h1 class="page-title <?= $page_color ?>"><?php the_title(); ?></h1>
        <div class="main_content">
            <?php if (get_the_content()): ?>
                <?php the_content();?>
            <?php endif; ?>

            <?php if (!empty($details)) : ?>
                <?php print $details; ?>
            <?php endif; ?>

        </div><!--.main_content-->

    </div><!--.main_section_wrapper-->

</div><!-- #main -->


<?php get_footer(); ?>