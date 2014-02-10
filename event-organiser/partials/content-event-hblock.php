<?php
/**
 * @package WordPress
 * @subpackage mb_base
 *
 * The template for displaying event loop
 *
 * Please note that since 1.7, this template is not used by default. You can edit the 'event details'
 * by using the event-meta-event-single.php template.
 *
 *
 *
 * @package Event Organiser (plug-in)
 * @since 1.0.0
 */

	$day = 'd';
	$mon = 'M';
	$date_format = 'F jS, Y'; 
	$date_time = 'F jS Y ' . get_option('time_format');
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('post_event');?>> 
	<!-- event header -->
    <header class="event_header collapsible clearing">
        <div class="block_date_container">
            <div class="block_date text-center">
	            <span class="day"><?php eo_the_start($day); ?></span>
	            <span class="month"><?php eo_the_start($mon); ?></span>
            </div>
        </div>

        <div class="event_title">
   			<h2 class="title"><?php the_title(); ?></h2>
	        <?php eo_get_template_part('event-meta','event-head'); ?>
        </div>
    </header>
    <!-- /event header -->

	<!-- event summary -->
    <section class="container">
        <div class="event_data">
            <span class="event_ind">
	            <i class="fa fa-bars fa-lg"></i>
            </span>
            <div class="event_summary">
	            <h3 class="title">Event Details</h3>
           		<?php the_excerpt(); ?>

           		<p><a href="<?php the_permalink(); ?>" class="button">View Event</a></p>
		    </div>
        </div>
    </section>
    <!-- /event summary -->
</article>