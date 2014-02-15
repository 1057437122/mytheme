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
<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/slides.jquery.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/leez.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/prettify.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/prettify.min.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/atooltip.jquery.js"></script>
<script type="text/javascript">
window.onload = function(){prettyPrint();};
</script>
<script>
// Slides
$(document).ready(function(){
	$(".slides").slides({
		play:7000,
		pause:500,
		slideSpeed:1200,
		hoverPause:true,
		animationStart:function(current){
			$(".caption").animate({
				bottom:-90
			},200);
			if(window.console&&console.log){
				console.log("animationStart on slide:",current);
			};
		},animationComplete:function(current){
			$(".caption").animate({
				bottom:0
			},500);
			if(window.console&&console.log){
				console.log("animationComplete on slide:",current);
			};
		},slidesLoaded:function(){
			$(".caption").animate({
				bottom:0
			},200);
		}
	});
});
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

      
