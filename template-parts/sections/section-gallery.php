<?php
$idObj = get_category_by_slug('s_gallery');
$id = $idObj->term_id;

$query = new WP_Query(array(
	'cat' => $id
));
if ($query->have_posts()) :
	?>
	<section id="photo" class="content__section content__section--photo section">
		<div class="container">
			<div class="row">
				<div class="col-md-12 center">
					<?php
					echo '<h2 class="section__title">' .  $idObj->cat_name . '</h2>';
					echo '<p class="section__description">' .  $idObj->category_description . '</p>';
					?>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					<div id="gallery-grid" class="gallery-grid">
						<?php
						while ($query->have_posts()) : $query->the_post(); ob_start(); ?>
								<?php
								$gal = get_post_gallery($id, false);
								$gids = explode(',', $gal['ids']);
								foreach ($gids as $id) : ?>
                                    <a class="gallery-grid__link" href="<?php echo wp_get_attachment_image_url($id, 'full'); ?>" title="">
                                        <img src="<?php echo wp_get_attachment_image_url($id, 'medium'); ?>" alt="" class="gallery-grid__img">
                                    </a>
								<?php endforeach; ?>
						<?php endwhile;?>
					</div>
					<div class="row center">
						<a href="https://vk.com/album-80891569_243294712" class="btn btn--white" target="_blank"><span>Больше фото</span></a>
					</div>
				</div>
			</div>
		</div>
	</section>
	<?php echo ob_get_clean(); endif; wp_reset_query(); ?>