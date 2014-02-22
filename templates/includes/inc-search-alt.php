<?php
/**
 * The template used for displaying a search form in alternative templates
 */
?>
<!-- search form -->
<form class="searchform" action="<?php bloginfo('url'); ?>/" method="get">
   <div class="row collapse">
   	<div class="columns small-10 large-10">
   		<input type="text" name="s" id="search" placeholder="<?php _e('Search ', 'orchestra'); bloginfo('name') ?>" value="" />
   	</div>
   	<div class="columns small-2 large-2">
   		<input type="submit" value="go" class="button postfix" alt="Search" />
   	</div>
   </div>
</form>
<!-- /search form -->