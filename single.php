<?php get_header(); ?>

<section id="main" class="page_container" role="main">
	<div class="content_container row">
		<!-- content -->
		<div class="content columns medium-8 large-8">
			<?php while ( have_posts() ) : the_post(); ?>
				
				<?php get_template_part( 'templates/partials/content', get_post_format()  ); ?>
			
				<?php comments_template(); ?>
				
			<?php endwhile; ?>
		</div>
		<!-- /content -->

		<?php get_sidebar(); ?>
	</div>
</section> 

<?php get_footer(); ?>
