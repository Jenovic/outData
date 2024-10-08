<?php
// Template name: Contact
get_header(); ?>
<?php
$img = get_field('contact_hero_image');
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
	<?php get_template_part('includes/svgs/shape'); ?>
</section>

<section class="content-contact">
	<div class="container">
		<div class="cols content-contact__wrapper">
			<div class="col is-12 is-7-md is-8-lg load-hidden">
				<?php the_content(); ?>
			</div>
			<div class="col is-12 is-5-md is-4-lg load-hidden">
				<div class="image_wrapper">
					<?php if ($img) : ?>
						<img class="load-hidden" src="<?php echo $img['url']; ?>" alt="<?php echo $img['alt']; ?>">
					<?php endif; ?>
				</div>
				<div class="contact-details">
					<ul>
						<li><span>Contact details:</span></li>
						<li><a href="mailto:info.outdata@gmail.com">info.outdata@gmail.com</a></li>
						<li><a href="https://github.com/theoutdata">https://github.com/theoutdata</a></li>
						<li><a href="https://twitter.com/outdata8">https://twitter.com/outdata8</a></li>
					</ul>
				</div>
			</div>
		</div>
	</div>
</section>

<?php get_footer(); ?>