<?php get_header(); ?>
<div id="content">
     

        <div class="post-content">
	
		<div class="article" id="post-<?php the_ID(); ?>" >
			<div class="archive_info">
				<h2>
				<?php printf( __( '<span class="archive-title"> %s </span>：' ), single_cat_title( '', false ) ); ?>
				</h2>
				</div><div class="clr"></div>
				<!-- last 3 in this category-->
				<?php $nid=the_category_ID(false);?>
				<?php $last3=get_posts("category=$nid&numberposts=3");?>
				
				<?php if($last3):?>
					<?php foreach($last3 as $post):?>
						<div class="article" style="width:156px;" id="post-<?php the_ID();?>">
							<div class="thumbnail">
									<a href="<?php the_permalink();?>" title="<?php the_title();?>"><?php post_thumbnail();?></a>
							</div>
						</div><!--article-->
					<?php endforeach;?>
				<?php endif;?>
				<div class="clr"></div>
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