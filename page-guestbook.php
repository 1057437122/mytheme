<?php

/*
Template Name: 留言模板
*/
?>
<?php get_header(); ?>
<script type="text/javascript">
$(function() {
	$(".readers-list2 li a").hover(function() {
		//$(this).parent().addClass("active").siblings().removeClass("active");
		$(this).parent().find(".reader-info").css({"display":"block","width":"0"}).animate({
			width: 150
		},
		200).removeClass("y-hidden");
	},
	function() {
		//$(this).parent().removeClass("active");
		$(this).parent().find(".reader-info").css("display","none");
	});
	
	$(".readers-list2 li").hover(function () {
		$(this).addClass("item-active");
	},
	function () {
		$(this).parent().find(".masklayer").animate({
			opacity: 0
		}, {
			duration: 300,
			queue: false
		});
		$(this).removeClass("item-active");
	});
	$(".readers-list2 li").hover(function () {
		$(this).find(".masklayer").animate({
			opacity: 0
		}, {
			duration: 300,
			queue: false
		});      
		$(".readers-list2 li").not( $(this) ).find(".masklayer").animate({
			opacity: 0.6
		}, {
			duration: 300,
			queue: false
		});
	}, function () {
	});
})
</script>
<div id="content">

<div class="post-content">
		<?php if(have_posts()) : ?><?php while(have_posts()) : the_post(); ?>
		<div class="article" id="post-<?php the_ID(); ?>" >
			
								
				
				<div class="page_info">
				<h2>
				<?php the_title(); ?>
				</h2>
				</div><div class="clr"></div>
			
			<div class="guestbook-entry">
			

<!-- start 读者墙 -->

<ul class="readers-list1">
	<?php
		$my_email = get_bloginfo ('admin_email');
		$query="SELECT COUNT(comment_ID) AS cnt, comment_author, comment_author_url, comment_author_email FROM (SELECT * FROM $wpdb->comments LEFT OUTER JOIN $wpdb->posts ON ($wpdb->posts.ID=$wpdb->comments.comment_post_ID) WHERE comment_date > date_sub( NOW(), INTERVAL 1 MONTH ) AND comment_author_email != '$my_email' AND post_password='' AND comment_approved='1' AND comment_type='') AS tempcmt GROUP BY comment_author_email ORDER BY cnt DESC LIMIT 30";
		$wall = $wpdb->get_results($query);
		foreach ($wall as $comment)
		{
			if( $comment->comment_author_url )
			$url = $comment->comment_author_url;
			else $url="#";
			$r="rel='external nofollow'";
			$tmp = "<li><a href='".$url."' ".$r." title='".$comment->comment_author." (留下".$comment->cnt."个脚印)'>".get_avatar($comment->comment_author_email, 36)."<em>".$comment->comment_author."</em> <strong>+".$comment->cnt."</strong></br></a></li>";
			$output .= $tmp;
		}
		echo $output ;
	?>
</ul>


<!-- end 读者墙 -->
			</div>
			
						   <div class="linkmate">

<h3>关于读者墙的说明：</h3>

<p>一、只要在读者墙上的博友，三子会在每天晚上的时候一一拜访，但不一定留言。</p>


<p>二、页面大小有限，不能列出所有来支持三子的博友。望请包涵！</p>





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