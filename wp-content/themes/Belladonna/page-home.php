<?php get_header(); ?>
<?php $home_slides = get_field('home_slides'); ?>

<div id="main">


    <!-- home page top slider -->
    <?php if($home_slides): ?>

        <div class="hero_image_slider">
            <div id="home_slider">
                <ul class="slides">
                    <?php $hero_slide = $home_slides[0]; ?>

                    <li class="home_slide active">
                        <?php if($hero_slide['slide_image']): ?>
                            <?php $gallery_image = wp_get_attachment_image_src($hero_slide['slide_image'], 'home_slide-large' ); ?>
                            <img src="<?php echo $gallery_image[0]; ?>" class="home_gallery" />
                        <?php endif; ?>
                        <?php if($hero_slide['slide_title']): ?>
                            <h1 class="home_gallery_title"><?php print $hero_slide['slide_title']; ?></h1>
                        <?php endif; ?>
                        <div class="home_slide_canvas_container">
                            <canvas></canvas>
                        </div>
                    </li>

                    <script> var home_slides = [
                        <?php foreach($home_slides as $key => $home_slide): ?>
                            <?php if ($key !== 0): ?>,<?php endif; ?>
                            {
                                img: <?php if ($home_slide['slide_image']) : $gallery_image = wp_get_attachment_image_src($home_slide['slide_image'], 'home_slide-large' ); echo '"' . $gallery_image[0] . '"'; else: echo '""'; endif; ?>,
                                title: <?php if ($home_slide['slide_title']) : echo '"' . $home_slide['slide_title'] . '"'; else: echo '""'; endif; ?>
                            }
                        <?php endforeach; ?>
                        ]
                    </script>

                </ul><!--.slides-->
            </div><!--.home_slider-->
        </div><!--.hero_image_slider-->


    <?php endif;?>

</div><!-- #main -->

<?php get_footer(); ?>
