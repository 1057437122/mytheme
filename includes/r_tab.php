	<div id="tab-title">
		<h4><span id="tab-1" class="current"><?php if (is_home()) {echo "新评";} else {echo "最新";} ?></span><span id="tab-2">热文</span><span id="tab-3">随机</span><span id="tab-4">标签</span></h4>
	</div>
	<div id="tab-content">
		<?php if (is_home()) { ?>
		<ul class="tab-1 recentcomments">
			

<?php
			global $wpdb;
			$my_email = get_bloginfo ('admin_email');
			$sql = "SELECT DISTINCT ID, post_title, post_password, comment_ID, comment_post_ID, comment_author, comment_date_gmt, comment_approved, comment_type,comment_author_url,comment_author_email, SUBSTRING(comment_content,1,15) AS com_excerpt FROM $wpdb->comments LEFT OUTER JOIN $wpdb->posts ON ($wpdb->comments.comment_post_ID = $wpdb->posts.ID) WHERE comment_approved = '1' AND comment_type = '' AND post_password = '' AND comment_author_email != '$my_email' ORDER BY comment_date_gmt DESC LIMIT 6";
			$comments = $wpdb->get_results($sql);
			$output = $pre_HTML;
			foreach ($comments as $comment) {$output .= "\n<li>".get_avatar(get_comment_author_email(), 32).strip_tags($comment->comment_author).":<br />" . " <a href=\"" . get_permalink($comment->ID) ."#comment-" . $comment->comment_ID . "\" title=\"查看 " .$comment->post_title . "\">" . strip_tags($comment->com_excerpt)."</a></li>";}
			$output .= $post_HTML;
			$output = convert_smilies($output);
			echo $output;
		?> 

		</ul>
		<?php } else { ?> 
		<ul class="tab-1 lastpost">
			<?php
			$my_posts = get_posts('numberposts=10&orderby=post_date desc');
			foreach( $my_posts as $post ) :
			?>
						
						
			<li><a href="<?php the_permalink(); ?>" rel="bookmark" title="详细阅读 <?php the_title_attribute(); ?>"><?php echo cut_str($post->post_title,32); ?></a></li>
			<?php endforeach; ?>
		</ul>
		<?php } ?>
		<ul class="tab-2">
			<?php simple_get_most_viewed(); ?>
		</ul>
		<ul class="tab-3">
			<?php
			$rand_posts = get_posts('numberposts=10&orderby=rand');
			foreach( $rand_posts as $post ) :
			?>
			<li><a href="<?php the_permalink(); ?>"><?php echo cut_str($post->post_title,32); ?></a></li>
			<?php endforeach; ?>
		</ul>
		<ul class="tab-4 tag_cloud">
			<li><?php get_tags_listgavin(); ?></li>
		</ul>
	</div><div class="clr"></div>