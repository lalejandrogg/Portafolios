<?php get_header(); ?>

    <div id="primary" class="site-content">

        <div id="content" role="main">

            <div class="menuBlog">

                <?php wp_nav_menu($args = array('menu' => 'Blog'));
                get_search_form (); ?>

                <hr class="hrBlog"/>

            </div>

            <div class="columna1">
            
                <div class="post-principal">
                    <?php
                        $args = array( 
                                           'post_type' => 'post',
                                           'tag' => 'new-york');
                        $first_loop = new WP_Query( $args );
                        if ($first_loop->have_posts()) : while ($first_loop->have_posts()) : $first_loop->the_post(); ?>
                        
                           
                            <div class="principal">
                                <a class="enlaceImagen" href="<?php the_permalink(); ?>"><?php the_post_thumbnail('full');?><h2><?php the_title(); ?></h2></a>
                            </div>
                             <?php endwhile;
                              endif; 
                        wp_reset_postdata();
                    ?>
                </div>
                <div class="resto-post">
                    <h2 class="ultimosPost">Últimos Posts</h2>
                    <hr class="hrBlog"/>
                    <?php 
                     $paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
                      $args = array( 
                                        'post_type' => 'post',
                                        'tag__not_in' => array (20),
                                        'paged' => $paged );
                        $loop = new WP_Query( $args );
                         if ($loop->have_posts()) : while ($loop->have_posts()) : $loop->the_post(); ?>
                        
                        <div class="post">
                            <div class="columna3">
                                <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('medium_large'); ?></a>
                            </div>
                            <div class="columna4">
                                <a href="<?php the_permalink(); ?>"><h2><?php the_title(); ?></h2></a>
                                <?php the_excerpt(); ?>   
                                <a class="read-more2" href="<?php the_permalink(); ?>">Leer más <span class="dashicons dashicons-arrow-right-alt flecha"></span></a>
                            </div>
                        </div>
                              
                             <?php endwhile; 

                             //PAGINACION 
                               $next_page_link = get_next_posts_page_link( $loop->max_num_pages );
                              $previous_page_link = get_previous_posts_page_link();

                              $total_pages = $loop->max_num_pages;      //funcion para saber cual es el número total de páginas
                              $current_page = get_query_var( 'paged' ); //funcion para saber cual es la pagina actual
                               
                              if ($current_page == 0){ ?>
                                <a class="paginacionDer" href="<?php echo $next_page_link; ?>">Siguiente <span class="dashicons dashicons-arrow-right-alt2 flecha"></span></a>
                             <?php } 

                             if ($current_page > 0 && $current_page < $total_pages){ ?>
                                <a class="paginacionDer" href="<?php echo $next_page_link; ?>">Siguiente <span class="dashicons dashicons-arrow-right-alt2 flecha"></span></a>
                                <a class="paginacionIzq" href="<?php echo $previous_page_link; ?>"><span class="dashicons dashicons-arrow-left-alt2 flecha"></span> Anterior</a>
                             <?php } 

                              if ($total_pages == $current_page){ ?>
                                <a class="paginacionIzq2" href="<?php echo $previous_page_link; ?>"><span class="dashicons dashicons-arrow-left-alt2 flecha"></span> Anterior</a>
                             <?php } 
                  
                         endif;
                        wp_reset_postdata();  ?>
                        <hr class="hrBlog2"/>
                </div>    
            </div>
            <div class="columna2">
                <?php get_sidebar(); ?>
            </div>
        </div><!-- #content -->
    </div><!-- #primary -->
 <?php get_footer(); ?>