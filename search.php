<?php get_header(); ?>
<div id="content">
     

        <div class="post-content">
	
		<div class="article" id="post-<?php the_ID(); ?>" >
			<div class="archive_info">
				<h2>
				       <?php 
/* Search Count */ 
$allsearch = &new WP_Query("s=$s&showposts=-1"); 
$key = wp_specialchars($s, 1); 
$count = $allsearch->post_count; _e(''); 
_e('<span class="archive-title">'); 
echo $key; _e('</span>的搜索结果'); _e(' : '); 
echo $count . ' '; _e('篇文章'); 

wp_reset_query(); ?>
				</h2>
				</div><div class="clr"></div>
	<div class="cat_list">
			
			<ul>
			<?php $posts = query_posts($query_string . '&orderby=date&showposts=30'); ?>
			<?php if(have_posts()) : ?><?php while(have_posts()) : the_post(); ?>
			<li>
			<h2><span class="date"><?php post_views(' ', '<small> ℃ </small>'); ?> | <?php the_time('Y-m-d') ?></span> <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" target="_blank"><?php echo cut_str($post->post_title,80); ?></a> 
			</h2>
			</li>
			<?php endwhile; ?>
			</ul> 
			<?php else : ?>
			<h2>什么也找不到！</h2>
			<p>抱歉,你要找的文章不在这里.</p>
			<?php endif; ?>
			<div id="postnavigation">   
   			<div class="page_navi"> <?php par_pagenavi(5); ?> </div>  
             
    	</div>
			</div>
			
	  <div class="clr"></div>
	  <div class="comment-box">
		<?php comments_template(); ?>
		</div>
		</div>
		
		
		</div>


   
<?php get_sidebar(); ?>
<?php get_footer(); ?>