<?php 

/*
Template Name: Home Page Lynn
*/

global $mb_base;
$newsletter = $mb_base['newsletter'];

get_header(); ?>

<section id="main" class="page_container" role="main">
	<!-- newsletter -->
    <div class="newsletter_container full_width">
        <div class="newsletter p_relative row">
        	<span class="ornates left ">left</span>
        	<span class="ornates right">right</span>
          	<form name="ccoptin" id="ccoptin" action="http://visitor.constantcontact.com/d.jsp" target="_blank" method="post">
	            <div class="row">
	                <div class="large-3 columns">
		                <label for="right-label" class="right inline">Gut Truster's Newsletter</label>
	                </div>
	                <div class="large-7 columns">
		                <input type="text" id="ea" placeholder="Signup for the Intuition Newsletter">
	                    <input name="m" id="m" value="<?php echo $newsletter; ?>" type="hidden">		
	            	    <input name="p" id="p" value="oi" type="hidden">
	                </div>
	                <div class="large-2 columns">
		                <input class="button small postfix" type="submit" id="right-label" value="Sign Up">
	                </div>
	            </div>
          	</form>
        </div>
    </div>
    <!-- /newsletter -->

    <!-- recent posts -->
    <section class="section_block full_width">
        <div class="row">
	        <div class="large-12 columns">
	            <div class="row">
		            <div class="large-3 columns">
		                <header class="section_title">
			                <h3><a href="#">Block Title</a></h3>
		                </header>

		                <div class="excerpt">
			                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Alias, illo optio minima quos atque cupiditate porro eaque esse magni. Repudiandae, laboriosam, ratione. Laboriosam, doloremque, soluta voluptatum earum recusandae illo voluptates.</p>
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
							// 'tax_query' => array(
							//     array(
							//         'taxonomy' => 'post_format',
							//         'field' => 'slug',
							//         'terms' => array('post-format-video')
							//     ))
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
					                   <?php get_template_part( 'templates/includes/inc', 'post-format-icon' ); ?>
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

						</div>

					

					<?php endwhile; ?>
					<?php wp_reset_postdata(); ?>
	            </div>
	        </div>
        </div>
    </section>
    <!-- /recent posts -->
</section> 
<?php get_footer(); ?>