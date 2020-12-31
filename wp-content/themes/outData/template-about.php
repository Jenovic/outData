<?php
// Template name: About
get_header(); ?>
<?php
$img = get_field('about_hero_image');
?>

<section class="breadcrumb-about">
	<div class="container">
		<div class="cols align-center">
			<div class="col is-12 is-10-md is-8-lg load-hidden">
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
			<div class="col is-12 is-10-md is-8-lg load-hidden">
				<h1><?php the_field('about_hero_title'); ?></h1>
			</div>
		</div>
	</div>
</section>

<section class="image-about">
	<div class="container">
		<div class="cols align-center">
			<div class="col is-12 is-10-md is-8-lg">
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