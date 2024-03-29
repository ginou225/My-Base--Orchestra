<?php get_header(); ?>

<section id="main" class="page_container" role="main">
	<div class="content_container row">
		<!-- content -->
		<div class="content columns large-8">

			<article id="post-0" class="post error404 not-found">

				<h1>Oops! That page can&rsquo;t be found.</h1>

				<div class="entry">

					<p>It looks like nothing was found at this location. Maybe try heading back to the <a href="<?php echo home_url('/'); ?>">home page</a> or a search?</p>

					<?php get_search_form(); ?>

				</div>

			</article>
		</div>
		<!-- /content -->

		<?php get_sidebar(); ?>
	</div>
</section> 

<?php get_footer(); ?>
