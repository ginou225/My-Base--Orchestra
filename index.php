<?php get_header(); ?>

<section id="main" class="page_container" role="main">
	<div class="content_container row">
		<!-- content -->
		<div class="content columns large-8">
			<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

				<?php get_template_part( 'templates/partials/content', get_post_format() ); ?>

			<?php endwhile; ?>

			<?php get_template_part( 'templates/partials/inc', 'nav' ); ?>

			<?php else : ?>

			<article>
				<h1>Not Found</h1>
			</article>

			<?php endif; ?>
		</div>
		<!-- /content -->

		<?php get_sidebar(); ?>
	</div>
</section> 
<!-- /#main -->

<?php get_footer(); ?>
