<?php
// 为主题添加post-format功能
	add_theme_support( 'post-formats', array( 'status',  'video',  'audio', 'gallery','quote' ) );
include("includes/theme_options.php");
// custom menu support WP菜单
		add_theme_support( 'menus' );
	if ( function_exists( 'register_nav_menus' ) ) {
	  	 register_nav_menus(
     array(
         'primary' => __( '导航菜单' ),
		 'top-menu' => __( '顶部菜单' ),
          )
		  );
	}
//首页调用缩略图
if(function_exists('add_theme_support')){
    add_theme_support( 'post-thumbnails' );
}
function post_thumbnail(){
    if(has_post_thumbnail()){    //如果有缩略图，则显示缩略图
        the_post_thumbnail();
    } else {
        global $post, $posts;
        $post_img = '';
        ob_start();
        ob_end_clean();
        $output = preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $post->post_content, $matches);
        $post_img_src = $matches [1][0];
        $post_img = '<img src="'.$post_img_src.'" width="140" height="100" alt="" />';    //如果没有缩略图，则显示日志中的第一张图片
        if(empty($post_img_src)){    //如果日志中没有图片，则显示默认图片
		$random = mt_rand(1, 20);
            $post_img = '<img src="'.get_bloginfo("template_url").'/images/random/tb'.$random.'.jpg" alt="" />';
        }
        echo $post_img;
    }
}

//标题文字截断
function cut_str($src_str,$cut_length,$sign=0)//sign to show "..." in the description~~~
{
    $return_str='';
    $i=0;
    $n=0;
    $str_length=strlen($src_str);
    while (($n<$cut_length) && ($i<=$str_length))
    {
        $tmp_str=substr($src_str,$i,1);
        $ascnum=ord($tmp_str);
        if ($ascnum>=224)
        {
            $return_str=$return_str.substr($src_str,$i,3);
            $i=$i+3;
            $n=$n+2;
        }
        elseif ($ascnum>=192)
        {
            $return_str=$return_str.substr($src_str,$i,2);
            $i=$i+2;
            $n=$n+2;
        }
        elseif ($ascnum>=65 && $ascnum<=90)
        {
            $return_str=$return_str.substr($src_str,$i,1);
            $i=$i+1;
            $n=$n+2;
        }
        else 
        {
            $return_str=$return_str.substr($src_str,$i,1);
            $i=$i+1;
            $n=$n+1;
        }
    }
    if ($i<$str_length)
    {
        $return_str = $return_str . '';
    }
    if (get_post_status() == 'private')
    {
        $return_str = $return_str . '（private）';
    }
    if($sign==1){//add for show details
    	$return_str.='...';
    }
    return $return_str;
}
//文章浏览数
function record_visitors(){
	if (is_singular()) {global $post;
	 $post_ID = $post->ID;
	  if($post_ID) 
	  {
		  $post_views = (int)get_post_meta($post_ID, 'views', true);
		  if(!update_post_meta($post_ID, 'views', ($post_views+1))) 
		  {
			add_post_meta($post_ID, 'views', 1, true);
		  }
	  }
	}
}
add_action('wp_head', 'record_visitors');  
function post_views($before = '(点击 ', $after = ' 次)', $echo = 1)
{
  global $post;
  $post_ID = $post->ID;
  $views = (int)get_post_meta($post_ID, 'views', true);
  if ($echo) echo $before, number_format($views), $after;
  else return $views;
};

	 // 翻页
 function par_pagenavi($range = 9){
	global $paged, $wp_query;
	if ( !$max_page ) {$max_page = $wp_query->max_num_pages;}
	if($max_page > 1){if(!$paged){$paged = 1;}
	if($paged != 1){echo "<a href='" . get_pagenum_link(1) . "' class='extend' title='跳转到首页'>首页</a>";}
	previous_posts_link('上页');
    if($max_page > $range){
		if($paged < $range){for($i = 1; $i <= ($range + 1); $i++){echo "<a href='" . get_pagenum_link($i) ."'";
		if($i==$paged)echo " class='current'";echo ">$i</a>";}}
    elseif($paged >= ($max_page - ceil(($range/2)))){
		for($i = $max_page - $range; $i <= $max_page; $i++){echo "<a href='" . get_pagenum_link($i) ."'";
		if($i==$paged)echo " class='current'";echo ">$i</a>";}}
	elseif($paged >= $range && $paged < ($max_page - ceil(($range/2)))){
		for($i = ($paged - ceil($range/2)); $i <= ($paged + ceil(($range/2))); $i++){echo "<a href='" . get_pagenum_link($i) ."'";if($i==$paged) echo " class='current'";echo ">$i</a>";}}}
    else{for($i = 1; $i <= $max_page; $i++){echo "<a href='" . get_pagenum_link($i) ."'";
    if($i==$paged)echo " class='current'";echo ">$i</a>";}}
	next_posts_link('下页');
    if($paged != $max_page){echo "<a href='" . get_pagenum_link($max_page) . "' class='extend' title='跳转到最后一页'>末页</a>";}}
}
// Time Ago by Fanr
	function time_ago( $type = 'commennt', $day = 30 ) {
		$d = $type == 'post' ? 'get_post_time' : 'get_comment_time';
		$timediff = time() - $d('U');
		if ($timediff <= 60*60*24*$day){
		echo  human_time_diff($d('U'), strtotime(current_time('mysql', 0))), '前';
		}
		if ($timediff > 60*60*24*$day){
		echo  date('Y年m月d日',get_comment_date('U')), ' ', get_comment_time('H:i');
		};
	}	

//自定义头像
add_filter( 'avatar_defaults', 'fb_addgravatar' );
function fb_addgravatar( $avatar_defaults ) {
$myavatar = get_bloginfo('template_directory') . '/images/gravatar.png';
  $avatar_defaults[$myavatar] = '自定义头像';
  return $avatar_defaults;
}

// Custom Comments List.

function mytheme_comment($comment, $args, $depth) {
   $GLOBALS['comment'] = $comment;
   global $commentcount;
   if(!$commentcount) {
	   $page = ( !empty($in_comment_loop) ) ? get_query_var('cpage')-1 : get_page_of_comment( $comment->comment_ID, $args )-1;
	   $cpp=get_option('comments_per_page');
	   $commentcount = $cpp * $page;
	}
		 ?>
<li <?php comment_class(); ?> id="li-comment-<?php comment_ID() ?>">
	<div id="comment-<?php comment_ID(); ?>" class="comments">
		<div class="comment-author vcard">
		<?php echo get_avatar( $comment, 40 ); ?>
			<cite class="fn"><?php comment_author_link() ?></cite>
			
			<div class="floor">
    <?php
if(!$parent_id = $comment->comment_parent){
	switch ($commentcount){
		case 0 :echo "<font style='color:#cc0000;font-size:16px;font-weight:600'>沙发</font>";++$commentcount;break;
		case 1 :echo "<font style='color:#93BF20;font-size:14px;font-weight:600'>板凳</font>";++$commentcount;break;
		case 2 :echo "<font style='color:#000000;font-size:14px;font-weight:400'>地板</font>";++$commentcount;break;
		default:printf('%1$s楼', ++$commentcount);
	}
}
?>
    </div>
	<?php if($comment->comment_parent){// 如果存在父级评论
          $comment_parent_href = get_comment_ID( $comment->comment_parent );
          $comment_parent = get_comment($comment->comment_parent);
          ?>
    <span class="comment-to plr">回复</span> <span class="reply-comment-author"><a href="#comment-<?php echo $comment_parent_href;?>"><?php echo $comment_parent->comment_author;?></a></span>
    <?php }?>
    <span class="comment-meta commentmetadata"><?php echo time_ago(); ?></span>
	<div class="comment-text">
			<p class="useragent_output_custom"><?php if(function_exists('useragent_output_custom')) { useragent_output_custom(); } ?></p>
			<?php comment_text() ?>
		</div>
		<div class="reply">
			<?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?><?php edit_comment_link(__('| 编辑'),'  ','') ?>
		</div><div class="clr"></div>
		</div>
		<?php if ($comment->comment_approved == '0') : ?>
		<em class="approved"><?php _e('Your comment is awaiting moderation.') ?></em>
		<br />
		<?php endif; ?>
		
	</div>
<?php }
//评论邮件通知
function comment_mail_notify($comment_id) {
  $admin_email = get_bloginfo ('admin_email'); // $admin_email 可改為你指定的 e-mail.
  $comment = get_comment($comment_id);
  $comment_author_email = trim($comment->comment_author_email);
  $parent_id = $comment->comment_parent ? $comment->comment_parent : '';
  $to = $parent_id ? trim(get_comment($parent_id)->comment_author_email) : '';
  $spam_confirmed = $comment->comment_approved;
  if (($parent_id != '') && ($spam_confirmed != 'spam') && ($to != $admin_email) && ($comment_author_email == $admin_email)) {
    $wp_email = 'no-reply@' . preg_replace('#^www\.#', '', strtolower($_SERVER['SERVER_NAME'])); // e-mail 發出點, no-reply 可改為可用的 e-mail.
    $subject = '您在 [' . get_option("blogname") . '] 的评论有新的回复';
    $message = '
    <div style="background-color:#eef2fa; border:1px solid #d8e3e8; color:#111; padding:0 15px; -moz-border-radius:5px; -webkit-border-radius:5px; -khtml-border-radius:5px; border-radius:5px;">
      <p>' . trim(get_comment($parent_id)->comment_author) . ', 您好!</p>
      <p>您曾在 [' . get_option("blogname") . '] 的文章 《' . get_the_title($comment->comment_post_ID) . '》 上发表评论:<br />'
       . nl2br(get_comment($parent_id)->comment_content) . '</p>
      <p>' . trim($comment->comment_author) . ' 给您的回复如下:<br />'
       . nl2br($comment->comment_content) . '<br /></p>
      <p>您可以点击 <a href="' . htmlspecialchars(get_comment_link($parent_id)) . '">查看回复的完整內容</a></p>
      <p>欢迎再次光临 <a href="' . get_option('home') . '">' . get_option('blogname') . '</a></p>
      <p>(此郵件由系統自動發出, 請勿回覆.)</p>
    </div>';
	$message = convert_smilies($message);
    $from = "From: \"" . get_option('blogname') . "\" <$wp_email>";
    $headers = "$from\nContent-Type: text/html; charset=" . get_option('blog_charset') . "\n";
    wp_mail( $to, $subject, $message, $headers );
    //echo 'mail to ', $to, '<br/> ' , $subject, $message; // for testing
  }
}
add_action('comment_post', 'comment_mail_notify');
// -- END ----------------------------------------
//自动生成版权时间
function comicpress_copyright() {
    global $wpdb;
    $copyright_dates = $wpdb->get_results("
    SELECT
    YEAR(min(post_date_gmt)) AS firstdate,
    YEAR(max(post_date_gmt)) AS lastdate
    FROM
    $wpdb->posts
    WHERE
    post_status = 'publish'
    ");
    $output = '';
    if($copyright_dates) {
    $copyright = "&copy; " . $copyright_dates[0]->firstdate;
    if($copyright_dates[0]->firstdate != $copyright_dates[0]->lastdate) {
    $copyright .= '-' . $copyright_dates[0]->lastdate;
    }
    $output = $copyright;
    }
    return $output;
    }
// 获得热评文章
function simple_get_most_viewed($posts_num=10, $days=90){
    global $wpdb;
    $sql = "SELECT ID , post_title , comment_count
            FROM $wpdb->posts
           WHERE post_type = 'post' AND TO_DAYS(now()) - TO_DAYS(post_date) < $days
		   AND (`wp_posts`.`post_status` = 'publish' OR `wp_posts`.`post_status` = 'inherit')
           ORDER BY comment_count DESC LIMIT 0 , $posts_num ";
    $posts = $wpdb->get_results($sql);
    $output = "";
    foreach ($posts as $post){
        $output .= "\n<li><a href= \"".get_permalink($post->ID)."\" rel=\"bookmark\" title=\"".$post->post_title." (".$post->comment_count."条评论)\" >". mb_strimwidth($post->post_title,0,32)."</a></li>";
    }
    echo $output;
}
//标签云	
function get_tags_listgavin()
{
$html = '<ul class="post_tags">';
foreach (get_tags( array('number' => 30, 'orderby' => 'count', 'order' => 'DESC', 'hide_empty' => false) ) as $tag){
        $tag_link = get_tag_link($tag->term_id);
        $html .= "<li><a href='{$tag_link}' title='{$tag->name}的标签' >";
        $html .= "{$tag->name} ({$tag->count})</a></li>";
}
$html .= '</ul>';
echo $html;
}
//自动添加标签属性 
add_filter('the_content', 'fancybox');
function fancybox ($content)
{ global $post;
$pattern = "/<a(.*?)href=('|\")([^>]*).(bmp|gif|jpeg|jpg|png|swf)('|\")(.*?)>(.*?)<\/a>/i";
$replacement = '<a$1href=$2$3.$4$5 rel="box" alt="'.get_the_title().'"  title="'.get_the_title().'" class="fancybox"$6>$7</a>';
$content = preg_replace($pattern, $replacement, $content);
return $content;
}
//添加编辑器快捷按钮
add_action('admin_print_scripts', 'my_quicktags');
function my_quicktags() {
    wp_enqueue_script(
        'my_quicktags',
        get_stylesheet_directory_uri().'/js/my_quicktags.js',
        array('quicktags')
    );
    }
	include("includes/shortcode.php");



/* 
 * Escape special characters in pre.prettyprint into their HTML entities
 */
function dangopress_esc_html($content)
{
    $patterns = array(
        '/(<pre\s+[^>]*?class\s*?=\s*?[",\'].*?prettyprint.*?[",\'].*?>)(.*?)(<\/pre>)/sim',
        '/(<pre>[\n\s]*<code>)(.*?)(<\/code>[\n\s]*<\/pre>)/sim',
    );

    return preg_replace_callback($patterns, dangopress_esc_callback, $content);
}

function dangopress_esc_callback($matches)
{
    $tag_open = $matches[1];
    $content = $matches[2];
    $tag_close = $matches[3];

    //$content = htmlspecialchars($content, ENT_NOQUOTES, get_bloginfo('charset'));
    $content = esc_html($content);
    $tag_open = preg_replace('/<pre>[\n\s]*<code>/', '<pre class="prettyprint"><code>', $tag_open);

    return $tag_open . $content . $tag_close;
}
add_filter('the_content', 'dangopress_esc_html', 2);
add_filter('comment_text', 'dangopress_esc_html', 2);
//自定义表情地址
//日志归档
	class hacklog_archives
{
	function GetPosts() 
	{
		global  $wpdb;
		if ( $posts = wp_cache_get( 'posts', 'ihacklog-clean-archives' ) )
			return $posts;
		$query="SELECT DISTINCT ID,post_date,post_date_gmt,comment_count,comment_status,post_password FROM $wpdb->posts WHERE post_type='post' AND post_status = 'publish' AND comment_status = 'open'";
		$rawposts =$wpdb->get_results( $query, OBJECT );
		foreach( $rawposts as $key => $post ) {
			$posts[ mysql2date( 'Y.m', $post->post_date ) ][] = $post;
			$rawposts[$key] = null; 
		}
		$rawposts = null;
		wp_cache_set( 'posts', $posts, 'ihacklog-clean-archives' );;
		return $posts;
	}
	function PostList( $atts = array() ) 
	{
		global $wp_locale;
		global $hacklog_clean_archives_config;
		$atts = shortcode_atts(array(
			'usejs'        => $hacklog_clean_archives_config['usejs'],
			'monthorder'   => $hacklog_clean_archives_config['monthorder'],
			'postorder'    => $hacklog_clean_archives_config['postorder'],
			'postcount'    => '1',
			'commentcount' => '1',
		), $atts);
		$atts=array_merge(array('usejs'=>1,'monthorder'   =>'new','postorder'    =>'new'),$atts);
		$posts = $this->GetPosts();
		( 'new' == $atts['monthorder'] ) ? krsort( $posts ) : ksort( $posts );
		foreach( $posts as $key => $month ) {
			$sorter = array();
			foreach ( $month as $post )
				$sorter[] = $post->post_date_gmt;
			$sortorder = ( 'new' == $atts['postorder'] ) ? SORT_DESC : SORT_ASC;
			array_multisort( $sorter, $sortorder, $month );
			$posts[$key] = $month;
			unset($month);
		}
		$html = '<div class="car-container';
		if ( 1 == $atts['usejs'] ) $html .= ' car-collapse';
		$html .= '">'. "\n";
		if ( 1 == $atts['usejs'] ) $html .= '<a href="#" class="car-toggler">展开所有月份'."</a>\n\n";
		$html .= '<ul class="car-list">' . "\n";
		$firstmonth = TRUE;
		foreach( $posts as $yearmonth => $posts ) {
			list( $year, $month ) = explode( '.', $yearmonth );
			$firstpost = TRUE;
			foreach( $posts as $post ) {
				if ( TRUE == $firstpost ) {
					$html .= '	<li><span class="car-yearmonth">+ ' . sprintf( __('%1$s %2$d'), $wp_locale->get_month($month), $year );
					if ( '0' != $atts['postcount'] ) 
					{
						$html .= ' <span title="文章数量">(共' . count($posts) . '篇文章)</span>';
					}
					$html .= "</span>\n		<ul class='car-monthlisting'>\n";
					$firstpost = FALSE;
				}
				$html .= '			<li>' .  mysql2date( 'd', $post->post_date ) . '日: <a target="_blank" href="' . get_permalink( $post->ID ) . '">' . get_the_title( $post->ID ) . '</a>';
				if ( '0' != $atts['commentcount'] && ( 0 != $post->comment_count || 'closed' != $post->comment_status ) && empty($post->post_password) )
					$html .= ' <span title="评论数量">(' . $post->comment_count . '条评论)</span>';
				$html .= "</li>\n";
			}
			$html .= "		</ul>\n	</li>\n";
		}
		$html .= "</ul>\n</div>\n";
		return $html;
	}
	function PostCount() 
	{
		$num_posts = wp_count_posts( 'post' );
		return number_format_i18n( $num_posts->publish );
	}
}
if(!empty($post->post_content))
{
	$all_config=explode(';',$post->post_content);
	foreach($all_config as $item)
	{
		$temp=explode('=',$item);
		$hacklog_clean_archives_config[trim($temp[0])]=htmlspecialchars(strip_tags(trim($temp[1])));
	}
}
else
{
	$hacklog_clean_archives_config=array('usejs'=>1,'monthorder'   =>'new','postorder'    =>'new');	
}
$hacklog_archives=new hacklog_archives();

function custom_smilies_src($src, $img){return get_bloginfo('template_directory').'/images/smilies/' . $img;}
add_filter('smilies_src', 'custom_smilies_src', 10, 2);

// 禁用自动保存 //
	remove_action('pre_post_update','wp_save_post_revision'); 
	add_action('wp_print_scripts','disable_autosave'); 
	function disable_autosave(){  wp_deregister_script('autosave'); }
//找回链接管理
add_filter( 'pre_option_link_manager_enabled', '__return_true' );	
//禁用半角符号自动转换为全角
remove_filter('the_content', 'wptexturize');
//全部设置结束

?>
<?php 
//added by leez
//get the thumbnail for format:gallery
function post_gallery_thumbnail(){
	global $post, $posts;
	$post_img = '';
	// ob_start();
	// ob_end_clean();
	$output = preg_match_all('/<img.+?src=[\'"]([^\'"]+)[\'"].+?>/i', $post->post_content, $matches);
	
	$post_img='';
	if(count($matches[1])>4){
		$nu=4;
	}else{
		$nu=$count($matches[1]);
	}
	if($matches){
		for($i=0;$i<$nu;$i++){
			$tmp_img='<img src="'.$matches[1][$i].'" width="140" height="100" alt="" />';
			$post_img.=$tmp_img;
		}
	}else{
		$random = mt_rand(1, 20);
        $post_img = '<img src="'.get_bloginfo("template_url").'/images/random/tb'.$random.'.jpg" alt="" />';
	}
	echo $post_img;
}
function show_flv($id,$flv_path,$width,$height){
	echo '<object id="'.$id.'" type="application/x-shockwave-flash" data="'.get_bloginfo('template_url').'/plugins/flvplayer/player_flv.swf" width="'.$width.'" height="'.$height.'">';
	echo '<param name="movie" value="'.get_bloginfo('template_url').'/plugins/flvplayer/player_flv.swf" />';
	echo '<param name="FlashVars" value="flv='.$flv_path.'&amp;width='.$width.'&amp;height='.$height.'">';
	echo '</object>';
}
function get_origin_gallery(){
	global $post,$posts;
	$output=preg_match_all('/<a.+?href=[\'"]([^\'"]+)[\'"].+?>/i',$post->post_content,$matches);
	return $matches[1];
}
function get_thumbnail_gallery(){
	global $post,$posts;
	$output=preg_match_all('/<img.+?src=[\'"]([^\'"]+)[\'"].+?>/i',$post->post_content,$matches);
	return $matches[1];
}

?>
