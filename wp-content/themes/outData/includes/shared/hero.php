<?php
$img = get_field('hero_image');
?>

<section class="hero-home">
	<div class="container">
		<div class="cols">
			<div class="bg-circle"></div>
			<div class="bg-open-circle"></div>
			<div class="sm-open-circle"></div>
			<div class="sm-circle">
				<div class="spoke"></div>
				<div class="spoke"></div>
				<div class="spoke"></div>
				<div class="spoke"></div>
				<div class="hole"></div>
			</div>
			<div class="col is-12 is-6-md load-hidden">
				<div class="hero-home__content">
						<h3 class="ctrl-white"><?php the_field('hero_pre_title'); ?></h3>
					
						<span id="hero-home-heading-animations" class="hero-home__animation-lineup ctrl-white hidden-mobile hidden-tablet hidden-desktop">
							<span><?php the_field('animation_text_one'); ?></span>
							<span><?php the_field('animation_text_two'); ?></span>
							<span><?php the_field('animation_text_three'); ?></span>
						</span>
					
						<p class="fake-h1 h1 ctrl-white">
						<?php the_field('hero_title'); ?>&nbsp;<span></span>
						</p>
					
					<div class="animated-icons">
					<div class="animated-icons-wrapper">
						<a href="https://github.com/theoutdata" class="orange-shadow" target="blank">
							<div>
								<span></span><span></span><span></span><span></span>
								<span class="icon is-large fas fa-3x">
									<i class="fab fa-github"></i>
								</span>
							</div>
						</a>
						<a href="https://twitter.com/outdata8" class="orange-border" target="blank">
							<div>
								<span></span><span></span><span></span><span></span>
								<span class="icon is-large fas fa-3x">
									<i class="fab fa-twitter"></i>
								</span>
							</div>
						</a>
					</div>
						<div class="vl"></div>
						<div class="description">
							<p class="ctrl-white"><?php the_field('hero_description'); ?></p>
							<span><a href="/article" class="started">Getting started <span class="icon "><i class="fas fa-arrow-right"></i></span></a></span>
						</div>
					</div>
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
	<?php get_template_part('includes/svgs/shape'); ?>
</section>
