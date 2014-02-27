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
		          <section class="address columns large-4">
		            <h1 class="site_title">
						<a href="<?php echo home_url( '/' ); ?>" class="logo"><?php bloginfo( 'name' ); ?></a>
					</h1>
		            <address class="vcard row">
		              <div class="adr columns small-6 large-6">
		                <span class="street-address"><?php echo $street; ?></span>
		                <span class="locality"><?php echo $cs; ?></span>  
		                <span class="postal-code"><?php echo $zip; ?></span> 
		              </div>
		              <div class="columns small-6 large-6">
		                <span class="tel">Tel: <?php echo "<a href=\"tel:" .$phone. "\">" . $phone . "</a>"; ?> </span>
		                <span class="tel">Tel: <a href="tel:6179640075">617-964-0075</a></span>
		              </div>
		            </address>
		          </section>
		          <section class="wallpapers columns large-4">
		            <div class="row">
		              <div class="columns small-6 large-6">
		                <figure class="th post_thumb ImageWrapper BackgroundR">
		                  <img src="http://placehold.it/200x200" alt="">
		                  <div class="ImageOverlayH"></div>
		                  <div class="Buttons StyleC">
		                      <span class="WhiteRounded"><a href=""><i class="fa fa-search"></i></a></span>
		                  </div>
		                </figure>
		              </div>
		              <div class="columns small-6 large-6">
		                <figure class="th post_thumb ImageWrapper BackgroundR">
		                  <img src="http://placehold.it/200x200" alt="">
		                  <div class="ImageOverlayH"></div>
		                  <div class="Buttons StyleC">
		                      <span class="WhiteRounded"><a href=""><i class="fa fa-search"></i></a></span>
		                  </div>
		                </figure>
		              </div>
		            </div>
		          </section>
		          <section class="newsletter columns large-4">
		            <form action="#">
		              <header>
		                <h2>Gut Trusters Blog</h2>
		              </header>
		              <div><input type="text" placeholder="Enter Email Address"></div>
		              <div><input type="submit" value="Subscribe" class="button full_width"></div>
		            </form>
		          </section>
		        </footer>

		        <!-- footer credits -->
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
						<p>&copy; <?php echo date( "Y" ); echo " "; bloginfo( 'name' ); ?></p>	
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