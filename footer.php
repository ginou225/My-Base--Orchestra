			<footer class="master_foot full">
				<div class="row">
					<section class="columns large-12">
						<h1 class="site_title">
							<a href="<?php echo home_url( '/' ); ?>" class="logo"><?php bloginfo( 'name' ); ?></a>
						</h1>
					</section>
				</div>
				<div class="row">
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
						<p>&copy; <?php echo date( "Y" ); echo " "; bloginfo( 'name' ); ?></p>	
					</div>
				</div>	
			</footer>

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
