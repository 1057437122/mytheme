<?php get_header('gallery'); ?>
	<div id="content">
        <div class="post-content">
		<?php if(have_posts()) : ?><?php while(have_posts()) : the_post(); ?>
		<div class="article" id="post-<?php the_ID(); ?>" >					
			<div class="clr"></div>
			
			<div class="entry">
				<?php 
					//get all the pictures uploaded
					$origin_gallery=get_origin_gallery();
				?>
					<div class="container">
			<div class="content">
				<h1><?php the_title(); ?><span class="author">作者：<?php the_author() ?> |时间：<?php the_time('Y-m-d') ?>|分类：<?php the_category(', ') ?>|<?php post_views(' ', ' 次阅读'); ?></span></h1>
				<div id="rg-gallery" class="rg-gallery">
					<div class="rg-thumbs">
						<!-- Elastislide Carousel Thumbnail Viewer -->
						<div class="es-carousel-wrapper">
							<div class="es-nav">
								<span class="es-nav-prev">Previous</span>
								<span class="es-nav-next">Next</span>
							</div>
							<div class="es-carousel">
								<ul>
									<?php foreach($origin_gallery as $pics):?>
									<?php 
										$tmp=pathinfo($pics);
										$thumbs=$tmp['dirname'].'/'.$tmp['filename'].'-150x150.'.$tmp['extension'];
									?>
									<li><a href="#"><img src="<?php echo $thumbs;?>" data-large="<?php echo $pics;?>" alt="" data-description="We know that in all things God works for good with those who love him" /></a></li>
									<?php endforeach;?>
								</ul>
							</div>
						</div>
						<!-- End Elastislide Carousel Thumbnail Viewer -->
					</div><!-- rg-thumbs -->
				</div><!-- rg-gallery -->
				
			</div><!-- content -->
		</div><!-- container -->
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
<?php get_footer('gallery'); ?>
