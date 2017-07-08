<?php  

get_header();
?>


	<?php while(have_posts()): the_post(); ?>
		<div class="hero" style="background-image:url(<?= get_the_post_thumbnail_url(); ?>);">
			<div class="hero-content">
				<div class="hero-text">
					<h1><?php the_title(); ?></h1>
					<h5><?php bloginfo('description'); ?></h5>
				</div>
			</div>
		</div>
		
		<div class="main-content container content-wrapper">
			<main class="text-center content-text clear">
				<?php the_content(); ?>
			</main>
		</div>

	<?php endwhile; ?>

<?php

get_footer();