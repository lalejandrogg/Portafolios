
<?php
/**
 * AlexGarcia functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package AlexGarcia
 */

if ( ! function_exists( 'alexgarcia_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function alexgarcia_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on AlexGarcia, use a find and replace
		 * to change 'alexgarcia' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'alexgarcia', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'menu-1' => esc_html__( 'Primary', 'alexgarcia' ),
		) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'alexgarcia_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );
	}
endif;
add_action( 'after_setup_theme', 'alexgarcia_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function alexgarcia_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'alexgarcia_content_width', 640 );
}
add_action( 'after_setup_theme', 'alexgarcia_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function alexgarcia_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'alexgarcia' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'alexgarcia' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
}
add_action( 'widgets_init', 'alexgarcia_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function alexgarcia_scripts() {
	wp_enqueue_style( 'alexgarcia-style', get_stylesheet_uri() );

	wp_enqueue_script( 'alexgarcia-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

	wp_enqueue_script( 'alexgarcia-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'alexgarcia_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}
//++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
//                                MIS FUNCIONES
//++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
/**
 * FILTRO PARA SUSTITUIR EL [...] DE LA FUNCION the_excerpt() POR EL MENSAJE QUE QUIERAS EN MI CASO "-->"
 * SE COLOCA EN EL FUNCTIONS.PHP
 *
 * @param string $more "Read more" excerpt string.
 * @return string (Maybe) modified "read more" excerpt string.
 */
function wpdocs_excerpt_more( $more ) {
    return sprintf( '<a class="read-more" href="%1$s">%2$s</a>',
        get_permalink( get_the_ID() ),
        __( 'Leer más <span class="dashicons dashicons-arrow-right-alt flecha"></span>', 'textdomain' )
    );
}
add_filter( 'excerpt_more', 'wpdocs_excerpt_more' );


/**
 * Funcion para mostrar solo los post y entradas cuando utilizas la busqueda y descartar las páginas
 */

 function my_custom_searchengine($query) { if ($query->is_search && !is_admin()) { $query->set('post_type', array('post')); } return $query; } add_filter('pre_get_posts', 'my_custom_searchengine'); 

/**
 * Mostrar los Dashicons auque no estes registrado en Wordpress
 */
 add_action( 'wp_enqueue_scripts', 'load_dashicons_front_end' );
 function load_dashicons_front_end() {
   wp_enqueue_style( 'dashicons' );
 }

/**
 * Mover los javascripts al footer para que no salte el fallo en google page speed de
 * Eliminar el JavaScript que bloquea la visualización y el CSS del contenido de la mitad superior de la página
 */
 function footer_enqueue_scripts() {
	remove_action('wp_head', 'wp_print_scripts');
	remove_action('wp_head', 'wp_print_head_scripts', 9);
	remove_action('wp_head', 'wp_enqueue_scripts', 1);
	add_action('wp_footer', 'wp_print_scripts', 5);
	add_action('wp_footer', 'wp_enqueue_scripts', 5);
	add_action('wp_footer', 'wp_print_head_scripts', 5);
	}
	add_action('after_setup_theme', 'footer_enqueue_scripts');

/**
 * Registro de una nueva area para widgets
 */

register_sidebar(
	array(
		'name' => 'Widgets Contacto',
		'id' => 'widgets-contacto',
		'description' => 'Área de widgets que aparece en la pagina de contacto',
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	)
	);








