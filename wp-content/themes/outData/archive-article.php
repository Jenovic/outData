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
	<?php get_template_part('includes/svgs/shape'); ?>
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