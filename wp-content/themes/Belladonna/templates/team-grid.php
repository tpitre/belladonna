<div class="u-pad--triple--y">
<?php
$args = array(
  'post_type'   => 'bd_team',
);
 
$q = new WP_Query( $args );

if ( $q->have_posts() ) :
	echo '<ul class="l-grid l-grid--medium-gutters l-grid--3up c-team-grid">';
	while ( $q->have_posts() ) :
    $q->the_post();
?>

<li class="l-grid-item c-team-item">
  <a href="<?php the_permalink() ?>">
    <img class="u-full-width" src="<?php echo get_the_post_thumbnail_url(get_the_ID(),'team-grid') ?>" alt="">
    <span><?php echo get_the_title() ?></span>
  </a>
</li>

<?php
	endwhile;
	echo '</ul>';
	wp_reset_postdata();
else : 

endif; ?>
</div>
