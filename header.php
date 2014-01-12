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

		    <a class="left-off-canvas-toggle" >Menu</a> 

		    <!-- Off Canvas Menu -->
		    <aside class="left-off-canvas-menu">
		        <!-- whatever you want goes here -->
		        <menu>
		        	<li><a href="#">Item 1</a></li>
		        	<li><a href="#">Item 1</a></li>
		        </menu>
		    </aside>

			<!-- close the off-canvas menu -->
			<a class="exit-off-canvas"></a>

			<header class="master-head full">
				<div class="row">
					<section class="columns">
						<h1 class="site_title">
							<a href="<?php echo home_url( '/' ); ?>" class="logo"><?php bloginfo( 'name' ); ?></a>
						</h1>
					</section>
					<div class="columns">222</div>
				</div>
			</header>

			<div class="main-nav full">
				<div class="row">
					<?php
						$defaults = array(
							'theme_location'  => 'primary',
							'menu'            => '',
							'container'       => 'nav',
							'container_class' => 'column',
							'container_id'    => 'main-nav',
							'menu_class'      => 'menu',
							'menu_id'         => '',
							'echo'            => true,
							'fallback_cb'     => 'wp_page_menu',
						);
						wp_nav_menu( $defaults );
					?>
					<div class="column">
						
					</div>
				</div>
			</div>
