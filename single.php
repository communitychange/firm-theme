<?php
/**
 * The Template for displaying all single posts.
 *
 * @package WordPress
 * @subpackage Minibuzz
 * @since Minibuzz 1.0
 */

get_header(); ?>
<?php
	/* Queue the first post, that way we know
	 * what date we're dealing with (if that is the case).
	 *
	 * We reset this later so we can run the loop
	 * properly with a call to rewind_posts().
	 */
	if ( have_posts() )
		the_post();
		
	$check_ID = get_the_ID();
	$check_pt =  get_post_type( get_the_ID() );
	rewind_posts();
?>


<div id="content">
	<div id="content-left">
		<div id="maintext">
		<?php if ( function_exists('yoast_breadcrumb') && !is_front_page() ) {
		yoast_breadcrumb('<div id="breadcrumbs">','</div>');} ?>
		
<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>

				<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					<h2 class="entry-title"><?php the_title(); ?></h2>

					<div class="entry-meta">
						<div class="metadata single">
						<span class="author"> 
					<?php if($check_pt == 'portfolio' ){ ?>
					<?php _e('Posted by', 'templatesquare');?> <?php the_author();?>
					<?php }else{ ?>
					<?php _e('Posted by', 'templatesquare');?> <a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) );?>"> 
					<?php the_author();?>
					</a>
					<?php } ?></span> 
	
<?php _e('on', 'templatesquare');?> <?php the_time('F j, Y') ?> <!--	  &nbsp; | &nbsp;<?php comments_popup_link(__('No Comments ', 'templatesquare'), __('1 Comment ', 'templatesquare'), __('% Comments ', 'templatesquare')); ?> -->
						</div><!-- .metadata -->
					</div><!-- .entry-meta -->

					<div class="entry-content">
						<?php the_content(); ?>
						<?php wp_link_pages( array( 'before' => '<div class="page-link">' . __( 'Pages:', 'templatesquare' ), 'after' => '</div>' ) ); ?>
					</div><!-- .entry-content -->


<?php if($check_pt != 'portfolio' ): ?>
<?php if ( get_the_author_meta( 'description' ) ) : // If a user has filled out their description, show a bio on their entries  ?>
					<div id="entry-author-info">
						<div id="author-avatar">
							<?php echo get_avatar( get_the_author_meta( 'user_email' ), apply_filters( 'ts_author_bio_avatar_size', 60 ) ); ?>
						</div><!-- #author-avatar -->
						<div id="author-description">
							<h2><?php printf( esc_attr__( 'About %s', 'templatesquare' ), get_the_author() ); ?></h2>
							<?php the_author_meta( 'description' ); ?>
							<div id="author-link">
								<a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>">
									<?php printf( __( 'View all posts by %s <span class="meta-nav">&rarr;</span>', 'templatesquare' ), get_the_author() ); ?>
								</a>
							</div><!-- #author-link	-->
						</div><!-- #author-description -->
					</div><!-- #entry-author-info -->

<?php endif; ?>
<?php endif; ?>

					<div class="entry-utility">
						<?php ts_posted_in(); ?>
						<?php edit_post_link( __( 'Edit', 'templatesquare' ), '<span class="edit-link">', '</span>' ); ?>
					</div><!-- .entry-utility -->
				</div><!-- #post-## -->

				<?php comments_template( '', true ); ?>

<?php endwhile; // end of the loop. ?>
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