<section id="calendar" class="content__section content__section--calendar section">
	<div class="container">
		<div class="row">
			<div class="col-md-12 center">
				<?php
				$idObj = get_category_by_slug('s_calendar');
				echo '<h2 class="section__title">' .  $idObj->cat_name . '</h2>';
				echo '<p class="section__description">' .  $idObj->category_description . '</p>';
				?>
			</div>
		</div>
		<div id="calendarContainer" class="row" data-nonce="<?php echo wp_create_nonce('calendar'); ?>"></div>
		<div class="calendar-legend">
			<ul class="calendar-legend__list"></ul>
		</div>
	</div>
</section>