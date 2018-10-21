
<form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ) ?>">
    <label>
        <input type="search" class="search-field" placeholder="Buscar..." value="<?php echo get_search_query() ?>" name="s" title="<?php echo esc_attr_x( 'Search for:', 'label' ) ?>" />
    </label>
    <span class="dashicons dashicons-search lupa"></span>
    <input type="submit" class="search-submit" value=" <?php esc_attr_x( 'Search', 'submit button' ) ?>"  />
</form>