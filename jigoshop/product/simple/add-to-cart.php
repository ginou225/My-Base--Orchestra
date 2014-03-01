<?php global $_product; $availability = $_product->get_availability(); ?>

<p class="stock <?php //echo $availability['class'] ?>"><?php echo $availability['availability']; ?></p>
						
<form action="<?php echo $_product->add_to_cart_url(); ?>" class="cart" method="post">
 	<div class="atc_container row">
 		<div class="columns small-12 large-12">
 			<div class="quantity">
 				<input name="quantity" value="1" size="4" title="Qty" class="input-text qty text" maxlength="12" />	
 			</div>
 			<button type="submit" class="cta button tiny"><?php _e('Add to cart', 'jigoshop'); ?></button>
 		</div>
 	</div>
 	<?php jigoshop::nonce_field('add_to_cart', 'add-to-cart') ?>
</form>