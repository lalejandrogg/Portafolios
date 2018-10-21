<?php

get_header(); ?>

	<div id="primary" class="site-content">
		<div id="content" role="main">

			<div class="trabajos">

				<h2 class="tituloTrabajos">TRABAJOS</h2>
			    <hr class="hrBlog"/>

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
				    </div>
				    	  

				         <?php endwhile; 
				     endif; 
					wp_reset_query(); 
				?>
			</div>	

			<div class="proyectos">

				<h2 class="tituloProyectos">PROYECTOS</h2>
			    <hr class="hrBlog"/>

				<?php
				    $proyectos = array( 'posts_per_page' => 6,
				    				   'post_type' => 'alex_portafolios',
				    				   'category_name' => 'proyectos' );
				    $loop = new WP_Query( $proyectos );
				     if ($loop->have_posts()) : while ($loop->have_posts()) : $loop->the_post(); ?>

				    
				 	<div class="proyecto">

				       <div class="post-thumbnail">
				 			<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail(); ?></a>
				 		</div>

				 		<span class="dashicons dashicons-plus-alt seguir-leyendo"></span>

				 		<h2><?php the_title(); ?></h2>
				    </div>
				    	  

				         <?php endwhile; 
				     endif; 
					wp_reset_query(); 
				?>
			</div>

		</div><!-- #content -->
	</div><!-- #primary -->


<?php get_footer(); ?>