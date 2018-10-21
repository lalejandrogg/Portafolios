<?php
/**
 * Sidebar de la página de contacto
 */

if (is_active_sidebar( 'widgets-contacto' )) { ?>
    <aside class="widget-area">
        <?php dynamic_sidebar( 'widgets-contacto' );?>
    </aside> <?php
}
?>



