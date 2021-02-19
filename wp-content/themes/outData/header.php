<!DOCTYPE html>
<head>
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
	<meta name="format-detection" content="telephone=no" />
	<meta http-equiv="Content-Language" content="en">
	<link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
	<!-- <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png"> -->
	<link rel="manifest" href="/manifest.json">
	<link rel="mask-icon" href="/safari-pinned-tab.svg" color="#8f61ff">
	<meta name="msapplication-TileColor" content="#da532c">
	<meta name="theme-color" content="#ffffff">
	<meta name="Description" content="Dplusm Systems and Tests">
	<script src="https://unpkg.com/scrollreveal"></script>
	<title><?php echo wp_title(); ?></title>
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>

<header class="header" id="js-header">
		<div class="container">
		<a href="/" class="header__logo">
					<?php get_template_part('includes/svgs/logo'); ?>
				</a>
		
			<nav class="header__nav">
				<?php wp_nav_menu(
					array(
						'theme_location'   => 'main_menu',
						'container' => '',
					) );
				?>
				<!-- <?php wp_nav_menu(
					array(
						'theme_location'   => 'mobile_nav',
						'container' => '',
					) );
				?> -->
			</nav>

			<div class="header__actions">
				<a class="button button--blue" href="/contact-us">Contact us</a>
			</div>

			<div class="header__search js-search">
				<form action="/" method="get" id="search" class="search" autocomplete="off">
					<input name="s" placeholder="Search..." autocomplete="off">
					<button type="submit"><span class="icon-search"></span></button>
				</form>
				<div class="header__search__toggle js-search-toggle">&nbsp;</div>
			</div>

			<div class="header__mode">
				<a class="header__mode_dark"></a>
				<a class="header__mode_light active"></a>
			</div>

			<div class="header__toggle">
				<button id="mobile-toggle" role="button" aria-label="Toggle Navigation" class="hamburger hamburger--collapse js-hamburger">
					<span class="hamburger-box">
						<span class="hamburger-inner"></span>
					</span>
				</button>
			</div>
		</div>
	</header>

<div id="top"></div>

<a class="back-to-top" href="#top">
	<svg width="50" height="23" viewBox="0 0 50 23" xmlns="https://www.w3.org/2000/svg"><title>Shape</title><path d="M24.829 0L49.67 20.062l-1.7 2.12L24.83 3.49 1.7 22.183 0 20.063z" fill="#222"/></svg>
</a>