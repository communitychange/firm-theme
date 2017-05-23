<?php
/**
 * The Sidebar containing the general widget areas.
 *
 * @package WordPress
 * @subpackage Minibuzz
 * @since Minibuzz 1.0
 */
?>
		<div class="widget-area" role="complementary">
			<ul>

<?php
	/* When we call the dynamic_sidebar() function, it'll spit out
	 * the widgets for that widget area. If it instead returns false,
	 * then the sidebar simply doesn't exist, so we'll hard-code in
	 * some default sidebar stuff just in case.
	 */
	if ( ! dynamic_sidebar( 'post-sidebar' ) ) : ?><?php endif; // end general widget area ?>
			</ul>
		</div>

