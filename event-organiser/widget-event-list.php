<?php
/**
 * The template is used for displaying the Event List widget if the placeholder option isn't used.
 *
 * You can use this to edit how the output of the event list widget. For the shortcode [eo_events] see shortcode-event-list.php
 *
 * For a list of available functions (outputting dates, venue details etc) see http://wp-event-organiser.com/documentation/function-reference/
 *
 ***************** NOTICE: *****************
 *  Do not make changes to this file. Any changes made to this file
 * will be overwritten if the plug-in is updated.
 *
 * To overwrite this template with your own, make a copy of it (with the same name)
 * in your theme directory. See http://wp-event-organiser.com/documentation/editing-the-templates/ for more information
 *
 * WordPress will automatically prioritise the template in your theme directory.
 ***************** NOTICE: *****************
 *
 * @package Event Organiser (plug-in)
 * @since 1.7
 */
global $eo_event_loop,$eo_event_loop_args;

//Date % Time format for events
$date_format = get_option('date_format');
$time_format = get_option('time_format');

//The list ID / classes
$id = $eo_event_loop_args['id'];
$classes = $eo_event_loop_args['class'];

?>

<section class="aside_posts">
	<?php if( $eo_event_loop->have_posts() ): ?>
	
		<ul id="<?php echo esc_attr($id);?>" class="<?php echo esc_attr($classes);?> side-nav"> 
	
			<?php while( $eo_event_loop->have_posts() ): $eo_event_loop->the_post(); ?>
	
				<?php 
					//Generate HTML classes for this event
					$eo_event_classes = eo_get_event_classes(); 
	
					//For non-all-day events, include time format
					$format = ( eo_is_all_day() ? $date_format : $date_format.' '.$time_format );
				?>
	
				
				<li class="<?php echo esc_attr(implode(' ',$eo_event_classes)); ?> event_landing" >
					<header class="eo-date-container event_header clearing">
						<div class="block_date_container blocked" style="background-color: <?php echo eo_get_event_color(); ?>;">
							<div class="block_date text-center">
								<span class="eo-date-day day">
									<?php eo_the_start( 'd'); ?>
								</span>
								<span class="eo-date-month month">
									<?php eo_the_start( 'M'); ?>
								</span>
							</div>
						</div>

						<div class="event_title">
							<h6 class="title"><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" ><?php the_title(); ?></a></h6>
						</div>
					</header>
				</li>
	
			<?php endwhile; ?>
	
		</ul>
	
	<?php elseif( ! empty($eo_event_loop_args['no_events']) ): ?>
	
		<ul id="<?php echo esc_attr($id);?>" class="<?php echo esc_attr($classes);?>" > 
			<li class="eo-no-events" > <?php echo $eo_event_loop_args['no_events']; ?> </li>
		</ul>
	
	<?php endif; ?>
</section>

