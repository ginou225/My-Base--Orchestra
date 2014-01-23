<?php
/**
 * The template for displaying posts in the Link post format
 */
?>

<article id="post-<?php the_ID(); ?>" <?php hybrid_post_attributes(); ?>>

	<?php 
		$ext_url = get_post_meta($post->ID, '_format_link_url', true );
	?>

	<header class="entry_head">
		<h1 class="entry_title">
			<a href="<?php echo $ext_url; ?>" target="_blank"><?php the_title(); ?></a>
		</h1>
	</header>
	<!-- /entry-header -->

	<?php //get_template_part( 'templates/partials/inc', 'meta' ); ?>

	<div class="entry-content">
		<?php the_content();?>
	</div>
	<!-- /entry-content -->

</article>
<!-- #post-## -->
