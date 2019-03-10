<?php get_header(); ?>

<div id="content-top">
	<div id="menu-bg"></div>
	<div id="top-index-overlay"></div>

	<div id="content" class="clearfix">
		<div id="main-area">
			<?php get_template_part('includes/entry'); ?>
			<?php 
        ##### Colocando una llamada a la función de paginación que si funciona de la plantilla de Ecobiz #####
            global $wp_query; 
            $total_pages = $wp_query->max_num_pages; 
            if ( $total_pages > 1 ) {
            if (function_exists("wpapi_pagination")) {
                wpapi_pagination($total_pages); 
              }
            }
          ?> 
		
		</div> <!-- end #main-area-->	
		
		<?php get_sidebar(); ?>
		
	<?php get_footer(); ?>		