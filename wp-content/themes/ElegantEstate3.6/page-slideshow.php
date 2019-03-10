<?php 
/* Template Name: SlideShow */ 
?>
<?php get_header();?>
<?php include "slideshow.php";?>
<?php include "scripts-slideshow.php";?>
<div id="content-top">
<div id="content" class="clearfix fullwidth">
	<div id="main-area">

<!-- Start Featured -->	
		<div id="featured">
			<div id="slides"	class="cycle-slideshow"
			data-cycle-fx="fade"
			data-cycle-speed="2000"
			data-cycle-fx="fade"
			data-cycle-next="#right-arrow"
			data-cycle-prev="#left-arrow">

		<!-- El loop de WordPress -->
		<?php $recent = new WP_Query("cat=6,7,8,9,10,11,12,13,14,15,16&post_type=post"); while($recent->have_posts()) : $recent->the_post();?>

				<div class="slide">
					<?php //comprobando si hay miniaturas
     if(has_post_thumbnail()){the_post_thumbnail('custom-thumb-940');} else { ?>
     <img class="item active" src="<?php echo get_stylesheet_directory_uri();?>/images/green/header.jpg" alt="<?php _e('Sin imagen', 'apart_camaru');?>">
     <?php };?>
					<div class="overlay"></div>
					<div class="description">
						<div class="slide-info">
							<h2 class="title"><?php the_title();?></h2>
							<div class="hr"></div> 
							<?php the_excerpt();?>
						</div> <!-- end .slide-info -->	
					</div> <!-- end .description -->
				</div> <!-- end .slide -->
<?php endwhile;?>
<?php wp_reset_query(); wp_reset_postdata() ?>
			</div> <!-- end #slides -->	
			<div id="controllers">
				<a href="#" id="left-arrow"><?php esc_html_e('Previous','ElegantEstate');?></a>	
				<a href="#" id="right-arrow"><?php esc_html_e('Next','ElegantEstate');?></a>
			</div> <!-- end #controllers -->
		</div><!-- end #featured -->
	<!-- End Featured -->
	</div> <!-- end #main-area -->		
<?php get_footer(); ?>