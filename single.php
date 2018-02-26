<?php
/**
 * The template for displaying all single posts
 *
 * @package AlexGarcia
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">
			<div class="menuBlog">

				<?php wp_nav_menu($args = array('menu' => 'Blog'));
				get_search_form (); ?>

				<hr class="hrBlog"/>

			</div>

			<div class="columna1">
				<?php
				while ( have_posts() ) : the_post();

					get_template_part( 'template-parts/content', 'page' );

					// If comments are open or we have at least one comment, load up the comment template.
					if ( comments_open() || get_comments_number() ) :
						comments_template();
					endif;

				endwhile; // End of the loop.
				?>
			</div>
			<div class="columna2">
				<?php get_sidebar(); ?>
			</div>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer(); ?>
