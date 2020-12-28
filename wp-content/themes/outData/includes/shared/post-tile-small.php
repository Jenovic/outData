<a href="<?php the_permalink(); ?>" class="tile-article small">
	<div class="tile-article__content">
		<h3><?php the_title(); ?></h3>
		<div class="meta">
			<div class="meta_time">
				<span class="icon"><i class="fas fa-clock"></i></span>
				<?php echo theme::meks_time_ago(); ?>
			</div>
			<div class="meta_author">
				<span><?php echo get_the_author(); ?></span>
			</div>
		</div>
	</div>
</a>