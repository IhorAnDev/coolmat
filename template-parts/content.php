<?php

/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package coolmat
 */
global $post_counter;
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<h1 class="entry-title"><?php the_title(); ?></h1>

		<div class="entry-number">
			<span><?php echo ($post_counter); ?></span>
		</div>

		<div class="entry-price"><?php the_content('price'); ?></div>
	</header><!-- .entry-header -->
	<?php coolmat_post_thumbnail(); ?>

</article><!-- #post-<?php the_ID(); ?> -->