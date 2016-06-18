<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * e.g., it puts together the home page when no home.php file exists.
 *
 * Learn more: {@link https://codex.wordpress.org/Template_Hierarchy}
 *
 * @package FoundationPress
 * @since FoundationPress 1.0.0
 */

get_header(); ?>
	<div class="section">
		<?php
			if (is_home() && get_option('page_for_posts') ) {
				$img = wp_get_attachment_image_src(get_post_thumbnail_id(get_option('page_for_posts')), 'full');
				$featured_image = $img[0];
			}
		?>
		<div class="hero hero-background-image" data-parallax="scroll"
			 data-image-src="<?php echo $featured_image; ?>"
			 data-z-index="9"
			 data-speed="1.1"
		>
			<div class=" row">
				<?php $my_query = new WP_Query( 'posts_per_page=1' ); ?>

				<?php while ( $my_query->have_posts() ) : $my_query->the_post(); ?>
					<div class="large-4 medium-6 small-10 float-right columns" >
						<?php get_template_part( 'template-parts/sample-content-news_featured' );  ?>
					</div>
				<?php endwhile; ?>

			</div>
		</div>
	</div>
<div id="page" role="main">

	<article class="main-content">
	<?php if ( have_posts() ) : ?>

		<?php /* Start the Loop */ ?>
		<?php while ( have_posts() ) : the_post(); ?>
			<?php get_template_part( 'template-parts/content', get_post_format() ); ?>
		<?php endwhile; ?>

		<?php else : ?>
			<?php get_template_part( 'template-parts/content', 'none' ); ?>

		<?php endif; // End have_posts() check. ?>

		<?php /* Display navigation to next/previous pages when applicable */ ?>
		<?php if ( function_exists( 'foundationpress_pagination' ) ) { foundationpress_pagination(); } else if ( is_paged() ) { ?>
			<nav id="post-nav">
				<div class="post-previous"><?php next_posts_link( __( '&larr; Older posts', 'foundationpress' ) ); ?></div>
				<div class="post-next"><?php previous_posts_link( __( 'Newer posts &rarr;', 'foundationpress' ) ); ?></div>
			</nav>
		<?php } ?>

	</article>
	<?php get_sidebar(); ?>

</div>

<?php get_footer();
