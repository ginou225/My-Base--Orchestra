<?php
/**
 * The template used for displaying masonry block with thumbnail
 */
?>

<!-- blog module -->
<article id="post-<?php the_ID(); ?>" <?php post_class('post_blog') ?> >
	<!-- post head -->
	<div class="post_head">
			<!-- thumbnail -->
		<figure class="post_thumb ImageWrapper BackgroundR">
	       	<?php the_post_thumbnail(); ?>
	        <div class="ImageOverlayH"></div>
	        <div class="Buttons StyleC">
	            <span class="WhiteRounded">
	            	<a href="<?php the_permalink(); ?>"><i class="fa fa-link"></i></a>
	            </span>
	        </div>
	  	</figure>
			<!-- /thumbnail -->
		
		<!-- format icon -->
	    <div class="format_icon img-circle">
	    	<span class="format">
		        <?php get_template_part( 'templates/includes/inc', 'post-format-icon' ); ?>
		    </span>
	    </div>
	    <!-- /format icon -->
	</div>
	<!-- /post head -->

	<!-- title -->
	<header class="post_title">
	    <h4 class="title textcenter">
	    	<a href="<?php the_permalink(); ?>" title=""><?php the_title(); ?></a>
	    </h4>
	</header>
	<!-- /title -->

	<!-- post footer -->
	<footer class="post_footer">
	    <div class="row">
	        <div class="columns small-6 large-7">
	        	<i class="fa fa-comments"></i> 
	        	<?php // if ( ( comments_open() ) ) : ?>
				<span class="comments-link"><?php comments_popup_link( __( 'Leave a comment' ), __( '1 Comment' ), __( '% Comments') ); ?></span>
				<?php // endif; ?>
	        </div>
	        <div class="columns small-6 large-5">
	        	<i class="fa fa-star"></i> 
	        	<?php
					$category = get_the_category();
					if ($category) {
					  echo '<a href="' . get_category_link( $category[0]->term_id ) . '" title="' . sprintf( __( "View all posts in %s" ), $category[0]->name ) . '" ' . '>' . $category[0]->name.'</a> ';
					}
				?>
	        </div>
	    </div>
	</footer>
	<!-- /post footer -->
</article>
<!-- end blog module -->