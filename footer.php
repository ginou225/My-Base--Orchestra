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
			        <section class="address columns large-4">
			            <div class="footer_block_height">
			            	<address class="vcard row">
			            	  <div class="adr columns small-7 large-7">
			            	    <span class="street-address"><?php echo $street; ?></span>
			            	    <span class="locality"><?php echo $cs; ?> <?php echo $zip; ?></span>  
			            	    <!--  <span class="postal-code"></span> --> 
			            	</div>
			            	<div class="columns small-5 large-5">
			            	    <span class="tel">Tel: <?php echo "<a href=\"tel:" .$phone. "\">" . $phone . "</a>"; ?> </span>
			            	    <!-- <span class="tel">Tel: <a href="tel:6179640075">617-964-0075</a></span> -->
			            	  </div>
			            	</address>
			            </div>

			            <footer>
			            	<a href="" class="cta wht button full_width">
			            		<i class="fa fa-envelope"></i>
			            		email
			            	</a>
			            </footer>
			        </section>
		            <section class="wallpapers columns large-4">
			            <div class="row">
			            	<?php 
						        // WP_Query arguments
						        $args = array (
						          'post_type'              => 'product',
						          'post_status'            => 'published',
						          'posts_per_page'         => '2',
						          'order'                  => 'ASC',
						          'orderby'                => 'date',
						          'meta_query' => array(
						            array('key' => '_thumbnail_id')
						            )
						        ); 

						        // The Query
						        $ft_products = new WP_Query( $args );

						    ?>
					    	<?php while ( $ft_products->have_posts() ) : $ft_products->the_post(); ?>
				            <div class="columns small-6 large-6">
				                <figure class="th post_thumb ImageWrapper BackgroundR">
				                  	<?php 
							            if ( has_post_thumbnail() ) {
							                get_the_image( array(
							                    'size' => 'full',
							                  )
							                );
							              } 
						            ?>
				                  <div class="ImageOverlayH"></div>
				                  <div class="Buttons StyleC">
				                      <span class="WhiteRounded"><a href="<?php the_permalink(); ?>"><i class="fa fa-search"></i></a></span>
				                  </div>
				                </figure>
				            </div>
				            <?php endwhile; ?>
      						<?php wp_reset_postdata(); ?>
			            </div>
		          </section>
		          <section class="newsletter columns large-4">
		            <form action="#">
		              </header>
		              <div class="footer_block_height">
		              	<input type="text" placeholder="Enter Email Address">
		              </div>
		              <div>
		              	<input type="submit" value="Subscribe" class="cta wht button full_width">
		              </div>
		            </form>
		          </section>
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