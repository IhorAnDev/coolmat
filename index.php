<?php

/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package coolmat
 */

get_header();
?>


<main id="primary" class="site-main">
	<?php query_posts('category_name=menu&posts_per_page=1&orderby=rand'); ?>

	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
			<div class="hero">
				<div class="hero-inner container">
					<h1 class="hero-text lowercase">
						<span class="hero-sitename"><?php bloginfo('name'); ?></span>
						<?php the_title(); ?>
					</h1>
					<p class="hero-description lowercase">
						<span class="magenta"><?php bloginfo('name'); ?></span>
						<?php bloginfo('description'); ?>
					</p>
				</div>
			</div>
	<?php
		endwhile;
	endif;
	?>

	<?php query_posts('post_type=intro&posts_per_page=1'); ?>

	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
	<?php endwhile;
	endif; ?>



	<div class="intro" id="intro">
		<div class="intro-inner">
			<h2 class="intro-title "> <?php the_title(); ?> </h2>
			<div class="intro-description">
				<?php the_content(); ?>
			</div>
		</div>
	</div>

	<div class="food-title section-heading" id="food">
		menu
	</div>

	<div class="grid">
		<?php
		query_posts('category_name=menu&posts_per_page=20&orderby=date');
		if (have_posts()) :
			$post_counter = 1;
			/* Start the Loop */


			while (have_posts()) :
				the_post();

				/*
				 * Include the Post-Type-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Type name) and that will be used instead.
				 */
				get_template_part('template-parts/content', get_post_type());


				$post_counter++;

			endwhile;

			the_posts_navigation();

		else :

			get_template_part('template-parts/content', 'none');

		endif;
		?>
	</div>




	<div class="section-heading" id="locations">
		direction to coolmat
	</div>

	<div class="locations">
		<?php query_posts('post_type=location&posts_per_page=1'); ?>

		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>


				<div class="location grid">

					<div class="map">
						<div class="map-inner">
							<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d4473.
						054879647253!2d126.85949571988147!3d37.556773327539084!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.
						1!3m3!1m2!1s0x357c9c03c38738ad%3A0x1eff909f2c04315c!2s284-10
						%20Yeomchang-dong%2C%20Gangseo-gu%2C%20Seoul%2C%20South%20Korea!5e0
						!3m2!1sen!2sua!4v1695392251647!5m2!1sen!2sua" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
						</div>
					</div>

					<div class="location-info">
						<div class="location-description">
							<?php the_content(); ?>
						</div>
					</div>

				</div>
		<?php endwhile;
		endif; ?>
	</div>

</main><!-- #main -->

<?php
// get_sidebar();
get_footer();
