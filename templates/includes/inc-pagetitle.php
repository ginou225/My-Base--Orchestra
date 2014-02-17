<h1 class="page_header_main">
	<?php
		if ( is_category() ) {
			printf( __( 'Category: %s', 'mb' ), '<span>' . single_cat_title( '', false ) . '</span>' );

		} elseif ( is_tag() ) {
			printf( __( 'Tag: %s', 'mb' ), '<span>' . single_tag_title( '', false ) . '</span>' );

		} elseif ( is_author() ) {
			/* Queue the first post, that way we know
			 * what author we're dealing with (if that is the case).
			*/
			the_post();
			printf( __( 'Author: %s', 'mb' ), '<span class="vcard"><a class="url fn n" href="' . get_author_posts_url( get_the_author_meta( "ID" ) ) . '" title="' . esc_attr( get_the_author() ) . '" rel="me">' . get_the_author() . '</a></span>' );
			/* Since we called the_post() above, we need to
			 * rewind the loop back to the beginning that way
			 * we can run the loop properly, in full.
			 */
			rewind_posts();

		} elseif ( is_day() ) {
			printf( __( 'Daily Archives: %s', 'mb' ), '<span>' . get_the_date() . '</span>' );

		} elseif ( is_month() ) {
			printf( __( 'Monthly Archives: %s', 'mb' ), '<span>' . get_the_date( 'F Y' ) . '</span>' );

		} elseif ( is_year() ) {
			printf( __( 'Yearly Archives: %s', 'mb' ), '<span>' . get_the_date( 'Y' ) . '</span>' );

		// Events	
		} elseif ( eo_is_event_archive() || is_singular('event')  ) {
			_e('Events','mb_base');

		} elseif ( is_tax('event-venue') ) {
			echo _e('Events at','mb_base'), ": <span class=\"sub_title\">" .single_cat_title( '', false ) . "</span>";

		} elseif ( eo_is_event_taxonomy() ) {
			echo _e('Events','mb_base'), ": <span class=\"sub_title\">" .single_cat_title( '', false ) . "</span>";

		
		// Jigoshop
		} elseif (function_exists( 'jigoshop_init' ) || is_singular('product') ) {
			if ( is_tax('product_cat') && is_tax('product_tag') ) {
					$term =	$wp_query->queried_object;
					echo _e('Products','mb_base'), ": <span class=\"sub_title\">" .$term->name. "</span>";
				} else {
					echo _e('Products','mb_base');
				}

		} elseif ( is_post_type_archive() ) {
		    post_type_archive_title();

		} elseif (is_single() ) {
			$parent_title = get_the_title($post->post_parent);
			echo $parent_title;

		} elseif (is_home() ) {
			echo 'Blog';

		} else {
			//_e( 'Archives', 'mb' );
			the_title();
		}
	?>
</h1>