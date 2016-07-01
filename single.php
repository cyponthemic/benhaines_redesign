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
	<script>
		var isBlogBH = true;
	</script>
	<div class="section">
		<?php


			$featured_image = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'full' );
			?>
			<div class="hero hero-background-image hero_single-page" data-parallax="scroll"
				 data-image-src="<?php echo $featured_image[0]; ?>"
				 data-z-index="9"
				 data-speed="1.5"
			>
				<div class=" row news">
					<div class="large-2 columns">
						<div class="hover-mirror rounded-50">
							<?php
							$avatargs =  array(
								'width' => 159,
								'height' => 159,
								'class' => 'rounded-50'
							);
							$alt = $current_user->user_firstname . '\'s Avatar';
							echo get_avatar( get_the_author_meta( 'ID' ), 159, null, $alt, $avatargs  );

							?>
						</div>

					</div>
					<div class="large-8 medium-8 small-10 large-offset-0 medium-offset-2 small-offset-1 columns" >

						<div class="news--description-holder news--description-holder_hero news--description-holder_hero_single" data-equalizer-watch>

							<div class="news--title news--title_hero news--title_hero_single">
								<h1>
									<?php the_title(); ?>
								</h1>
							</div>
							<div class="news--category">
								<?php do_action( 'bhr_category_name' ); ?>
							</div>
						</div>

					</div>
					<div class="large-2 columns">
					</div>

				</div>
			</div>

	</div>




	<article <?php post_class('main-content row ') ?> id="post-<?php the_ID(); ?>">

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
	<script>

	</script>

<?php endwhile;?>

<?php do_action( 'foundationpress_after_content' ); ?>


<?php get_footer();
