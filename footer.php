			<footer class="master_foot full">
				<div class="row">
					<div class="columns large-6">
						<?php dynamic_sidebar( 'Footer' ); ?>	
					</div>
					<div class="columns large-6">
						<p>&copy; <?php echo date( "Y" ); echo " "; bloginfo( 'name' ); ?></p>	
					</div>
				</div>	
			</footer>

		<!-- Off Canvas Menu -->
		<aside class="left-off-canvas-menu">
		    <!-- whatever you want goes here -->
		    <menu>
		    	<li><a href="#">Item 1</a></li>
		    	<li><a href="#">Item 1</a></li>
		    </menu>
		</aside>

		<!-- close the off-canvas menu -->
		<a class="exit-off-canvas"></a>	

  		</div>
		<!-- /wrap -->
	</div>

	<?php wp_footer(); ?>

</body>
</html>
