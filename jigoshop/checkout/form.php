<?php
/**
 * Checkout form template
 *
 * DISCLAIMER
 *
 * Do not edit or add directly to this file if you wish to upgrade Jigoshop to newer
 * versions in the future. If you wish to customise Jigoshop core for your needs,
 * please use our GitHub repository to publish essential changes for consideration.
 *
 * @package             Jigoshop
 * @category            Checkout
 * @author              Jigoshop
 * @copyright           Copyright © 2011-2013 Jigoshop.
 * @license             http://jigoshop.com/license/commercial-edition
 */
?>

<?php do_action('before_checkout_form');
// filter hook for include new pages inside the payment method
$get_checkout_url = apply_filters( 'jigoshop_get_checkout_url', jigoshop_cart::get_checkout_url() ); ?>

<form name="checkout" method="post" class="checkout" action="<?php echo esc_url( $get_checkout_url ); ?>">

	<h3 id="order_review_heading"><?php _e('Your Order', 'jigoshop'); ?></h3>
		
	<?php do_action('jigoshop_checkout_order_review'); ?>
	
	<div class="row">	
		<div id="customer_details" class="customer_details">
			<div class="columns large-6">
				<?php do_action('jigoshop_checkout_billing'); ?>
			</div>
			<div class="shipping_details columns large-6">
				<?php do_action('jigoshop_checkout_shipping'); ?>
			</div>
		</div>
	</div>
	

	<div class="row">
		<div class="columns large-12">
			<h3 id="payment_methods_heading"><?php _e('Payment Methods', 'jigoshop'); ?></h3>
			<?php do_action('jigoshop_checkout_payment_methods'); ?>
		</div>
	</div>
	
</form>

<?php do_action('after_checkout_form'); ?>