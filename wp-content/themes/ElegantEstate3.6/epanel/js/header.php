<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>
<head profile="http://gmpg.org/xfn/11">
<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
<title><?php elegant_titles(); ?></title>
<?php elegant_description(); ?>
<?php elegant_keywords(); ?>
<?php elegant_canonical(); ?>
<meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0;" />
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
<!--[if lt IE 7]>
	<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/css/ie6style.css" />
<![endif]-->
<!--[if IE 7]>
	<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/css/ie7style.css" />
<![endif]-->
<?php
	if ( is_singular() && get_option( 'thread_comments' ) ) wp_enqueue_script( 'comment-reply' );
?>
<?php wp_head(); ?>

</head>
<body <?php body_class(); ?>>
	<div id="wrapper">
		<div id="container"<?php global $fullwidth; if ( is_page_template('page-full.php') || $fullwidth ) echo 'class="fullwidth"'; ?>>	
			<div id="header">
				<a href="<?php echo home_url(); ?>"><?php $logo = (get_option('elegantestate_logo') <> '') ? get_option('elegantestate_logo') : get_template_directory_uri().'/images/logo.png'; ?>
					<img src="<?php echo esc_url($logo); ?>" alt="Logo" id="logo"/></a>
					<div id="go-top"><a href="#"><img alt="Ir arriba" src="<?php echo get_template_directory_uri(); ?>/images/fancybox/go-top.png" /></a></div>
					<div id="menu-oculto">
							<ul class="primary">
								<li><a id="menu-principal" href="#nav_menu-2" target="_self">Menú </a></li>
								<li><a id="menu-categorias" href="#nav_menu-3" target="_self">Productos</a></li>
							</ul>
						</div>
				<div id="top-menu">
					<img src="<?php echo get_template_directory_uri(); ?>/images/menu-bg.png" width="100%" height="64" alt="Menú Principal" align="right" />
					<?php $menuClass = 'nav';
					$menuID = 'primary';
					$primaryNav = '';
					if (function_exists('wp_nav_menu')) {
						$primaryNav = wp_nav_menu( array( 'theme_location' => 'primary-menu', 'container' => '', 'fallback_cb' => '', 'menu_class' => $menuClass, 'menu_id' => $menuID, 'echo' => false ) ); 
					};
					if ($primaryNav == '') { ?>
						<ul id="<?php echo $menuID; ?>" class="<?php echo $menuClass; ?>">
							<?php if (get_option('elegantestate_swap_navbar') == 'false') { ?>
								<?php if (get_option('elegantestate_home_link') == 'on') { ?>
									<li <?php if (is_home()) echo('class="current_page_item"') ?>><a href="<?php echo home_url(); ?>"><?php esc_html_e('Home','ElegantEstate') ?></a></li>
								<?php }; ?>
								
								<?php show_page_menu($menuClass,false,false); ?>
							<?php } else { ?>
								<?php show_categories_menu($menuClass,false); ?>
							<?php } ?>
						</ul> <!-- end ul#nav -->
					<?php }
					else echo($primaryNav); ?>
				</div> <!-- end #top-menu -->
				
				<div id="secondary-menu">
					<?php $menuClass = 'nav';
						$menuID = 'secondary'; 
						$secondaryNav = '';
						if (function_exists('wp_nav_menu')) {
							$secondaryNav = wp_nav_menu( array( 'theme_location' => 'secondary-menu', 'container' => '', 'fallback_cb' => '', 'menu_class' => $menuClass, 'menu_id' => $menuID, 'echo' => false ) ); 
						};
						if ($secondaryNav == '') { ?>
							<ul id="<?php echo $menuID; ?>" class="<?php echo $menuClass; ?>">
								<?php if (get_option('elegantestate_swap_navbar') == 'false') { ?>
									<?php show_categories_menu($menuClass,false); ?>
								<?php } else { ?>
									<?php if (get_option('elegantestate_home_link') == 'on') { ?>
										<li <?php if (is_home()) echo('class="current_page_item"') ?>><a href="<?php echo home_url(); ?>"><?php esc_html_e('Home','ElegantEstate') ?></a></li>
									<?php }; ?>
									
									<?php show_page_menu($menuClass,false,false); ?>
								<?php } ?>
							</ul> <!-- end ul#nav -->
						<?php }
						else echo($secondaryNav); ?>
				</div> <!-- end #secondary-menu -->
			</div> 	<!-- end #header -->