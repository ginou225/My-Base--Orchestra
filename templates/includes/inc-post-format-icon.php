<span class="format">
	<i class="dashicons <?php
	
		$pf_video = has_post_format('video');
		$pf_audio = has_post_format('audio');
		$pf_gallery = has_post_format('gallery'); 
		$pf_image = has_post_format('image'); 
		$pf_quote = has_post_format('quote');
		$pf_link = has_post_format('link');
		$pf_aside = has_post_format('aside');
		$pf_status = has_post_format('status');
	
		if ($pf_video) {
				echo "dashicons-format-video";
			} elseif ($pf_audio) {
				echo "dashicons-format-audio";
			} elseif ($pf_gallery) {
				echo "dashicons-format-gallery";
			} elseif ($pf_image) {
				echo "dashicons-format-image";
			} elseif ($pf_quote) {
				echo "dashicons-format-quote";
			} elseif ($pf_link) {
				echo "dashicons-format-links";
			} elseif ($pf_aside) {
				echo "dashicons-format-aside";
			} elseif ($pf_status) {
				echo "dashicons-format-chat";
			} else {
				echo "dashicons-edit";
			}
		
		?>">
	</i>
</span>