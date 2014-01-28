<?php get_header('shop'); ?>

<!-- primary container -->
<div id="primary_page_content" class="page_content row">
	
	<!-- content -->
	<div id="content_container" class="article_content column twelve">

	<?php if ( have_posts() ) while ( have_posts() ) : the_post(); 
	
		global $_product;
		
		$_product = &new jigoshop_product( $post->ID ); 
		
		if (!$_product->is_visible() && $post->post_parent > 0) : wp_safe_redirect(get_permalink($post->post_parent)); exit; endif;
		
		if (!$_product->is_visible()) : wp_safe_redirect(home_url()); exit; endif;
		
		jigoshop::show_messages(); ?>

		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			
			<!-- entry-header -->
		<header class="entry-header">
			<h1 class="entry-title underlined">
				<?php if($post->post_parent) {
					$parent_title = get_the_title($post->post_parent); echo $parent_title; the_title('<span class="sub-title">','</span>');
				} else {
					the_title();
				} ?>
					
			</h1>
		</header>
		<!-- /entry-header -->
		
		<!-- product entry -->
		
		<div class="row">
			<section class="column eight">
				<!-- Product imagery -->
				<?php if ($_product->is_on_sale()) echo '<span class="onsale">'.__('Sale!', 'jigoshop').'</span>'; ?>
				<?php jigoshop_get_template( 'product/images.php' ); ?>
				<!-- /product imagery --> 
				
				<!-- summary -->
				<div class="summary">
					<!-- tabs -->
					<?php if (isset($_COOKIE["current_tab"])) $current_tab = $_COOKIE["current_tab"]; else $current_tab = '#tab-description'; ?>
					<div id="tabs">
						<dl class="tabs">
							<dd <?php if ($current_tab=='#tab-description') echo 'class="active"'; ?>><a href="#tab-description"><?php _e('Description', 'jigoshop'); ?></a></dd>
							<?php if ($_product->has_attributes()) : ?>
								<dd <?php if ($current_tab=='#tab-attributes') echo 'class="active"'; ?>><a href="#tab-attributes"><?php _e('Additional Information', 'jigoshop'); ?></a></dd>
							<?php endif; ?>
							<?php if ( comments_open() ) : ?>
								<dd <?php if ($current_tab=='#tab-reviews') echo 'class="active"'; ?>><a href="#tab-reviews"><?php _e('Reviews', 'jigoshop'); ?><?php echo comments_number(' (0)', ' (1)', ' (%)'); ?></a></dd>
							<?php endif; ?>
						</dl>
						<ul class="tabs-content">			
							<li class="active" id="tab-descriptionTab">
								<?php jigoshop_get_template( 'product/description.php' ); ?>
							</li>
							
						<?php if ($_product->has_attributes()) : ?>
							<li id="tab-attributesTab">
								<?php jigoshop_get_template( 'product/attributes.php' ); ?>
							</li>
						<?php endif; ?>
						
						<?php if ( comments_open() ) : ?>
							<li id="tab-reviewsTab">
							<?php comments_template(); ?>
							</li>
						<?php endif; ?>
					</div>
					<!-- tabs -->
				</div>
				<!-- /summary -->
			</section>
			<!--/product summary -->
			<section class="column four">
				<div class="price_container row">
					<div class="column three"><p class="">Price</p></div>
					<div class="column nine"><p class="price"><?php echo $_product->get_price_html(); ?></p></div>
				</div>
				
				
				<?php if ($post->post_excerpt) echo wpautop(wptexturize($post->post_excerpt)); ?>

				<?php
					if ( $_product->is_type('simple') ) jigoshop_get_template( 'product/simple/add-to-cart.php' );
					elseif ( $_product->is_type('downloadable') ) jigoshop_get_template( 'product/downloadable/add-to-cart.php' );
					elseif ( $_product->is_type('grouped') ) jigoshop_get_template( 'product/grouped/add-to-cart.php' );
					elseif ( $_product->is_type('virtual') ) jigoshop_get_template( 'product/virtual/add-to-cart.php' );
				?>

				<div class="entry-meta">
					<?php if ($_product->is_type('simple')) : ?>
						<span class="sku">SKU: <?php echo $_product->sku; ?>.</span> 
					<?php endif; ?><?php echo $_product->get_categories( ', ', 'Posted in ', '.'); ?> <?php echo $_product->get_tags( ', ', 'Tagged as ', '.'); ?>
				</div>
				
				<?php do_action('after_product'); ?>
			
				<?php jigoshop_get_template( 'product/related.php' ); ?>
			</section>
			<!--/product action -->
		</div>
			

		</article>

<?php endwhile; ?>

	</div>
	<!-- /conetent -->
</div>
<!-- /primary container -->

<?php get_footer('shop'); ?>