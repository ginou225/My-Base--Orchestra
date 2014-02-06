<?php
/**
 * @package WordPress
 * @subpackage mb_base
 *
 * Displays content for a single post / page / post type
 */
/**
 * The template for displaying a single event
 *
 * Please note that since 1.7, this template is not used by default. You can edit the 'event details'
 * by using the event-meta-event-single.php template.
 *
 * Or you can edit the entire single event template by creating a single-event.php template
 * in your theme. You can use this template as a guide.
 *
 * For a list of available functions (outputting dates, venue details etc) see http://wp-event-organiser.com/documentation/function-reference/
 *
 *
 * @package Event Organiser (plug-in)
 * @since 1.0.0
 */
get_header();  //the Header

the_post();
?>

<section id="main" class="page_container" role="main">
	<div class="content_container row">
		<!-- content -->
		<div class="content columns large-8">
			<!-- event article -->
			<article id="post-<?php the_ID(); ?>" class="event_landing row">
				<div class="columns large-12">
					<!-- event header -->
					<header class="event_header clearing">
				        <div class="block_date_container">
				            <div class="block_date text-center">
					            <span class="day">12</span>
					            <span class="month">may</span>
				            </div>
				        </div>

				        <div class="event_title">
		           			<h2 class="title"><?php the_title(); ?></h2>
					        <?php eo_get_template_part('event-meta','event-head'); ?>
				        </div>
			        </header>
					<!-- /event header -->
				</div>
			</article>
			<!-- /event article -->
		</div>
		<!-- /content -->

		<?php get_sidebar(); ?>
	</div>
</section> 

<div class="content">
	<div class="two-thirds column alpha">
       <div class="main"> 
                        
        
        
        
     
      </div>  <!-- End Main -->
	</div>  <!-- End two-thirds column -->
</div><!-- End Content -->
    
<?php get_footer(); ?>