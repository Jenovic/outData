
<footer class="footer">
    <div class="container">
        <div class="cols">
            <div class="col is-12 is-6-md is-6-lg static-nav">
                <?php
                wp_nav_menu(array(
										'theme_location' => 'footer_a',
										'container' => '',
                ));
                ?>
						</div>
						<div class="col is-12 is-6-lg footer__support-column">
							<a class="button button--blue" href="/contact-us">Contact us</a>

							<ul class="menu">
								<li class="menu-item"><a href="mailto:info.outdata@gmail.com">info.outdata@gmail.com</a></li>
								<!-- <li class="menu-item">0123456789</li> -->
							</ul>
            </div>
            <div class="col is-12 footer__legal">
                <div class="footer__legal__pages">
                    <ul class="menu menu__legal">
                        <li>&copy; OUTDATA <?php echo date('Y'); ?></li>
                        <?php
                        wp_nav_menu(array(
                            'theme_location' => 'footer_legal',
                            'container'      => '',
                            'items_wrap'     => '%3$s'
                        ));
                        ?>
                    </ul>
                </div>
                <div class="footer__legal__website">
                    
                </div>
            </div>
        </div>
    </div>
</footer>

<?php wp_footer(); ?>

</body>
</html>