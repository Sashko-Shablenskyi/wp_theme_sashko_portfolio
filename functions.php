<?php
/**
 * Sashko_Sh functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Sashko_Sh
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function sashko_sh_setup() {
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on Sashko_Sh, use a find and replace
		* to change 'sashko_sh' to the name of your theme in all the template files.
		*/
	load_theme_textdomain( 'sashko_sh', get_template_directory() . '/languages' );

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
	register_nav_menus(
		array(
			'menu-1' => esc_html__( 'Primary', 'sashko_sh' ),
		)
	);

	/*
		* Switch default core markup for search form, comment form, and comments
		* to output valid HTML5.
		*/
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		)
	);

	// Set up the WordPress core custom background feature.
	add_theme_support(
		'custom-background',
		apply_filters(
			'sashko_sh_custom_background_args',
			array(
				'default-color' => 'ffffff',
				'default-image' => '',
			)
		)
	);

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	/**
	 * Add support for core custom logo.
	 *
	 * @link https://codex.wordpress.org/Theme_Logo
	 */
	add_theme_support(
		'custom-logo',
		array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		)
	);
}
add_action( 'after_setup_theme', 'sashko_sh_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function sashko_sh_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'sashko_sh_content_width', 640 );
}
add_action( 'after_setup_theme', 'sashko_sh_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function sashko_sh_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'sashko_sh' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'sashko_sh' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'sashko_sh_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function sashko_sh_scripts() {
	wp_enqueue_style( 'sashko_sh-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_style_add_data( 'sashko_sh-style', 'rtl', 'replace' );

	wp_enqueue_script( 'sashko_sh-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );
	wp_enqueue_script( 'sashko_sh-main', get_template_directory_uri() . '/js/main.min.js', array('jquery'), _S_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'sashko_sh_scripts' );

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

//========================================================================================================================================================
//========================================================================================================================================================
//========================================================================================================================================================

/**
 * Custom menu attributes
 */
function custom_menu_with_data_attributes($menu) {
    $menu_items = wp_get_nav_menu_items($menu);

    foreach ($menu_items as $menu_item) {
        echo '<li class="menu__item" data-name="' . esc_html($menu_item->title) . '">';
		echo '<a href="' . esc_url($menu_item->url) . '" class="menu__link">' . esc_html($menu_item->title) . '</a>';
        echo '</li>';
    }
}

/**
 * Custom polylang language switcher
 */
function custom_language_switcher() {
    $languages = pll_the_languages(array('raw' => 1));

    foreach ($languages as $language) {
        $class = $language['current_lang'] ? 'switcher__selector' : '';
        echo '<input type="radio" name="switcher-item" id="' . esc_attr($language['slug']) . '"';
        if ($language['current_lang']) {
            echo ' checked';
			echo ' />';
			echo '<label for="' . esc_attr($language['slug']) . '">';
			$svg_url = get_template_directory_uri() . '/img/switcher/' . $language['slug'] . '.svg';
			echo '<img src="' . esc_url($svg_url) . '" alt="' . esc_attr($language['name']) . '">';
			echo '</label>';
        } else {
			echo ' />';
			echo '<label for="' . esc_attr($language['slug']) . '">';
			echo '<a href="' . esc_url($language['url']) . '">';
			$svg_url = get_template_directory_uri() . '/img/switcher/' . $language['slug'] . '.svg';
			echo '<img src="' . esc_url($svg_url) . '" alt="' . esc_attr($language['name']) . '">';
			echo '</a>';
			echo '</label>';
		}

    }
}

//=======================================================
// take picture from downloads!!!
//=======================================================

// function custom_language_switcher() {
//     $languages = pll_the_languages(array('raw' => 1));

//     foreach ($languages as $language) {
//         $class = $language['current_lang'] ? 'switcher__selector' : '';

//         // Отримати URL до кастомного SVG-зображення для даної мови
//         $flag_url = get_template_directory_uri() . '/your-custom-folder/' . $language['slug'] . '.svg';

//         echo '<input type="radio" name="switcher-item" id="' . esc_attr($language['slug']) . '"';
//         if ($language['current_lang']) {
//             echo ' checked';
//         }
//         echo ' />';
//         echo '<label for="' . esc_attr($language['slug']) . '">';
//         echo '<a href="' . esc_url($language['url']) . '">';
//         echo '<img src="' . esc_url($flag_url) . '" alt="' . esc_attr($language['name']) . '">';
//         echo '</a>';
//         echo '</label>';
//     }
// }

/**
 * Post type: Skills
 */
function custom_skill_post_type() {
    $labels = array(
        'name'               => 'Skills',
        'singular_name'      => 'Skill',
        'add_new'            => 'Add new skill',
        'add_new_item'       => 'Add new skill',
        'edit_item'          => 'Edit a skill',
        'new_item'           => 'New skill',
        'view_item'          => 'View skill',
        'search_items'       => 'Search skill',
        'not_found'          => 'No skills found',
        'not_found_in_trash' => 'Skills not found in cart',
    );

    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'menu_position'      => 5,
        'menu_icon'          => 'dashicons-html',
        'supports'           => array( 'title', 'editor', 'thumbnail' ),
        'has_archive'        => true,
        'rewrite'            => array( 'slug' => 'skills' ),
    );

    register_post_type( 'skills', $args );
}
add_action( 'init', 'custom_skill_post_type' );

/**
 * Post type: Experience
 */
function custom_work_place_post_type() {
    $labels = array(
        'name'               => 'Work places',
        'singular_name'      => 'Work place',
        'add_new'            => 'Add new work place',
        'add_new_item'       => 'Add new work place',
        'edit_item'          => 'Edit a work place',
        'new_item'           => 'New work place',
        'view_item'          => 'View work place',
        'search_items'       => 'Search work place',
        'not_found'          => 'No work places found',
        'not_found_in_trash' => 'Work places not found in cart',
    );

    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'menu_position'      => 5,
        'menu_icon'          => 'dashicons-html',
        'supports'           => array( 'title', 'editor', 'thumbnail' ),
        'has_archive'        => true,
        'rewrite'            => array( 'slug' => 'work-places' ),
    );

    register_post_type( 'work_places', $args );
}
add_action( 'init', 'custom_work_place_post_type' );

/**
 * Видаляємо теги P та BR в ContactForm7
 */
add_filter( 'wpcf7_autop_or_not', '__return_false' );

/**
 * Видаляємо теги SPAN в ContactForm7
 */
add_filter('wpcf7_form_elements', function($content) {
    $content = preg_replace('/<(span).*?class="\s*(?:.*\s)?wpcf7-form-control-wrap(?:\s[^"]+)?\s*"[^\>]*>(.*)<\/\1>/i', '\2', $content);

    return $content;
});

/**
 * Custom class to form mask input
 */
add_action('wp_footer', 'custom_class');

function custom_class() {
    ?>
<script>
jQuery(document).ready(function($) {
    var maskedInputs = $('input[data-mask]');

    maskedInputs.on('change', function() {
        if ($(this).val().trim() !== '') {
            $(this).addClass('has-text');
        } else {
            $(this).removeClass('has-text');
        }
    });
});
</script>
<?php
}