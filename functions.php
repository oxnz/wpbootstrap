<?php

require get_template_directory() . '/inc/nzutils.php';

if ( ! function_exists( 'wpbootstrap_setup' ) ) :
/**
 * setup wpbootstrap theme defaults and registers support for various wordpress
 * features.
 *
 * Note that this function is hooked into the after_setup_theme_hook, which
 * runs before the init hook. The init hook is too late for same features, such
 * as indicating support post thumbnails.
 *
 * @since WPBootstrap 1.6
 */
function wpbootstrap_setup() {
	/*
	 * Make WPBootstrap available for translation.
	 *
	 * Translations can be added to the /languages/ directory.
	 */
	load_theme_textdomain( 'wpbootstrap', get_template_directory() . '/languages' );
	/*
	 * alter the editor style
	 */
	add_editor_style(); // this will use editor-style.css in this dir

	// Add RSS feed links to <head> for posts and comments
	add_theme_support( 'automatic-feed-links' );

	// Enable support for Post Thumbnails, and declare two sizes.
	add_theme_support( 'post-thumbnails', array( 'post', 'page') );

	// Enable support for post format
	add_theme_support( 'post-formats', array('aside', 'gallery', 'link',
		'image', 'quote', 'status', 'video', 'audio', 'chat')
	);

	// This theme uses wp_nav_menu() in two locations
	register_nav_menus( array(
		'primary'	=> __( 'Top primary menu', 'wpbootstrap' ),
		'secondary' => __( 'Secondary menu not used yet', 'wpbootstrap' )
	));

	/*
	 * Switch default core markup for search form, content form, and comments
	 * to output valid HTML5
	 */
	add_theme_support( 'html5', array(
		'search_form', 'comment-form', 'comment-list', 'gallery', 'caption'
	));

	// This theme uses its own gallery styles.
	add_filter( 'use_default_gallery_style', '__return_false' );
}
endif; // wpbootstrap_setup
add_action( 'after_setup_theme', 'wpbootstrap_setup' );

/**
 * Register three WPbootstrap widget areas.
 *
 * @since WPBootstrap 1.1
 */
function wpbootstrap_widgets_init() {
	require get_template_directory() . '/inc/widgets.php';
	register_widget( 'NZWeather_Widget' );
	register_widget( 'NZProfile_Widget' );
	register_widget( 'NZRecentPostsWidget' );
	register_widget( 'NZRecentCommentsWidget' );

	register_sidebar( array(
		'name'          => __( 'Primary Sidebar', 'wpbootstrap' ),
		'id'            => 'sidebar-1',
		'description'   => __( 'Additional sidebar that appears on the right.', 'wpbootstrap' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s panel panel-default">',
		'before_title'  => '<div class="widget-title panel-heading">',
		'after_title'   => '</div><div class="widget-body panel-body">',
		'after_widget'  => '</div></aside>',
	) );
	register_sidebar( array(
		'name'          => __( 'Content Sidebar', 'wpbootstrap' ),
		'id'            => 'sidebar-2',
		'description'   => __( 'Main sidebar that appears on the left.', 'wpbootstrap' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s panel panel-primary">',
		'before_title'  => '<div class="widget-title panel-heading">',
		'after_title'   => '</div><div class="widget-body panel-body">',
		'after_widget'  => '</div></aside>',
	) );
	register_sidebar( array(
		'name'          => __( 'Footer Widget Area', 'wpbootstrap' ),
		'id'            => 'sidebar-3',
		'description'   => __( 'Appears in the footer section of the site.', 'wpbootstrap' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'before_title'  => '<div class="widget-title">',
		'after_title'   => '</div>',
		'after_widget'  => '</aside>',
	));
}
add_action( 'widgets_init', 'wpbootstrap_widgets_init' );


/*
 * alter login style
 */
function wplogin() {
	add_filter('login_headerurl', 'get_site_url');
}
add_action('login_enqueue_scripts', 'wplogin');
function wplogin_title() {
	return get_bloginfo('description');
}
add_filter('login_headertitle', 'wplogin_title');
function wplogin_style() { ?>
	<link rel="stylesheet" id="wplogin_css" href="<?php echo get_bloginfo('stylesheet_directory') . '/login.css'; ?>" type="text/css" media="all" />
	<link rel="shortcut icon" href="<?php echo get_site_url() . '/favicon.png'; ?>">
<?php }
add_action('login_enqueue_scripts', 'wplogin_style');

require get_template_directory() . '/inc/template-tags.php';

/*
 * customer nav menu walker
 */
class NZ_Walker_Nav_Menu extends Walker_Nav_Menu {
	// add classes to ul sub-menus
	function start_lvl( &$output, $depth = 0, $args = array() ) {
		// depth dependent classes
		$indent = ( $depth > 0  ? str_repeat( "\t", $depth ) : '' ); // code indent
		$display_depth = ( $depth + 1); // because it counts the first submenu as 0
		$classes = array(
			'sub-menu',
			'dropdown-menu',
			( $display_depth % 2  ? 'menu-odd' : 'menu-even' ),
			( $display_depth >=2 ? 'sub-sub-menu' : '' ),
			'menu-depth-' . $display_depth
		);
		$class_names = implode( ' ', $classes );

		// build html
		$output .= "\n" . $indent . '<ul class="' . $class_names . '">' . "\n";
	}

	// add main/sub classes to li's and links
	function start_el(  &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
		$indent = ( $depth > 0 ? str_repeat( "\t", $depth ) : '' ); // code indent

		// depth dependent classes
		$depth_classes = array(
			( $depth == 0 ? 'main-menu-item' : 'sub-menu-item' ),
			( $depth >=2 ? 'sub-sub-menu-item' : '' ),
			( $depth % 2 ? 'menu-item-odd' : 'menu-item-even' ),
			( in_array('menu-item-has-children', $item->classes) ?
			'dropdown' : ''),
			'menu-item-depth-' . $depth
		);
		$depth_class_names = esc_attr( implode( ' ', $depth_classes ) );

		// passed classes
		$classes = empty( $item->classes ) ? array() : (array) $item->classes;
		$class_names = esc_attr( implode( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item ) ) );

		// build html
		$output .= $indent . '<li id="nav-menu-item-'. $item->ID . '" class="' . $depth_class_names . ' ' . $class_names . '">';

		// link attributes
		$attributes  = ! empty( $item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) .'"' : '';
		$attributes .= ! empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) .'"' : '';
		$attributes .= ! empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : '';
		$attributes .= ! empty( $item->url )        ? ' href="'   . esc_attr( $item->url        ) .'"' : '';
		$attributes .= ' class="menu-link ' . ( $depth > 0 ? 'sub-menu-link' : 'main-menu-link' ) . ( in_array('menu-item-has-children', $item->classes) ?
			'dropdown-toggle" data-toggle="dropdown"' : '"');
		if ( in_array('menu-item-has-children', $item->classes) ) {
			$item->title .= ' <b class="caret"></b>';
		}

		$item_output = sprintf( '%1$s<a%2$s>%3$s%4$s%5$s</a>%6$s',
			$args->before,
			$attributes,
			$args->link_before,
			apply_filters( 'the_title', $item->title, $item->ID ),
			$args->link_after,
			$args->after
		);

		// build html
		$output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
	}
}

/*
 * add auto generated index with link before every post
 */
function index_content($content) {
	if (! is_single())
		return $content;
	$pattern = '@<h(?P<level>[1-6])(?P<attrs>[^>]*)>(?P<title>[^>]*)</h\1>@i';
	$pos = preg_match_all($pattern, $content, $matches);
	$output = '<h2>Index</h2>' . "\n" . '<ol class="index">' . "\n";
	if ($pos && $pos > 1) {
		for ($idx = 0; $idx < $pos; ++$idx) {
			/* handle id */
			if (preg_match('@id="(?P<id>[^"]*)"@i', $matches['attrs'][$idx], $m)) {
				$id = $m['id'];
			} else {
				$id = 'idx-' . $idx;
				$matches['attrs'][$idx] .= 'id="' . $id . '"';
			}
			/* handle list */
			$level = $matches['level'][$idx];
			$title = $matches['title'][$idx];
			$title = '<a href="#' . $id . '" title="' . $title . '">' . $title . '</a>';
			switch ($level) {
			case 1:
				$title = '<strong>' . $title . '</strong>';
			case 2:
				$output .= '<li>' . $title;
				if ($level < $matches['level'][$idx+1])
					$output .= "\n";
				else
					$output .= '</li>' . "\n";
				break;
			case 3:
			case 4:
			case 5:
			case 6:
				if ($idx == 0 || ($matches['level'][$idx-1] < $level))
					$output .= str_repeat('<ol><li>' . "\n",
						$level - $matches['level'][$idx-1] - 1) . '<ol>' . "\n";
				$output .= '<li>' . $title;
				if ($level < $matches['level'][$idx+1])
					$output .= "\n";
				else if ($level == $matches['level'][$idx+1])
					$output .= '</li>' . "\n";
				else
					$output .= str_repeat('</ol></li>',
						$level - $matches['level'][$idx+1]);
				break;
			}
		}
		$output .= '</ol>';
		$idx = -1;
		$content = preg_replace_callback($pattern, function($m)
			use (&$idx, &$matches) {
			return '<h' . $m['level'] . ' ' . $matches['attrs'][++$idx] . '>'
				. $m['title'] . '</h' . $m['level'] . '>';
		}, $content);
		$content = $output . $content;
	}
	return $content;
}
add_filter('the_content', index_content);

add_filter( 'excerpt_more', function($more) {
	return '<a href="' . get_permalink() . '" title="Read More">'
		. $more . '</a>';
});

add_filter( 'post_thumbnail_size', function($size) {
	return 'thumbnail';
	return $size;
});

/*
 * change google fonts to 360 cdn
 */

add_filter( 'style_loader_src', function($src) {
	return preg_replace(
		'@//fonts\.googleapis\.com/css\?family=Open\+Sans(.*)(&ver=.*)$@i',
		'//fonts.useso.com/css?family=Open+Sans${1}${2}',
		$src);
}, 100, 2 );

function wpbootstrap_scripts() {
	wp_enqueue_style( 'open-sans',
		'//fonts.useso.com/css?family=Open+Sans:300,400', array()
	);
	wp_enqueue_style( 'wordpress', get_template_directory_uri()
		. '/wordpress.css', array()
	);
	wp_enqueue_style( 'bootstrap', 
		'//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css',
		array(), null
	);
	wp_enqueue_style( 'font-awesome',
		'//netdna.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.css',
		array(), null
	);
	wp_enqueue_style( 'wpbootstrap-style', get_stylesheet_uri(),
		array( 'bootstrap', 'font-awesome', 'open-sans', 'wordpress' )
	);

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	wp_register_script('bootstrap',
		'//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js',
		array('jquery'), null, true
	);
	wp_enqueue_script('bootstrap');
	wp_enqueue_script( 'wpbootstrap-script', get_template_directory_uri()
		. '/wpbootstrap.js', array( 'jquery' ), '201406', true);
}
add_action( 'wp_enqueue_scripts', 'wpbootstrap_scripts' );

/**
 * Extend the default Wordpress body classes
 */
add_filter( 'body_class', function($classes) {
	return $classes;
} );

/**
 * Extend the default Wordpress post classes.
 */
add_filter( 'post_class', function($classes) {
	$classes[] = 'panel panel-default';
	return $classes;
} );

/*
 * Create a nicely formatted and more specific title element text for output
 * in head of document, based on current view.
 *
 * @since WPBootstrap 1.8
 */
add_filter( 'wp_title', function($title, $sep) {
	global $paged, $page;

	if ( is_feed() ) {
		return $title;
	}

	// Add a page number if ncessary.
	if ( $paged >= 2 || $page >= 2 ) {
		$title = "$title $sep " . sprintf( __( 'Page %s', 'wpbootstrap' ),
			max( $paged, $page ) );
	}

	return $title;
}, 10, 2);

//remove_filter('the_content', 'wpautop');
//remove_filter('the_excerpt', 'wpautop');
//remove_filter('the_content', 'wptexturize');
//remove_filter('the_excerpt', 'wptexturize');
//remove_filter('comment_text', 'wptexturize');
//remove_filter('the_title', 'wptexturize');
