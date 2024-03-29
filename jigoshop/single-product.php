<?php get_header(); ?>

<!-- primary container -->
<section id="primary_page_content" class="page_container" role="main">
	<div class="page_content row">

		<?php if ( have_posts() ) while ( have_posts() ) : the_post(); 
		
			global $_product;
			
			$_product = new jigoshop_product( $post->ID ); 
			
			if (!$_product->is_visible() && $post->post_parent > 0) : wp_safe_redirect(get_permalink($post->post_parent)); exit; endif;
			
			if (!$_product->is_visible()) : wp_safe_redirect(home_url()); 
				exit; endif;
			?>

			<div class="alert_messages columns large-12">
				<?php jigoshop::show_messages(); ?>
			</div>

			<!-- product landing -->
		    <article id="post-<?php the_ID(); ?>" <?php post_class('product_landing'); ?>>
		      <section class="product_image_container columns large-4">
		      	<?php if ($_product->is_on_sale()) echo '<span class="onsale">'.__('Sale!', 'jigoshop').'</span>'; ?>

		      	<!-- featured product image -->
	          	<?php jigoshop_get_template( 'product/images.php' ); ?>
	          	<!-- featured product image -->
		          
		        <!-- related products -->
		        <?php jigoshop_get_template( 'product/related.php' ); ?>
				<!-- /related -->      
		      </section>
		      <section class="columns large-8">
		        <header class="product_title row">
		          <div class="columns small-9 large-9">
		            <h1 class="title">
		            	<?php echo jigoshop_template_single_title($post, $_product); ?>
		            </h1>
		          </div>
		          <div class="columns small-3 large-3">
		            <span class="price"><?php echo $_product->get_price_html(); ?></span>
		          </div>
		        </header>

		        <div class="excerpt">
		          <?php if ($post->post_excerpt) echo wpautop(wptexturize($post->post_excerpt)); ?>
		        </div>

		        <section class="a2c_block">
		         	<?php
						if ( $_product->is_type('simple') ) jigoshop_get_template( 'product/simple/add-to-cart.php' );
						elseif ( $_product->is_type('downloadable') ) jigoshop_get_template( 'product/downloadable/add-to-cart.php' );
						elseif ( $_product->is_type('grouped') ) jigoshop_get_template( 'product/grouped/add-to-cart.php' );
						elseif ( $_product->is_type('virtual') ) jigoshop_get_template( 'product/virtual/add-to-cart.php' );
					?>

					<div class="entry-meta product_meta row">
						<ul class="inline-list">
							<?php if ($_product->is_type('simple')) : ?>
							<li><span class="sku">SKU: <?php echo $_product->sku; ?>.</span></li>
							<?php endif; ?>
							<li>
								<a href="#" class="cta button tiny" data-dropdown="product_cat">Categories</a>
								<div id="product_cat" data-dropdown-content class="f-dropdown content">
									<?php echo $_product->get_categories('', '', ''); ?>
								</div>
							</li>
							<li>
								<a href="" class="cta button tiny" data-dropdown="product_tag">Tags</a>
								<div id="product_tag" class="f-dropdown content" data-dropdown-content>
									<?php echo $_product->get_tags('', '', ''); ?>
								</div>
							</li>
						</ul>								 
					</div>
					
					<?php do_action('after_product'); ?>
		        </section>

		        <hr/>

		        <div class="product_summary">
		        	<?php if (isset($_COOKIE["current_tab"])) $current_tab = $_COOKIE["current_tab"]; 
		        	else $current_tab = '#description'; ?>
					
					<dl class="tabs" data-tab>
						<dd class="active">
							<a href="#description"><?php _e('Description', 'jigoshop'); ?></a>
						</dd>
						<?php if ($_product->has_attributes()) : ?>
							<dd>
								<a href="#attributes"><?php _e('Additional Information', 'jigoshop'); ?></a>
							</dd>
						<?php endif; ?>
						<?php if ( comments_open() ) : ?>
							<dd>
								<a href="#reviews"><?php _e('Reviews', 'jigoshop'); ?><?php echo comments_number(' (0)', ' (1)', ' (%)'); ?></a>
							</dd>
						<?php endif; ?>
					</dl>

		        	<div class="tabs-content">
		        	  <div class="content active" id="description">
		        	  	<?php jigoshop_get_template( 'product/description.php' ); ?> 	
		        	  </div>

		        	  <?php if ($_product->has_attributes()) : ?>
		        	  <div class="content" id="attributes">
		        	    <?php jigoshop_get_template( 'product/attributes.php' ); ?>
		        	  </div>
		        	  <?php endif; ?>

		        	  <?php if ( comments_open() ) : ?>
		        	  <div class="content" id="reviews">
		        	    <?php //comments_template(); ?> There is a conflict
		        	  </div>
		        	  <?php endif; ?>
		        	</div>

		        </div>
		      </section>   
		    </article>
		    <!-- /product landing -->

		<?php endwhile; ?>
	</div>
	<!-- /primary container -->
</section>

<?php get_footer('shop'); ?>