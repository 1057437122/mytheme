<div class="clr"></div>
	<div id="footer">
	<div class="footbg">
	<span>Copyright <?php echo comicpress_copyright(); ?>  <a href="<?php echo get_settings('Home'); ?>/"><?php bloginfo('name'); ?></a>保留所有权利.
   </span><br>
   Leez强力驱动｜<span>备案号：鲁ICP备13024783号-1</span>
	</div>
	</div>

</div>
</div>
<!-- 返回顶部 -->
<div style="display: none;" id="gotop"></div>
<!-- 返回顶部END -->

</body>
<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/jquery-1.10.2.min.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/reslider/js/jquery.tmpl.min.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/reslider/js/jquery.easing.1.3.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/reslider/js/jquery.elastislide.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/reslider/js/gallery.js"></script>
<noscript>
	<style>
		.es-carousel ul{
			display:block;
		}
	</style>
</noscript>
<script id="img-wrapper-tmpl" type="text/x-jquery-tmpl">	
	<div class="rg-image-wrapper">
		{{if itemsCount > 1}}
			<div class="rg-image-nav">
				<a href="#" class="rg-image-nav-prev">Previous Image</a>
				<a href="#" class="rg-image-nav-next">Next Image</a>
			</div>
		{{/if}}
		<div class="rg-image"></div>
		<div class="rg-loading"></div>
		<div class="rg-caption-wrapper">
			<div class="rg-caption" style="display:none;">
				<p></p>
			</div>
		</div>
	</div>
</script>

 <!--[if ie 6]>
	<script src="http://letskillie6.googlecode.com/svn/trunk/letskillie6.zh_TW.pack.js"></script>
<![endif]-->
<?php if ( is_singular()| is_page()){ ?><script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/comments-ajax.js"></script><?php } ?>
<!-- baidu tongju -->
<script type="text/javascript">
var _bdhmProtocol = (("https:" == document.location.protocol) ? " https://" : " http://");
document.write(unescape("%3Cscript src='" + _bdhmProtocol + "hm.baidu.com/h.js%3Fdbfc9134fbcb2084ff0ef0c9a19a3bea' type='text/javascript'%3E%3C/script%3E"));
</script>

<?php wp_footer(); ?>
</html>

      
