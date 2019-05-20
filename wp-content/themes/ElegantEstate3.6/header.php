<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>
<head profile="http://gmpg.org/xfn/11">
<meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0;" />
<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
<title><?php elegant_titles(); ?></title>
<?php elegant_description(); ?>
<?php elegant_keywords(); ?>
<?php
	// Meta Key words o más bien "palabrotas claves"

	$inmobiliariadelassierras_meta_keywords = rwmb_meta( 'inmobiliariadelassierras_meta_keywords', '' );

	if($inmobiliariadelassierras_meta_keywords)
	{
		echo '<meta name="keywords" content="' . $inmobiliariadelassierras_meta_keywords . '" />';
	}
?>
<?php elegant_canonical(); ?>

<?php if (wp_is_mobile()) { ?>
<link rel="apple-touch-icon-precomposed" sizes="57x57" href="<?php bloginfo('stylesheet_directory');?>/images/apple-touch-icon-57x57.png" />
<link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?php bloginfo('stylesheet_directory');?>/images/apple-touch-icon-114x114.png" />
<link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?php bloginfo('stylesheet_directory');?>/images/apple-touch-icon-72x72.png" />
<link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?php bloginfo('stylesheet_directory');?>/images/apple-touch-icon-144x144.png" />
<link rel="apple-touch-icon-precomposed" sizes="60x60" href="<?php bloginfo('stylesheet_directory');?>/images/apple-touch-icon-60x60.png" />
<link rel="apple-touch-icon-precomposed" sizes="120x120" href="<?php bloginfo('stylesheet_directory');?>/images/apple-touch-icon-120x120.png" />
<link rel="apple-touch-icon-precomposed" sizes="76x76" href="<?php bloginfo('stylesheet_directory');?>/images/apple-touch-icon-76x76.png" />
<link rel="apple-touch-icon-precomposed" sizes="152x152" href="<?php bloginfo('stylesheet_directory');?>/images/apple-touch-icon-152x152.png" />
<?php };?>

<link rel="icon" type="image/png" href="<?php bloginfo('stylesheet_directory');?>/images/favicon-196x196.png" sizes="196x196" />
<link rel="icon" type="image/png" href="<?php bloginfo('stylesheet_directory');?>/images/favicon-96x96.png" sizes="96x96" />
<link rel="icon" type="image/png" href="<?php bloginfo('stylesheet_directory');?>/images/favicon-32x32.png" sizes="32x32" />
<link rel="icon" type="image/png" href="<?php bloginfo('stylesheet_directory');?>/images/favicon-16x16.png" sizes="16x16" />
<link rel="icon" type="image/png" href="<?php bloginfo('stylesheet_directory');?>/images/favicon-128.png" sizes="128x128" />

<script type="text/javascript">document.cookie='resolution='+Math.max(screen.width,screen.height)+'; path=/';</script>
<link href='//fonts.googleapis.com/css?family=Droid+Sans:400,700|Fjord+One' rel='stylesheet' type='text/css' />
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
<!--Nos aseguramos la optimización para móviles-->
<?php
include 'Mobile_Detect.php';
global $detect;
$detect = new Mobile_Detect();
?>
<?php //probamos si es o no un móvil.
     if ($detect->isMobile()==false OR $detect->isTablet()==false) { ?>
<!--[if lt IE 7]>
	<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/DD_belatedPNG_0.0.8a-min.js"></script>
	<script type="text/javascript">DD_belatedPNG.fix('img#logo, #wrapper, #header, div#top-menu, #featured .overlay, #featured, #featured .description, #featured .description span.price, #featured span.price span, a.readmore, a.readmore span, div.hr, #controllers span#active-arrow, #featured a#left-arrow, #featured a#right-arrow, #content-top, .entry div.hr2, span.price2, span.price2 span, #content-bottom, #sidebar h4.widgettitle, #listings-bottom, #listings, input.view-button, .entry div.thumbnail span.overlay2, body.index #content-top, #menu-bg, body.index #top-index-overlay, span.overlay, .reply-container, .reply-container a, #product-thumb-items a#left-arrow , #product-thumb-items a#right-arrow');</script>
	<![endif]-->
<!--[if lt IE 7]>
	<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/css/ie6style.css" />
<![endif]-->
<!--[if IE 7]>
	<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/css/ie7style.css" />
<![endif]-->
<?php } ?>
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
					<img src="<?php echo esc_url($logo); ?>" alt="Logo" id="logo"/>
				</a>
			<?php //probamos si es o no un móvil.
     if ($detect->isMobile()==false OR $detect->isTablet()==false) { ?>
				<div id="contacto">
					<a href="/contacto-2" title="Contacto" target="_self">
						<img src="<?php echo get_template_directory_uri(); ?>/images/iconos/contacto.png"  alt="Contacto" />
					</a>
				</div>
				<?php } ?>
				<div id="menu-oculto">
					<ul class="primary">
						<li>
							<a title="Menú" id="menu-principal" href="#nav_menu-3" target="_self">
								<img src="<?php bloginfo('stylesheet_directory');?>/images/Entypo_2630(0)_48.png" alt="Menú" />
							</a>
						</li>
						<!-- <li><a id="menu-categorias" href="#nav_menu-2" target="_self">Productos</a></li> -->
					</ul>
				</div>
				<div id="top-menu">
<?php //probamos si es o no un móvil.
if ($detect->isMobile()==false OR $detect->isTablet()==false) { ?>
					<img src="<?php echo get_template_directory_uri(); ?>/images/menu-bg.png" width="100%" height="64" alt="Menú Principal" align="right" />
<?php } ?>
					<div id="texto">Tel: 03544-471274 | Salta esq. Ruta 15. Villa Cura Brochero | CP 5891 | info@sierrasinmobiliaria.com.ar</div>
<?php //probamos si es o no un móvil.
if ($detect->isMobile()==false OR $detect->isTablet()==false) { ?>
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
<?php } ?>
				</div> <!-- end #top-menu -->
<?php //probamos si es o no un móvil.
if ($detect->isMobile()==false OR $detect->isTablet()==false) { ?>
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
<?php } ?>
			</div><!-- end #header -->