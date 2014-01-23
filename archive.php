<?php get_header(); ?>

<section id="main" class="page_container" role="main">
	<div class="content_container row">
		<!-- content -->
		<div class="content columns large-8">

		<?php if ( have_posts() ) : ?>
			<?php
				if ( is_category() ) {
					// show an optional category description
					$category_description = category_description();
					if ( ! empty( $category_description ) )
						echo apply_filters( 'category_archive_meta', '<div class="taxonomy-description">' . $category_description . '</div>' );

				} elseif ( is_tag() ) {
					// show an optional tag description
					$tag_description = tag_description();
					if ( ! empty( $tag_description ) )
						echo apply_filters( 'tag_archive_meta', '<div class="taxonomy-description">' . $tag_description . '</div>' );
				}
			?>

			<?php while ( have_posts() ) : the_post(); ?>
				<article <?php post_class() ?>>

						<h1 id="post-<?php the_ID(); ?>">
							<a href="<?php the_permalink() ?>"><?php the_title(); ?></a>
						</h1>

						<?php get_template_part( 'templates/partials/inc', 'meta' ); ?>

						<div class="entry">
							<?php the_content(); ?>
						</div>

				</article>
			<?php endwhile; ?>

			<?php get_template_part( 'templates/partials/inc', 'nav' ); ?>

			<?php else : ?>

				<h1>Nothing found</h1>

			<?php endif; ?>

		</div>
		<!-- /content -->
		
		<?php get_sidebar(); ?>

	</div>
</section> 
<!-- /#main -->

<?php get_footer(); ?>
