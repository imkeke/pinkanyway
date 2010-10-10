<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package WordPress
 * @subpackage Twenty_Ten
 * @since Twenty Ten 1.0
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<title><?php
	/*
	 * Print the <title> tag based on what is being viewed.
	 */
	global $page, $paged;

	wp_title( '|', true, 'right' );

	// Add the blog name.
	bloginfo( 'name' );

	// Add the blog description for the home/front page.
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) )
		echo " | $site_description";

	// Add a page number if necessary:
	if ( $paged >= 2 || $page >= 2 )
		echo ' | ' . sprintf( __( 'Page %s', 'twentyten' ), max( $paged, $page ) );

	?></title>
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />

<!--[if IE]>
<style type="text/css" media="screen">
	.searchIcon {
		display: none;
	}
</style>
<![endif]-->

<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js"></script>
<?php
	/* We add some JavaScript to pages with the comment form
	 * to support sites with threaded comments (when in use).
	 */
	if ( is_singular() && get_option( 'thread_comments' ) )
		wp_enqueue_script( 'comment-reply' );

	/* Always have wp_head() just before the closing </head>
	 * tag of your theme, or you will break many plugins, which
	 * generally use this hook to add elements to <head> such
	 * as styles, scripts, and meta tags.
	 */
	wp_head();
?>
</head>

<!--
I love:
_____________________________________________________________________
____/\\\________/\\\___/\\\\\\\\\\\___/\\\\____________/\\\\__________
____\/\\\_______\/\\\__\/////\\\///___\/\\\\\\________/\\\\\\__________
_____\//\\\______/\\\_______\/\\\______\/\\\//\\\____/\\\//\\\__________
_______\//\\\____/\\\________\/\\\______\/\\\\///\\\/\\\/_\/\\\__________
_________\//\\\__/\\\_________\/\\\______\/\\\__\///\\\/___\/\\\__________
___________\//\\\/\\\__________\/\\\______\/\\\____\///_____\/\\\__________
_____________\//\\\\\___________\/\\\______\/\\\_____________\/\\\__________
_______________\//\\\_________/\\\\\\\\\\\__\/\\\_____________\/\\\__________
_________________\///_________\///////////___\///______________\///___________
_______________________________________________________________________________

-->

<body>
<div id="header">
	<div id="masthead">
		<div id="branding" role="banner">
			<?php $heading_tag = ( is_home() || is_front_page() ) ? 'h1' : 'div'; ?>
			<<?php echo $heading_tag; ?> id="site-title">
				<span>
					<a href="<?php echo home_url( '/' ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a>
				</span>
			</<?php echo $heading_tag; ?>>
			<div id="site-description"><?php bloginfo( 'description' ); ?></div>

			<?php
				// Check if this is a post or page, if it has a thumbnail, and if it's a big one
				if ( is_singular() &&
						has_post_thumbnail( $post->ID ) &&
						( /* $src, $width, $height */ $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'post-thumbnail' ) ) &&
						$image[1] >= HEADER_IMAGE_WIDTH ) :
					// Houston, we have a new header image!
					echo get_the_post_thumbnail( $post->ID, 'post-thumbnail' );
				else : ?>
				<?php endif; ?>
		</div><!-- #branding -->

		<div id="access" role="navigation">
		  <?php /*  Allow screen readers / text browsers to skip the navigation menu and get right to the good stuff */ ?>
			<div class="skip-link screen-reader-text"><a href="#content" title="<?php esc_attr_e( 'Skip to content', 'twentyten' ); ?>"><?php _e( 'Skip to content', 'twentyten' ); ?></a></div>
			<?php /* Our navigation menu.  If one isn't filled out, wp_nav_menu falls back to wp_page_menu.  The menu assiged to the primary position is the one used.  If none is assigned, the menu with the lowest ID is used.  */ ?>
			<?php wp_nav_menu( array( 'container_class' => 'menu-header', 'theme_location' => 'primary' ) ); ?>
		</div><!-- #access -->
	</div><!-- #masthead -->
</div><!-- #header -->

<div id="twitterLine">
	<div id="twitterLine_inner">
		<!-- 获取订阅数feedsky
		<?php /*
		$xml = simplexml_load_file('http://www.feedsky.com/rpc/feed_statistic_xml.php?u=kekeblog');
		$node = $xml->xpath('/month/day[last()]');
		foreach($node as $n){echo $n['subcount'];} */
		?>人已订阅
		 -->
		 <div id="twitterLine_right">
			<a href="http://feeds.feedburner.com/kekeblog" class="rssButton">Rss</a>
			<a href="http://twitter.com/imkeke" title="Follow me on twitter" class="twitterButton">Twitter</a>
		 </div>
	</div>
</div>

<div id="main" class="clearfix">
