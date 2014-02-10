<?php
/**
 * @package WordPress
 * @subpackage mb_base
 *
 * The template for displaying event loop
 *
 * Please note that since 1.7, this template is not used by default. You can edit the 'event details'
 * by using the event-meta-event-single.php template.
 *
 *
 *
 * @package Event Organiser (plug-in)
 * @since 1.0.0
 */
?>

<div id="main_events" class="content columns large-12">
	<?php if ( have_posts() ): ?>
    <?php while ( have_posts() ) : the_post(); ?> 
                
    	<?php eo_get_template_part('partials/content-event', 'hblock'); ?>

	<?php endwhile; ?>
	<!--  End the Loop -->

	<?php get_template_part( 'templates/includes/inc', 'pagination' ); ?>
	
<?php else: ?>

	<article id="post-0" class="post no-results not-found">
		<header class="entry-header">
			<h3><?php _e( 'Nothing Found', 'sigmatheme' ); ?></h3>
		</header><!-- .entry-header -->

		<div class="entry-content">
			<p><?php _e( 'Apologies, but no results were found for the requested archive', 'sigmatheme' ); ?></p>
		</div><!-- .entry-content -->
	</article><!-- #post-0 -->

	<hr />
<?php endif; ?>
</div>