<?php
$img = get_field('hero_image');
?>

<section class="hero-home">
	<div class="container">
		<div class="cols">
			<div class="bg-circle"></div>
			<div class="sm-circle"></div>
			<div class="bg-open-circle"></div>
			<div class="sm-open-circle"></div>
			<div class="col is-12 is-6-md load-hidden">
				<div class="hero-home__content">
					<h1 class="ctrl-white"><?php the_field('hero_title'); ?></h1>
					<p class="ctrl-white"><?php the_field('hero_description'); ?></p>
				</div>
			</div>
			<div class="col is-12 is-6-md">
				<div class="hero-home__image">
					<?php if ($img) : ?>
						<img class="load-hidden" src="<?php echo $img['url']; ?>" alt="<?php echo $img['alt']; ?>">
					<?php endif; ?>
				</div>
			</div>
		</div>
	</div>
</section>