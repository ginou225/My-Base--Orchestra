<?php get_header(); 
/**
 * The template for choosing a category layout
 */
	global $mb_base;
	$layout = $mb_base['category_layout'];
?>

<section id="main" class="page_container" role="main">
	<div class="content_container row">
		
		<?php if ($layout == 'masonry') { ?>

			<div class="content clearfix">
				<?php get_template_part('templates/pages/page', 'masonry'); ?>
			</div>

		<?php } else { ?>

			<!-- content -->
			<div class="content columns medium-8 large-8">
				<?php if ($layout == "big_ribbon") {
						get_template_part('templates/pages/page', 'bigribbon');
					} elseif ($layout == "small_ribbon") {
						get_template_part('templates/pages/page', 'smallribbon');
					} elseif ($layout == "big_image") {
						get_template_part('templates/pages/page', 'bigimage');
					} else {
						get_template_part('templates/pages/page', 'smallimage');
				} ?>
			</div>

			<!-- sidebar -->
			<?php get_sidebar(); ?>

		<?php } ?>

	</div>

	<?php get_template_part( 'templates/includes/inc', 'pagination' ); ?>
</section> 
<!-- /#main -->

<?php get_footer(); ?>
