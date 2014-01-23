<?php get_header(); ?>

<section id="main" class="page_container" role="main">
	<div class="content_container row">
		<!-- content -->
		<div class="content columns large-8">

			<?php if ( have_posts() ) : ?>

				<h1>Search Results</h1>

				<ol class="search_results">	
					<?php while ( have_posts() ) : the_post(); ?>
					<li>
						<article <?php post_class() ?> id="post-<?php the_ID(); ?>">
							<h5><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>

							<?php get_template_part( 'templates/partials/inc', 'meta' ); ?>

							<div class="entry">
								<?php the_excerpt(); ?>
							</div>

						</article>
					</li>
					<?php endwhile; ?>
				</ol>

				<?php get_template_part( 'templates/partials/inc', 'nav' ); ?>

			<?php else : ?>
				<h1>No posts found.</h1>
			<?php endif; ?>

		</div>
		<!-- /content -->

		<?php get_sidebar(); ?>
	</div>
</section> 

<?php get_footer(); ?>
