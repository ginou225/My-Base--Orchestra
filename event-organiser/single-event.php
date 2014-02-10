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
 *
 *
 * @package Event Organiser (plug-in)
 * @since 1.0.0
 */
get_header();  //the Header

	$day = 'd';
	$mon = 'M';
	$date_format = 'F jS, Y'; 
	$date_time = 'F jS Y ' . get_option('time_format');

	$address_details = eo_get_venue_address();
	$street = $address_details['address'];
	$city = $address_details['city'];
	$state = $address_details['state'];
	$zip = $address_details['postcode'];
	$full_address = $street . " , " . $city . " , " . $state . " " . $zip;


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
					<section class="event_details clearing">
				        <div class="event_data">
				            <span class="event_ind">
					            <i class="fa fa-bars fa-lg"></i>
				            </span>
				            <div class="event_summary">
					            <h3 class="title">Event Details</h3>
				           		<?php the_content(); ?>
						    </div>
				        </div>
			       </section>
			        <!-- /event summary -->

			        <!-- event specifics -->
			        <section class="event_specifics row collapse">
				        <div class="columns small-6 large-6">
				            <div class="event_data">
					            <span class="event_ind">
					                <i class="fa fa-clock-o fa-lg"></i>
					            </span>
					            <div class="event_summary">
					                <h4 class="title">Time</h4>
					                <p class="summary">
						            <?php if( eo_reoccurs() ):?>
										<!-- Event reoccurs - is there a next occurrence? -->
										<?php $next =   eo_get_next_occurrence($date_format);?>

										<?php if($next): ?>
											<!-- If the event is occurring again in the future, display the date -->
											<?php printf(__('This event is running from <strong>%1$s</strong> until <strong>%2$s</strong>.
											The next date is <strong>%3$s</strong>','eventorganiser').'.', eo_get_schedule_start('F jS Y'), eo_get_schedule_last('F jS Y'), $next);?>
								
										<?php else: ?>
											<!-- Otherwise the event has finished (no more occurrences) -->
											<?php printf('<p>'.__('This event finished on %s','eventorganiser').'.</p>', eo_get_schedule_last('F Y',''));?>
										<?php endif; ?>
									<?php else: ?>
										<strong><?php _e('Start', 'eventorganiser') ;?>:</strong> <?php eo_the_start($date_time); ?>
									<?php endif; ?>
									</p>
					            </div>
				            </div>
			            </div>
			            <div class="columns small-6 large-6">
				            <div class="event_data">
					            <span class="event_ind">
						            <i class="fa fa-tag fa-lg"></i>
					            </span>
				            <div class="event_summary">
					            <h4 class="title">Location</h4>
					            <p class="summary">
					          	<?php echo $full_address; ?>
					          	</p>
				            </div>
			            </div>
			          </div>
			        </section>
				    <!-- /event specifics -->

				    <!-- Does the event have a venue? -->
					<?php if( eo_get_venue() ): ?>
					<!-- Display map -->
					<section class="event_map columns large-12">
						<?php echo eo_get_venue_map(eo_get_venue(),array('width'=>'100%')); ?>
					</section>
					<?php endif; ?>

					<!-- event cats / tags -->
					<section class="event_specifics row collapse">
				        <div class="columns small-6 large-6">
				            <div class="event_data">
					            <span class="event_ind">
					                <i class="fa fa-star fa-lg"></i>
					            </span>
					            <div class="event_summary">
						            <p class="summary"><?php _e('Categories','eventorganiser'); ?>:</strong> <?php echo get_the_term_list( get_the_ID(),'event-category', '', ', ', '' ); ?></p>
					            </div>
				            </div>
			            </div>
			            <div class="columns small-6 large-6">
				            <div class="event_data">
					            <span class="event_ind">
						            <i class="fa fa-tags fa-lg"></i>
					            </span>
				            <div class="event_summary">
					        	<p class="summary"><?php _e('Tags','eventorganiser'); ?>:</strong> <?php echo get_the_term_list( get_the_ID(),'event-tag', '', ', ', '' ); ?></p>
				            </div>
			            </div>
			          </div>
			        </section>
					<!-- /event cats / tags -->


				</div>
			</article>
			<!-- /event article -->
		</div>
		<!-- /content -->

		<?php get_sidebar(); ?>
	</div>
</section>
    
<?php get_footer(); ?>