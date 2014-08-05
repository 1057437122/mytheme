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

						<?php the_content(); ?>
			</div>
			<div class="context_box">
<?php include('includes/share.php');?>
<div class="clr"></div>
					<?php include('includes/copyright.php');?>
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
