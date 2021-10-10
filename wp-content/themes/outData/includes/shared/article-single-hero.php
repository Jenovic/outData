<section class="article-single-hero" style="background: url(<?php the_post_thumbnail_url('archive-thumbnail'); ?>);">
	<div class="container">
		<div class="cols">
			<div class="col is-12">
				<?php
					if ( function_exists('yoast_breadcrumb') ) {
						yoast_breadcrumb( '<p id="breadcrumbs">','</p>' );
					}
				?>
			</div>
			<div class="col is-12">
				<div class="article-single-hero--content">
					<h1 class="article-single-hero__title"><?php echo the_title(); ?></h1>
					<?php
						$yoast_meta = get_post_meta($post->ID, '_yoast_wpseo_metadesc', true);
						if ($yoast_meta) { //check if the variable(with meta value) isn't empty
								echo '<span>'.$yoast_meta.'</span>';
						}
					?>
				</div>
			</div>
			<div class="col is-12"><div class="hero_image_creds"><?php echo get_field("image_author_credit"); ?></div></div>
		</div>
	</div>
</section>