<?php
/**
 * Twenty Twenty functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package WordPress
 * @subpackage Twenty_Twenty
 * @since Twenty Twenty 1.0
 */

/**
 * Table of Contents:
 * Theme Support
 * Required Files
 * Register Styles
 * Register Scripts
 * Register Menus
 * Custom Logo
 * WP Body Open
 * Register Sidebars
 * Enqueue Block Editor Assets
 * Enqueue Classic Editor Styles
 * Block Editor Settings
 */

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 *
 * @since Twenty Twenty 1.0
 */
add_theme_support('woocommerce');
function twentytwenty_theme_support() {

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	// Custom background color.
	add_theme_support(
		'custom-background',
		array(
			'default-color' => 'f5efe0',
		)
	);

	// Set content-width.
	global $content_width;
	if ( ! isset( $content_width ) ) {
		$content_width = 580;
	}

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );

	// Set post thumbnail size.
	set_post_thumbnail_size( 1200, 9999 );

	// Add custom image size used in Cover Template.
	add_image_size( 'twentytwenty-fullscreen', 1980, 9999 );

	// Custom logo.
	$logo_width  = 120;
	$logo_height = 90;

	// If the retina setting is active, double the recommended width and height.
	if ( get_theme_mod( 'retina_logo', false ) ) {
		$logo_width  = floor( $logo_width * 2 );
		$logo_height = floor( $logo_height * 2 );
	}

	add_theme_support(
		'custom-logo',
		array(
			'height'      => $logo_height,
			'width'       => $logo_width,
			'flex-height' => true,
			'flex-width'  => true,
		)
	);

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

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
			'script',
			'style',
			'navigation-widgets',
		)
	);

	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on Twenty Twenty, use a find and replace
	 * to change 'twentytwenty' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'twentytwenty' );

	// Add support for full and wide align images.
	add_theme_support( 'align-wide' );

	// Add support for responsive embeds.
	add_theme_support( 'responsive-embeds' );

	/*
	 * Adds starter content to highlight the theme on fresh sites.
	 * This is done conditionally to avoid loading the starter content on every
	 * page load, as it is a one-off operation only needed once in the customizer.
	 */
	if ( is_customize_preview() ) {
		require get_template_directory() . '/inc/starter-content.php';
		add_theme_support( 'starter-content', twentytwenty_get_starter_content() );
	}

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	/*
	 * Adds `async` and `defer` support for scripts registered or enqueued
	 * by the theme.
	 */
	$loader = new TwentyTwenty_Script_Loader();
	add_filter( 'script_loader_tag', array( $loader, 'filter_script_loader_tag' ), 10, 2 );

}

add_action( 'after_setup_theme', 'twentytwenty_theme_support' );

/**
 * REQUIRED FILES
 * Include required files.
 */
require get_template_directory() . '/inc/template-tags.php';

// Handle SVG icons.
require get_template_directory() . '/classes/class-twentytwenty-svg-icons.php';
require get_template_directory() . '/inc/svg-icons.php';

// Handle Customizer settings.
require get_template_directory() . '/classes/class-twentytwenty-customize.php';

// Require Separator Control class.
require get_template_directory() . '/classes/class-twentytwenty-separator-control.php';

// Custom comment walker.
require get_template_directory() . '/classes/class-twentytwenty-walker-comment.php';

// Custom page walker.
require get_template_directory() . '/classes/class-twentytwenty-walker-page.php';

// Custom script loader class.
require get_template_directory() . '/classes/class-twentytwenty-script-loader.php';

// Non-latin language handling.
require get_template_directory() . '/classes/class-twentytwenty-non-latin-languages.php';

// Custom CSS.
require get_template_directory() . '/inc/custom-css.php';

// Block Patterns.
require get_template_directory() . '/inc/block-patterns.php';

/**
 * Register and Enqueue Styles.
 *
 * @since Twenty Twenty 1.0
 */
function twentytwenty_register_styles() {

	$theme_version = wp_get_theme()->get( 'Version' );

	wp_enqueue_style( 'twentytwenty-style', get_stylesheet_uri(), array(), $theme_version );
	wp_style_add_data( 'twentytwenty-style', 'rtl', 'replace' );

	// Add output of Customizer settings as inline style.
	wp_add_inline_style( 'twentytwenty-style', twentytwenty_get_customizer_css( 'front-end' ) );

	// Add print CSS.
	wp_enqueue_style( 'twentytwenty-print-style', get_template_directory_uri() . '/print.css', null, $theme_version, 'print' );

}

add_action( 'wp_enqueue_scripts', 'twentytwenty_register_styles' );

/**
 * Register and Enqueue Scripts.
 *
 * @since Twenty Twenty 1.0
 */
function twentytwenty_register_scripts() {

	$theme_version = wp_get_theme()->get( 'Version' );

	if ( ( ! is_admin() ) && is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	wp_enqueue_script( 'twentytwenty-js', get_template_directory_uri() . '/assets/js/index.js', array(), $theme_version, false );
	wp_script_add_data( 'twentytwenty-js', 'async', true );

}

add_action( 'wp_enqueue_scripts', 'twentytwenty_register_scripts' );

/**
 * Fix skip link focus in IE11.
 *
 * This does not enqueue the script because it is tiny and because it is only for IE11,
 * thus it does not warrant having an entire dedicated blocking script being loaded.
 *
 * @since Twenty Twenty 1.0
 *
 * @link https://git.io/vWdr2
 */
function twentytwenty_skip_link_focus_fix() {
	// The following is minified via `terser --compress --mangle -- assets/js/skip-link-focus-fix.js`.
	?>
	<script>
	/(trident|msie)/i.test(navigator.userAgent)&&document.getElementById&&window.addEventListener&&window.addEventListener("hashchange",function(){var t,e=location.hash.substring(1);/^[A-z0-9_-]+$/.test(e)&&(t=document.getElementById(e))&&(/^(?:a|select|input|button|textarea)$/i.test(t.tagName)||(t.tabIndex=-1),t.focus())},!1);
	</script>
	<?php
}
add_action( 'wp_print_footer_scripts', 'twentytwenty_skip_link_focus_fix' );

/**
 * Enqueue non-latin language styles.
 *
 * @since Twenty Twenty 1.0
 *
 * @return void
 */
function twentytwenty_non_latin_languages() {
	$custom_css = TwentyTwenty_Non_Latin_Languages::get_non_latin_css( 'front-end' );

	if ( $custom_css ) {
		wp_add_inline_style( 'twentytwenty-style', $custom_css );
	}
}

add_action( 'wp_enqueue_scripts', 'twentytwenty_non_latin_languages' );

/**
 * Register navigation menus uses wp_nav_menu in five places.
 *
 * @since Twenty Twenty 1.0
 */
function twentytwenty_menus() {

	$locations = array(
		'primary'  => __( 'Desktop Horizontal Menu', 'twentytwenty' ),
		'expanded' => __( 'Desktop Expanded Menu', 'twentytwenty' ),
		'mobile'   => __( 'Mobile Menu', 'twentytwenty' ),
		'footer'   => __( 'Footer Menu', 'twentytwenty' ),
		'social'   => __( 'Social Menu', 'twentytwenty' ),
	);

	register_nav_menus( $locations );
}

add_action( 'init', 'twentytwenty_menus' );

/**
 * Get the information about the logo.
 *
 * @since Twenty Twenty 1.0
 *
 * @param string $html The HTML output from get_custom_logo (core function).
 * @return string
 */
function twentytwenty_get_custom_logo( $html ) {

	$logo_id = get_theme_mod( 'custom_logo' );

	if ( ! $logo_id ) {
		return $html;
	}

	$logo = wp_get_attachment_image_src( $logo_id, 'full' );

	if ( $logo ) {
		// For clarity.
		$logo_width  = esc_attr( $logo[1] );
		$logo_height = esc_attr( $logo[2] );

		// If the retina logo setting is active, reduce the width/height by half.
		if ( get_theme_mod( 'retina_logo', false ) ) {
			$logo_width  = floor( $logo_width / 2 );
			$logo_height = floor( $logo_height / 2 );

			$search = array(
				'/width=\"\d+\"/iU',
				'/height=\"\d+\"/iU',
			);

			$replace = array(
				"width=\"{$logo_width}\"",
				"height=\"{$logo_height}\"",
			);

			// Add a style attribute with the height, or append the height to the style attribute if the style attribute already exists.
			if ( strpos( $html, ' style=' ) === false ) {
				$search[]  = '/(src=)/';
				$replace[] = "style=\"height: {$logo_height}px;\" src=";
			} else {
				$search[]  = '/(style="[^"]*)/';
				$replace[] = "$1 height: {$logo_height}px;";
			}

			$html = preg_replace( $search, $replace, $html );

		}
	}

	return $html;

}

add_filter( 'get_custom_logo', 'twentytwenty_get_custom_logo' );

if ( ! function_exists( 'wp_body_open' ) ) {

	/**
	 * Shim for wp_body_open, ensuring backward compatibility with versions of WordPress older than 5.2.
	 *
	 * @since Twenty Twenty 1.0
	 */
	function wp_body_open() {
		/** This action is documented in wp-includes/general-template.php */
		do_action( 'wp_body_open' );
	}
}

/**
 * Include a skip to content link at the top of the page so that users can bypass the menu.
 *
 * @since Twenty Twenty 1.0
 */
// function twentytwenty_skip_link() {
// 	echo '<a class="skip-link screen-reader-text" href="#site-content">' . __( 'Skip to the content', 'twentytwenty' ) . '</a>';
// }

// add_action( 'wp_body_open', 'twentytwenty_skip_link', 5 );

///XÓa bỏ tag SVG ở body
remove_action ('wp_body_open', 'wp_global_styles_render_svg_filters');


/**
 * Register widget areas.
 *
 * @since Twenty Twenty 1.0
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function twentytwenty_sidebar_registration() {

	// Arguments used in all register_sidebar() calls.
	$shared_args = array(
		'before_title'  => '<h2 class="widget-title subheading heading-size-3">',
		'after_title'   => '</h2>',
		'before_widget' => '<div class="widget %2$s"><div class="widget-content">',
		'after_widget'  => '</div></div>',
	);

	// Footer #1.
	register_sidebar(
		array_merge(
			$shared_args,
			array(
				'name'        => __( 'Footer #1', 'twentytwenty' ),
				'id'          => 'sidebar-1',
				'description' => __( 'Widgets in this area will be displayed in the first column in the footer.', 'twentytwenty' ),
			)
		)
	);

	// Footer #2.
	register_sidebar(
		array_merge(
			$shared_args,
			array(
				'name'        => __( 'Footer #2', 'twentytwenty' ),
				'id'          => 'sidebar-2',
				'description' => __( 'Widgets in this area will be displayed in the second column in the footer.', 'twentytwenty' ),
			)
		)
	);

}

add_action( 'widgets_init', 'twentytwenty_sidebar_registration' );

/**
 * Enqueue supplemental block editor styles.
 *
 * @since Twenty Twenty 1.0
 */
function twentytwenty_block_editor_styles() {

	// Enqueue the editor styles.
	wp_enqueue_style( 'twentytwenty-block-editor-styles', get_theme_file_uri( '/assets/css/editor-style-block.css' ), array(), wp_get_theme()->get( 'Version' ), 'all' );
	wp_style_add_data( 'twentytwenty-block-editor-styles', 'rtl', 'replace' );

	// Add inline style from the Customizer.
	wp_add_inline_style( 'twentytwenty-block-editor-styles', twentytwenty_get_customizer_css( 'block-editor' ) );

	// Add inline style for non-latin fonts.
	wp_add_inline_style( 'twentytwenty-block-editor-styles', TwentyTwenty_Non_Latin_Languages::get_non_latin_css( 'block-editor' ) );

	// Enqueue the editor script.
	wp_enqueue_script( 'twentytwenty-block-editor-script', get_theme_file_uri( '/assets/js/editor-script-block.js' ), array( 'wp-blocks', 'wp-dom' ), wp_get_theme()->get( 'Version' ), true );
}

add_action( 'enqueue_block_editor_assets', 'twentytwenty_block_editor_styles', 1, 1 );

/**
 * Enqueue classic editor styles.
 *
 * @since Twenty Twenty 1.0
 */
function twentytwenty_classic_editor_styles() {

	$classic_editor_styles = array(
		'/assets/css/editor-style-classic.css',
	);

	add_editor_style( $classic_editor_styles );

}

add_action( 'init', 'twentytwenty_classic_editor_styles' );

/**
 * Output Customizer settings in the classic editor.
 * Adds styles to the head of the TinyMCE iframe. Kudos to @Otto42 for the original solution.
 *
 * @since Twenty Twenty 1.0
 *
 * @param array $mce_init TinyMCE styles.
 * @return array TinyMCE styles.
 */
function twentytwenty_add_classic_editor_customizer_styles( $mce_init ) {

	$styles = twentytwenty_get_customizer_css( 'classic-editor' );

	if ( ! isset( $mce_init['content_style'] ) ) {
		$mce_init['content_style'] = $styles . ' ';
	} else {
		$mce_init['content_style'] .= ' ' . $styles . ' ';
	}

	return $mce_init;

}

add_filter( 'tiny_mce_before_init', 'twentytwenty_add_classic_editor_customizer_styles' );

/**
 * Output non-latin font styles in the classic editor.
 * Adds styles to the head of the TinyMCE iframe. Kudos to @Otto42 for the original solution.
 *
 * @param array $mce_init TinyMCE styles.
 * @return array TinyMCE styles.
 */
function twentytwenty_add_classic_editor_non_latin_styles( $mce_init ) {

	$styles = TwentyTwenty_Non_Latin_Languages::get_non_latin_css( 'classic-editor' );

	// Return if there are no styles to add.
	if ( ! $styles ) {
		return $mce_init;
	}

	if ( ! isset( $mce_init['content_style'] ) ) {
		$mce_init['content_style'] = $styles . ' ';
	} else {
		$mce_init['content_style'] .= ' ' . $styles . ' ';
	}

	return $mce_init;

}

add_filter( 'tiny_mce_before_init', 'twentytwenty_add_classic_editor_non_latin_styles' );

/**
 * Block Editor Settings.
 * Add custom colors and font sizes to the block editor.
 *
 * @since Twenty Twenty 1.0
 */
function twentytwenty_block_editor_settings() {

	// Block Editor Palette.
	$editor_color_palette = array(
		array(
			'name'  => __( 'Accent Color', 'twentytwenty' ),
			'slug'  => 'accent',
			'color' => twentytwenty_get_color_for_area( 'content', 'accent' ),
		),
		array(
			'name'  => _x( 'Primary', 'color', 'twentytwenty' ),
			'slug'  => 'primary',
			'color' => twentytwenty_get_color_for_area( 'content', 'text' ),
		),
		array(
			'name'  => _x( 'Secondary', 'color', 'twentytwenty' ),
			'slug'  => 'secondary',
			'color' => twentytwenty_get_color_for_area( 'content', 'secondary' ),
		),
		array(
			'name'  => __( 'Subtle Background', 'twentytwenty' ),
			'slug'  => 'subtle-background',
			'color' => twentytwenty_get_color_for_area( 'content', 'borders' ),
		),
	);

	// Add the background option.
	$background_color = get_theme_mod( 'background_color' );
	if ( ! $background_color ) {
		$background_color_arr = get_theme_support( 'custom-background' );
		$background_color     = $background_color_arr[0]['default-color'];
	}
	$editor_color_palette[] = array(
		'name'  => __( 'Background Color', 'twentytwenty' ),
		'slug'  => 'background',
		'color' => '#' . $background_color,
	);

	// If we have accent colors, add them to the block editor palette.
	if ( $editor_color_palette ) {
		add_theme_support( 'editor-color-palette', $editor_color_palette );
	}

	// Block Editor Font Sizes.
	add_theme_support(
		'editor-font-sizes',
		array(
			array(
				'name'      => _x( 'Small', 'Name of the small font size in the block editor', 'twentytwenty' ),
				'shortName' => _x( 'S', 'Short name of the small font size in the block editor.', 'twentytwenty' ),
				'size'      => 18,
				'slug'      => 'small',
			),
			array(
				'name'      => _x( 'Regular', 'Name of the regular font size in the block editor', 'twentytwenty' ),
				'shortName' => _x( 'M', 'Short name of the regular font size in the block editor.', 'twentytwenty' ),
				'size'      => 21,
				'slug'      => 'normal',
			),
			array(
				'name'      => _x( 'Large', 'Name of the large font size in the block editor', 'twentytwenty' ),
				'shortName' => _x( 'L', 'Short name of the large font size in the block editor.', 'twentytwenty' ),
				'size'      => 26.25,
				'slug'      => 'large',
			),
			array(
				'name'      => _x( 'Larger', 'Name of the larger font size in the block editor', 'twentytwenty' ),
				'shortName' => _x( 'XL', 'Short name of the larger font size in the block editor.', 'twentytwenty' ),
				'size'      => 32,
				'slug'      => 'larger',
			),
		)
	);

	add_theme_support( 'editor-styles' );

	// If we have a dark background color then add support for dark editor style.
	// We can determine if the background color is dark by checking if the text-color is white.
	if ( '#ffffff' === strtolower( twentytwenty_get_color_for_area( 'content', 'text' ) ) ) {
		add_theme_support( 'dark-editor-style' );
	}

}

add_action( 'after_setup_theme', 'twentytwenty_block_editor_settings' );

/**
 * Overwrite default more tag with styling and screen reader markup.
 *
 * @param string $html The default output HTML for the more tag.
 * @return string
 */
function twentytwenty_read_more_tag( $html ) {
	return preg_replace( '/<a(.*)>(.*)<\/a>/iU', sprintf( '<div class="read-more-button-wrap"><a$1><span class="faux-button">$2</span> <span class="screen-reader-text">"%1$s"</span></a></div>', get_the_title( get_the_ID() ) ), $html );
}

add_filter( 'the_content_more_link', 'twentytwenty_read_more_tag' );

/**
 * Enqueues scripts for customizer controls & settings.
 *
 * @since Twenty Twenty 1.0
 *
 * @return void
 */
function twentytwenty_customize_controls_enqueue_scripts() {
	$theme_version = wp_get_theme()->get( 'Version' );

	// Add main customizer js file.
	wp_enqueue_script( 'twentytwenty-customize', get_template_directory_uri() . '/assets/js/customize.js', array( 'jquery' ), $theme_version, false );

	// Add script for color calculations.
	wp_enqueue_script( 'twentytwenty-color-calculations', get_template_directory_uri() . '/assets/js/color-calculations.js', array( 'wp-color-picker' ), $theme_version, false );

	// Add script for controls.
	wp_enqueue_script( 'twentytwenty-customize-controls', get_template_directory_uri() . '/assets/js/customize-controls.js', array( 'twentytwenty-color-calculations', 'customize-controls', 'underscore', 'jquery' ), $theme_version, false );
	wp_localize_script( 'twentytwenty-customize-controls', 'twentyTwentyBgColors', twentytwenty_get_customizer_color_vars() );
}

add_action( 'customize_controls_enqueue_scripts', 'twentytwenty_customize_controls_enqueue_scripts' );

/**
 * Enqueue scripts for the customizer preview.
 *
 * @since Twenty Twenty 1.0
 *
 * @return void
 */
function twentytwenty_customize_preview_init() {
	$theme_version = wp_get_theme()->get( 'Version' );

	wp_enqueue_script( 'twentytwenty-customize-preview', get_theme_file_uri( '/assets/js/customize-preview.js' ), array( 'customize-preview', 'customize-selective-refresh', 'jquery' ), $theme_version, true );
	wp_localize_script( 'twentytwenty-customize-preview', 'twentyTwentyBgColors', twentytwenty_get_customizer_color_vars() );
	wp_localize_script( 'twentytwenty-customize-preview', 'twentyTwentyPreviewEls', twentytwenty_get_elements_array() );

	wp_add_inline_script(
		'twentytwenty-customize-preview',
		sprintf(
			'wp.customize.selectiveRefresh.partialConstructor[ %1$s ].prototype.attrs = %2$s;',
			wp_json_encode( 'cover_opacity' ),
			wp_json_encode( twentytwenty_customize_opacity_range() )
		)
	);
}

add_action( 'customize_preview_init', 'twentytwenty_customize_preview_init' );

/**
 * Get accessible color for an area.
 *
 * @since Twenty Twenty 1.0
 *
 * @param string $area    The area we want to get the colors for.
 * @param string $context Can be 'text' or 'accent'.
 * @return string Returns a HEX color.
 */
function twentytwenty_get_color_for_area( $area = 'content', $context = 'text' ) {

	// Get the value from the theme-mod.
	$settings = get_theme_mod(
		'accent_accessible_colors',
		array(
			'content'       => array(
				'text'      => '#000000',
				'accent'    => '#cd2653',
				'secondary' => '#6d6d6d',
				'borders'   => '#dcd7ca',
			),
			'header-footer' => array(
				'text'      => '#000000',
				'accent'    => '#cd2653',
				'secondary' => '#6d6d6d',
				'borders'   => '#dcd7ca',
			),
		)
	);

	// If we have a value return it.
	if ( isset( $settings[ $area ] ) && isset( $settings[ $area ][ $context ] ) ) {
		return $settings[ $area ][ $context ];
	}

	// Return false if the option doesn't exist.
	return false;
}

/**
 * Returns an array of variables for the customizer preview.
 *
 * @since Twenty Twenty 1.0
 *
 * @return array
 */
function twentytwenty_get_customizer_color_vars() {
	$colors = array(
		'content'       => array(
			'setting' => 'background_color',
		),
		'header-footer' => array(
			'setting' => 'header_footer_background_color',
		),
	);
	return $colors;
}

/**
 * Get an array of elements.
 *
 * @since Twenty Twenty 1.0
 *
 * @return array
 */
function twentytwenty_get_elements_array() {

	// The array is formatted like this:
	// [key-in-saved-setting][sub-key-in-setting][css-property] = [elements].
	$elements = array(
		'content'       => array(
			'accent'     => array(
				'color'            => array( '.color-accent', '.color-accent-hover:hover', '.color-accent-hover:focus', ':root .has-accent-color', '.has-drop-cap:not(:focus):first-letter', '.wp-block-button.is-style-outline', 'a' ),
				'border-color'     => array( 'blockquote', '.border-color-accent', '.border-color-accent-hover:hover', '.border-color-accent-hover:focus' ),
				'background-color' => array( 'button', '.button', '.faux-button', '.wp-block-button__link', '.wp-block-file .wp-block-file__button', 'input[type="button"]', 'input[type="reset"]', 'input[type="submit"]', '.bg-accent', '.bg-accent-hover:hover', '.bg-accent-hover:focus', ':root .has-accent-background-color', '.comment-reply-link' ),
				'fill'             => array( '.fill-children-accent', '.fill-children-accent *' ),
			),
			'background' => array(
				'color'            => array( ':root .has-background-color', 'button', '.button', '.faux-button', '.wp-block-button__link', '.wp-block-file__button', 'input[type="button"]', 'input[type="reset"]', 'input[type="submit"]', '.wp-block-button', '.comment-reply-link', '.has-background.has-primary-background-color:not(.has-text-color)', '.has-background.has-primary-background-color *:not(.has-text-color)', '.has-background.has-accent-background-color:not(.has-text-color)', '.has-background.has-accent-background-color *:not(.has-text-color)' ),
				'background-color' => array( ':root .has-background-background-color' ),
			),
			'text'       => array(
				'color'            => array( 'body', '.entry-title a', ':root .has-primary-color' ),
				'background-color' => array( ':root .has-primary-background-color' ),
			),
			'secondary'  => array(
				'color'            => array( 'cite', 'figcaption', '.wp-caption-text', '.post-meta', '.entry-content .wp-block-archives li', '.entry-content .wp-block-categories li', '.entry-content .wp-block-latest-posts li', '.wp-block-latest-comments__comment-date', '.wp-block-latest-posts__post-date', '.wp-block-embed figcaption', '.wp-block-image figcaption', '.wp-block-pullquote cite', '.comment-metadata', '.comment-respond .comment-notes', '.comment-respond .logged-in-as', '.pagination .dots', '.entry-content hr:not(.has-background)', 'hr.styled-separator', ':root .has-secondary-color' ),
				'background-color' => array( ':root .has-secondary-background-color' ),
			),
			'borders'    => array(
				'border-color'        => array( 'pre', 'fieldset', 'input', 'textarea', 'table', 'table *', 'hr' ),
				'background-color'    => array( 'caption', 'code', 'code', 'kbd', 'samp', '.wp-block-table.is-style-stripes tbody tr:nth-child(odd)', ':root .has-subtle-background-background-color' ),
				'border-bottom-color' => array( '.wp-block-table.is-style-stripes' ),
				'border-top-color'    => array( '.wp-block-latest-posts.is-grid li' ),
				'color'               => array( ':root .has-subtle-background-color' ),
			),
		),
		'header-footer' => array(
			'accent'     => array(
				'color'            => array( 'body:not(.overlay-header) .primary-menu > li > a', 'body:not(.overlay-header) .primary-menu > li > .icon', '.modal-menu a', '.footer-menu a, .footer-widgets a', '#site-footer .wp-block-button.is-style-outline', '.wp-block-pullquote:before', '.singular:not(.overlay-header) .entry-header a', '.archive-header a', '.header-footer-group .color-accent', '.header-footer-group .color-accent-hover:hover' ),
				'background-color' => array( '.social-icons a', '#site-footer button:not(.toggle)', '#site-footer .button', '#site-footer .faux-button', '#site-footer .wp-block-button__link', '#site-footer .wp-block-file__button', '#site-footer input[type="button"]', '#site-footer input[type="reset"]', '#site-footer input[type="submit"]' ),
			),
			'background' => array(
				'color'            => array( '.social-icons a', 'body:not(.overlay-header) .primary-menu ul', '.header-footer-group button', '.header-footer-group .button', '.header-footer-group .faux-button', '.header-footer-group .wp-block-button:not(.is-style-outline) .wp-block-button__link', '.header-footer-group .wp-block-file__button', '.header-footer-group input[type="button"]', '.header-footer-group input[type="reset"]', '.header-footer-group input[type="submit"]' ),
				'background-color' => array( '#site-header', '.footer-nav-widgets-wrapper', '#site-footer', '.menu-modal', '.menu-modal-inner', '.search-modal-inner', '.archive-header', '.singular .entry-header', '.singular .featured-media:before', '.wp-block-pullquote:before' ),
			),
			'text'       => array(
				'color'               => array( '.header-footer-group', 'body:not(.overlay-header) #site-header .toggle', '.menu-modal .toggle' ),
				'background-color'    => array( 'body:not(.overlay-header) .primary-menu ul' ),
				'border-bottom-color' => array( 'body:not(.overlay-header) .primary-menu > li > ul:after' ),
				'border-left-color'   => array( 'body:not(.overlay-header) .primary-menu ul ul:after' ),
			),
			'secondary'  => array(
				'color' => array( '.site-description', 'body:not(.overlay-header) .toggle-inner .toggle-text', '.widget .post-date', '.widget .rss-date', '.widget_archive li', '.widget_categories li', '.widget cite', '.widget_pages li', '.widget_meta li', '.widget_nav_menu li', '.powered-by-wordpress', '.to-the-top', '.singular .entry-header .post-meta', '.singular:not(.overlay-header) .entry-header .post-meta a' ),
			),
			'borders'    => array(
				'border-color'     => array( '.header-footer-group pre', '.header-footer-group fieldset', '.header-footer-group input', '.header-footer-group textarea', '.header-footer-group table', '.header-footer-group table *', '.footer-nav-widgets-wrapper', '#site-footer', '.menu-modal nav *', '.footer-widgets-outer-wrapper', '.footer-top' ),
				'background-color' => array( '.header-footer-group table caption', 'body:not(.overlay-header) .header-inner .toggle-wrapper::before' ),
			),
		),
	);

	/**
	 * Filters Twenty Twenty theme elements.
	 *
	 * @since Twenty Twenty 1.0
	 *
	 * @param array Array of elements.
	 */
	return apply_filters( 'twentytwenty_get_elements_array', $elements );
}

// function customtheme_add_woocommerce_support()
//  {
// add_theme_support( 'woocommerce' );
// }
// add_action( 'before_setup_theme', 'customtheme_add_woocommerce_support' );

remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40 );
add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_meta', 10 );
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_price', 10 );
add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_price', 11 );

add_filter( 'woocommerce_sale_flash', 'add_percentage_to_sale_badge', 20, 3 );
function add_percentage_to_sale_badge( $html, $post, $product ) {
	if( $product->is_type('variable')){
			$percentages = array();

			// Get all variation prices
			$prices = $product->get_variation_prices();

			// Loop through variation prices
			foreach( $prices['price'] as $key => $price ){
					// Only on sale variations
					if( $prices['regular_price'][$key] !== $price ){
							// Calculate and set in the array the percentage for each variation on sale
							$percentages[] = round(100 - ($prices['sale_price'][$key] / $prices['regular_price'][$key] * 100));
					}
			}
			$percentage = max($percentages) . '%';
	} else {
		$regular_price = (float) $product->get_regular_price();
		$sale_price    = (float) $product->get_sale_price();
		if($regular_price > 0) {
			$percentage    = round(100 - ($sale_price / $regular_price * 100)) . '%';
		}
	}
	if ( $product->price > 0 ) {
		return '<span class="onsale">' . esc_html__( '-', 'woocommerce' ) . ' ' . $percentage . '</span>';
	}
}

function tp_admin_logo() {
	echo '<br/><img alt="'.get_bloginfo( 'name' ).'" src="'. get_template_directory_uri() .'/assets/images/logo.svg"/>';
}
add_action( 'admin_notices', 'tp_admin_logo' );

function tp_admin_footer_credits( $text ) {
$text='<p>Chào mừng bạn đến với website <a href="'.get_bloginfo( 'url' ).'"  title="'.get_bloginfo( 'name' ).'"><strong>'.get_bloginfo( 'name' ).'</strong></a></p>';
 return $text;
}
add_filter( 'admin_footer_text', 'tp_admin_footer_credits' );
function custom_loginlogo() {
echo '<style type="text/css">
h1 a {background-image: url("'. get_template_directory_uri() .'/assets/images/logo.svg") !important; background-size: contain  !important;width: auto !important;}
</style>';
}
add_action('login_head', 'custom_loginlogo');

function newsLetter() {	
	?>
	<div class="new-letter">
		<form method="post" accept-charset="utf-8" enctype="multipart/form-data" id="subscribe-form"> 	       
			<div class="d-flex flex-column flex-sm-row">
				<input type="email" required name="email_subscribe" class="email_subscribe py-3c form-control mb-3 mb-sm-0 rounded-0" placeholder="Email address">
				<button class="bg-black ms-sm-2 ms-xl-3 text-white px-5 px-sm-4 py-3c px-md-5 border-0 fw-bold rounded-0" type="submit" name="btn-subscribe" id="btn-subscribe">Subscribe</button>
			</div>
		</form>
		<div class="error-sub-mail mt-3 text-start text-uppercase fw-bold text-danger"></div>
	</div>
<?php }
function cptui_register_my_cpts() {
	/**
	 * Post type: News Letter.
	 */
	$labels = array(
		"name" => __( "News Letter", "agaressencellc" ),
		"singular_name" => __( "Sub Email", "agaressencellc" ),
	);

	$args = array(
		"label" => __( "News Letter", "agaressencellc" ),
		"labels" => $labels,
		"description" => "",
		"public" => true,
		"publicly_queryable" => true,
		"show_ui" => true,
		"delete_with_user" => false,
		"show_in_rest" => true,
		"rest_base" => "",
		"rest_controller_class" => "WP_REST_Posts_Controller",
		"has_archive" => false,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"exclude_from_search" => true,
		"capability_type" => "post",
		"map_meta_cap" => true,
		"hierarchical" => false,
		"rewrite" => array( "slug" => "sub_email", "with_front" => true ),
		"query_var" => true,
		'menu_icon' => 'dashicons-email-alt', 
		"supports" => array( "title", "thumbnail" ),
	);
	register_post_type( "sub_email", $args );
}
add_action( 'init', 'cptui_register_my_cpts' );
function submail_meta_box() {
	add_meta_box( 'sub-mail', 'Submail Infor', 'submail_output', 'sub_email' );
}
add_action( 'add_meta_boxes', 'submail_meta_box' );
function submail_output($post) {
	$email_sub = get_post_meta($post->ID,'email_sub',true);
	$status_sub = get_post_meta($post->ID,'status_sub',true);
	wp_nonce_field( 'save_submail', 'submail_nonce' );
?>	
	<table style="width: 100%">
		<tbody>
			<tr>
				<td>Email:</td>
				<td><input type="email" style="width: 100%" name="email_sub" value="<?php echo esc_attr($email_sub); ?>" /></td>
			</tr>
			<tr><td colspan="2">&nbsp;</td></tr>
			<tr>
				<td>Status:</td>
				<td>
					<select style="width: 100%" name="status_sub">
			 			<option value="Active" <?php selected($status_sub, 'Active' ); ?>>Active</option>
			 			<option value="InActive" <?php selected($status_sub, 'InActive' ); ?>>InActive</option>
			 		</select>
			 	</td>
			</tr>
		</tbody>
	</table> 	
<?php }
function submail_save($post_id) {
	$submail_nonce = $_POST['submail_nonce'];
	// Kiểm tra nếu nonce chưa được gán giá trị
	if( !isset($submail_nonce ) ) {
	return;
	}
	// Kiểm tra nếu giá trị nonce không trùng khớp
	if( !wp_verify_nonce($submail_nonce, 'save_submail' ) ) {
		return;
	}
	$email_sub = sanitize_text_field($_POST['email_sub'] );	
	$status_sub = sanitize_text_field($_POST['status_sub'] );	
	update_post_meta($post_id, 'email_sub', $email_sub);
	update_post_meta($post_id, 'status_sub', $status_sub);
}
add_action( 'save_post', 'submail_save' );


add_action( 'restrict_manage_posts', 'add_export_button' );
function add_export_button() {
    $screen = get_current_screen();

    //if (isset($screen->parent_file) && ('edit.php' == $screen->parent_file)) { add for post
    if($screen->post_type != 'sub_email' ) {
    	return;
    }
        ?>
        <input type="submit" name="export_all_email" id="export_all_email" class="button button-primary" value="Export All Emails">
        <script type="text/javascript">
            jQuery(function($) {
                $('#export_all_email').insertAfter('#post-query-submit');
            });
        </script>
        <?php
}

//Export post type to excel file
add_action( 'init', 'func_export_all_email' );
function func_export_all_email() {
    if(isset($_GET['export_all_email'])) {
        $arg = array(
            'post_type' => 'sub_email',
            'post_status' => 'publish',
            'posts_per_page' => -1,
            'meta_input' => array(
			    'status_sub' => 'active'
			)
        );
        global $post;
				$arr_post = get_posts($arg);
        if ($arr_post) {
            header('Content-type: text/csv');
            header('Content-Disposition: attachment; filename="list-email.csv"');
            header('Pragma: no-cache');
            header('Expires: 0');
            $file = fopen('php://output', 'w');
            fputcsv($file, array('List Emails Newsletter'));
            foreach ($arr_post as $post) {
            	$email_text = get_post_meta($post->ID, 'email_sub', TRUE );
                setup_postdata($post);
                //fputcsv($file, array(get_the_title(), get_the_permalink()));
                fputcsv($file, array($email_text));
            }
            exit();
        }
    }
}

//if(!check_ajax_referer('thongbao', 'mail_subscribe-form')) wp_die();
add_action( 'wp_ajax_thongbao', 'thongbao_init' );
add_action( 'wp_ajax_nopriv_thongbao', 'thongbao_init' );
function thongbao_init() {
    //do bên js để dạng json nên giá trị trả về dùng phải encode
    $mail_subscribe= (isset($_POST['email_sub']))?esc_attr($_POST['email_sub']) : '';
     //wp_send_json_success($mail_subscribe);
    global $wpdb;

	$get_emial_loop = new WP_Query(
	  	array(
		    'post_type' => 'sub_email',
		    'meta_query' => array(
		        array(
		            'key' => 'email_sub',
		            'value' => $mail_subscribe,
		            'compare' => 'LIKE'
		        )
		    )
		)
	);

	if( $get_emial_loop->have_posts() ) {
		//echo "Email đã có trong hệ thống";
		// $response = 1;
		echo json_encode( array('success' => false) );
		die;
	} else {
	  	wp_insert_post(
	      	array(
		        'post_author' => $mail_subscribe,
		        'post_content' => $mail_subscribe,
		        'post_content_filtered' => '',
		        'post_title' => $mail_subscribe,
		        'post_excerpt' => '',
		        'post_status' => 'Publish',
		        'post_type' => 'sub_email',
		        'comment_status' => '',
		        'ping_status' => '',
		        'post_password' => '',
		        'to_ping' =>  '',
		        'pinged' => '',
		        'post_parent' => 0,
		        'menu_order' => 0,
		        'guid' => '',
		        'import_id' => 0,
		        'context' => '',
		        'meta_input' => array(
				    'email_sub' => $mail_subscribe,
				    'status_sub' => 'active'
				)
		    )
			);
		echo json_encode( array('success' => true) );
		die;
	}
	//    die();//bắt buộc phải có khi kết thúc
}

function contactForm() {
	$success = '';  $errcaptacha = ''; 
 if(isset($_POST['btn-send']) ) { 
	 $address_company = '18 Grantchester Place Gaithersburg, Maryland 20877 US';$phone_company = '+84 898 104 714';$mail_company = 'agaressencellc@gmail.com';
	 if(get_option('address_company') !='') {
		 $address_company = get_option('address_company');
	 }
	 if(get_option('phone_company') !='') {
		 $phone_company = get_option('phone_company');
	 }
	 if(get_option('hotline') !='') {
		 $hotline = get_option('hotline');
	 }
	 if(get_bloginfo('admin_email') !='') {
		 $mail_company = get_bloginfo('admin_email');
	 }
	 if(isset($_POST['g-recaptcha-response'])){  
		 $tut_captcha=$_POST['g-recaptcha-response'];
	 } 
	 if(!$tut_captcha){
		 $errcaptacha = '<div class="text-danger">You have not authenticated reCAPTCHA!.</div>';
	 }  
	 $kiemtra=file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=6LcoEGIhAAAAAHQGA75fwhM0Kml_unne4jYmkxks&response=".$tut_captcha."&remoteip=".$_SERVER['REMOTE_ADDR']);
	 
	 $kiemtra = json_decode($kiemtra);
	 
	 if($kiemtra->success == false) {
		 $errcaptacha = 'Did you enter the wrong Captcha code?';
		 echo '<script> window.alert("Please confirm the Captcha check.");
				 window.location = "'.get_bloginfo( 'url' ).'/contact-us"</script>';	
		 die();
	 } else {
		 $firstName = trim($_POST['first-name']);
		 $lastName = trim($_POST['last-name']);
		 $businessEmail = trim($_POST['your-email']);
		 $phoneNumber = trim($_POST['phone-number']);
		 $yourMessage = trim($_POST['your-message']);
		 $result = array('status' => 0);
		 require(get_stylesheet_directory().'/PHPMailer-5.2.16/PHPMailerAutoload.php');

		 $mail  = new PHPMailer();
		 $body = "";		
		 $mail->IsSMTP();
		 $mail->CharSet = "UTF-8";
		 $mail->SMTPDebug  = 2;
		 $mail->SMTPAuth   = true;
		 $mail->Host       = "smtp.gmail.com";
		 $mail->SMTPSecure = 'tls';
		 $mail->Port       = 587;
		 $mail->Username   = "automails123@gmail.com";
		 $mail->Password   = "graeiiotucgqwwdg";
		 $mail->SetFrom('admin@gmail.com');
		 $mail->addAddress($mail_company);
		 $mail->addCC($businessEmail,'automails123@gmail.com');
		 // $mail->addBCC('automails123@gmail.com');
		 $mail->Subject    = "Contact Form - ".get_bloginfo( 'name' )." - ".get_bloginfo('url')."";
		 $body.="<div style='background-color:#ffffff;color:#000000;font-family:Arial,Helvetica,sans-serif;font-size:15px;margin:0 auto;padding:0'>
		 <table align='center' border='0' cellpadding='0' cellspacing='0' style='padding:0;border-spacing:0px;table-layout:fixed;border-collapse:collapse;font-family:Arial,Helvetica,sans-serif;background-color:#f5f5f5;'>
		 <tbody><tr><td style='padding:0;margin:0;font-family:Arial,Helvetica,sans-serif;padding-left:40px' bgcolor='#e4e6ea'></td></tr><tr>
			 <td bgcolor='#f5f5f5' style='padding:0;margin:0;font-family:Arial,Helvetica,sans-serif'>
				 <table border='0' cellpadding='0' cellspacing='0' width='688' align='center' style='padding:0;border-spacing:0px;table-layout:fixed;border-collapse:collapse;font-family:Arial,Helvetica,sans-serif'>
					 <tbody>
					 <tr>
						 <td width='360' align='left' style='padding:0;margin:0;font-family:Arial,Helvetica,sans-serif;padding:10px 0 10px 10px'>
							 <a href='".get_bloginfo( 'url' )."' style='text-decoration:none;font-family:Arial,Helvetica,sans-serif' target='_blank'>";
							 $body.="<img src='".get_template_directory_uri()."/assets/images/logo.png' style='border:0;max-width: 100%;height: auto' alt='".get_bloginfo( 'name' )."'></a>
						 </td>
						 <td width='30' align='left' style='padding:0;margin:0;font-family:Arial,Helvetica,sans-serif'></td>
						 <td width='90' align='left' style='padding:0;margin:0;font-family:Arial,Helvetica,sans-serif'><a href='".get_bloginfo( 'url' )."/about-us' style='text-decoration:none;font-family:Arial,Helvetica,sans-serif;color:#333333;font-size:12px;line-height:20px;display:inline-block' target='_blank'>Introduction</a></td>
						 <td width='30' align='left' style='padding:0;margin:0;font-family:Arial,Helvetica,sans-serif'></td>
						 <td width='90' align='left' style='padding:0;margin:0;font-family:Arial,Helvetica,sans-serif'><a href='".get_bloginfo( 'url' )."/contact-us' style='text-decoration:none;font-family:Arial,Helvetica,sans-serif;color:#333333;font-size:12px;line-height:20px;display:inline-block' target='_blank'>Contact us</a></td>
					 </tr>
					 </tbody>
				 </table>
			 </td>
		 </tr>
		 <tr>
			 <td style='padding:0;margin:0;font-family:Arial,Helvetica,sans-serif;padding-bottom: 30px'>
				 <table align='center' border='0' cellpadding='0' cellspacing='0' width='600' style='border-collapse:collapse' bgcolor='#ffffff'>
					 <tbody>
						 <tr>
							 <td>
								 <table border='0' cellpadding='0' cellspacing='0' width='100%' bgcolor='#ffffff'>
									 <tbody>
										 <tr>
											 <td style='padding:0px 0 22px 0'>
												 <table border='0' cellpadding='0' cellspacing='0' width='100%' style='padding:15px 0 0 0'>
													 <tbody>
													 <tr>
														 <td style='padding:14px 10px 0 24px;font-family:Arial,Helvetica,sans-serif;font-size:15px;color:#1a7138'><b>Nội Dung Liên Hệ</b></td>
													 </tr>
													 <tr>
														 <td style='padding:18px 10px 0 24px;font-family:Arial,Helvetica,sans-serif;font-size:12px;color:#666666'>Thank you ".$firstName." ".$lastName." sent the following to ".get_bloginfo( 'name' ).":</td>
													 </tr>
													 <tr>
														 <td style='padding:18px 10px 0 24px;font-family:Arial,Helvetica,sans-serif;font-size:12px;color:#666666'>
														 <div style='background-color: #eee;border:2px solid #f50; padding:20px;margin-bottom:15px'>
															 <div style='margin-bottom:10px;'>Full name: <b>".$firstName." ".$lastName." </b></div>
															 <div style='margin-bottom:10px;'>E-mail: <b>".$businessEmail."</b></div>
															 <div style='margin-bottom:10px;'>Phone number: <b>".$phoneNumber."</b></div>
															 <div>Your Message: <b>".$yourMessage."</b></div>
														 </div>
														 </td>
													 </tr>
																							 
													 <tr>
														 <td style='padding:3px 10px 0 24px;font-family:Arial,Helvetica,sans-serif;font-size:12px;color:#666;margin-top:30px;'>► Email support: <a href='mailto:".$mail_company."' target='_blank'> <span style='color:#0388cd'>".$mail_company."</span></a> or</td>
													 </tr>
													 <tr>
														 <td style='padding:3px 10px 0 24px;font-family:Arial,Helvetica,sans-serif;font-size:12px;color:#666666'>► Customer Care Call Center: <span style='font-weight:bold'>".$phone_company." </span></td>
													 </tr>
													 <tr>
														 <td style='padding:16px 10px 0 24px;font-family:Arial,Helvetica,sans-serif;font-size:12px;color:#666666'><span style='font-weight:bold'>".get_bloginfo( 'name' )."</span> Thank you very much and it is our pleasure to serve you.</td>
													 </tr>
													 <tr>
														 <td style='padding:12px 10px 0 24px;font-family:Arial,Helvetica,sans-serif;font-size:11px;color:#666666;font-style:italic'>*Please do not reply to this email*.</td>
													 </tr>
													 </tbody>
												 </table>
											 </td>
										 </tr>
									 </tbody>
								 </table>
							 </td>
						 </tr>
					 </tbody>
				 </table>
			 </td>
		 </tr>
		 </tbody>
		 </table>
		 <table border='0' cellpadding='0' cellspacing='0' width='600' align='center' style='padding:0;border-spacing:0px;table-layout:fixed;border-collapse:collapse;font-family:Arial,Helvetica,sans-serif;'>
		 <tbody>
			 <tr>
			 <td style='padding:0;margin:0;font-family:Arial,Helvetica,sans-serif;padding-bottom:20px'>
				 <table border='0' cellpadding='0' cellspacing='0' width='100%' style='padding:0;border-spacing:0px;table-layout:fixed;border-collapse:collapse;font-family:Arial,Helvetica,sans-serif'>
				 <tbody>
					 <tr>
					 <td style='margin:0;font-family:Arial,Helvetica,sans-serif;padding:20px 0'>
						 <table border='0' cellpadding='0' cellspacing='0' width='100%' style='padding:0;border-spacing:0px;table-layout:fixed;border-collapse:collapse;font-family:Arial,Helvetica,sans-serif'>
						 <tbody>
							 <tr>
							 <td style='padding:0;margin:0;font-family:Arial,Helvetica,sans-serif;color:#333333;font-size:15px;line-height:20px'><b>".get_bloginfo( 'name' )."</b></td>
							 </tr>
							 <tr>
							 <td style='padding:0;margin:0;font-family:Arial,Helvetica,sans-serif;color:#333333;font-size:12px;line-height:20px'><b>Company address: </b>".$address_company."</td>
							 </tr>
							 <tr>
							 <td style='padding:0;margin:0;font-family:Arial,Helvetica,sans-serif;color:#333333;font-size:12px;line-height:20px'><b>Hotline:</b> ".$phone_company." - Email: <b>".$mail_company."</b></td>
							 </tr>				                   
						 </tbody>
						 </table>
					 </td>
					 </tr>
				 </tbody>
				 </table>
			 </td>
			 </tr>
		 </tbody>
		 </table>
		 </div>";
		 $mail->MsgHTML($body);	
		 // if  update user return true then lets send user an email containing the new password

		 if(!$mail->Send()) {
			 echo "Mailer Error: " . $mail->ErrorInfo;
			 $result['msg'] = 'There is an error, please check your input and try again';
			 $result['debug'] = $mail->ErrorInfo;
		 } else {
			 $result['status'] = 1;
			 echo '<script> window.alert("Thank you for sending your contact content to '.get_bloginfo( 'name' ).'. '.get_bloginfo( 'name' ).' Will reply to you soon.");
				 window.location = "'.get_bloginfo( 'url' ).'"</script>';	
		 }
		 }
	 
 } ?>
 	<form action="" method="post" accept-charset="utf-8">   
	 	<div class="row gy-3">
			<div class="col-6"><label class="color-383838 fw-sim-bold fs-15 mb-2">First name</label><input type="text" name="first-name" class="form-control rounded-0 py-2c" placeholder="Enter your First name" required></div>
			<div class="col-6"><label class="color-383838 fw-sim-bold fs-15 mb-2">Last name</label><input type="text" name="last-name" class="form-control rounded-0 py-2c" placeholder="Enter your Last name" required></div>
			<div class="col-12"><label class="color-383838 fw-sim-bold fs-15 mb-2">E-mail</label><input type="email" name="your-email" class="form-control rounded-0 py-2c" placeholder="Enter your Email"></div>
			<div class="col-12"><label class="color-383838 fw-sim-bold fs-15 mb-2">Phone number</label><input type="tel" name="phone-number" class="form-control rounded-0 py-2c" placeholder="Enter your Phone number"></div>
			<div class="col-12"><label class="color-383838 fw-sim-bold fs-15 mb-2">Your Message</label><textarea name="your-message" cols="40" rows="4" class="form-control rounded-0 py-2c" placeholder="Enter your Message"></textarea></div>
			<div class="col-12"><div class="form-check"><input class="form-check-input" type="checkbox" value="" id="flexCheckChecked"><label class="form-check-label color-0F0F11 fs-13" for="flexCheckChecked">I have read and agree to the AGARESSENCE <a href="<?php bloginfo('url'); ?>/terms-conditions" title="Terms & Conditions">Terms & Conditions</a></label></div></div> 
			<div class="col-12"><div class="g-recaptcha" data-sitekey="6LcoEGIhAAAAAJPI5J6-QAfM6RAJKCjrQRoZnuSS"></div></div>
			<div class="col-12"><input type="submit" value="Send a message" class="px-3 py-3 form-control rounded-0 btn-submit text-decoration-none text-uppercase fw-bold" name="btn-send"></div>
			<div class="col-12 text-danger"><?php echo $errcaptacha;?></div>
		</div>
 	</form>
 <?php 		
}
//Search ajax
	add_action('wp_ajax_Post_filters', 'Post_filters');
	add_action('wp_ajax_nopriv_Post_filters', 'Post_filters');
	function Post_filters() {
	    if(isset($_POST['data'])){
		    $data = $_POST['data']; // nhận dữ liệu từ client
		    $getposts = new WP_Query(array(
					'post_type' => 'product','no_found_rows' => true,'cache_results' => false,'include_children' => false,'post_status' => 'publish',
					'posts_per_page' => 10,'s'=>$data,                         
				));		
				global $wp_query; 
				if($getposts->have_posts()) {global $product,$post;
					// var_dump();
					echo '
				<div class="d-flex justify-content-between">
				<span>'.$getposts->post_count.' RESULTS</span>
				<a class="color-8f8e8e text-decoration-none" href="'.get_bloginfo('url').'/?s='.$data.'" title="VIEW ALL">VIEW ALL</a>

				</div>
				<hr class="mb-4 mb-lg-5">
				<div class="row">';

		    while ($getposts->have_posts()) : $getposts->the_post();
		        echo '<div class="col-6 col-sm-6 col-md-4 col-lg-3"><a href="'.get_the_permalink().'" title="'.get_the_title().'" class="d-block text-decoration-none text-black">
						'. get_the_post_thumbnail(get_the_ID(), 'full', array( 'class' =>'img-fluid mx-auto d-block mb-3', 'alt' => get_the_title(), 'loading'=> 'lazy')).'
						<h3 class="mb-0 text-center fs-20 fw-normal text-capitalize">'.get_the_title().'</h3>
					</a>
				</div>'; 
		    endwhile; wp_reset_postdata();
		    echo '</div>';
			}
		    die(); 
	    }
	}

	
	


// REMOVE WP EMOJI
remove_action('wp_print_styles', 'print_emoji_styles');
remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
remove_action( 'admin_print_styles', 'print_emoji_styles' );
// Remove WP Version From Styles 
add_filter( 'style_loader_src', 'sdt_remove_ver_css_js', 9999 );
// Remove WP Version From Scripts
add_filter( 'script_loader_src', 'sdt_remove_ver_css_js', 9999 );
// Function to remove version numbers
function sdt_remove_ver_css_js( $src ) {
 if ( strpos( $src, 'ver=' ) )
  $src = remove_query_arg( 'ver', $src );
 return $src;
}
/**Remove script woocommerce*/
add_action( 'wp_enqueue_scripts', 'grd_woocommerce_script_cleaner', 99 );
function grd_woocommerce_script_cleaner() {
	if(!is_admin()){
		remove_action( 'wp_head', array( $GLOBALS['woocommerce'], 'generator' ) );
		wp_dequeue_style( 'woocommerce-layout' );
		wp_dequeue_style( 'woocommerce-smallscreen' );
		wp_dequeue_style( 'woocommerce_fancybox_styles' );
		wp_dequeue_style( 'woocommerce_prettyPhoto_css' );
		wp_dequeue_script( 'fancybox' );
		wp_dequeue_script( 'wc_price_slider' );
		wp_dequeue_script( 'prettyPhoto' );
		wp_dequeue_script( 'prettyPhoto-init' );
		wp_dequeue_script( 'jqueryui' );

		//wp_dequeue_style( 'woocommerce_frontend_styles' );
		//wp_dequeue_style( 'woocommerce-general');
		//wp_dequeue_style( 'woocommerce_chosen_styles' );
		//wp_dequeue_style( 'select2' );
		//wp_dequeue_script( 'wc-add-payment-method' );
		//wp_dequeue_script( 'wc-lost-password' );
		// wp_dequeue_script( 'wc-single-product' );
		//wp_dequeue_script( 'wc-add-to-cart' );
		// wp_dequeue_script( 'wc-cart-fragments' );
		// wp_dequeue_script( 'wc-credit-card-form' );
		// wp_dequeue_script( 'wc-checkout' );
		// wp_dequeue_script( 'wc-add-to-cart-variation' );
		// wp_dequeue_script( 'wc-single-product' );
		// wp_dequeue_script( 'wc-cart' );
		//wp_dequeue_script( 'wc-chosen' );
		// wp_dequeue_script( 'woocommerce' );
		// wp_dequeue_script( 'jquery-blockui' );
		// wp_dequeue_script( 'jquery-placeholder' );
		// wp_dequeue_script( 'jquery-payment' );
	}
}

function login_redirect($redirect_to, $request, $user ) {
	if (isset($user->roles) && is_array($user->roles)) {
		if (in_array('administrator', $user->roles)) {
				$redirect_to =  home_url().'/wp-admin';
			} else {
				$redirect_to =  home_url().'/my-account';
		}
	}
	return $redirect_to;
}
add_filter( 'login_redirect', 'login_redirect', 10, 3 );

add_action('admin_head', 'my_custom_fonts');
function my_custom_fonts() {
  echo '<style>
  .area-config-mymenu{clear:both;padding-left:15px;padding-right:15px;box-sizing:border-box;margin-top:30px}.block-config-mymenu::after,.block-config-mymenu::before{content:"";display:table;width:100%;clear:both}.block-config-mymenu{margin:0 -15px}.h-w{width:50%;float:left;box-sizing:border-box}.area-config-mymenu h2{text-transform:capitalize;font-weight:700;margin-bottom:0}.px-15{padding-left:15px;padding-right:15px}@media(min-width:1200px){.h-w{width:25%}}@media(max-width:1024px){.h-w{width:33.33333333%}}@media(max-width:767px){.block-config-mymenu{width:100%}.h-w{width:100%}}
  </style>';
}
add_action( 'admin_init', 'register_settings' );
function register_settings(){
	//đăng ký các fields dữ liệu cần lưu
	//register_setting( string $option_group, string $option_name, array $args = array() ) 
	register_setting( 'my-settings-group', 'address_company' ); // dòng 1 là group name, dòng 2 là option name , dòng 3 là phần mở rộng, mình chưa có nhé.
	register_setting( 'my-settings-group', 'phone_company' );
	register_setting( 'my-settings-group', 'mail_company' );
	register_setting( 'my-settings-group', 'copy_right' );
	register_setting( 'my-settings-group', 'hotline' );
	register_setting( 'my-settings-group', 'hotline_2' );   
	register_setting( 'my-settings-group', 'fax_company' );
	register_setting( 'my-settings-group', 'facebook_company' );
	register_setting( 'my-settings-group', 'twitter_company' );
	register_setting( 'my-settings-group', 'youtube_company' );
	register_setting( 'my-settings-group', 'google_map' );
}
function wpdocs_register_my_custom_menu_page(){
	 // add_menu_page( $page_title, $menu_title, $capability, $menu_slug, $function, $icon_url, $position );
    add_menu_page('Config Page Custom Title','Config Page', 'manage_options', 'custompage','my_custom_menu_page','dashicons-admin-generic',90); 
}
add_action( 'admin_menu', 'wpdocs_register_my_custom_menu_page' );
if(!function_exists('my_custom_menu_page')){
function my_custom_menu_page() { ?>
	<div class="area-config-mymenu">
		<h2>Cấu Hình Chính</h2>
		<form id="landingOptions" method="post" action="options.php">
		<?php settings_fields( 'my-settings-group' ); ?>
			<div class="block-config-mymenu">
				<div class="px-15 h-w">
					 <p><label for="address_company">Address company:</label><br/>
					 <input style="width:100%; height: 38px;" type="text" name="address_company" value="<?php echo get_option('address_company')?>" placeholder="Ex:502 New Design Str, Melbourne, Australia" /></p>			 	
				</div>
				<div class="px-15 h-w">
					 <p><label for="phone_company">Phone number</label><br/>
					 <input style="width:100%; height: 38px;" type="text" name="phone_company" value="<?php echo get_option('phone_company')?>" /></p>
				</div>
				<div class="px-15 h-w">
					 <p><label for="fax_company">Fax number</label><br/>
					 <input style="width:100%; height: 38px;" type="text" name="fax_company" value="<?php echo get_option('fax_company')?>" /></p>
				</div>
				<div class="px-15 h-w">
				 <p><label for="mail_company">Email</label><br/>
				 <input style="width:100%; height: 38px;" type="email" name="mail_company" value="<?php echo get_option('mail_company')?>" /></p>
				</div>
				<div class="px-15 h-w">
					<p><label for="copy_right">Copy Right</label><br/>
					<input style="width:100%; height: 38px;" type="text" name="copy_right" value="<?php echo get_option('copy_right')?>" /></p>
				</div>
				<div class="px-15 h-w">
				 <p><label for="hotline">Hotline</label><br/>
				 <input style="width:100%; height: 38px;" type="text" name="hotline" value="<?php echo get_option('hotline')?>" /></p>
				</div>
				<div class="px-15 h-w">
				 <p><label for="hotline_2">Hotline 2</label><br/>
				 <input style="width:100%; height: 38px;" type="text" name="hotline_2" value="<?php echo get_option('hotline_2')?>" /></p>
				</div>

				<div class="px-15 h-w">
				 <p><label for="facebook_company">Facebook</label><br/>
				 <input style="width:100%; height: 38px;" type="text" name="facebook_company" value="<?php echo get_option('facebook_company')?>" /></p>
				</div>
				<div class="px-15 h-w">
				 <p><label for="twitter_company">Twitter</label><br/>
				 <input style="width:100%; height: 38px;" type="text" name="twitter_company" value="<?php echo get_option('twitter_company')?>" /></p>
				</div>
				<div class="px-15 h-w">
				 <p><label for="youtube_company">Youtube</label><br/>
				 <input style="width:100%; height: 38px;" type="text" name="youtube_company" value="<?php echo get_option('youtube_company')?>" /></p>
				</div>
				<div class="px-15 h-w">
				 <p><label for="pinterest_company">Địa chỉ Pinterest</label><br/>
				 <input style="width:100%; height: 38px;" type="text" name="pinterest_company" value="<?php echo get_option('pinterest_company')?>" /></p>
				</div>
				<div class="px-15" style="clear: both;">
				 <p><label for="google_map">Google Map</label><br/></p>
				 <textarea name="google_map" cols="40" rows="5" style="width:100%;"><?php echo get_option('google_map')?></textarea>
				</div>
				<div class="px-15" style="clear: both;">
				 <p class="submit">
				 <input type="submit" class="button-primary" value="<?php _e('Save Changes') ?>" />
				 </p>
				</div>			 
			</div>
		</form>
	</div>
<?php } }

function wpb_widgets_init() {
	register_sidebar( array(
		'name' => __( 'Main Sidebar', 'wpb' ),
		'id' => 'sidebar-1',
		'description' => __( 'The main sidebar appears on the right on each page except the front page template', 'wpb' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
}

add_action( 'widgets_init', 'wpb_widgets_init' );

// tắt cập nhật tự động plugin
add_filter( 'auto_update_plugin', '__return_false' );
// tắt tự động cập nhật theme
add_filter( 'auto_update_theme', '__return_false' );

add_action('wp_footer', 'script_footer');
function script_footer(){?>
	<script type="text/javascript"> 
		(function( $ ) {
			<?php if(is_cart()): ?>
				// (function( $ ) {
				// 	$('.woocommerce-cart-form').on('click','.btn-update-cart]',function(){
				// 		$('form').submit();
				// 	})
				// })
				$('.quantity-plus').on('click',function(e){
						var val = parseInt($(this).parent().parent().find('.input-qty').val());
						$(this).parent().parent().find('.input-qty').val( val+1 );
						update_total_cart($(this), 'plus');
					});
				$('.quantity-minus').on('click',function(e){
					var val = parseInt($(this).parent().parent().find('.input-qty').val());
					if(val !== 1){
						$(this).parent().parent().find('.input-qty').val( val-1 );
						update_total_cart($(this), 'minus');
					}
				});
				function update_total_cart(el, o){
					var price = parseFloat($(el).closest('.woocommerce-cart-form__cart-item').find('.product-price .woocommerce-Price-amount').text().replace('₫','').replace(/,/g,''));
					var sub_total = parseFloat($(el).closest('.woocommerce-cart-form__cart-item').find('.product-subtotal .woocommerce-Price-amount').text().replace('₫','').replace(/,/g,''));
					var total = parseFloat($('.sum-money').find('.color-price .woocommerce-Price-amount').text().replace('₫','').replace(/,/g,''));
					if( o == 'plus' ){
						sub_total = sub_total + price;
						total = total + price;
					}else{
						sub_total = sub_total - price;
						total = total - price;
					}
					$(el).closest('.woocommerce-cart-form__cart-item').find('.product-subtotal .woocommerce-Price-amount').text(addCommas(sub_total)+'₫');
					$('.sum-money').find('.woocommerce-Price-amount').text(addCommas(total)+'₫');
				}
				function addCommas(intNum) {
					return (intNum + '').replace(/(\d)(?=(\d{3})+$)/g, '$1,');
				}
			<?php endif; ?>
			<?php if(is_product()): ?>
					// $("#commentform").submit(function(e){
					// 	if($('#comment').val() == ''){
					// 		alert("Vui lòng viết nhận xét của bạn vào bên dưới!");
					// 	}else{
					// 		$.ajax({
					// 		    url : "<?php echo site_url().'/wp-comments-post.php'; ?>",
					// 			type : 'POST',
					// 			data : $(this).serialize(),
					// 			beforeSend: function(){
					// 				$('body').append('<div class="loading">&#8230;</div>');
					// 			},
					// 		    success: function(data, textStatus, xhr) {
					// 		        if( xhr.status == '200' ){
					// 		        	alert('Nhận xét của bạn đã được gửi');
					// 		        	location.reload();

					// 		        }
					// 		        $('body').find('.loading').remove()
					// 		    },
					// 		    complete: function(xhr, textStatus) {
					// 		        if( xhr.status == '409' ){
					// 		        	alert('Dường như bạn đã nhập 1 nhận xét đã tồn tại');
					// 		        }
					// 		        $('body').find('.loading').remove()
					// 		    }
					// 		});
					// 	}
					// 	e.preventDefault();
					// });
					$('.quantity-plus').on('click',function(e){
							var val = parseInt($(this).parent().parent().find('.input-qty').val());
							$(this).parent().parent().find('.input-qty').val( val+1 );
						});
					$('.quantity-minus').on('click',function(e){
						var val = parseInt($(this).parent().parent().find('.input-qty').val());
						if(val !== 1){
							$(this).parent().parent().find('.input-qty').val( val-1 );
						}
					});
					$('input[name="attribute_pa_loai-san-pham"]').on('change',function(e){
						var variation_data = jQuery('form').data('product_variations');
						var val = $(this).val();
						$.each(variation_data, function(i, item) {
							var name = item.attributes['attribute_pa_loai-san-pham'];
						    if( val == name){
						    	jQuery('input[name="variation_id"]').val(item.variation_id);
						    }
						});
					});
					$('form.cart').submit(function(e){ 
						if( jQuery('input[name="attribute_pa_loai-san-pham"]').prop("checked") == false ){
							alert('vui lòng chọn loại sản phẩm');
						}else{
							$.ajax({
							    url : $(this).attr('action'),
								type : 'POST',
								data : $(this).serialize(),
								beforeSend: function(){
									// $('body').append('<div class="loading">Loading&#8230;</div>');
								},
							    success: function(data, textStatus, xhr) {
							    	// alert('Sản phẩm đã được thêm vào giỏ hàng');
							    	ken_cart_header_reload_action();

							    },
							    complete: function(xhr, textStatus) {
							        $('body').find('.loading').remove();							        
							    	$('.cart-icon').toggleClass('active');
									setTimeout(function(){
								        $('.cart-icon').removeClass('active');
								    },100000);
							    }
							});

						}
						//e.preventDefault();
					});
					
				<?php endif; ?>
		})(jQuery);
	</script>
<?php }
function share_social() { ?>
	<div class="action-post d-flex flex-wrap align-items-center my-4">
		<div class="item-g me-2 me-md-3 mb-3 fw-bold fs-15 letter-spacing-015">Share On:</div>
		<div class="share-social d-flex flex-wrap align-items-center">
			<a class="me-3 me-sm-2 me-md-3 fb mb-3" title="Share on Facebook" href="https://www.facebook.com/sharer/sharer.php?u=<?php echo urlencode(get_permalink()); ?>" target="_blank"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path d="M400 32H48A48 48 0 0 0 0 80v352a48 48 0 0 0 48 48h137.25V327.69h-63V256h63v-54.64c0-62.15 37-96.48 93.67-96.48 27.14 0 55.52 4.84 55.52 4.84v61h-31.27c-30.81 0-40.42 19.12-40.42 38.73V256h68.78l-11 71.69h-57.78V480H400a48 48 0 0 0 48-48V80a48 48 0 0 0-48-48z"/></svg></a>
			<a class="me-3 me-sm-2 me-md-3 twinter mb-3" title="Share on Twinter" href="https://twitter.com/intent/tweet?text=<?php echo urlencode(get_the_title()); ?>+<?php echo get_permalink(); ?>" target="_blank"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path d="M400 32H48C21.5 32 0 53.5 0 80v352c0 26.5 21.5 48 48 48h352c26.5 0 48-21.5 48-48V80c0-26.5-21.5-48-48-48zm-48.9 158.8c.2 2.8.2 5.7.2 8.5 0 86.7-66 186.6-186.6 186.6-37.2 0-71.7-10.8-100.7-29.4 5.3.6 10.4.8 15.8.8 30.7 0 58.9-10.4 81.4-28-28.8-.6-53-19.5-61.3-45.5 10.1 1.5 19.2 1.5 29.6-1.2-30-6.1-52.5-32.5-52.5-64.4v-.8c8.7 4.9 18.9 7.9 29.6 8.3a65.447 65.447 0 0 1-29.2-54.6c0-12.2 3.2-23.4 8.9-33.1 32.3 39.8 80.8 65.8 135.2 68.6-9.3-44.5 24-80.6 64-80.6 18.9 0 35.9 7.9 47.9 20.7 14.8-2.8 29-8.3 41.6-15.8-4.9 15.2-15.2 28-28.8 36.1 13.2-1.4 26-5.1 37.8-10.2-8.9 13.1-20.1 24.7-32.9 34z"/></svg></a>
			<a class="me-3 me-sm-2 me-md-3 linkedin mb-3" title="Share on Linkedin" href="https://www.linkedin.com/shareArticle?mini=true&url=<?php echo urlencode(get_permalink()); ?>&title=<?php echo get_the_title(get_the_ID()); ?>&source=<?php echo site_url();?>" target="_blank"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path d="M416 32H31.9C14.3 32 0 46.5 0 64.3v383.4C0 465.5 14.3 480 31.9 480H416c17.6 0 32-14.5 32-32.3V64.3c0-17.8-14.4-32.3-32-32.3zM135.4 416H69V202.2h66.5V416zm-33.2-243c-21.3 0-38.5-17.3-38.5-38.5S80.9 96 102.2 96c21.2 0 38.5 17.3 38.5 38.5 0 21.3-17.2 38.5-38.5 38.5zm282.1 243h-66.4V312c0-24.8-.5-56.7-34.5-56.7-34.6 0-39.9 27-39.9 54.9V416h-66.4V202.2h63.7v29.2h.9c8.9-16.8 30.6-34.5 62.9-34.5 67.2 0 79.7 44.3 79.7 101.9V416z"/></svg></a>			    
			<a class="me-3 me-sm-2 me-md-3 instagram mb-3" title="Share on Instagram" href="https://www.instagram.com/?url=<?php echo urlencode(get_permalink()); ?>" target="_blank"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path d="M224,202.66A53.34,53.34,0,1,0,277.36,256,53.38,53.38,0,0,0,224,202.66Zm124.71-41a54,54,0,0,0-30.41-30.41c-21-8.29-71-6.43-94.3-6.43s-73.25-1.93-94.31,6.43a54,54,0,0,0-30.41,30.41c-8.28,21-6.43,71.05-6.43,94.33S91,329.26,99.32,350.33a54,54,0,0,0,30.41,30.41c21,8.29,71,6.43,94.31,6.43s73.24,1.93,94.3-6.43a54,54,0,0,0,30.41-30.41c8.35-21,6.43-71.05,6.43-94.33S357.1,182.74,348.75,161.67ZM224,338a82,82,0,1,1,82-82A81.9,81.9,0,0,1,224,338Zm85.38-148.3a19.14,19.14,0,1,1,19.13-19.14A19.1,19.1,0,0,1,309.42,189.74ZM400,32H48A48,48,0,0,0,0,80V432a48,48,0,0,0,48,48H400a48,48,0,0,0,48-48V80A48,48,0,0,0,400,32ZM382.88,322c-1.29,25.63-7.14,48.34-25.85,67s-41.4,24.63-67,25.85c-26.41,1.49-105.59,1.49-132,0-25.63-1.29-48.26-7.15-67-25.85s-24.63-41.42-25.85-67c-1.49-26.42-1.49-105.61,0-132,1.29-25.63,7.07-48.34,25.85-67s41.47-24.56,67-25.78c26.41-1.49,105.59-1.49,132,0,25.63,1.29,48.33,7.15,67,25.85s24.63,41.42,25.85,67.05C384.37,216.44,384.37,295.56,382.88,322Z"/></svg></a>
			<a class="pinterest mb-3" title="Share on Pinterest" href="https://www.pinterest.com/pin/create/link/?url=<?php echo urlencode(get_permalink()); ?>&media=<?php echo the_post_thumbnail_url('large'); ?>&description=<?php echo get_the_title(get_the_ID()); ?>" target="_blank"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path d="M448 80v352c0 26.5-21.5 48-48 48H154.4c9.8-16.4 22.4-40 27.4-59.3 3-11.5 15.3-58.4 15.3-58.4 8 15.3 31.4 28.2 56.3 28.2 74.1 0 127.4-68.1 127.4-152.7 0-81.1-66.2-141.8-151.4-141.8-106 0-162.2 71.1-162.2 148.6 0 36 19.2 80.8 49.8 95.1 4.7 2.2 7.1 1.2 8.2-3.3.8-3.4 5-20.1 6.8-27.8.6-2.5.3-4.6-1.7-7-10.1-12.3-18.3-34.9-18.3-56 0-54.2 41-106.6 110.9-106.6 60.3 0 102.6 41.1 102.6 99.9 0 66.4-33.5 112.4-77.2 112.4-24.1 0-42.1-19.9-36.4-44.4 6.9-29.2 20.3-60.7 20.3-81.8 0-53-75.5-45.7-75.5 25 0 21.7 7.3 36.5 7.3 36.5-31.4 132.8-36.1 134.5-29.6 192.6l2.2.8H48c-26.5 0-48-21.5-48-48V80c0-26.5 21.5-48 48-48h352c26.5 0 48 21.5 48 48z"/></svg></a>
		</div>
	</div>
<?php }
// add_filter('woocommerce_checkout_fields', 'addBootstrapToCheckoutFields' );
// function addBootstrapToCheckoutFields($fields) {
//     foreach ($fields as &$fieldset) {
//         foreach ($fieldset as &$field) {
//             // if you want to add the form-group class around the label and the input
//             $field['class'][] = 'form-group'; 

//             // add form-control to the actual input
//             $field['input_class'][] = 'form-control';
//         }
//     }
//     return $fields;
// }
function recent_post($name_category = 'blogs',$postPage = 3) {
	$the_query = new WP_Query( array( 'category_name' => $name_category, 'posts_per_page' => $postPage) );
	if ( $the_query->have_posts() ) {

		// $getnamecategory = get_category_by_slug($name_category)->name;
		echo '<div class="post-related pt-3"><h3 class="fs-25 mb-0">Related Posts</h3><div class="line-2 my-4"></div><div class="row gx-3 gx-xl-4 gy-3 gy-lg-4 mb-4 mb-lg-5">';
		while ( $the_query->have_posts() ) {
			$the_query->the_post();
			$number_comment = get_comments_number(get_the_ID());
			$text_comment = '';
			if($number_comment>0) {
				$text_comment = '<a class="d-block text-black text-decoration-none" href="' . get_the_permalink() . '#comments" title="' . get_the_title() .'">'. $number_comment . ' Comment' . '</a>';
				
			} else {
				$text_comment = '<a class="d-block text-black text-decoration-none" href="' . get_the_permalink() . '#respond" title="' . get_the_title() .'">' . 'Leave a Comment' . '</a>';
				
			}

			echo '<div class="col-12 col-sm-4 col-md-4 col-lg-4"><div class="bg-white h-100 overflow-hidden d-block text-decoration-none border">
				<a class="position-relative overflow-hidden effect-2 img-bg-2 d-block" href="' . get_the_permalink() . '" title="' . get_the_title() .'">'. get_the_post_thumbnail(get_the_ID(), 'full', array( 'class' => 'img-fluid object-fit w-100 h-100','loading' => 'lazy','alt' => get_the_title() )) .'	</a>
				<div class="p-4 p-sm-3 p-lg-4">
					<div class="d-flex">
						<div class="fw-medium fs-13 text-black mb-3 border-end border-2 me-2 pe-2 d-inline-flex"><svg class="icon-svg-1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path d="M152 64H296V24C296 10.75 306.7 0 320 0C333.3 0 344 10.75 344 24V64H384C419.3 64 448 92.65 448 128V448C448 483.3 419.3 512 384 512H64C28.65 512 0 483.3 0 448V128C0 92.65 28.65 64 64 64H104V24C104 10.75 114.7 0 128 0C141.3 0 152 10.75 152 24V64zM48 448C48 456.8 55.16 464 64 464H384C392.8 464 400 456.8 400 448V192H48V448z"/></svg><span class="ps-2">'.get_the_date().'</span></div>	
						<div class="fw-medium fs-13 text-black  mb-3 d-inline-flex"><svg class="icon-svg-1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M256 32C114.6 32 .0272 125.1 .0272 240c0 49.63 21.35 94.98 56.97 130.7c-12.5 50.37-54.27 95.27-54.77 95.77c-2.25 2.25-2.875 5.734-1.5 8.734C1.979 478.2 4.75 480 8 480c66.25 0 115.1-31.76 140.6-51.39C181.2 440.9 217.6 448 256 448c141.4 0 255.1-93.13 255.1-208S397.4 32 256 32z"/></svg><span class="ps-2">'.$text_comment.'</span></div>	
					</div>
					<div class="fw-bold fs-18 mb-3 text-capitalize text-black link-hover-1">' . get_the_title() .'</div>
					<div class="fs-15 color-828282 mb-3">'.wp_strip_all_tags( get_the_excerpt(), true ).'</div>
					<a class="text-black link-hover-1 fw-medium" href="' . get_the_permalink() . '" title="' . get_the_title() .'">Read More</a>
				</div>
			</div></div>';
		}
	echo '</div></div>';
	}else{/*no posts found*/}
	return $string;
	/* Restore original Post Data */
	wp_reset_postdata();
}