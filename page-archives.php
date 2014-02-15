	<?php
	/*
	Template Name: 归档模板
	*/
	?>
	<?php get_header(); ?>
<div id="content">
        <div class="post-content">
		<?php if(have_posts()) : ?><?php while(have_posts()) : the_post(); ?>
		<div class="article" id="post-<?php the_ID(); ?>" >
			
								
				
				<div class=" page_info">
				<h2>
				<?php the_title(); ?>
				</h2>
				</div><div class="clr"></div>
			
			<div class="archives-entry">
			<p class="date"><strong><?php bloginfo('name'); ?> </strong>目前共有文章：  <?php echo $hacklog_archives->PostCount();?>篇	</p>
		<div class="archives"><?php echo $hacklog_archives->PostList();?></div>
			</div>
			
		
			<?php endwhile; ?>

		<?php endif; ?>
			
	  <div class="clr"></div>
	  
		</div>
		
		
		</div>
<?php get_sidebar(); ?>
<?php get_footer(); ?>