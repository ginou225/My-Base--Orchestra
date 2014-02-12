<!DOCTYPE html>
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" <?php language_attributes(); ?>> <!--<![endif]-->
<head>
	<meta charset="utf-8">
	<title><?php wp_title(''); ?></title>
	<meta name="viewport" content="width=device-width">
	<link rel="shortcut icon" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/favicon.ico">
	<?php wp_head(); ?>
</head>

<body <?php body_class('hide-extras'); ?>>

	<div id="main-container" class="off-canvas-wrap">

		<div class="inner-wrap">

			<header class="master_head hide-for-medium-up">
				<a class="left-off-canvas-toggle" >Menu</a> 
			</header>

			<header class="master_head full show-for-large-up">
				<div class="row">
					<section class="columns large-6">
						<h1 class="site_title">
							<a href="<?php echo home_url( '/' ); ?>" class="logo"><?php bloginfo( 'name' ); ?></a>
						</h1>
					</section>
					<div class="columns large-6">
						<?php get_template_part('templates/includes/inc', 'sociallist'); ?>
					</div>
				</div>
			</header>

			<div class="master_nav full show-for-large-up" data-magellan-expedition="fixed">
				<div class="row">
					<div class="site_nav column large-9">
						<?php
							$defaults = array(
								'theme_location'  => 'primary',
								'menu'            => '',
								'container'       => 'nav',
								'container_class' => 'menu main_nav',
								'container_id'    => 'main_navigation',
								'menu_class'      => '',
								'menu_id'         => '',
								'echo'            => true,
								'fallback_cb'     => 'wp_page_menu',
							);
							wp_nav_menu( $defaults );
						?>
					</div>
					<div class="column large-3">
						<?php get_search_form(); ?>
					</div>
				</div>
			</div>
			
			<?php if(! is_page_template() ) { ?> 
			<div class="page_title_container full">
				<div class="row">
					<section class="columns large-8">
						<h1 class="page_title">
							<?php get_template_part('templates/includes/inc', 'pagetitle'); ?>
						</h1>
					</section>
					<section class="columns large-4"></section>
				</div>
			</div>
			<?php } ?>
