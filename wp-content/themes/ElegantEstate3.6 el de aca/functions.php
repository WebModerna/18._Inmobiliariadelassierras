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
} ?>