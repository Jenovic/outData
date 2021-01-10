<?php get_header(); ?>

<?php if ( have_posts() ) :  ?>
	<section class="archive-search">
		<div class="container">
			<div class="cols">
					<div class="col is-12 load-hidden">
							<h1 class="no-margin"><?php _e( "Results for &#39;" . $s ."&#39;", 'outdata' ) ?></h1>
							<form action="/" method="get" id="search" class="search" autocomplete="off">
								<input name="s" placeholder="Search..." value="<?php echo get_search_query() ?>" autocomplete="off">
								<button type="submit"><span class="icon-search"></span></button>
							</form>
					</div>
					<?php while ( have_posts() ) : the_post(); ?>
						<div class="col is-12 is-10-md is-8-lg">
								<div class="search-result">
										<a href="<?php the_permalink(); ?>"><h4><?php the_title(); ?></h4></a>
										
										<?php the_excerpt(); ?>
								</div>
						</div>
					<?php endwhile; ?>
					<div class="col is-12">
						<?php numeric_posts_nav(); ?>
					</div>
			</div>
		</div>
	</section>
<?php else : ?>
	<section class="no-results archive-search">
			<div class="container">
					<div class="cols">
							<div class="col is-12 load-hidden">
									<h2><?php _e( 'Sorry no search results for "'. $s .'" were found.', 'agilisys' ); ?></h2>
									<p><?php _e( 'Please try broadening your search term', 'agilisys' ); ?></p>
									<form action="/" method="get" id="search" class="search" autocomplete="off">
										<input name="s" placeholder="Search..." value="<?php echo get_search_query() ?>" autocomplete="off">
										<button type="submit"><span class="icon-search"></span></button>
									</form>
							</div>
					</div>
			</div>
	</section>
<?php endif; ?>

<?php get_footer(); ?>
