	<footer>
	    <div class="footer-logo">
	        <a href="<?= esc_url(home_url('/')); ?>">
	            <img src="<?= get_template_directory_uri(); ?>/img/logo.svg" alt="La Pizzeria Logo" class="footer-logo-img">
	        </a>
	    </div><!-- .logo -->
		<?php 
		$args = array(
			'theme_location'	=>	'header-menu',
			'container'			=>	'nav',
			'after'				=>	'<span class="separator"> | </span>'
		);
		wp_nav_menu($args);

		?>
		
            <?php 
                $args = array(
                    'theme_location'    =>  'social-menu',
                    'container'         =>  'nav',
                    'container_class'   =>  'social-nav',
                    'container_id'      =>  'socials',
                    'link_before'       =>  '<span class="sr-text"',
                    'link_after'        =>  '</span>'   
                );
                wp_nav_menu($args);

             ?>
       

		<address class="footer-address">
	        <p><strong>1234 San Juan, Apalit, Pampanga</strong></p>
	        <p><strong>Phone Number: +45-301-7890</strong></p>
		</address>
		<p class="copyright">All Rights Reserved <?php echo date('Y') ?></p>
	</footer>
		
		<?php wp_footer(); ?>
    </body>
</html>