<?php
$img = get_field('cta_image');
?>
<section class="cta">
	<div class="container">
		<div class="cols bg-white">
			<div class="col is-12 is-6-md">
				<div class="cta-image">
					<?php if ($img) : ?>
						<img class="load-hidden" src="<?php echo $img['url']; ?>" alt="<?php echo $img['alt']; ?>">
					<?php endif; ?>
				</div>
			</div>
			<div class="col is-12 is-6-md flex">
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