<?php
// Template name: About
get_header(); ?>
<?php
$img = get_field('about_hero_image');
?>

<section class="breadcrumb-about">
	<div class="container">
		<div class="cols align-center">
			<div class="col is-12 is-10-md is-10-lg load-hidden">
					<?php
						if ( function_exists('yoast_breadcrumb') ) {
							yoast_breadcrumb( '<p id="breadcrumbs">','</p>' );
						}
					?>
			</div>
		</div>
	</div>
</section>

<section class="hero-about">
	<div class="container">
		<div class="cols align-center">
			<div class="col is-12 is-10-md is-10-lg load-hidden">
				<h1><?php the_field('about_hero_title'); ?></h1>
			</div>
		</div>
	</div>
	<div class="custom-shape-wrap custom-shape-bottom-type-3"><div class="shape-container"><svg width="100%" height="131px"><defs><pattern id="custom-shape-bottom-type-3-f0acbaaca1f6026daf77b2c0c046c81d" preserveAspectRatio="none" style="background-repeat: no-repeat;" patternUnits="userSpaceOnUse" x="0" y="0" width="100%" height="131px" viewBox="0 0 100 130"><polygon fill="#f5f5f5" "="" points="100,0 100,130 -1,130 "></polygon></pattern></defs><rect x="0" y="0" width="100%" height="131px" fill="url(#custom-shape-bottom-type-3-f0acbaaca1f6026daf77b2c0c046c81d)"></rect></svg></div></div>
</section>

<section class="image-about">
	<div class="container">
		<div class="cols align-center">
			<div class="col is-12 is-10-md is-10-lg">
				<div class="image_wrapper">
					<?php if ($img) : ?>
						<img class="load-hidden" src="<?php echo $img['url']; ?>" alt="<?php echo $img['alt']; ?>">
					<?php endif; ?>
				</div>
			</div>
		</div>
	</div>
</section>

<section class="content-about">
	<div class="container">
		<div class="cols align-center">
			<div class="col is-12 is-10-md is-8-lg load-hidden">
				<?php the_content(); ?>
			</div>
		</div>
	</div>
</section>

<?php get_footer(); ?>