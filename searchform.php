<?php
/**
 * The template used for displaying a search form
 */
?>
<form action="/" method="get">
   <div class="row collapse">
   	<div class="columns small-10 large-10">
   		<input type="text" name="s" id="search" value="<?php the_search_query(); ?>" />
   	</div>
   	<div class="columns small-2 large-2">
   		<input type="submit" value="go" alt="Search" />
   	</div>
   </div>
</form>