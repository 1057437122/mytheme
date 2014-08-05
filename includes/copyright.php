<li>   该日志由 <?php the_author_posts_link(); ?> 于<?php the_time('Y年m月d日') ?>发表在 <?php the_category(', ') ?> 分类下，
<?php if (('open' == $post-> comment_status) && ('open' == $post->ping_status)) {?>
你可以<a href="#respond">发表评论</a>，并在保留<a href="<?php the_permalink() ?>" rel="bookmark">原文地址</a>
及作者的情况下<a href="<?php trackback_url(); ?>" rel="trackback">引用</a>到你的网站或博客。
<?php } elseif (('open' == $post-> comment_status) && !('open' == $post->ping_status)) { ?>

<?php } ?></li>
<li>本文链接: <a href="<?php the_permalink() ?>" rel="bookmark" title="本文固定链接 <?php the_permalink() ?>"><?php the_title(); ?> | <?php bloginfo('name');?></a></li>
<li><?php the_tags('文章标签: ', ', ', ''); ?></li>
<li>版权所有: <a href="<?php echo get_option('home'); ?>/"><?php bloginfo('name'); ?></a>-转载请标明出处</li>
<li>欢迎关注微信公众平台(搜索Leez或者扫描以下二维码)：<br><img  src="http://img1.ph.126.net/oBuzg6dgTVufIhUIBCijOw==/6608919203468978410.jpg"></li>