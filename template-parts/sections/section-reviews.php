<?php
$idObj = get_category_by_slug('s_reviews');
$id = $idObj->term_id;

$query = new WP_Query(array(
	'cat' => $id
));
if ($query->have_posts()) :
	?>
	<section id="reviews" class="content__section content__section--reviews section">
		<div class="container">
			<div class="row">
				<div class="col-md-12 center">
					<?php
					echo '<h2 class="section__title">' .  $idObj->cat_name . '</h2>';
					echo '<p class="section__description">' .  $idObj->category_description . '</p>';
					?>
				</div>
			</div>
			<div class="reviews row">
				<?php
				$count = 0;
				$countImages = 0;
				while ($query->have_posts()) : $query->the_post(); ob_start();
					$gal = get_post_gallery($post->ID, false);
					$gids = explode(',', $gal['ids']); ?>
					<div class="col-md-3 col-xs-12">
						<div class="reviews__item">
							<div style="background-image: url('<?php echo wp_get_attachment_url($gids[0]); ?>');" class="reviews__img"></div>
							<div class="reviews__content">
								<h3 class="reviews__name"><?php echo the_title(); ?></h3>
								<p class="reviews__date"><?php echo get_post_meta($post->ID, 'date', true); ?></p>
								<a href="#reviews-popup-<?php echo $count; ?>" class="btn btn--black reviews__link"><span>Посмотреть</span></a>
							</div>
						</div>
					</div>
					<div id="reviews-popup-<?php echo $count++; ?>" class="reviews-popup mfp-hide">
						<div class="reviews-popup__meta">
							<div class="reviews-popup__avatar">
								<img class="img-circle img-thumbnail img-responsive" src="<?php the_post_thumbnail_url( 'full'); ?>" alt="">
							</div>
							<div class="reviews-popup__name"><?php echo the_title(); ?></div>
                            <p class="reviews-popup__date"><?php echo get_post_meta($post->ID, 'date', true); ?></p>
						</div>
						<p class="reviews-popup__description">
							<?php echo strip_shortcodes(get_the_content()); ?>
						</p>
						<div class="reviews-gallery">
							<?php foreach ($gids as $id) : ?>
								<a class="reviews-gallery__link" href="<?php echo wp_get_attachment_image_url($id, 'full'); ?>" title="">
                                    <img src="<?php echo wp_get_attachment_image_url($id, 'large'); ?>" alt="" class="reviews-gallery__img">
                                </a>
							<?php endforeach; ?>
						</div>
					</div>
				<?php endwhile;?>
			</div>
			<div class="row center">
				<a href="https://vk.com/topic-80891569_31424546" class="btn btn--white" target="_blank"><span>Больше отзывов</span></a>
			</div>
		</div>
	</section>
	<?php echo ob_get_clean(); endif; wp_reset_query(); ?>