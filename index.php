<?php

get_header(); ?>

	<div id="primary" class="site-content">
		<div id="content" role="main">
			<div class="menuBlog">
				<?php wp_nav_menu($args = array('menu' => 'Blog'));
				get_search_form (); ?>

			</div>
			
			<div class="post-principal">
				<?php
				    $posts = array( 'posts_per_page' => 1,
				    				   'post_type' => 'post',
				    				   'offset' => 0);
				    $loop = new WP_Query( $posts );
				    if ($loop->have_posts()) : while ($loop->have_posts()) : $loop->the_post(); ?>
				    
				       
				      	<div class="principal">

				       		<h2><?php the_title(); ?></h2>

				 			<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail();?></a>

				 		</div>

				         <?php endwhile;
				          endif; 
					wp_reset_query(); 
				?>
			</div>

			<div class="resto-post">
				<?php
				    $posts = array( 'posts_per_page' => 6,
				    				   'post_type' => 'post',
				    				   'offset' => 1 );
				    $loop = new WP_Query( $posts );

				     if ($loop->have_posts()) : while ($loop->have_posts()) : $loop->the_post(); ?>

				    
				 	<div class="post">

				       <?php the_post_thumbnail(); ?>

				 		<a href="<?php the_permalink(); ?>"><h2><?php the_title(); ?></h2></a>

				    	<?php the_excerpt(); ?>	

				    </div>
				    	  

				         <?php endwhile; 
				     endif; 
					wp_reset_query(); 
				?>
			</div>	

		</div><!-- #content -->
	</div><!-- #primary -->

<?php get_sidebar();
 get_footer(); ?>