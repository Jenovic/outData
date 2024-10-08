<a href="<?php the_permalink(); ?>" class="tile-article">
	<?php if (has_post_thumbnail()) : ?>
		<div class="tile-article__image" style="background: url(<?php the_post_thumbnail_url('archive-thumbnail'); ?>);">
			<div class="overlay"></div>
		</div>
	<?php endif; ?>
	<div class="tile-article__content">
		<h3><?php the_title(); ?></h3>

		<div class="meta">
			<div class="meta_time">
				<span class="icon"><i class="fas fa-clock"></i></span>
				<?php echo theme::meks_time_ago(); ?>
			</div>
			<!-- <div class="meta_author">
				<span><?php echo get_field("author_name"); ?></span>
			</div> -->
		</div>
	</div>
</a>