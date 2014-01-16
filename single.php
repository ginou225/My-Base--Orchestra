<?php get_header(); ?>

<section id="main" class="page_container" role="main">
	<div class="content_container row">
		<!-- content -->
		<div class="content columns large-8">
			<?php while ( have_posts() ) : the_post(); ?>

				<?php get_template_part( 'templates/partials/content', 'single' ); ?>

				<?php comments_template(); ?>

			<?php endwhile; ?>
		</div>
		<!-- /content -->

		<?php get_sidebar(); ?>
	</div>
</section> 

<?php get_footer(); ?>
