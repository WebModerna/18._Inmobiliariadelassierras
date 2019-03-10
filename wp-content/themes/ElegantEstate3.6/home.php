<?php get_header(); ?>
<?php //probamos si es o no un móvil.
     if ($detect->isMobile()==false OR $detect->isTablet()==false) { ?>
	<?php get_template_part('includes/featured');?>
<?php };?>
	<div id="content-top">	
		<div id="content" class="clearfix">
			<div id="main-area">
				<?php get_template_part('includes/entry'); ?>
			</div> <!-- end #main-area-->	
			<?php get_sidebar();?>
		<?php get_footer();?>