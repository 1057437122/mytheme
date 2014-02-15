<?php
/**
 * @package WordPress
 * @subpackage Default_Theme
 */
// Do not delete these lines
	if (!empty($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
		die ('Please do not load this page directly. Thanks!');
	if ( post_password_required() ) { ?>
		<p class="nocomments">This post is password protected. Enter the password to view comments.</p>
	<?php
		return;
	}
$countComments = 0;
$countPings = 0;
if($post->comment_count > 0) {
	$comments_list = array();
	$pings_list = array();
	foreach($comments as $comment) {
		if('comment' == get_comment_type()) $comments_list[++$countComments] = $comment;
		else $pings_list[++$countPings] = $comment;
	}
}
?>
<!-- You can start editing here. -->
<div id="comments">
	<?php if ( have_comments() ) : ?>
			<div class="comments-title"><?php comments_number('0', '1', '%' );?> Comments.</div>
			<ol class="commentlist" id="thecomments">
					<?php wp_list_comments('type=comment&callback=mytheme_comment'); ?>
			</ol>
			
			<div class="pagenavi"><?php paginate_comments_links('prev_text=上页&next_text=下页');?></div>
	<?php else : // this is displayed if there are no comments so far
	?>
		<?php if ('open' == $post->comment_status) : ?>
			<!-- If comments are open, but there are no comments. -->
			<h2 class="comment-title"><?php comments_number('0', '1', '%' );?> Comments.</h2>
		<?php else : // comments are closed
		?>
			<!-- If comments are closed. -->
			<h2 id="comments" class="nocomments">Comments are closed.</h2>
		<?php endif; ?>
	<?php endif; ?>
	<?php if ('open' == $post->comment_status) : ?>
		<div id="respond" class="respond">
			<h2>发表评论</h2>
			<span id="cancel-comment-reply"><?php cancel_comment_reply_link(); ?></span>
			<?php if ( get_option('comment_registration') && !$user_ID ) : ?>
					
					<p><?php print '您必须'; ?><a href="<?php echo get_option('siteurl'); ?>/wp-login.php?redirect_to=<?php echo urlencode(get_permalink()); ?>"> [ 登录 ] </a>才能发表留言！</p>
			<?php else : ?>
					<form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform">
				<?php if ( $user_ID ) : ?>
				<p><?php print '登录者：'; ?> <a href="<?php echo get_option('siteurl'); ?>/wp-admin/profile.php"><?php echo $user_identity; ?></a>&nbsp;&nbsp;<a href="<?php echo wp_logout_url(get_permalink()); ?>" title="退出"><?php print '[ 退出 ]'; ?></a>
	
						</p>
				<?php else : ?>
			<p>
			<input type="text" name="author" id="author" class="commenttext" value="<?php echo $comment_author; ?>" size="22" tabindex="1" />
			<label for="author">昵称<?php if ($req) echo " *"; ?></label>
		</p>
		<p>
			<input type="text" name="email" id="email" class="commenttext" value="<?php echo $comment_author_email; ?>" size="22" tabindex="2" />
			<label for="email">邮箱<?php if ($req) echo " *"; ?> <a id="Get_Gravatar"  title="申请一个自己的Gravatar全球通用头像" target="_blank" href="http://en.gravatar.com/">（申请Gravatar全球通用头像）</a></label>
		</p>
		<p>
			<input type="text" name="url" id="url" class="commenttext" value="<?php echo $comment_author_url; ?>" size="22" tabindex="3" />
			<label for="url">网址</label>
		</p>
				<?php endif; ?>
				
						<p><textarea name="comment" id="comment" tabindex="4" onkeydown="if(event.ctrlKey&&event.keyCode==13) {document.getElementById('submit').click();return false};" required=""></textarea></p>
						
						<input name="submit" type="submit" id="submit" class="commentsubmit" tabindex="5" value="SUBMIT（Ctrl + Enter）" />
						<?php comment_id_fields(); ?>
						<?php do_action('comment_form', $post->ID); ?>
						
					</form>
			<?php endif; // If registration required and not logged in
			?>
		</div><!--end respond-->
	<?php endif; // if you delete this the sky will fall on your head
	?>
	</div>