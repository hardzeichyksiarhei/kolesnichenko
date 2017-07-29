<?php
/**
 * The template for displaying pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages and that
 * other "pages" on your WordPress site will use a different template.
 *
 * @package WordPress
 * @subpackage Twenty_Fifteen
 * @since Twenty Fifteen 1.0
 */

get_header(); ?>

<main class="content">
    <section class="content__section content__section--agreement section">
        <div class="container">
            <div class="col-md-12 agreement">
	            <?php
	            // Start the loop.
	            while ( have_posts() ) : the_post();

	                the_title( '<h1 class="agreement__title">', '</h1>' );
		            the_content();

		            // End the loop.
	            endwhile;
	            ?>
            </div>
        </div>
    </section>
</main>

<?php get_footer(); ?>
