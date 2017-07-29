<section id="about-me" style="background-image: url('<?php echo get_theme_mod('bgImageAboutMe_settings'); ?>')" class="content__section content__section--about-me section">
	<div class="container">
		<div class="row">
			<div class="col-md-offset-6 col-md-6 col-sm-offset-0 col-sm-12 center">
				<?php
				$idObj = get_category_by_slug('s_about-me');
				echo '<h2 class="section__title">' .  $idObj->cat_name . '</h2>';
				?>
			</div>
			<div class="col-md-offset-6 col-md-6 col-sm-offset-0 col-sm-12 main-info">
				<?php echo $idObj->category_description ?>
				<a href="#reviews" class="btn btn--white"><span>Отзывы</span></a>
				<a href="<?php echo get_template_directory_uri()?>/assets/pdf/Diplomas.pdf" target="_blank" class="btn btn--white"><span>Достижения</span></a>
			</div>
		</div>
	</div>
</section>
