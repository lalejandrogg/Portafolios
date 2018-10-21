<?php
/**
 * Template part for displaying a message that posts cannot be found
 *
 * @package AlexGarcia
 */

?>

<section class="no-results not-found">
	<header class="page-header">
		<h1 class="page-title2"><?php esc_html_e( '¡Vaya, no hay resultados!', 'alexgarcia' ); ?></h1>
	</header><!-- .page-header -->

	<div class="page-content">
		<?php
		if ( is_home() && current_user_can( 'publish_posts' ) ) : ?>

			<p><?php
				printf(
					wp_kses(
						/* translators: 1: link to WP admin new post page. */
						__( 'Ready to publish your first post? <a href="%1$s">Get started here</a>.', 'alexgarcia' ),
						array(
							'a' => array(
								'href' => array(),
							),
						)
					),
					esc_url( admin_url( 'post-new.php' ) )
				);
			?></p>

		<?php elseif ( is_search() ) : ?>

			<p class="noResultados"><?php esc_html_e( 'Lo siento, pero no existen resultados para esta busqueda. Porfavor, inténtalo con otra palabra.', 'alexgarcia' ); ?></p>
			<?php		

		else : ?>

			<p class="noResultados"><?php esc_html_e( 'En este momento no tenemos ningún post aquí, pero puedes ver los post del resto de secciones.', 'alexgarcia' ); ?></p>
			<?php

		endif; ?>
	</div><!-- .page-content -->
</section><!-- .no-results -->
