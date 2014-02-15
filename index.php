<?php get_header(); ?>

	<div id="content">
   <div class="post-content">
		<?php $sliderspost=get_posts('meta_key=slider&numberposts=10');?><!-- get slider posts-->
		<?php if($sliderspost):?>
		<div class="slider_frame">
			<div class="slides">
				<div class="slides_container">
				<?php foreach($sliderspost as $post):?>
				<?php if(has_post_thumbnail()):?>
						<div class="slide"><!-- repeat-->
						<a href="<?php the_permalink();?>" rel="bookmark" target="_blank"><?php the_post_thumbnail();?></a><!--main pictures-->
							<div class="caption">
								<div class="cap">
									<h2><span></span><a href="<?php the_permalink();?>" target="_blank"><?php echo cut_str($post->post_title,48); ?></a></h2>
									<p><?php echo mb_strimwidth(strip_tags(apply_filters('the_content', $post->post_content)), 0, 150,"..."); ?></p>
								</div><!--cap-->
							</div><!--caption-->
						</div><!--slide-->
				<?php endif;?>
				<?php endforeach;?>
				</div><!-- slides_container-->
				
			</div><!--slides-->
	</div><!--slider_frame-->
		<?php endif;?>
				<?php include('includes/format.php'); ?>
				
		<div id="postnavigation">   
   			<div class="page_navi"> <?php par_pagenavi(5); ?> </div>  
    </div>
		</div><!--post-content-->
<?php get_sidebar(); ?>

<?php get_footer(); ?>