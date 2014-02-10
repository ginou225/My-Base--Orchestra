<div class="event_meta">
	<?php if( eo_is_all_day() ){
		$date_format = 'F j Y'; 
	}else{
		$date_format = 'F j Y ' . get_option('time_format'); 
	} ?>
	
    <ul class="eo-event-meta inline-list">
		<li><span><i class="fa fa-clock-o"></i> <?php eo_the_start($date_format); ?></span></li>
	<?php if( eo_get_venue() ){ ?>
	    <li><span><i class="fa fa-map-marker"></i> <a href="<?php eo_venue_link(); ?>"><?php eo_venue_name(); ?></a></span></li>
	<?php } ?>
	    <li><span><a href=""><i class="fa fa-ticket"></i> Free</a></span></li>
    </ul>
</div>