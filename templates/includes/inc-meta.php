<?php
/**
 * The template used for displaying post meta information
 */
?>

<?php if( !is_singular() ) { ?>
	<dl class="meta">
		<dd><i class="fa fa-user"></i> <?php the_author() ?></dd>
		<dd>
			<i class="fa fa-star"></i> 
        	<?php
				$category = get_the_category();
				if ($category) {
				  echo '<a href="' . get_category_link( $category[0]->term_id ) . '" title="' . sprintf( __( "View all posts in %s" ), $category[0]->name ) . '" ' . '>' . $category[0]->name.'</a> ';
				}
			?>
		</dd>
		<dd><a href="#"><i class="fa fa-tags"></i> Tags</a></dd>
		<dd>
			<?php // if ( ( comments_open() ) ) : ?>
			<span class="comments-link">
				<?php comments_popup_link( __( 'Leave a comment' ), __( '1 Comment' ), __( '% Comments') );?>
			</span>
			<?php // endif; ?>
		</dd> 
	</dl>
<?php } else { ?>
	<div class="meta">
		<em>Posted on:</em> <?php the_time('F jS, Y') ?>
		<em>by</em> <?php the_author() ?>
		<?php comments_popup_link( 'No Comments', '1 Comment', '% Comments', 'comments-link', '' ); ?>
	</div>

<?php } ?>

