<?php
//Call the template header
get_header(); ?>

<section id="main" class="page_container" role="main">
	<div class="content_container row">
		<div id="main_event_tags" class="content columns large-8">
			
			<!-- If the category has a description display it-->
			<?php
				$category_description = category_description();
				if ( ! empty( $category_description ) )
					echo '<div class="category-archive-meta">' . $category_description . '</div>';
			?>

			<?php if ( have_posts() ): ?>
		        <?php while ( have_posts() ) : the_post(); ?>
	                        
					<?php eo_get_template_part('partials/content-event', 'hblock'); ?> 

	        	<?php endwhile; ?>
	        	<!--  End the Loop -->
				
				<?php get_template_part( 'templates/includes/inc', 'pagination' ); ?> 
				
	        <?php else: ?>
	        
	        	<article id="post-0" class="post no-results not-found">
					<header class="entry-header">
						<h3><?php _e( 'Nothing Found', 'mb_base' ); ?></h3>
					</header>

					<div class="entry-content">
						<p><?php _e( 'Apologies, but no results were found for the requested archive', 'mb_base' ); ?></p>
					</div>
				</article>
	        
	        <?php endif; ?>

		</div>
		<?php get_sidebar(); ?>
	</div>
</section>
<?php get_footer(); ?>