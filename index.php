<?php get_header(); ?>

<main class="content">
	<?php get_template_part( 'template-parts/sections/section', 'home' ); ?>
	<?php get_template_part( 'template-parts/sections/section', 'aboutMe' ); ?>
	<?php get_template_part( 'template-parts/sections/section', 'gallery' ); ?>
	<?php get_template_part( 'template-parts/sections/section', 'video' ); ?>
	<?php get_template_part( 'template-parts/sections/section', 'reviews' ); ?>
	<?php get_template_part( 'template-parts/sections/section', 'calendar' ); ?>
	<?php get_template_part( 'template-parts/sections/section', 'contact' ); ?>
</main>

<?php get_footer(); ?>