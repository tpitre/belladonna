<?php get_header(); ?>
<?php $home_slides = get_field('home_slides'); ?>

<div id="main">


    <!-- home page top slider -->
    <?php if($home_slides): ?>

        <div class="hero_image_slider">
            <div id="home_slider">
                <ul class="slides">

                    <?php foreach($home_slides as $home_slide): ?>

                            <li class="home_slide">
                                <?php if($home_slide['slide_image']): ?>
                                    <?php $gallery_image = wp_get_attachment_image_src($home_slide['slide_image'], 'home_slide-large' ); ?>
                                    <img src="<?php echo $gallery_image[0]; ?>" class="home_gallery" />
                                <?php endif; ?>
                                <?php if($home_slide['slide_title']): ?>
                                    <h1 class="home_gallery_title"><?= $home_slide['slide_title'] ?></h1>
                                <?php endif; ?>
                            </li>

                    <?php endforeach; ?>

                </ul><!--.slides-->
            </div><!--.home_slider-->
        </div><!--.hero_image_slider-->


    <?php endif;?>

</div><!-- #main -->

<?php get_footer(); ?>
