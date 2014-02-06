<div class="event_data">
	<?php if( eo_is_all_day() ){
		$date_format = 'F j Y'; 
	}else{
		$date_format = 'F j Y ' . get_option('time_format'); 
	} ?>
	
    <ul class="eo-event-meta inline-list">
    <?php if( !eo_reoccurs() ){ ?>
	    <li><i class="fa fa-clock-o"></i> <?php eo_the_start($date_format); ?></li>
	<?php } ?>
	<?php if( eo_get_venue() ){ ?>
	    <li><i class="fa fa-map-marker"></i> <a href="<?php eo_venue_link(); ?>"><?php eo_venue_name(); ?></a></li>
	<?php } ?>
	    <li><a href=""><i class="fa fa-tag"></i> Free</a></li>
    </ul>
</div>