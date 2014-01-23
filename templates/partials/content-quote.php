<?php
/**
 * The template for displaying posts in the Quote post format
 */
?>

<article id="post-<?php the_ID(); ?>" <?php hybrid_post_attributes(); ?>>
	<?php
		$src     = get_post_meta($post->ID, '_format_quote_source_name', true);
		$src_url = get_post_meta($post->ID, '_format_quote_source_url', true);
	?>
	<!-- ********* quote big  *********** -->
	<div class="quote_big row">
		<div class="columns large-2 textcenter">
			<i class="fa fa-quote-left fa-5x"></i>
		</div>
		<section class="columns large-10">
			<?php the_content(); ?>
			<footer>
				<cite class="right">
					<?php if ($src_url) {
						echo '<a href="' .$src_url. '"><strong>'. $src.'</strong></a>';
							} else {
						echo '<strong>' .$src. '</strong>';
						}
					?>	
				</cite>
			</footer>
		</section>
	</div>
	<!-- ********* quote big  *********** -->	
</article>
<!-- /post -->
