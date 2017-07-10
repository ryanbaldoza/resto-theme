<?php  

get_header();
?>


	<?php while(have_posts()): the_post(); ?>
		<div class="hero" style="background-image:url(<?= get_the_post_thumbnail_url(); ?>);">
			<div class="hero-content">
				<div class="hero-text">
					<h1><?php the_field('hero_header'); ?></h1>
					<h5><?php bloginfo('description'); ?></h5>
				</div>

				<?php the_content(); ?>	
				<a class="button secondary" href="<?php the_field('hero_button_link') ?>"><?php the_field('hero_button_text') ?></a>
			</div>
		</div>
		<section class="promo">

				<div class="promo-content">
					<h2><?php the_field('promo_post') ?></h2>
					<a href="<?php the_field('promo_link') ?>" class="button primary">Read More</a>
				</div>
		</section>
		
		<div class="main-content container content-wrapper">
			<main class="container-grid clear">
				<h2 class="primary-text">Our Pizza Specials</h2>

				<?php $args = array(
					'posts_per_page'	=> 3,
					'post_type'			=> 'specialties',
					'category_name'		=> 'pizzas',
					'orderby'			=> 'rand'

				); 

				$pizzas = new WP_Query($args);
				while($pizzas->have_posts()): $pizzas->the_post(); ?>
				
				<div class="specialty columns1-3">
					<div class="specialty-panel" data-content="<?php the_title();?>">
						<?php the_post_thumbnail('specialty-portrait'); ?>
						<div class="information">
							<?php the_title('<h3>', '</h3>'); ?>
							<?php the_content(); ?>
							<p class="price">₱<?php the_field('price'); ?></p>
							<a href="<?php the_permalink(); ?>" class="button primary">Read More</a>
						</div>
					</div>
				</div>

				<?php endwhile; wp_reset_postdata(); ?>
				

			</main>

			<section class="location-reservation clear">
				<div class="container-grid">
					<div class="map-col columns2-4">
						<div id="map"></div>
					</div>

					<div class="columns2-4">
						<?php get_template_part( 'templates/reservation', 'form' ); ?>
					</div>
				</div>
			</section>
		</div>

	<?php endwhile; ?>

<?php
get_footer();