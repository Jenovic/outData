<?php get_header(); ?>

<section class="article-single">
	<div class="container">
		<div class="cols">
			<div class="col is-12 is-8-md">
				<div class="article-single-hero load-hidden">
					<?php
						if ( function_exists('yoast_breadcrumb') ) {
							yoast_breadcrumb( '<p id="breadcrumbs">','</p>' );
						}
					?>
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
									<span class="name"><?php echo get_the_author_meta('first_name', $get_author_id); ?></span>
									<span class="name"><?php echo ' '; ?></span>
									<span class="name"><?php echo get_the_author_meta('last_name', $get_author_id); ?></span>
								</div>
								<span class="icon"><i class="fas fa-clock"></i></span>
								<span class="time"><?php echo theme::meks_time_ago(); ?></span>
							</div>
						</div>
						<div class="article-single-hero__post_socials">
							<span>Share this article:</span>
							<div>
								<a href="https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink(); ?>" target="blank"><span class="icon "><i class="fab fa-facebook fa-lg"></i></span></a>
								<a href="https://twitter.com/intent/tweet?text=Check%20out%20this%20article%20on%20outdata.com%20-%20<?php the_permalink(); ?>" class="twitter-share-button" target="blank"><span class="icon "><i class="fab fa-twitter fa-lg"></i></span></a>
								<a target="blank" href="https://www.linkedin.com/shareArticle?mini=true&url=<?php the_permalink(); ?>&title=I%20found%20this%20article%20on%20outdata.com&summary=&source="><span class="icon "><i class="fab fa-linkedin fa-lg"></i></span></a>
							</div>
						</div>
					</div>
					<div class="article-single-hero__image" style="background: url(<?php the_post_thumbnail_url('archive-thumbnail'); ?>);"></div>
					<div class="hero_image_creds"><?php echo get_field("image_author_credit"); ?></div>
				</div>
				<div class="article-single-content load-hidden">
					<?php the_content(); ?>
				</div>
				<div class="article-single__post-body load-hidden">
					<div class="socials flex align-right">
						<a href="https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink(); ?>" target="blank"><span class="icon "><i class="fab fa-facebook fa-lg"></i></span></a>
						<a href="https://twitter.com/intent/tweet?text=Check%20out%20this%20article%20on%20outdata.com%20-%20<?php the_permalink(); ?>" class="twitter-share-button" target="blank"><span class="icon "><i class="fab fa-twitter fa-lg"></i></span></a>
						<a target="blank" href="https://www.linkedin.com/shareArticle?mini=true&url=<?php the_permalink(); ?>&title=I%20found%20this%20article%20on%20outdata.com&summary=&source="><span class="icon "><i class="fab fa-linkedin fa-lg"></i></span></a>
					</div>
					<div class="tags flex align-center">
						<?php get_template_part('includes/shared/tags'); ?>
					</div>
					<div class="comments-block">
						<?php 
							if ( comments_open() || get_comments_number() ) {
								comments_template();
							} 
						?>
					</div>
				</div>
			</div>
			<!-- <div class="col is-12 is-12-md"></div> -->
			<div class="col is-12 is-4-md">
				<div class="article-single__related-posts load-hidden">
						<h3>Related Articles</h3>
						<?php 
							$current_cat = (get_the_category()) ? get_the_category() : false;
							$related = get_posts( array(
								'post_type' => 'article',
								'posts_per_page' => 3,
								'category' => ($current_cat) ? $current_cat[0]->term_id : '',
								'post__not_in' => array($post->ID)
							));
						?>
						<?php if ($related) : ?>
							<div class="posts">
								<?php foreach( $related as $post ) : setup_postdata($post); ?>
										<?php get_template_part('includes/shared/post-tile-small'); ?>
								<?php endforeach; wp_reset_postdata(); ?>
							</div>
						<?php else: ?>
							<div class="posts">
								<p>No article found...</p>
							</div>
						<?php endif; ?>
					</div>
				</div>
		</div>
	</div>
</section>

<?php get_footer(); ?>