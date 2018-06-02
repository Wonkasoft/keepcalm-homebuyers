<?php
/**
 * Keep Calm Home Buyers functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 * @since  1.0.0 [<init>]
 * @package Keep_Calm_Home_Buyers
 */
?>
<form action="<?php get_site_url(); ?>" method="get">
	<div class="search-input-wrap">
    <label for="s" class="sr-only">Search</label>
    <input type="text" name="s" id="s" value="<?php the_search_query(); ?>" />
	</div>
	<i id="search-btn" class="fa fa-search"></i>
</form>