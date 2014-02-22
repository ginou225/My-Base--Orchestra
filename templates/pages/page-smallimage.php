<div id="smallImageContainer" class="content columns large-8">
	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

	<!-- ********* small image ********* -->
	<article id="post-<?php the_ID(); ?>" <?php post_class('post_image_small row') ?>>
		<?php if (has_post_thumbnail() ) { ?>
			<section class="columns large-4">
			<!-- thumbnail -->
            <figure class="post_thumb post-image ImageWrapper BackgroundS th">
                <?php 
					if ( has_post_thumbnail() ) {
						the_post_thumbnail('post-image-small');
					} 
				?>
                <div class="ImageOverlayH"></div>
		        <div class="Buttons StyleC">
                	<span class="WhiteRounded">
                		<a href="<?php the_permalink(); ?>"><i class="fa fa-link fa-lg"></i></a>
                	</span>
                </div>
            </figure>
            <!-- /thumbnail -->
		</section>
		<section class="columns large-8">
		<?php } else { ?>
		<section class="columns large-12">
		<?php } ?>
			<div class="entry_container">
				<div class="columns large-4">
					<?php get_template_part('templates/includes/inc', 'meta'); ?>	
				</div>
				<div class="columns large-8">
					<header class="post_title">
	                  <h4 class="title">
	                    <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?> "><?php the_title(); ?></a>
	                  </h4>
	                </header>	

	                <div class="entry excerpt">
	                	<?php the_excerpt(); ?>
	                </div>
					<br/>
	                <footer class="small_ribbon_footer row">
	                	<div class="columns small-6 large-6">
	                		<a href="<?php the_permalink(); ?>" class="button tiny">read more...</a>
	                	</div>
	                	<div class="columns small-6 large-6 textright">
	                		&nbsp;
	                	</div>
	                </footer>
				</div>
			</div>
		</section>
    </article>
	<!-- ********* /small image ********* -->

	<?php endwhile; ?>
	<?php else : ?>

	<article>
		<h1>Not Found</h1>
	</article>

	<?php endif; ?>
</div>
<!-- /small image content -->

<?php get_sidebar(); ?>