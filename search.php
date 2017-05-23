<?php
/**
 * The template for displaying Search Results pages.
 *
 * @package WordPress
 * @subpackage Minibuzz
 * @since Minibuzz 1.0
 */

get_header(); ?>
<div id="header-inner">
<h1 class="pagetitle"><?php printf( __( 'Search Results for: %s', 'templatesquare' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
</div><!-- end #header-inner -->

<div id="content">
	<div id="content-left">
		<div id="maintext">

		<?php if ( function_exists('yoast_breadcrumb') ) {
			yoast_breadcrumb('<div id="breadcrumbs">','</div>');
		} ?>

<?php if ( have_posts() ) : ?>
				<?php
				/* Run the loop for the search to output the results.
				 * If you want to overload this in a child theme then include a file
				 * called loop-search.php and that will be used instead.
				 */
				 get_template_part( 'loop', 'search' );
				?>
<?php else : ?>
				<div id="post-0" class="post no-results not-found">
					<h2 class="entry-title"><?php _e( 'Nothing Found', 'templatesquare' ); ?></h2>
					<div class="entry-content">
						<p><?php _e( 'Sorry, but nothing matched your search criteria. Please try again with some different keywords.', 'templatesquare' ); ?></p>
						<?php get_search_form(); ?>
					</div><!-- .entry-content -->
				</div><!-- #post-0 -->
<?php endif; ?>
		</div><!-- end #maintext -->
	</div><!-- end #content-left -->
	
	<div id="content-right">
		<div id="sideright">
		<?php get_sidebar(); ?>
		</div><!-- end #sideright -->
	</div><!-- end #content-right -->
	<div class="clr"></div><!-- end clear float -->
</div><!-- end #content -->

<?php get_footer(); ?>
