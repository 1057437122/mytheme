<?php
/*
Template Name: adsense
*/
?>
<?php get_header(); ?>
	<div id="content">
        <div class="post-content">
	
		<div class="article" id="post-<?php the_ID(); ?>" >
			<div class=" page_info">
				<h2>
				<?php the_title(); ?>
				</h2>
				</div>
	<div class="photo-list">
			
			
			<?php $posts = query_posts($query_string . 'cat=167'); ?>
			<?php if(have_posts()) : ?><?php while(have_posts()) : the_post(); ?>
			
			<?php endwhile; ?>
			
			<?php else : ?>
			<h3>什么也找不到！</h3>
			<p>抱歉,你要找的文章不在这里.</p>
			<?php endif; ?>
			<div id="postnavigation">   
   			<div class="page_navi"> <?php par_pagenavi(5); ?> </div>  
             
    	</div>
			</div>
			
	  <div class="clr"></div>
	
		</div>
		
		
		</div>
<?php get_sidebar(); ?>

<?php get_footer(); ?>