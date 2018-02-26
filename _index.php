<?php
/**
* Test template
*

* Template name: Test
*/
get_header();

$titulo         = get_field( 'plantilla_titulo' );
$post_principal = get_field( 'plantilla_post_principal' );

?>

    <div id="primary" class="site-content">
        <div id="content" role="main">

            <div class="menuBlog">
                <?php wp_nav_menu($args = array('menu' => 'Blog'));
                get_search_form (); ?>
                <hr class="hrBlog"/>

            </div>

            <div class="columna1">
            
                <div class="post-principal">
                <?php if ( ! empty( $titulo ) ) : ?>
                    <p>
                        <?php echo esc_html( $titulo ); ?>
                    </p>
                <?php endif; ?>

                    <?php
                        if ( ! empty( $post_principal ) ) : 
                            
                            $permalink     = get_permalink( $post_principal->ID );
                            $imagen     = get_the_post_thumbnail( $post_principal->ID, 'full' );
                        ?>
                          
                              <div class="principal">

                                 <a class="enlaceImagen" href="<?php echo $permalink; ?>">
                                     <?php echo $imagen; ?>
                                    <h2><?php echo $post_principal->post_title; ?></h2>
                                </a>

                             </div>
                              <?php endif;  ?>
                </div>

                <div class="resto-post">

                    <h2 class="ultimosPost">Últimos Posts</h2>

                    <hr class="hrBlog"/>

                    <?php
                    $paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
                      $args = array( 'posts_per_page' => 3,
                                        'post_type' => 'post',
                                        //'tag__not_in' => array (20),
                                        //'offset' => 0,
                                        'post__not_in' => array( $post_principal->ID ),
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
                               $next_page_link = get_next_posts_page_link( $loop->max_num_pages );
                              $previous_page_link = get_previous_posts_page_link();

                             if ( $loop->max_num_pages > 1 ) : ?>
                                 <a href="<?php echo $previous_page_link; ?>">Anterior</a>
                                 <a href="<?php echo $next_page_link; ?>">Siguiente</a>
                            <?php endif;

                         endif;

                        wp_reset_postdata();  ?>

                </div>    
            </div>
            <div class="columna2">
                <?php get_sidebar(); ?>
            </div>

        </div><!-- #content -->
    </div><!-- #primary -->

<?php get_footer(); ?>