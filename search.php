<?php
/**
 * The template for displaying search results pages
 *
 * @package AlexGarcia
 */

get_header(); ?>

	<section id="primary" class="content-area">
		<main id="main" class="site-main">

			<div class="menuBlog">

                <?php wp_nav_menu($args = array('menu' => 'Blog'));
                get_search_form (); ?>

                <hr class="hrBlog"/>

            </div>

            <div class="columna1">

				<?php
				if ( have_posts() ) : ?>

					<header class="page-header">
						<h1 class="page-title2"><?php
							/* translators: %s: search query. */
							printf( esc_html__( 'Estos son los resultados para: %s', 'alexgarcia' ), '<span>' . get_search_query() . '</span>' );
						?></h1>
					</header><!-- .page-header -->

					<?php
					/* Start the Loop */
					while ( have_posts() ) : the_post();

						get_template_part( 'template-parts/content', 'search' );

					endwhile;

					the_posts_navigation();

				else :

					get_template_part( 'template-parts/content', 'none' );

				endif; ?>

			</div>	

			<div class="columna2">
				<?php get_sidebar(); ?>
			</div>

		</main><!-- #main -->
	</section><!-- #primary -->

<?php
get_footer();
