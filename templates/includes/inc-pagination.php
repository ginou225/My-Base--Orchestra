<div class="row loop-pagination">
	<?php 
		if ( !is_singular() && current_theme_supports( 'loop-pagination' ) ) 
			loop_pagination( array(
				'before' => '<div class="pagination textcenter">', // Begin loop_pagination() arguments.
				'after' => '</div>',
			)
				
		); 
	?>
</div>