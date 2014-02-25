<?php 

/*
Template Name: Home Page Lynn
*/

global $mb_base;
$newsletter = $mb_base['newsletter'];
$sidekicks = $mb_base['site-sidekicks'];

get_header(); ?>

<section id="main" class="page_container" role="main">
	<!-- slider -->
	<div id="hero" class="hero_container p_relative full_width">
		<?php 
			get_template_part('templates/includes/inc', 'slide'); 
			if ($sidekicks == '1') {
			get_template_part('templates/pages/home/site', 'sidekicks'); 
			}
		?>
	</div>
	<!-- /slider -->

	<!-- newsletter -->
    <div class="newsletter_container full_width">
        <div class="newsletter p_relative row">
        	<span class="ornates left ">left</span>
        	<span class="ornates right">right</span>
          	<form name="ccoptin" id="ccoptin" action="http://visitor.constantcontact.com/d.jsp" target="_blank" method="post">
                <div class="large-3 columns">
	                <label for="right-label" class="right inline">Gut Truster's Newsletter</label>
                </div>
                <div class="large-7 columns">
	                <input type="text" id="ea" placeholder="Signup for the Intuition Newsletter">
                    <input name="m" id="m" value="<?php echo $newsletter; ?>" type="hidden">		
            	    <input name="p" id="p" value="oi" type="hidden">
                </div>
                <div class="large-2 columns">
	                <input class="button small postfix" type="submit" id="right-label" value="Sign Up">
                </div>
          	</form>
        </div>
    </div>
    <!-- /newsletter -->

    <!-- recent posts -->
    <section class="section_block full_width">
        <?php get_template_part('templates/pages/home/posts', 'recent'); ?>
    </section>
    <!-- /recent posts -->

    <!-- products -->
    <section class="section_block full_width">
    	<?php get_template_part('templates/pages/home/posts', 'product'); ?>
    </section>
    <!-- /products -->

    <!-- recent videos -->
    <section class="section_block full_width">
    	<?php get_template_part('templates/pages/home/posts', 'video'); ?>
    </section>
    <!-- /recent videos -->
</section> 
<?php get_footer(); ?>