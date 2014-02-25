<?php
	global $mb_base;
	$title_v = $mb_base['recent_v_title'];
	$brief =$mb_base['recent_v_editor'];
?>
<div class="row">
    <div class="large-12 columns">
        <div class="row">
            <div class="large-3 columns">
                <header class="section_title">
		            <h3 class="block_title">
	                	<?php if($title_v) {
	                		 echo $title_v;
	                	} else {
	                		echo "Recent Videos";
	                	} ?>
	                </h3>
                </header>

                <div class="excerpt">
	                <?php echo wpautop($brief); ?>
                </div>

                <footer class="section_footer">
	                <a href="#" class="button small">View All</a>    
                </footer>
            </div>	

            <?php // WP_Query arguments
				$args = array (
					'post_type'              => 'post',
					'post_status'            => 'published',
					'posts_per_page'         => '3',
					'ignore_sticky_posts'    => true,
					'order'                  => 'ASC',
					'orderby'                => 'date',
					'meta_query' => array(
						array('key' => '_thumbnail_id')
						),
					'tax_query' => array(
							array(
								'taxonomy' => 'post_format',
								'field' => 'slug',
								'terms' => array('post-format-video')
							))
				); 

				// The Query
				$recent = new WP_Query( $args );
			?>

			<?php while ( $recent->have_posts() ) : $recent->the_post(); ?> 

				<div class="large-3 columns">
					
					<!-- blog module -->
		 			<article id="post-<?php the_ID(); ?>" <?php post_class('post_blog') ?> >
		    			<!-- post head -->
		    			<div class="post_head">
		      				<!-- thumbnail -->
		                	<figure class="post_thumb clip ImageWrapper BackgroundS">
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
		                <footer class="post_footer textcenter">
			                <div class="row">
			                   <!--  <div class="columns small-6 large-7">
			                    	<i class="fa fa-comments"></i> 
			                    	<?php // if ( ( comments_open() ) ) : ?>
									<span class="comments-link"><?php comments_popup_link( __( 'Leave a comment' ), __( '1 Comment' ), __( '% Comments') ); ?></span>
									<?php // endif; ?>
			                    </div> -->
			                    <div class="columns small-12 large-12">
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

				</div>

			<?php endwhile; ?>
			<?php wp_reset_postdata(); ?>
        </div>
    </div>
</div>