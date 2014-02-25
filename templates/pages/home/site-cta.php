<?php
  global $mb_base;

  $book = $mb_base['site-cta-book'];
  $sched = $mb_base['site-cta-schedule'];
?>

<ul class="site_cta inline-list right">
	<?php if($book == '1') { ?>
	<li class="book_lynn">
  		<a href="#">
			<div class="text">
				<i class="fa fa-microphone fa-lg"></i> Book Lynn today
			</div>
            <figure class="headshot">
                <img src="http://placehold.it/50x50/999999/ffffff" alt="">
            </figure>
        </a>   
	</li>
	<?php } ?>
	
	<?php if($sched == '1') { ?>
	<li>	
    	<a href="#">
    		<div class="text">
	  			<i class="fa fa-calendar fa-lg"></i> Schedule a Reading
	  		</div>
            <figure class="headshot">
                <img src="http://placehold.it/50x50/999999/ffffff" alt="">
            </figure>
        </a>  
	</li>
	<?php } ?>
</div>