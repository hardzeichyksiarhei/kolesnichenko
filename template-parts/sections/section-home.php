<section id="home" style="background-image: url('<?php echo get_theme_mod('bgImageHome_settings'); ?>')" class="content__section content__section--home section">
	<div class="container">
		<div class="row">
			<div class="col-md-7 col-sm-12 main-info">
				<img class="main-info__logo" src="
                        <?php
				$custom_logo_id = get_theme_mod( 'custom_logo' );
				$logo = wp_get_attachment_image_src( $custom_logo_id , 'full' );
				echo $logo[0];
				?>" alt="">
				<?php
				$idObj = get_category_by_slug('s_home');
				echo $idObj->category_description
				?>
				<a href="#about-me" class="btn btn--white"><span>Обо мне</span></a>
			</div>
		</div>
	</div>
	<div class="menu arrow-down">
		<a href="#about-me">
			<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" x="0px" y="0px" viewBox="0 0 407.437 407.437" style="enable-background:new 0 0 407.437 407.437;" xml:space="preserve" width="512px" height="512px">
                        <polygon points="386.258,91.567 203.718,273.512 21.179,91.567 0,112.815 203.718,315.87 407.437,112.815 "></polygon>
                    </svg>
		</a>
	</div>
</section>
