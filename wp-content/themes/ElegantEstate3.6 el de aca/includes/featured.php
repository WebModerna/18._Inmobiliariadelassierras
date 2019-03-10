<!-- Start Featured -->	
<div id="featured">

	<?php global $ids;
	$ids = array();
	$arr = array();
	$i=1;
	
	$width = 954;
	$height = 289;
	$width_small = 49;
	$height_small = 49;
			
	$featured_cat = get_option('elegantestate_feat_cat'); 
	$featured_num = (int) get_option('elegantestate_featured_num'); 
	
	if (get_option('elegantestate_use_pages') == 'false') query_posts("showposts=$featured_num&cat=".get_catId($featured_cat));
	else { 
		global $pages_number;
		
		if (get_option('elegantestate_feat_pages') <> '') $featured_num = count(get_option('elegantestate_feat_pages'));
		else $featured_num = $pages_number;
		
		query_posts(array
						('post_type' => 'page',
						'orderby' => 'menu_order',
						'order' => 'ASC',
						'post__in' => get_option('elegantestate_feat_pages'),
						'showposts' => $featured_num
					));
	};
			
	while (have_posts()) : the_post();
		global $post;	
		$arr[$i]["title"] = truncate_title(20,false);
		$arr[$i]["fulltitle"] = truncate_title(250,false);
		
		$arr[$i]["excerpt"] = truncate_post(230,false);
		
		$arr[$i]["permalink"] = get_permalink();
		
		$arr[$i]["thumbnail"] = get_thumbnail($width,$height,'',$arr[$i]["fulltitle"],$arr[$i]["fulltitle"],false,'featured_image');
		$arr[$i]["thumb"] = $arr[$i]["thumbnail"]["thumb"];
		$arr[$i]["thumbnail_small"] = get_thumbnail($width_small,$height_small,'',$arr[$i]["fulltitle"],$arr[$i]["fulltitle"]);
		$arr[$i]["thumb_small"] = $arr[$i]["thumbnail_small"]["thumb"];
		
		$arr[$i]["use_timthumb"] = $arr[$i]["thumbnail"]["use_timthumb"];
		
		$custom = get_post_custom($post->ID);
		$arr[$i]["price"] = isset($custom["price"][0]) ? $custom["price"][0] : '';

		$i++;
		$ids[]= $post->ID;
	endwhile; wp_reset_query();	?>
	
	<div id="slides">
		<?php for ($i = 1; $i <= $featured_num; $i++) { ?>
			<?php if ($arr[$i]["title"] == '') break; ?>
			<div class="slide">
				<?php print_thumbnail($arr[$i]["thumb"], $arr[$i]["use_timthumb"], $arr[$i]["fulltitle"] ,$width, $height); ?>
				<div class="overlay"></div>
				
				<div class="description">
					<div class="slide-info">
						<?php if ($arr[$i]["price"] != '') { ?>
							<span class="price"><span><?php echo esc_html($arr[$i]["price"]); ?></span></span>
						<?php }; ?>
						<h2 class="title"><a href="<?php echo esc_url($arr[$i]["permalink"]); ?>"><?php echo esc_html($arr[$i]["title"]); ?></a></h2>
						<div class="hr"></div> 
						<p><?php echo ($arr[$i]["excerpt"]); ?></p>
						<a href="<?php echo esc_url($arr[$i]["permalink"]); ?>" class="readmore"><span><?php esc_html_e('view the listing','ElegantEstate'); ?></span></a>
						<a href="#" class="readmore"><span>Ir arriba</span></a>
					</div> <!-- end .slide-info -->	
				</div> <!-- end .description -->	
			</div> <!-- end .slide -->
		<?php }; ?>	
	</div> <!-- end #slides -->	
	
	<div id="controllers">
		<a href="#" id="left-arrow"><?php esc_html_e('Previous','ElegantEstate');?></a>	
	
		<?php for ($i = 1; $i <= $featured_num; $i++) { ?>
			<?php if ($arr[$i]["title"] == '') break; ?>
			<a href="#" class="smallthumb<?php if ($i==1) echo(' active'); if ($i == $featured_num) echo(' last'); ?>">
				<?php print_thumbnail($arr[$i]["thumb_small"], $arr[$i]["use_timthumb"], $arr[$i]["fulltitle"] ,$width_small,$height_small); ?>
			</a>
		<?php }; ?>
	
		<a href="#" id="right-arrow"><?php esc_html_e('Next','ElegantEstate');?></a>
		<span id="active-arrow"></span>
	</div> <!-- end #controllers -->
</div> <!-- end #featured -->
<!-- End Featured -->