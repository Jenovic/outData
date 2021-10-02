<?php	$q = new WP_Query(array(
	'post_status' => 'publish',
	'post_type' => 'Article',
	'posts_per_page' => 3,
	'orderby' => 'post_date',
	'order' => 'DESC',
	)); 
?>
<section class="latest-posts">
	<div class="container">
		<div class="cols">
			<div class="col is-12">
				<div class="latest-posts_title">
					<h1>Featured articles</h1>
				</div>
			</div>
			<?php $post_count = 1; if ( $q->have_posts() ) : while ( $q->have_posts() ) : $q->the_post(); ?>
				<?php if ( $post_count <= 1 ) : ?>
					<div class="col is-12 is-8-md is-8-lg desktop-only">
						<div class="featured-large load-hidden">
							<?php get_template_part('includes/shared/featured-post-tile'); ?>
						</div>
					</div>
					<div class="featured-small load-hidden">
				<?php else: ?>
					<div class="col is-12 is-12-md is-12-lg desktop-only">
						<?php get_template_part('includes/shared/post-tile-small'); ?>
					</div>
				<?php endif; ?>
				<div class="col is-12 mobile-only">
					<?php get_template_part('includes/shared/post-tile'); ?>
				</div>
			<?php $post_count++; endwhile; endif; wp_reset_postdata(); ?>
			</div>
			<div class="col is-12">
				<a href="/article" class="view-more">View All <span class="icon "><i class="fas fa-arrow-right"></i></span></a>
			</div>
		</div>
	</div>
</section>
