<?php get_header(); ?>
	<div id="content">
        <div class="post-content">
		<?php if(have_posts()) : ?><?php while(have_posts()) : the_post(); ?>
		<div class="article" id="post-<?php the_ID(); ?>" >
			
								
				
				<div class="single_info">
				<h2>
				<?php the_title(); ?>
				</h2>
				<div class="article_info1">
				<span class="author">作者：<?php the_author() ?></span> | 
				<span>时间：<?php the_time('Y-m-d') ?></span> |
				<span class="category">分类：<?php the_category(', ') ?></span> |
				<span class="post_view"><?php post_views(' ', ' 次阅读'); ?></span>
				</div></div><div class="clr"></div>
			
			<div class="entry">
				<div class="video_frame">
					<?php the_content(); ?>
				</div>
			</div>
			<div class="context_box">
	<!-- Baidu Button BEGIN -->
    <div id="bdshare" class="bdshare_t bds_tools_32 get-codes-bdshare">
        <a class="bds_qzone"></a>
        <a class="bds_tsina"></a>
        <a class="bds_renren"></a>
        <a class="bds_tqq"></a>
        <a class="bds_baidu"></a>
        <a class="bds_renren"></a>
        <a class="bds_kaixin001"></a>
        <a class="bds_hi"></a>
        <a class="bds_tsohu"></a>
        <a class="bds_qq"></a>
        <a class="bds_tieba"></a>
        <a class="bds_t163"></a>
        <a class="bds_copy"></a>
        <span class="bds_more">更多</span>
    </div>
<script type="text/javascript" id="bdshare_js" data="type=tools" ></script>
<script type="text/javascript" id="bdshell_js"></script>
<script type="text/javascript">
	document.getElementById("bdshell_js").src = "http://bdimg.share.baidu.com/static/js/shell_v2.js?cdnversion=" + new Date().getHours();
</script>
<!-- Baidu Button END --><div class="clr"></div>
				<li>   该日志由 <?php the_author_posts_link(); ?> 于<?php the_time('Y年m月d日') ?>发表在 <?php the_category(', ') ?> 分类下，
				<?php if (('open' == $post-> comment_status) && ('open' == $post->ping_status)) {?>
				你可以<a href="#respond">发表评论</a>，并在保留<a href="<?php the_permalink() ?>" rel="bookmark">原文地址</a>
				及作者的情况下<a href="<?php trackback_url(); ?>" rel="trackback">引用</a>到你的网站或博客。
				<?php } elseif (('open' == $post-> comment_status) && !('open' == $post->ping_status)) { ?>
				
				<?php } ?></li>
				<li>本文链接: <a href="<?php the_permalink() ?>" rel="bookmark" title="本文固定链接 <?php the_permalink() ?>"><?php the_title(); ?> | <?php bloginfo('name');?></a></li>
				<li><?php the_tags('文章标签: ', ', ', ''); ?></li>
				<li>版权所有: <a href="<?php echo get_option('home'); ?>/"><?php bloginfo('name'); ?></a>-转载请标明出处</li>
</div><div class="clr"></div>
		<?php include('includes/related.php'); ?>
			<?php endwhile; ?>

		<?php endif; ?>
			<div class="article_page">
	  <span style="float:left"><?php previous_post_link('【上一篇】%link') ?></span>
	  <span style="float:right"><?php next_post_link('%link【下一篇】') ?></span></div>
	  <div class="clr"></div>
	  <div class="comment-box">
		<?php comments_template(); ?>
		</div>
		</div>
		
		
		</div>
<?php get_sidebar(); ?>
<?php get_footer(); ?>