<?php get_header(); ?>
	<div id="content">
        <div class="post-content">
		<?php if(have_posts()) : ?><?php while(have_posts()) : the_post(); ?>
		<div class="article" id="post-<?php the_ID(); ?>" >
			
								
				
				<div class="page_info">
				<h2>
				<?php the_title(); ?>
				</h2>
				</div><div class="clr"></div>
			
			<div class="entry">
			<?php the_content(); ?>
			</div>
			
		
			<?php endwhile; ?>

		<?php endif; ?>
			
	  <div class="clr"></div>
	  <div class="comment-box">
		<?php comments_template(); ?>
		</div>
		</div>
		
		
		</div>
<?php get_sidebar(); ?>
<?php get_footer(); ?>