

<?php while ( have_posts() ) : the_post(); ?>

<?php
$page_header_image = get_field('promo_image');
$page_color = get_field('page_color', 201);
$details = get_field('promo_details');
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

<?php endwhile; // End the loop ?>


<?php get_footer(); ?>