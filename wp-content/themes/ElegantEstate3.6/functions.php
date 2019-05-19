<?php
add_action( 'after_setup_theme', 'et_setup_theme' );
if ( ! function_exists( 'et_setup_theme' ) ){
	function et_setup_theme(){
		global $themename, $shortname;
		$themename = "ElegantEstate";
		$shortname = "elegantestate";

		require_once(TEMPLATEPATH . '/epanel/custom_functions.php');

		require_once(TEMPLATEPATH . '/includes/functions/comments.php');

		require_once(TEMPLATEPATH . '/includes/functions/sidebars.php');

		load_theme_textdomain('ElegantEstate',get_template_directory().'/lang');

		require_once(TEMPLATEPATH . '/epanel/options_elegantestate.php');

		require_once(TEMPLATEPATH . '/epanel/core_functions.php');

		require_once(TEMPLATEPATH . '/epanel/post_thumbnails_elegantestate.php');

		include(TEMPLATEPATH . '/includes/widgets.php');

		require_once(TEMPLATEPATH . '/includes/functions/additional_functions.php');
	}
}

add_action('wp_head','et_portfoliopt_additional_styles',100);
function et_portfoliopt_additional_styles(){ ?>
	<style type="text/css">
		#et_pt_portfolio_gallery { margin-left: -15px; }
		.et_pt_portfolio_item { margin-left: 21px; }
		.et_portfolio_small { margin-left: -40px !important; }
		.et_portfolio_small .et_pt_portfolio_item { margin-left: 38px !important; }
		.et_portfolio_large { margin-left: -8px !important; }
		.et_portfolio_large .et_pt_portfolio_item { margin-left: 6px !important; }
	</style>
<?php }

// Inclusión de soporte para metaboxes
// require_once "includes/meta-box/meta-box.php";
require_once "includes/demo.php";

// Cambiar el logo del login y la url del mismo y el título
function custom_login_logo()
{
	echo '<style type="text/css">
		body.login
		{
			background: url("'.get_bloginfo('stylesheet_directory').'/images/back3.jpg") fixed 50% bottom !important;
		}
		h1
		{
			padding-top: 20px !important;
		}
		h1 a
		{
			background: #ffffff url("' . get_bloginfo('stylesheet_directory') . '/images/logo.png") center center no-repeat !important;
			border: 1px solid #fff;
			height: 100px !important;
			overflow: hidden !important;
			width: 300px !important;
		}
		div#login
		{
			padding: 0 !important;
		}
		.message, #loginform, h1 a
		{
			border-radius: 5px;
			-moz-border-radius: 5px;
			-webkit-border-radius: 5px;
		}
		</style>';
};
add_action( 'login_head', 'custom_login_logo', 1 );
function the_url( $url )
{
	return get_bloginfo( 'url' );
}
add_filter( 'login_headerurl', 'the_url' );
function change_wp_login_title()
{
	return get_option('blogname');
}
add_filter( 'login_headertitle', 'change_wp_login_title' );



function register_main_menus() {
	register_nav_menus(
		array(
			'primary-menu' => __( 'Primary Menu' ),
			'secondary-menu' => __( 'Secondary Menu' )
		)
	);
};
if (function_exists('register_nav_menus')) add_action( 'init', 'register_main_menus' );

if ( ! function_exists( 'et_list_pings' ) ){
	function et_list_pings($comment, $args, $depth) {
		$GLOBALS['comment'] = $comment; ?>
		<li id="comment-<?php comment_ID(); ?>"><?php comment_author_link(); ?> - <?php comment_excerpt(); ?>
	<?php }
}

add_action('template_redirect','check_listing');
function check_listing() {
	if (isset($_REQUEST["option-listing"])) {
		$category_link = get_category_link( $_REQUEST["option-listing"] );
		wp_redirect($category_link);
	}
}

add_filter('body_class','et_additional_body_class');
function et_additional_body_class($classes) {
	if ( !is_home()) $classes[] = 'index';

	return $classes;
};

//Permitir svg en las imágenes para cargar.
function cc_mime_types($mimes)
{
	$mimes['svg']='image/svg+xml';return $mimes;
};
add_filter('upload_mimes','cc_mime_types');


//Remover clases e ids automáticos de los menúes
add_filter('nav_menu_css_class', 'my_css_attributes_filter', 100, 1);
add_filter('nav_menu_item_id', 'my_css_attributes_filter', 100, 1);
add_filter('page_css_class', 'my_css_attributes_filter', 100, 1);
function my_css_attributes_filter($var)
{
	return is_array($var) ? array_intersect($var, array('current-menu-item', 'current_page_item')) : '';
};

//Remover versiones de los scripts y css innecesarios
/*function remove_script_version($src)
{
	$parts = explode('?', $src); return $parts[0];
};
add_filter('script_loader_src', 'remove_script_version', 15, 1);
add_filter('style_loader_src', 'remove_script_version', 15, 1);*/

//Modifica el pie de página del panel de administarción
function remove_footer_admin()
{
	echo 'Desarrollado por <a href="http://www.webmoderna.com.ar" target="_blank">...:: WebModerna | el futuro de la web ::...</a>';
};
add_filter('admin_footer_text','remove_footer_admin');

//Remover versión del WordPress
function remove_wp_version() { return''; };
add_filter('the_generator','remove_wp_version');

// Agregando un favicon al área de administración
function admin_favicon()
{
	echo '<link rel="shortcut icon" type="image/x-icon" href="' . get_bloginfo('stylesheet_directory') . '/images/favicon.ico" />';
}
add_action('admin_head', 'admin_favicon', 1);

//Eliminar css y scripts de comentarios cuando no hagan falta
function clean_header()
{
	wp_deregister_script('comment-reply');
};
add_action('init','clean_header');

//Habilitar botones de edición avanzados
/*function habilitar_mas_botones($buttons)
{
	$buttons[]='hr';
	$buttons[]='sub';
	$buttons[]='sup';
	$buttons[]='fontselect';
	$buttons[]='fontsizeselect';
	$buttons[]='cleanup';
	$buttons[]='styleselect';
	return $buttons;
};
add_filter("mce_buttons_3","habilitar_mas_botones");*/

//Detén las adivinanzas de URLs de WordPress
add_filter('redirect_canonical','stop_guessing');
function stop_guessing($url)
{
	if(is_404())
	{
		return false;
	}
	return $url;
}

//Ocultar los errores en la pantalla de Inicio de sesión de WordPress
function no__rrors_please()
{
	return __('¡Sal de mi jardín! ¡AHORA MISMO!', 'cabalgata_brocheriana');
};
add_filter('login__rrors','no__rrors_please');

/*
//Relativas las urls
function relative_url()
{
	// Don't do anything if:
	// - In feed
	// - In sitemap by WordPress SEO plugin
	if ( is_feed() || get_query_var( 'sitemap' ) )
	return;
	$filters = array(
		'post_link',       // Normal post link
		'post_type_link',  // Custom post type link
		'page_link',       // Page link
		'attachment_link', // Attachment link
		'get_shortlink',   // Shortlink
		'post_type_archive_link',    // Post type archive link
		'get_pagenum_link',          // Paginated link
		'get_comments_pagenum_link', // Paginated comment link
		'term_link',   // Term link, including category, tag
		'search_link', // Search link
		'day_link',   // Date archive link
		'month_link',
		'year_link',

		// site location
	// Los comento porque generan error en el modo Depuración en WordPress

		// 'option_siteurl',
		// 'option_home',
		// 'admin_url',
		// 'home_url',
		// 'site_url',
		'blog_option_siteurl',
		'includes_url',
		'site_option_siteurl',
		'network_home_url',
		'network_site_url',

		// debug only filters
		'get_the_author_url',
		'get_comment_link',
		'wp_get_attachment_image_src',
		'wp_get_attachment_thumb_url',
		'wp_get_attachment_url',
		'wp_login_url',
		'wp_logout_url',
		'wp_lostpassword_url',
		'get_stylesheet_uri',
		'get_stylesheet_directory_uri',//
		'plugins_url',//
		'plugin_dir_url',//
		'stylesheet_directory_uri',//
		'get_template_directory_uri',//
		'template_directory_uri',//
		'get_locale_stylesheet_uri',
		'script_loader_src', // plugin scripts url
		'style_loader_src', // plugin styles url
		'get_theme_root_uri',
		// Comento para omitir error en Depuración en WordPress
	);
	foreach ( $filters as $filter )
	{
	add_filter( $filter, 'wp_make_link_relative' );
	};
	home_url($path = '', $scheme = null);
};
add_action( 'template_redirect', 'relative_url', 0 );
*/

// Deshabilitar los enlaces automáticos en los comentarios
remove_filter('comment_text', 'make_clickable', 9);

// Remover clases automáticas del the_post_thumbnail
function the_post_thumbnail_remove_class($output)
{
	$output = preg_replace('/class=".*?"/', '', $output);
	return $output;
}
add_filter('post_thumbnail_html', 'the_post_thumbnail_remove_class');


//Remover atributos de ancho y alto de las imágenes insertadas
add_filter( 'post_thumbnail_html', 'remove_width_attribute', 10 );
add_filter( 'image_send_to__ditor', 'remove_width_attribute', 10 );
function remove_width_attribute( $html )
{
   $html = preg_replace( '/(width|height)="\d*"\s/', "", $html );
   return $html;
};

// Deshabilitar Iconos Emoji
remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('wp_print_styles', 'print_emoji_styles');

// Remover la API REST
function remove_api ()
{
remove_action( 'wp_head', 'rest_output_link_wp_head', 10 );
remove_action( 'wp_head', 'wp_oembed_add_discovery_links', 10 );
remove_action( 'template_redirect', 'rest_output_link_header', 11, 0 );
}
add_action( 'after_setup_theme', 'remove_api' );

// Desactivar el script de embebidos
function my_deregister_scripts()
{
	wp_deregister_script( 'wp-embed' );
}
add_action( 'wp_footer', 'my_deregister_scripts' );

// Desactivar los mensajes de actualización de plugin
// remove_action( 'load-update-core.php', 'wp_update_plugins' );
// add_filter( 'pre_site_transient_update_plugins', create_function( '$a', "return null;" ) );

// Deshabilitar el mensaje de actualización del WordPress
add_action( 'admin_head', 'ocultar_aviso_actualizacion', 1 );
function ocultar_aviso_actualizacion()
{
	if ( !current_user_can( 'update_core' ) )
	{
		remove_action( 'admin_notices', 'update_nag', 3 );
	}
}

// Mapa de Sitio
add_action("publish_post", "eg_create_sitemap");
add_action("publish_page", "eg_create_sitemap");

function eg_create_sitemap()
{
	$postsForSitemap = get_posts(array(
	'numberposts'		=>	-1,
	'orderby'			=>	'modified',
	'post_type'			=>	array('post','page'),
	'order'				=>	'DESC'
	));
	$sitemap = '<?xml version="1.0" encoding="UTF-8"?>';
	$sitemap .= '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">';
	foreach($postsForSitemap as $post)
	{
		setup_postdata($post);
		$postdate = explode(" ", $post->post_modified);
		$sitemap .= '<url>'.
		'<loc>'. get_permalink($post->ID) .'</loc>'.
		'<lastmod>'. $postdate[0] .'</lastmod>'.
		'<changefreq>monthly</changefreq>'.
		'</url>';
	}
	$sitemap .= '</urlset>';
	$fp = fopen(ABSPATH . "sitemap.xml", 'w');
	fwrite($fp, $sitemap);
	fclose($fp);
};

// Eliminar cajas innecesarias del dashboard
// Quitar cajas del escritorio
function quita_cajas_escritorio()
{
	// if( !current_user_can('manage_options') )
	// {
		remove_meta_box('dashboard_activity', 'dashboard', 'normal' ); // Actividad
		remove_meta_box('dashboard_right_now', 'dashboard', 'normal');   // Ahoramismo
		remove_meta_box('dashboard_recent_comments', 'dashboard', 'normal'); // Comentarios recientes
		remove_meta_box('dashboard_incoming_links', 'dashboard', 'normal');  // Enlaces entrantes
		remove_meta_box('dashboard_plugins', 'dashboard', 'normal');   // Plugins
		remove_meta_box('dashboard_quick_press', 'dashboard', 'side');  // Publicación rápida
		remove_meta_box('dashboard_recent_drafts', 'dashboard', 'side');  // Borradores recientes
		remove_meta_box('dashboard_primary', 'dashboard', 'side');   // Noticas del blog de WordPress
		remove_meta_box('dashboard_secondary', 'dashboard', 'side');   // Otras noticias de WordPress
	// utiliza 'dashboard-network' como segundo parámetro para quitar cajas del escritorio de red.
	// }
}
add_action('wp_dashboard_setup', 'quita_cajas_escritorio' );

// Removiendo el panel de bienvenida del wordpress
remove_action('welcome_panel', 'wp_welcome_panel');

// remove unnecessary page/post meta boxes
function remove_meta_boxes()
{

	// posts
	remove_meta_box('postcustom','post','normal');
	remove_meta_box('trackbacksdiv','post','normal');
	remove_meta_box('commentstatusdiv','post','normal');
	remove_meta_box('commentsdiv','post','normal');
	// remove_meta_box('categorydiv','post','normal');
	// remove_meta_box('tagsdiv-post_tag','post','normal');
	remove_meta_box('slugdiv','post','normal');
	remove_meta_box('authordiv','post','normal');
	remove_meta_box('postexcerpt','post','normal');
	remove_meta_box('revisionsdiv','post','normal');

	// pages
	remove_meta_box('postcustom','page','normal');
	remove_meta_box('commentstatusdiv','page','normal');
	remove_meta_box('trackbacksdiv','page','normal');
	remove_meta_box('commentsdiv','page','normal');
	remove_meta_box('slugdiv','page','normal');
	remove_meta_box('authordiv','page','normal');
	remove_meta_box('revisionsdiv','page','normal');
	remove_meta_box('postexcerpt','page','normal');
	remove_meta_box('et_post_meta','page','normal');
}
add_action('admin_init','remove_meta_boxes');

// Para google maps
function google() { wp_dequeue_script( 'google-maps-api' ); }
add_action( 'admin_enqueue_scripts', 'google', 99, 1 );

// Inclusión de soporte para metaboxes
require_once "includes/meta-box/meta-box.php";
require_once "includes/demo.php";

?>