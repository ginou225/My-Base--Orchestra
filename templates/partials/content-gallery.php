<?php
/*
 * The template for displaying posts in the Gallery post format
 */
?>

<article id="post-<?php the_ID(); ?>" <?php hybrid_post_attributes(); ?>>
	<figure class="featured entry_gallery">
		<?php
			$args = array(
			'post_parent' => $post->ID,
			'post_type' => 'attachment',
			'post_mime_type' => 'image',
			'posts_per_page' => -1,
			'orderby' => 'menu_order',
			'order' => 'ASC',
			);
		 
			$attachments = get_posts( $args );	

			if ($attachments) {
				echo '<ul class="gallery" data-orbit>';
				foreach ($attachments as $attachment) {
					echo '<li>' . wp_get_attachment_image($attachment->ID, 'full') . '</li>';
				}
				echo '</ul>';
			}
		?>	
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
