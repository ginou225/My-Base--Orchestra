<?php
/**
 * The template used for displaying masonry page
 */
?>

<!-- masonry content -->
<div class="brick_container">
	<div id="masonryContainer" class="masonry_content">
		<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
			<div class="masonry-brick columns large-4">
	 			<?php if( has_post_thumbnail() ) {
	 				get_template_part('templates/pages/blocks/block', 'thumb-main');
	 			} elseif ( has_post_format( 'quote' ) ) {
	 				get_template_part('templates/pages/blocks/block', 'quote');
	 			} else {
	 				get_template_part('templates/pages/blocks/block', 'main');
	 			} ?>
	    	</div>
		<?php endwhile; ?>

		<?php else : ?>

		<article>
			<h1>Not Found</h1>
		</article>

		<?php endif; ?>
	</div>
</div>
<!-- /masonry content -->