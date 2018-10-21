<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package AlexGarcia
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">

			<section class="error-404 not-found">

				<header class="page-header">
					<h1 class="titulo404"><?php esc_html_e( 'Oops! Esa página no existe.', 'alexgarcia' ); ?></h1>
				</header><!-- .page-header -->
				

				<div class="page-content">
				
				<img class="imagen404" src="http://portafolio.local/wp-content/uploads/2018/10/1349562.png" alt="imagen error 404"/>

				<div class="cuadros">

					<div class="cuadro">
						<?php
							the_widget( 'WP_Widget_Recent_Posts' );
						?>
					</div>

						<div class="widget widget_categories cuadro">
							<h2 class="widget-title"><?php esc_html_e( 'Categorias top', 'alexgarcia' ); ?></h2>
							<ul>
							<?php
								wp_list_categories( array(
									'orderby'    => 'count',
									'order'      => 'DESC',
									'show_count' => 1,
									'title_li'   => '',
									'number'     => 10,
								) );
							?>
							</ul>
						</div><!-- .widget -->

						<div class="cuadro">						
							<?php

								/* translators: %1$s: smiley */
								$archive_content = '<p>' . sprintf( esc_html__( 'Buscas por mes %1$s', 'alexgarcia' ), convert_smilies( ':)' ) ) . '</p>';
								the_widget( 'WP_Widget_Archives', 'dropdown=1', "after_title=</h2>$archive_content" ); 
							?>
						</div>	
						<div class="cuadro">	
							<?php
								the_widget( 'WP_Widget_Tag_Cloud' );
							?>
						</div>
					</div>

				</div><!-- .page-content -->
			</section><!-- .error-404 -->

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
