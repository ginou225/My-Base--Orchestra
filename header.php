<!DOCTYPE html>
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" <?php language_attributes(); ?>> <!--<![endif]-->
<head>
	<?php
		global $mb_base;
		$favicon = $mb_base['favicon']['thumbnail']; 
	?>
	<meta charset="utf-8">
	<title><?php wp_title(''); ?></title>
	<meta name="viewport" content="width=device-width">
	<?php if ($favicon) {?>
		<link rel="shortcut icon" href="<?php echo $favicon; ?>">	
	<?php } else { ?>
		<link rel="shortcut icon" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/favicon.ico">
	<?php } ?>
	<?php wp_head(); ?>
</head>

<body <?php body_class('hide-extras'); ?>>

	<div id="main-container" class="off-canvas-wrap">

		<div class="inner-wrap">

			<div class="main_header_container">
				<header class="master_head hide-for-medium-up">
					<a class="left-off-canvas-toggle" >Menu</a> 
				</header>
				
				<header class="main_header row">
						        <div class="columns medium-5 large-5">
						        	<h1 class="site_title">
										<a href="<?php echo home_url( '/' ); ?>" class="logo logo_main_org ir"><?php bloginfo( 'name' ); ?></a>
									</h1>
						        </div>
						        <div class="columns medium-7 large-7">
									header right
						        </div>
						    </header>
			</div>

			<div class="master_nav full_width show-for-large-up" data-magellan-expedition="fixed">
				<div class="row">
					<div class="site_nav column medium-8 large-8">
						<?php
							$defaults = array(
								'theme_location'  => 'primary',
								'menu'            => '',
								'container'       => 'nav',
								'container_class' => 'menu main_nav',
								'container_id'    => 'main_navigation',
								'menu_class'      => 'sur-menu',
								'menu_id'         => '',
								'echo'            => true,
								'fallback_cb'     => 'wp_page_menu',
							);
							wp_nav_menu( $defaults );
						?>
					</div>
					<div class="column medium-4 large-4">
						<?php get_search_form(); ?>
						<div class="social_container right p_absolute">
							<?php get_template_part('templates/includes/inc', 'sociallist'); ?>
						</div>
					</div>
				</div>
			</div>
			
			<?php if(! is_front_page() ) { ?> 
			<div class="page_title_container full">
				<div class="row">
					<section class="columns medium-8 large-8">
						<h1 class="page_title">
							<?php get_template_part('templates/includes/inc', 'pagetitle'); ?>
						</h1>
					</section>
					<section class="columns medium-4 large-4">
						title right
					</section>
				</div>
			</div>
			<?php } ?>
