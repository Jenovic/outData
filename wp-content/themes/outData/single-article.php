<?php get_header(); ?>

<section class="article-single-hero">
	<div class="container">
		<div class="cols">
			<div class="col is-12 is-12-md is-2-lg"></div>
			<div class="col is-12 is-12-md is-8-lg load-hidden">
				<h1 class="article-single-hero__title"><?php echo the_title(); ?></h1>
				<div class="post_meta_wrapper">
					<div class="article-single-hero__post_meta">
						<?php 
							$get_author_id = get_the_author_meta('ID');
							$get_author_gravatar = get_avatar_url($get_author_id, array('size' => 100));
							echo '<img src="'.$get_author_gravatar.'" alt="'.get_the_title().'" />';
						?>
						<div class="article-single-hero__post_meta-content">
							<div class="author">
								<span class="name"><?php the_author(); ?></span>
							</div>
							<span class="icon"><i class="fas fa-clock"></i></span>
							<span class="time"><?php echo theme::meks_time_ago(); ?></span>
						</div>
					</div>
					<div class="article-single-hero__post_socials">
						<span>Share this article</span>
						<div>
							<a href="https://www.facebook.com/sharer/sharer.php?u=example.org" target="blank"><span class="icon "><i class="fab fa-facebook fa-lg"></i></span></a>
							<a href="https://twitter.com/intent/tweet" class="twitter-share-button"><span class="icon "><i class="fab fa-twitter fa-lg"></i></span></a>
							<a href="https://www.linkedin.com/sharing/share-offsite"><span class="icon "><i class="fab fa-linkedin fa-lg"></i></span></a>
						</div>
					</div>
				</div>
				<div class="article-single-hero__image" style="background: url(<?php the_post_thumbnail_url('archive-thumbnail'); ?>);"></div>
			</div>
			<div class="col is-12 is-12-md is-2-lg"></div>
		</div>
	</div>
</section>

<section class="article-single-content">
	<div class="container">
		<div class="cols">
			<div class="col is-12 is-12-md is-2-lg"></div>
			<div class="col is-12 is-12-md is-8-lg load-hidden">
				<?php the_content(); ?>
			</div>
			<div class="col is-12 is-12-md is-2-lg"></div>
		</div>
	</div>
</section>

<?php get_footer(); ?>