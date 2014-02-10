<?php get_header(); 
	global $mb_base;
?>

<section id="main" class="page_container" role="main">
	<div class="content_container row">
		<!-- content -->
		<div class="content columns large-8">
			<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
			<article class="post" id="post-<?php the_ID(); ?>">

				<div class="entry">
					<?php the_content(); ?>
					<?php wp_link_pages( array( 'before' => 'Pages: ', 'next_or_number' => 'number' ) ); ?>
				</div>

			</article>
			<?php endwhile; endif; ?>
		</div>
		<!-- /content -->

		<?php get_sidebar(); ?>
	</div>
</section> 
<!-- /#main -->

<?php get_footer(); ?>
