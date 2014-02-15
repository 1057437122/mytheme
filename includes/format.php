
         <?php 	while (have_posts()) : the_post(); 	?>
		 <?php 
		 get_template_part( 'content', get_post_format() );
		 ?>
    <?php endwhile;wp_reset_query(); ?>
	<div class="clr"></div> 

		



 