<!-- Big Image content -->
<div id="bigImageContainer" class="content columns large-8">
	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

	<!-- ********* big image ********* -->
	<article id="post-<?php the_ID(); ?>" <?php post_class('post_image_big row') ?>>
		<div class="columns large-12">
			<!-- post -->
            <div class="post_head">
                <!-- thumbnail -->
                <figure class="post_thumb post-image background-scale clip th">
	                <?php 
						if ( has_post_thumbnail() ) {
						  get_the_image( array(
						  		'size' => 'full',
						  	)
						  );
						} 
					?>
	                <div class="img-overlay pat-override"></div>
	                <ol class="common-style pat-override">
	                	<li class="white-rounded">
	                		<a href="<?php the_permalink(); ?>"><i class="fa fa-link fa-lg"></i></a>
	                	</li>
	                </ol>
                </figure>
                <!-- /thumbnail -->
            </div>
            <!-- /post -->

            <div class="row">
				<section class="columns large-3 show-for-medium-up meta_horizontal">
					<?php get_template_part('templates/includes/inc', 'meta'); ?>			
				</section>
				<section class="columns large-9">
					<header class="post_title">
	                  <h4 class="title">
	                    <a href="<?php the_permalink(); ?>" title=""><?php the_title(); ?></a>
	                  </h4>
	                </header>	

	                <div class="entry excerpt">
	                	<?php the_excerpt(); ?>
	                </div>

	                <footer class="big_ribbon_footer row">
	                	<div class="columns small-6 large-6">
	                		<a href="<?php the_permalink() ?>" class="button tiny">read more...</a>
	                	</div>
	                	<div class="columns small-6 large-6 textright">
	                		&nbsp;
	                	</div>
	                </footer>
				</section>
			</div>
		</div>
 
    </article>
	<!-- ********* /big image ********* -->

	<?php endwhile; ?>
	<?php else : ?>

	<article>
		<h1>Not Found</h1>
	</article>

	<?php endif; ?>
</div>
<!-- /Big Image content -->

<?php get_sidebar(); ?>