<?php
// Template name: Contact
get_header(); ?>
<?php
$img = get_field('about_hero_image');
?>

<section class="breadcrumb-contact">
	<div class="container">
		<div class="cols">
			<div class="col is-12">
					<?php
						if ( function_exists('yoast_breadcrumb') ) {
							yoast_breadcrumb( '<p id="breadcrumbs">','</p>' );
						}
					?>
			</div>
		</div>
	</div>
</section>

<section class="hero-contact">
	<div class="container">
		<div class="cols">
			<div class="col is-12 load-hidden">
				<h1><?php the_field('contact_hero_title'); ?></h1>
			</div>
		</div>
	</div>
</section>

<section class="content-about">
	<div class="container">
		<div class="cols">
			<div class="col is-12 is-8-md is-8-lg load-hidden">
				<?php the_content(); ?>
			</div>
			<div class="col is-12 is-4-md is-4-lg load-hidden">
				<h1>Hello</h1>
			</div>
		</div>
	</div>
</section>

<?php get_footer(); ?>