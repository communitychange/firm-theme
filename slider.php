	<?php $slidetype = get_option('templatesquare_slider_type');?>
	<?php $time = get_option('templatesquare_slider_timeout') ;?>
	<?php $effect = get_option('templatesquare_slider_effect') ;?>
	<?php $position = get_option('templatesquare_slider_position') ;?>
	<?php $direction = get_option('templatesquare_slider_direction') ;?>
	<?php $strip = get_option('templatesquare_slider_strip') ;?>
	<?php if($slidetype == 'slider1' || $slidetype == 'slider2'){?>
	<div id="header">
		<div id="slideshow">
		 <?php if($slidetype == 'slider1'){?>
		  <div id="s3slider">			
			<ul id="s3sliderContent">
				<?php
					query_posts("post_type=slider&post_status=publish&posts_per_page=-1");
					while ( have_posts() ) : the_post();
				?>
				<?php
					$custom = get_post_custom($post->ID);
					$sliderurl = $custom["slider-url"][0];
					$cf_thumb = $custom["thumb"][0];
				?>	
				<?php if(has_post_thumbnail( $the_ID) || $cf_thumb!=""){ ?>				
						<li class="s3sliderImage">
				<?php 
					if($cf_thumb!=""){
						echo "<img src='" . $cf_thumb . "' alt=''  width='940' height='340'  />";
					}else{
						the_post_thumbnail( 'slider-post-thumbnail' );
					}
				?>
							
							<div>
							<?php if($disableslidertext!=true){?>
								<h1 class="title-slider"><?php the_title(); ?></h1>
								<p><?php $excerpt = get_the_excerpt(); echo ts_string_limit_words($excerpt,30).'...';?>
								<?php if($sliderurl!=""){ ?>
								<br /><br /><a target="_blank" href="<?php  echo $sliderurl; ?>" class="but"><?php _e('Read more','templatesquare');?></a>
								<?php }?>
								</p>
							<?php } ?>
							</div>
							
						</li>
				<?php } ?>
				<?php endwhile; ?>
				<li class="clear s3sliderImage"></li>
				<?php wp_reset_query();?>
					</ul>
			</div>
			<?php }?>
			
			<?php if($slidetype == 'slider2'){?>
			<div id="slideflash">
				<div id="slideshowHolder">
				<?php
					query_posts("post_type=slider&post_status=publish&posts_per_page=-1");
					while ( have_posts() ) : the_post();
				?>
				<?php
					$custom = get_post_custom($post->ID);
					$cf_thumb = $custom["thumb"][0];
					$disableslidertext= get_option('templatesquare_disable_slider_text');
					 
				?>	
				<?php if($disableslidertext!=true){ $excerpt = get_the_excerpt(); $ts_excerpt = ts_string_limit_words($excerpt,40).'...'; }?>
				<?php if($cf_thumb!=""){
					$cf_thumb = "<img src='" . $cf_thumb . "' alt='" . $ts_excerpt . "'  width='940' height='340' />";
				}?>
				
				<?php if($cf_thumb!=""){ echo $cf_thumb; }else{ the_post_thumbnail( 'slider-post-thumbnail', array('alt' => $ts_excerpt) );} ?>
					
				<?php endwhile; ?>
				<?php wp_reset_query();?>
				</div><!-- end #slideshowHolder -->
				<script type="text/javascript">
				var $ = jQuery.noConflict();
				$("#slideshowHolder").jqFancyTransitions({ 
				width: 940, // width of panel
				height: 340, // height of panel
				effect: "<?php echo $effect;?>", // wave, zipper, curtain
				position: "<?php echo $position;?>", // top, bottom, alternate, curtain
				strips: <?php echo $strip ;?>, // number of strips
				delay: <?php echo $time ;?>, // delay between images in ms
				stripDelay: 50, // delay beetwen strips in ms
				titleSpeed: 1000, // speed of title appereance in ms
				titleOpacity: 0.7, // opacity of title
				navigation: false, // prev and next navigation buttons
				direction: "<?php echo $direction;?>" // left, right, alternate, random, fountain, fountainAlternate
				});
				</script>
			</div><!-- end #slideflash -->
			<?php } ?>
		</div><!-- end slideshow -->
	</div><!-- end #header -->
	<?php }?>
