<?php get_header(); ?>
<?php $term = get_queried_object(); ?>
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
<section class="article-cat-hero">
	<div class="container">
		<div class="cols">
			<div class="col is-12">
				<?php
					if ( function_exists('yoast_breadcrumb') ) {
						yoast_breadcrumb( '<p id="breadcrumbs">','</p>' );
					}
				?>
			</div>
			<div class="col is-12">
				<h2>Category > <?php echo $term->name; ?></h2>
			</div>
		</div>
	</div>
</section>
<section class="article-cat-content">
	<div class="container">
		<div class="cols has-padding-50">
			<?php if ( $articles->have_posts() ) : while ( $articles->have_posts() ) : $articles->the_post(); ?>
				<div class="col is-12 is-6-md is-3-lg load-hidden">
					<?php get_template_part('includes/shared/post-tile'); ?>
				</div>
			<?php endwhile; endif; ?>
		</div>
	</div>
</section>
<?php get_footer(); ?>