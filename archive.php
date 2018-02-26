<?php get_header(); ?>

	<div id="primary" class="content-area">

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
						<?php
							the_archive_title( '<h1 class="page-title">', '</h1>' );
						?>
					</header><!-- .page-header -->

					<?php
					/* Start the Loop */
					while ( have_posts() ) : the_post();

						get_template_part( 'template-parts/content', get_post_format() ); //Muestra el contenido de content.php

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
	</div><!-- #primary -->

	

<?php get_footer(); ?>
