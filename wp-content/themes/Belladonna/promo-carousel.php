<?php
/**
 *
 * Promo Carousel
 *
 * @package
 * @subpackage
 * @since
 *
 *
 */
?>

<?php if (!empty($promos) && $promos->have_posts()) : ?>
<!-- Promo Carousel -->
<div class="promo-carousel">
  <?php if (count($promos->posts) > 1) : ?>
  <div class="js-promo-carousel-btns promo-carousel__btns">
    <a class="promo-carousel__prev prev" href="#"><</a>
    <a class="promo-carousel__next next" href="#">></a>
  </div>
  <?php endif; ?>
  <div class="js-promo-carousel-slides promo-carousel__slides">
    <ul>
    <?php foreach ($promos->posts as $key => $promo) : ?>
      <li class="js-promo-carousel-slide promo-carousel__slide <?php if ($key == 0): print 'active'; endif; ?>">
        <div class="promo-carousel__slide__msg">
          <?php print $promo->post_title ?>
        </div>
        <div class="promo-carousel__slide__cta">
          <?php print $promo->post_content ?>
        </div>
      </li>
    <?php endforeach; ?>
    </ul>
  </div>
</div>
<?php endif; ?>







