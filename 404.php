<?php
/**
 * The template for displaying 404 pages (Not Found).
 *
 * @package WordPress
 * @subpackage Twenty_Ten
 * @since Twenty Ten 1.0
 */

get_header(); ?>

	<div id="block_404">
		<div class="top clearfix">
			<img src="<?php bloginfo('template_directory'); ?>/images/404.png" alt="404" />

			<div id="search">
				<div class="radiusBlock searchIcon">
					<div class="radiusBlock siJp"></div>
					<div class="radiusBlock siSb"></div>
				</div>
				<div id="searchform_div"><form action="http://wp.localhost/" id="searchform" method="get" role="search">
				<div><label for="s" class="screen-reader-text">Search for:</label>
				<input type="text" id="s" name="s" value="">
				<input type="submit" value="Search" id="searchsubmit">
				</div>
				</form></div>
			</div>
			<!--[if IE]>
			<div><form action="http://wp.localhost/" id="searchform" method="get" role="search">
				<div><label for="s" class="screen-reader-text">Search for:</label>
				<input type="text" id="" name="s" value="">
				<input type="submit" value="Search" id="">
				</div>
			<![endif]-->
		</div>

		<div class="theman">
		</div>
	</div><!-- #block_404 -->
	<script type="text/javascript">
		// focus on search field after it has loaded
		document.getElementById('s') && document.getElementById('s').focus();
	</script>

<?php get_footer(); ?>
