<?php get_header(); 
	global $mb_base;
	$layout = $mb_base['blog_layout'];
?>



<section id="main" class="page_container" role="main">
	<div class="content_container row">

		<?php if ($layout == "masonry") { 
			get_template_part('templates/pages/page', 'masonry');
		}elseif ($layout == "big_image") {
			get_template_part('templates/pages/page', 'bigimage');
		} else {
			get_template_part('templates/pages/page', 'smallimage');
		} ?>
		<!-- small image content -->
		
	</div>

	<?php get_template_part( 'templates/includes/inc', 'pagination' ); ?>
</section> 
<!-- /#main -->

<?php get_footer(); ?>
