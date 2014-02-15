<div class="article" id="post-<?php the_ID(); ?>" >
	<div style="position:relative;width:100%">
		<div class="pre-cat">
			<div class="pre-catinner"><?php the_category(', ') ?></div>
			<div class="pre-catarrow"></div>
		</div>				
		<h2><?php $t1=$post->post_date;$t2=date("Y-m-d H:i:s");$diff=(strtotime($t2)-strtotime($t1))/4800;if($diff<24)
		{echo '<span class="leixing">NEW! </span>';}?>
		<a href="<?php the_permalink() ?>" rel="bookmark" title="详细阅读 <?php the_title_attribute(); ?>"><?php echo cut_str($post->post_title,48); ?></a>
		</h2><div class="entry-commentnumber"> <span class="number">
  <?php comments_number('0', '1', '%'); ?>
  </span> <span class="corner"></span> </div>
	</div>
	<div class="article_info">
		<span class="date"><?php the_time('Y-m-d') ?></span> |
		<span class="author"><?php the_author() ?></span> |
		<span class="post_view"><?php post_views(' ', ' 次阅读'); ?></span> |
		<span class="tags"><?php the_tags('', ', ', ''); ?></span>
	</div><div class="clr"></div>
	<div class="entry">
	
	<div class="thumbnail">
				<?php post_thumbnail();?>  
			</div>
	
	<p><?php echo mb_strimwidth(strip_tags(apply_filters('the_content', $post->post_content)), 0, 250,"..."); ?></p>
	</div>

	
</div>     