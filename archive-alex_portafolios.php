<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */

get_header(); ?>

	<div id="primary" class="site-content">
		<div id="content" role="main">

			<div class="trabajo-principal">
				<?php
				    $trabajos = array( 'posts_per_page' => 1,
				    				   'post_type' => 'alex_portafolios',
				    				   'category_name' => 'destacado_web');
				    $loop = new WP_Query( $trabajos );
				    if ($loop->have_posts()) : while ($loop->have_posts()) : $loop->the_post(); ?>
				    
				       
				       <a href="<?php the_permalink(); ?>"><div class="post-thumbnail1">
				       		<h2><?php the_title(); ?></h2>
				 			<?php the_post_thumbnail();?>
				 			<span class="dashicons dashicons-plus-alt seguir-leyendo"></span>
				 		</div></a> 

				         <?php endwhile;
				          endif; 
					wp_reset_query(); 
				?>
			</div>

			<div class="resto-trabajos">
				<?php
				    $trabajos = array( 'posts_per_page' => 6,
				    				   'post_type' => 'alex_portafolios',
				    				   'category_name' => 'webs, wordpress, e-commerces' );
				    $loop = new WP_Query( $trabajos );
				     if ($loop->have_posts()) : while ($loop->have_posts()) : $loop->the_post(); ?>

				    
				 	<div class="trabajo">

				       <div class="post-thumbnail">
				 			<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail(); ?></a>
				 		</div>

				 		<span class="dashicons dashicons-plus-alt seguir-leyendo"></span>

				 		<h2><?php the_title(); ?></h2>
				    	<?php the_excerpt(); ?>	
				    </div>
				    	  

				         <?php endwhile; 
				     endif; 
					wp_reset_query(); 
				?>
			</div>	

		</div><!-- #content -->
	</div><!-- #primary -->


<?php get_footer(); ?>