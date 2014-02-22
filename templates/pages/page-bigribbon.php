<!-- Big Image content -->
<div id="bigRibbonContainer" class="content columns large-8">
	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

	<!-- ********* big ribbon ********* -->
	<article id="post-<?php the_ID(); ?>" <?php post_class('post_ribbon_big row') ?>>
		<section class="columns textcenter large-2 show-for-medium-up">
			<div class="format_icon">
	            <?php get_template_part( 'templates/includes/inc', 'post-format-icon' ); ?>
	        </div>
	        <div class="post_comment post_footer">
	        	<i class="fa fa-comments"></i>
	        	<?php // if ( ( comments_open() ) ) : ?>
				<span class="comments-link">
					<?php comments_popup_link( __( 'Comment' ), __( '1 Comment' ), __( '% Comments') );?>
				</span>
				<?php // endif; ?>
	        </div>	
		</section>
		<section class="columns large-10">
			<?php if ( has_post_thumbnail() ) { ?>
	        <div class="post_head">
	            <!-- thumbnail -->
	            <figure class="post_thumb post-image ImageWrapper BackgroundS clip th">
	                <?php get_the_image( array('size' => 'full') ); ?>
	                <div class="ImageOverlayH"></div>
	                <div class="Buttons StyleC">
	                    <span class="WhiteRounded">
	                		<a href="<?php the_permalink(); ?>"><i class="fa fa-link fa-lg"></i></a>
	                	</span>
	                </div>
	            </figure>
	            <!-- /thumbnail -->   
	        </div>
	        <?php } ?>
	        
	        <header class="post_title">
	          <h4 class="title">
	            <a href="<?php the_permalink(); ?>" title=""><?php the_title(); ?></a>
	          </h4>
	        </header>	

	        <div class="entry excerpt">
	        	<?php the_excerpt(); ?>
	        </div>
			<br/>
	         <footer class="big_ribbon_footer row">
	        	<div class="columns small-4 large-4">
	        		<a href="<?php the_permalink(); ?>" class="button tiny">read more...</a>
	        	</div>
	        	<div class="columns small-8 large-8 meta_vertical">
	        		<ul class="meta inline-list right">
						<li class="author"><i class="fa fa-user"></i> <?php the_author() ?></li>
						<li class="cat">
							<i class="fa fa-star"></i> 
				        	<?php
								$category = get_the_category();
								if ($category) {
								  echo '<a href="' . get_category_link( $category[0]->term_id ) . '" title="' . sprintf( __( "View all posts in %s" ), $category[0]->name ) . '" ' . '>' . $category[0]->name.'</a> ';
								}
							?>
						</li>
					</ul>
	        	</div>
	        </footer>
		</section>

	</article>
	<!-- ********* /big ribbon ********* -->

	<?php endwhile; ?>
	<?php else : ?>

	<article>
		<h1>Not Found</h1>
	</article>

	<?php endif; ?>
</div>
<!-- /Big Image content -->

<?php get_sidebar(); ?>