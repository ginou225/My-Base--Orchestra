<?php
//Call the template header
get_header(); ?>

<section id="main" class="page_container" role="main">
	<div class="content_container row">
		<?php eo_get_template_part('partials/content-event', 'loop'); ?>
	</div>
</section>  

<?php get_footer(); ?>