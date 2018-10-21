<?php
/**
 * Sidebar de la página de acercade
 */

if (is_active_sidebar( 'widgets-acercade' )) { ?>
    <aside class="widget-area">
        <?php dynamic_sidebar( 'widgets-acercade' );?>
    </aside> <?php
}
?>