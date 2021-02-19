<?php
$img = get_field('cta_image');
$img_dark = get_field('cta_image_dark_mode');
?>
<section class="cta">
	<div class="container">
		<div class="cols load-hidden">
			<div class="col is-12 is-6-md  bg-white">
				<div class="cta-image ">
					<?php if ($img) : ?>
						<img src="<?php echo $img['url']; ?>" alt="<?php echo $img['alt']; ?>">
					<?php endif; ?>
				</div>

				<div class="cta-image-dark">
					<?php if ($img_dark) : ?>
						<img src="<?php echo $img_dark['url']; ?>" alt="<?php echo $img_dark['alt']; ?>">
					<?php endif; ?>
				</div>
			</div>
			<div class="col is-12 is-6-md flex bg-white">
				<div class="cta-content">
					<h1><?php the_field('cta_title'); ?></h1>
					<div class="cta-content__button">
						<a href="<?php the_field('cta_button_link'); ?>" class="button button--clear">
							<span><?php the_field('cta_button_text'); ?></span>
							<span class="icon "><i class="fas fa-arrow-right"></i></span>
						</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>