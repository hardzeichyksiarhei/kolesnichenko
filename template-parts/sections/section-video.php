<?php
$idObj = get_category_by_slug('s_video');
$id = $idObj->term_id;

$query = new WP_Query(array(
	'cat' => $id
));
if ($query->have_posts()) :
	?>
	<section id="video" class="content__section content__section--video section">
		<div class="container">
			<div class="row">
				<div class="col-md-12 center">
					<?php
                        echo '<h2 class="section__title">' .  $idObj->cat_name . '</h2>';
                        echo '<p class="section__description">' .  $idObj->category_description . '</p>';
					?>
				</div>
			</div>
			<div class="video row">
				<?php
				$count = 0;
				while ($query->have_posts()) : $query->the_post(); ob_start();?>
					<div class="video__item <?php echo ++$count % 2 == 0 ? 'video__item--reverse' : '' ?>">
						<div class="video__description-block">
							<h3 class="video__title"><?php echo the_title(); ?></h3>
							<p class="video__description"><?php echo strip_shortcodes(get_the_content()); ?></p>
							<a href="<?php echo get_post_meta($post->ID, 'videoURL', true); ?>" class="popup-youtube btn btn--black btn__arrow btn__arrow--left"><span>Посмотреть</span></a>
						</div>
						<div style="background-image: url('<?php the_post_thumbnail_url( 'full'); ?>');" class="video__img-block">
						    <div class="video__img-mask">
                                <a class="video__link-play popup-youtube" href="<?php echo get_post_meta($post->ID, 'videoURL', true); ?>">
                                    <img src="<?php echo get_template_directory_uri() ?>/assets/css/owl.video.play.png" alt="">
                                </a>
                            </div>
                        </div>
					</div>
				<?php endwhile;?>
			</div>
			<div class="row center">
				<a href="https://www.youtube.com/channel/UC9Oj7hQf1dc3poSDJBqARPQ" class="btn btn--white" target="_blank"><span>Больше видео</span></a>
			</div>
		</div>
	</section>
	<?php echo ob_get_clean(); endif; wp_reset_query(); ?>