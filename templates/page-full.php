<?php
/*
Template Name: Full Page
*/
?>
<?php get_header(); ?>

<section id="main" class="page_container" role="main">
	<div class="content_container row">
		<!-- content -->
		<div class="content columns medium-12 large-12">

			<?php while ( have_posts() ) : the_post(); ?>

				<?php get_template_part( 'templates/partials/content', 'page' ); ?>

			<?php endwhile; ?>

		</div>
		<!-- /content -->

	</div>	
		
</section> 

<?php get_footer(); ?>
