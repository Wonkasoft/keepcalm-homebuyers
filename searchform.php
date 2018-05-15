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
    <label for="search" class="sr-only">Search</label>
    <input type="text" name="s" id="s" value="<?php the_search_query(); ?>" />
	<i class="fa fa-search"></i>
</form>