<?php
/*
Template Name: 友情链接
*/
?>
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
			
			<div class="archives-entry">
			
			<div class="links">
			<ul>
			<?php wp_list_bookmarks('orderby=id&categorize=0&show_images=0&title_li='); ?>
			</ul>
			</div> 
 
</div><div class="clr"></div>
	   <div class="linkmate">


<h3>说明：</h3>


<p>一、建议你我先友情再链接，谢谢您的理解。</p>


<p>二、谢绝网站涉及政治、法律、色情等不良内容。</p>





	</div>
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