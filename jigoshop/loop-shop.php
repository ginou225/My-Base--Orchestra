<?php
/**
 * Loop shop template
 *
 * DISCLAIMER
 *
 * Do not edit or add directly to this file if you wish to upgrade Jigoshop to newer
 * versions in the future. If you wish to customise Jigoshop core for your needs,
 * please use our GitHub repository to publish essential changes for consideration.
 *
 * @package             Jigoshop
 * @category            Catalog
 * @author              Jigoshop
 * @copyright           Copyright © 2011-2013 Jigoshop.
 * @license             http://jigoshop.com/license/commercial-edition
 */
?>

<?php
global $columns, $per_page;

echo '<div class="row">
		<div class="large-12 columns">';
	do_action('jigoshop_before_shop_loop');
echo '	</div>
	  </div>';

$loop = 0;

if (!isset($columns) || !$columns) $columns = apply_filters('loop_shop_columns', 3);
//if (!isset($per_page) || !$per_page) $per_page = apply_filters('loop_shop_per_page', get_option('posts_per_page'));

//if ($per_page > get_option('posts_per_page')) query_posts( array_merge( $wp_query->query, array( 'posts_per_page' => $per_page ) ) );

ob_start();

if (have_posts()) : while (have_posts()) : the_post(); $_product = new jigoshop_product( $post->ID ); $loop++;

?>

<div class="large-4 columns <?php if ($loop%$columns==0) echo 'last end'; if (($loop-1)%$columns==0) echo 'first'; ?>">
<!-- product module -->
	<article id="post-<?php the_ID(); ?>" class="post_product">
		<div class="post_head">
	      <figure class="product_thumb clip ImageWrapper BackgroundS">
	        <?php 
	        	$product = array(
	        		'size' => 'full',
	        	);
	        	get_the_image($product); 
	        ?> 
	        <div class="ImageOverlayH"></div>
	        <div class="Buttons StyleAl">
	            <span class="WhiteHollowSquare"><a href="<?php the_permalink(); ?>"><?php _e('View Product', 'jigoshop'); ?></a></span>
	            <span class="WhiteHollowSquare"><a href="<?php echo $_product->add_to_cart_url(); ?>"><?php _e('Add to cart', 'jigoshop'); ?></a></span>
	        </div>
	      </figure>
	    </div>
	    <span class="product_price">
		    <?php echo $_product->get_price_html(); ?>
	    </span>
	    <header class="post_title textcenter">
	        <h4 class="title">
	          <a href="<?php the_permalink(); ?>" title=""><?php the_title(); ?></a>
	        </h4>
	    </header>
	    <footer class="post_footer">
	      <div class="row">
	        <div class="columns small-2 large-2">
	          <a href="<?php echo $_product->add_to_cart_url(); ?>"><i class="fa fa-shopping-cart fa-lg"></i></a>
	        </div>
	        <div class="columns small-10 large-6">
	          <a href="#">Taxonomy(1)</a>
	        </div>
	      </div>
	    </footer>
	</article>
</div>


<?php if ($loop==$per_page) break;

endwhile; endif;

if ($loop==0) :

	echo '<p class="info">'.__('No products found which match your selection.', 'jigoshop').'</p>';

else :

	$found_posts = ob_get_clean();

	echo '<div class="row">' . $found_posts . '</div>'; 

endif;

do_action('jigoshop_after_shop_loop');
