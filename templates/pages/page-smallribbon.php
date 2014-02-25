<!-- Small Ribbon content -->
<div id="smallRibbonContainer" class="small_ribbon">
	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

	<?php if ( 'quote' == get_post_format() ) { ?>
	
    	<?php get_template_part('templates/partials/content', 'quote'); ?>

	<?php } else { ?>

		<!-- ********* small ribbon ********* -->
		<article id="post-<?php the_ID(); ?>" <?php post_class('post_ribbon_small row') ?>>
			<section class="columns large-12">
				<div class="post_head row">
					<?php if ( has_post_thumbnail() ) { ?>
					<div class="columns large-4">
						
				        <div class="post_head">
				            <!-- thumbnail -->
				            <figure class="post_thumb post-image ImageWrapper BackgroundS clip th">
								<?php the_post_thumbnail('post-image-small'); ?>
				                <div class="ImageOverlayH"></div>
				                <div class="Buttons StyleC">
				                    <span class="WhiteRounded">
				                		<a href="<?php the_permalink(); ?>"><i class="fa fa-link fa-lg"></i></a>
				                	</span>
				                </div>
				            </figure>
				            <!-- /thumbnail -->   
				        </div>
				        
				    </div>

				    <div class="columns large-8">
						<header class="post_title">
		                	<h3 class="title">
			            		<a href="<?php the_permalink(); ?>" title=""><?php the_title(); ?></a>
			          		</h3>
		                </header>	

		                <div class="entry excerpt">
		                	<p>
		                		<?php the_excerpt(); ?>
		                	</p>
		                </div>
						<br/>
		                <footer class="small_ribbon_footer row">
		                	<div class="columns small-5 large-5">
		                		<ul class="button-group">
		                			<li>
		                				<div class="format_icon">
							                <?php get_template_part( 'templates/includes/inc', 'post-format-icon' ); ?>
							            </div>
		                			</li>
		                			<li><a href="<?php the_permalink(); ?>" class="button small">read more...</a></li>
		                		</ul>
		                	</div>
		                	<div class="columns small-7 large-7 meta_vertical">
		                		<ul class="meta inline-list right">
									<li class="author">
										<span><i class="fa fa-user"></i> <?php the_author() ?></span>
									</li>
									<li class="cat">
										<span><i class="fa fa-star"></i> 
															        	<?php
												$category = get_the_category();
												if ($category) {
												  echo '<a href="' . get_category_link( $category[0]->term_id ) . '" title="' . sprintf( __( "View all posts in %s" ), $category[0]->name ) . '" ' . '>' . $category[0]->name.'</a> ';
												}
											?></span>
									</li>
								</ul>
		                	</div>
		                </footer>
		            </div>
		            <?php } else { ?>

		            <div class="columns large-12">
						<header class="post_title">
		                	<h3 class="title">
			            		<a href="<?php the_permalink(); ?>" title=""><?php the_title(); ?></a>
			          		</h3>
		                </header>	

		                <div class="entry excerpt">
		                	<p>
		                		<?php the_excerpt(); ?>
		                	</p>
		                </div>
						<br/>
		                <footer class="small_ribbon_footer row">
		                	<div class="columns small-4 large-4">
		                		<ul class="button-group p_relative">
		                			<li>
		                				<div class="format_icon">
							                <?php get_template_part( 'templates/includes/inc', 'post-format-icon' ); ?>
							            </div>
		                			</li>
		                			<li><a href="<?php the_permalink(); ?>" class="button small">read more...</a></li>
		                		</ul>
		                	</div>
		                	<div class="columns small-8 large-8 meta_vertical">
		                		<ul class="meta inline-list right">
									<li class="author">
										<span><i class="fa fa-user"></i> <?php the_author() ?></span>
									</li>
									<li class="cat">
										<span><i class="fa fa-star"></i> 
															        	<?php
												$category = get_the_category();
												if ($category) {
												  echo '<a href="' . get_category_link( $category[0]->term_id ) . '" title="' . sprintf( __( "View all posts in %s" ), $category[0]->name ) . '" ' . '>' . $category[0]->name.'</a> ';
												}
											?></span>
									</li>
								</ul>
		                	</div>
		                </footer>
		            </div>
		        	<?php } ?>
				</div>
			</section>
		</article>
		<!-- ********* /small ribbon ********* -->
		
	<?php } ?>

	<?php endwhile; ?>
	<?php else : ?>

	<article>
		<h1>Not Found</h1>
	</article>

	<?php endif; ?>
</div>
<!-- /Small Ribbon content -->