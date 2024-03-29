<?php global $_product, $post; ?>

<div class="product_images">
	<?php 
		$thumb_id = 0;
		if (has_post_thumbnail()) :
			$thumb_id = get_post_thumbnail_id();
			echo '<figure class="featured th"><a href="'.wp_get_attachment_url($thumb_id).'" class="zoom" rel="thumbnails">';
			the_post_thumbnail('shop_large img_full'); 	
			echo '</a></figure>';
		else : 
			echo '<figure class="img_full th"><img src="'.jigoshop::plugin_url().'/assets/images/placeholder.png" alt="Placeholder" /></figure>'; 
		endif; 
	?>
	<ul class="additional_images small-block-grid-3 show-for-medium-up">
		<?php
			$args = array( 'post_type' => 'attachment', 'numberposts' => -1, 'post_status' => null, 'post_parent' => $post->ID ); 
			$attachments = get_posts($args);
			if ($attachments) :
				$loop = 0;
				$columns = 3;
				foreach ( $attachments as $attachment ) : 
					
					if ($thumb_id==$attachment->ID) continue;
					
					$loop++;
					
					$_post = & get_post( $attachment->ID );
					$url = wp_get_attachment_url($_post->ID);
					$post_title = esc_attr($_post->post_title);
					$image = wp_get_attachment_image($attachment->ID, 'shop_thumbnail');
					
					echo '<li><a href="'.$url.'" title="'.$post_title.'" rel="thumbnails" class="th zoom ';
					if ($loop==1 || ($loop-1)%$columns==0) echo 'first';
					if ($loop%$columns==0) echo 'last';
					echo '">'.$image.'</a></li>';
					
				endforeach;
			endif;
			wp_reset_query();
		?>
	</ul>	
</div>