<?php
/**
 * Template part for displaying results in search pages
 *
 * @package AlexGarcia
 */
?>

<article class="resto-post" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<div class="post">
        <div class="columna3">
            <a href="<?php the_permalink(); ?>"><?php alexgarcia_post_thumbnail('medium_large'); ?></a>
        </div>
        <div class="columna4">
            <a href="<?php the_permalink(); ?>"><h2><?php the_title(); ?></h2></a>

            <?php the_excerpt(); ?> 

        </div>
    </div>

</article><!-- #post-<?php the_ID(); ?> -->
