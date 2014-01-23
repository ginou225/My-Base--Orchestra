<?php
/*
 * The template for displaying posts in the Image post format
 */
?>

<article id="post-<?php the_ID(); ?>" <?php hybrid_post_attributes(); ?>>
	<figure class="featured entry_video th">
		<?php the_post_thumbnail(); ?>
	</figure>

	<header class="entry_head">
		<h1 class="entry_title"><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h1>
	</header>
	<!-- /entry-header -->

	<?php //get_template_part( 'templates/partials/inc', 'meta' ); ?>

	<div class="entry-content">
		<?php the_content();?>
	</div>
	<!-- /entry-content -->
</article>
<!-- /post -->
