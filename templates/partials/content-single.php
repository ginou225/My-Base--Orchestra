<?php
/**
 * The template used for displaying page content in single.php
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<header class="entry_head">
		<h1 class="entry_title"><?php the_title(); ?></h1>
	</header>

	<?php get_template_part( 'templates/partials/inc', 'meta' ); ?>

	<div class="entry">

		<?php the_content(); ?>

		<?php wp_link_pages( array( 'before' => 'Pages: ', 'next_or_number' => 'number' ) ); ?>

		<?php the_tags( 'Tags: ', ', ', ''); ?>

	</div>

	<?php get_template_part( 'templates/partials/inc', 'socialbuttons' ); ?>

</article>
