<?php
//Call the template header
get_header(); ?>

<section id="main" class="page_container" role="main">
	<div class="content_container row">
		<div id="main_venue_events" class="content columns large-8">
			<?php $venue_id = get_queried_object_id(); ?>
       	
	       	<header class="title">  
	       		<h2><?php printf( __( 'Events at: %s', 'sigmatheme' ), '<span>' .eo_get_venue_name($venue_id). '</span>' );?></h2>
			</header>

			<!-- Display the venue map. If you specify a class, ensure that class has height/width dimensions-->
			<?php echo eo_get_venue_map( $venue_id, array('width'=>"100%") ); ?>
			
			<?php if( $venue_description = eo_get_venue_description( $venue_id ) ){
				 echo '<div class="venue-archive-meta">'.$venue_description.'</div>';
			} ?>

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
					</div>
				</article>
	        
	        	<hr />
	        <?php endif; ?>
		</div>
		<?php get_sidebar(); ?>
	</div>
</section>

<?php get_footer(); ?>