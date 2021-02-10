<?php get_header(); ?>

<section class="hero-article">
	<div class="container">
			<div class="cols hero-article__content">
					<div class="col is-12 is-6-md is-6-lg load-hidden">
					<?php
						if ( function_exists('yoast_breadcrumb') ) {
							yoast_breadcrumb( '<p id="breadcrumbs">','</p>' );
						}
					?>
						<h1>Find here what you're looking for here.</h1>
					</div>
					<div class="col is-12 is-6-md is-6-lg flex align-right position-bottom load-hidden">
						<?php get_template_part('includes/svgs/article'); ?>
					</div>
					<div class="col is-12 load-hidden">
						<div class="tags">
							<?php get_template_part('includes/shared/tags'); ?>
						</div>
					</div>
			</div>
	</div>
	<div class="custom-shape-wrap custom-shape-bottom-type-3"><div class="shape-container"><svg width="100%" height="131px"><defs><pattern id="custom-shape-bottom-type-3-f0acbaaca1f6026daf77b2c0c046c81d" preserveAspectRatio="none" style="background-repeat: no-repeat;" patternUnits="userSpaceOnUse" x="0" y="0" width="100%" height="131px" viewBox="0 0 100 130"><polygon fill="#f5f5f5" "="" points="100,0 100,130 -1,130 "></polygon></pattern></defs><rect x="0" y="0" width="100%" height="131px" fill="url(#custom-shape-bottom-type-3-f0acbaaca1f6026daf77b2c0c046c81d)"></rect></svg></div></div>
</section>

<section class="archive-article">
	<div class="container">

	<?php $terms = get_terms('article_cat'); ?>
	<?php foreach ($terms as $term) : ?>
		<div class="cols">
			<div class="col is-12 load-hidden">
				<div class="cat-meta">
					<h4><?php echo $term->name; ?></h4>
					<div class="link">
						<a href="<?php echo get_term_link($term); ?>">View more</a>
						<span class="icon "><i class="fas fa-arrow-right"></i></span>
					</div>
				</div>
			</div>
			<?php	$articles = new WP_Query(array(
			'post_type' => 'Article',
			'posts_per_page' => 4,
			'tax_query' => array(
					array(
						'taxonomy' => 'article_cat',
						'field'    => 'name',
						'terms'    => $term->name
						),
					),
				)); 
			?>
			<?php if ( $articles->have_posts() ) : while ( $articles->have_posts() ) : $articles->the_post(); ?>
				<div class="col is-12 is-6-md is-3-lg load-hidden">
					<?php get_template_part('includes/shared/post-tile'); ?>
				</div>
			<?php endwhile; endif; ?>
		</div>
	<?php endforeach; ?>

</section>

<?php get_footer(); ?>