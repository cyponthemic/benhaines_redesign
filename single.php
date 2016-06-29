<?php
/**
 * The template for displaying all single posts and attachments
 *
 * @package FoundationPress
 * @since FoundationPress 1.0.0
 */

get_header(); ?>






<?php do_action( 'foundationpress_before_content' ); ?>
<?php while ( have_posts() ) : the_post(); ?>
	<div class="section">
		<?php


			$featured_image = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'full' );
			?>
			<div class="hero hero-background-image hero_single-page" data-parallax="scroll"
				 data-image-src="<?php echo $featured_image[0]; ?>"
				 data-z-index="9"
				 data-speed="1.5"
			>
				<div class=" row">
					<?php

					?>

					<?php  ?>
					<div class="large-6 medium-8 small-10 large-offset-3 medium-offset-2 small-offset-1 columns" >
						<h1 style="color: #fff" class="entry-title entry-title_hero"><?php the_title(); ?></h1>
					</div>


				</div>
			</div>

	</div>
	<div class="row" style="padding: 20px 0 5px; margin: auto">
		<div class="large-8 columns" >
			<?php foundationpress_entry_meta(); ?>
			<br>
			<?php
			$tags = get_tags();
			$html = '<div class="post_tags">';
				foreach ( $tags as $tag ) {
				$tag_link = get_tag_link( $tag->term_id );

				$html .= "<a href='{$tag_link}' title='{$tag->name} Tag' class='hollow button {$tag->slug}'>";
					$html .= "{$tag->name}</a>";
				}
				$html .= '</div>';
			echo $html;
			?>
		</div>
		<div class="large-4 columns right align-right" style="text-align: right">
			<a class="button primary hollow align-right">Categories <i class="fa fa-caret-down"></i></a>
		</div>

	</div>
	<div class="row">

	<div class="large-12 columns">
	<article <?php post_class('main-content ') ?> id="post-<?php the_ID(); ?>">

		<?php do_action( 'foundationpress_post_before_entry_content' ); ?>
		<div class="entry-content">
		<?php the_content(); ?>
		</div>
		<footer>
			<?php wp_link_pages( array('before' => '<nav id="page-nav"><p>' . __( 'Pages:', 'foundationpress' ), 'after' => '</p></nav>' ) ); ?>
		</footer>
		<?php do_action( 'foundationpress_post_before_comments' ); ?>
		<?php comments_template(); ?>
		<?php do_action( 'foundationpress_post_after_comments' ); ?>
	</article>
	</div>
	</div>
<?php endwhile;?>

<?php do_action( 'foundationpress_after_content' ); ?>


<?php get_footer();
