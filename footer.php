<?php
	global $mb_base;

	$street = $mb_base['street_address'];
	$city   = $mb_base['city'];
	$state  = $mb_base['us_state'];
	$zip    = $mb_base['zip_code'];
	$phone  = $mb_base['phone_number'];
	$cs     = $city . ", " .$state;
?>			
			<div class="main_footer_container full_width">
		        <footer class="main_footer row">
					<div class="logo_container large-12">
						<h1 class="site_title">
							<a href="<?php echo home_url( '/' ); ?>" class="logo logo_small ir"><?php bloginfo( 'name' ); ?></a>
						</h1>
					</div>
			        
		           
		        </footer>

		        <!-- footer credits -->
		        <div class="credits_container full_width">
		        	<div class="footer_credits row">
						<div class="footer_site_nav columns large-6 show-for-medium-up">
							<?php
								$defaults = array(
									'theme_location'  => 'footer',
									'menu'            => '',
									'container'       => 'nav',
									'container_class' => 'menu footer_nav',
									'container_id'    => 'footer_navigation',
									'menu_class'      => '',
									'menu_id'         => '',
									'echo'            => true,
									'depth'           => 0,
								);
								wp_nav_menu( $defaults );
							?>
							<?php //dynamic_sidebar( 'Footer' ); ?>	
						</div>
						<div class="columns large-6">
							<div class="social_container right">
								<?php get_template_part('templates/includes/inc', 'sociallist'); ?>
							</div>
							<div class="copyright right">
								<p>&copy; <?php echo date( "Y" ); echo " "; bloginfo( 'name' ); ?> </p>
							</div>	
						</div>
					</div>
		        </div>
		        <!-- /footer credits -->
	      	</div>


		<!-- Off Canvas Menu -->
		<aside class="left-off-canvas-menu">
			<div class="mobile_search">
				<?php get_search_form(); ?>
			</div>
		    <?php
				$defaults = array(
					'theme_location'  => 'mobile',
					'menu'            => '',
					'container'       => 'nav',
					'container_class' => 'mobile_nav',
					'container_id'    => 'mobile_navigation',
					'menu_class'      => '',
					'menu_id'         => '',
					'echo'            => true,
					'depth'           => 2,
				);
				wp_nav_menu( $defaults );
			?>
		</aside>

		<!-- close the off-canvas menu -->
		<a class="exit-off-canvas"></a>	

  		</div>
		<!-- /wrap -->
	</div>
	<?php wp_footer(); ?>

</body>
</html>