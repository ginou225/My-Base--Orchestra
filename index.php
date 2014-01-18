<?php get_header(); ?>

<section id="main" class="page_container" role="main">
	<div class="content_container row">
		<!-- content -->
		<div id="masonryContainer" class="content columns large-12">
			<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

				<?php //get_template_part( 'templates/partials/content', get_post_format() ); ?>

				<div class="masonry-brick">
         			<!-- blog module -->
         			<article id="post-<?php the_ID(); ?>" <?php post_class('post_blog') ?> >
            			<!-- post head -->
            			<div class="post_head">
              				<!-- thumbnail -->
		                	<figure class="post_thumb post-image background-scale">
			                   	<?php the_post_thumbnail(); ?>
			                    <div class="img-overlay pat-override"></div>
			                    <ol class="common-style">
			                        <!-- <li class="white-rounded"><a href=""><i class="fa fa-search"></i></a>
			                        </li> -->
			                        <li class="white-rounded">
			                        	<a href="<?php the_permalink(); ?>"><i class="fa fa-link"></i></a>
			                        </li>
			                    </ol>
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
			                    <div class="columns small-6 large-8">
			                    	<i class="fa fa-comments"></i> Comment
			                    </div>
			                    <div class="columns small-6 large-4">
			                    	<i class="fa fa-heart"></i> Likes
			                    </div>
			                </div>
		                </footer>
		                <!-- /post footer -->

          			</article>
          			<!-- end blog module -->
            	</div>

			<?php endwhile; ?>

			<?php get_template_part( 'templates/partials/inc', 'nav' ); ?>

			<?php else : ?>

			<article>
				<h1>Not Found</h1>
			</article>

			<?php endif; ?>
		</div>
		<!-- /content -->
	</div>
</section> 
<!-- /#main -->

<?php get_footer(); ?>
