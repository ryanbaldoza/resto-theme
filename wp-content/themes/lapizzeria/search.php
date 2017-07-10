<?php  

get_header();
?>


	
		<div class="hero" style="background-image:url(<?php echo get_template_directory_uri(); ?>/img/bg_ingredients.jpg);">
			<div class="hero-content">
				<div class="hero-text">
					<?php if ( have_posts() ) : ?>
						<h1><?php printf( __( 'Search Results for: %s', 'twentyseventeen' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
					<?php else : ?>
						<h1><?php _e( 'Nothing Found', 'twentyseventeen' ); ?></h1>
					<?php endif; ?>
					<h5><?php bloginfo('description'); ?></h5>
				</div>
			</div>
		</div>
		
		<div class="main-content container content-wrapper">
			<div class="container-grid">
				<main class="content-text columns2-3">
				<?php if ( have_posts() ) : ?>
					<?php while(have_posts()): the_post(); ?>
						<article class="entry">
							<a href="<?php the_permalink(); ?>">
								<?php the_post_thumbnail('specialties'); ?>	
							</a>
							<header class="entry-header clear">
								<div class="date">
									<time>
										<?php echo the_time('d'); ?>
										<span><?php echo the_time('M'); ?></span>
									</time>
								</div><!-- date -->
								<div class="entry-title">
									<?php the_title('<h2>','</h2>') ?>
									<p class="author">
										<i class="fa fa-user" aria-hidden="true"></i>
										<?php the_author(); ?>
									</p><!-- author -->
								</div><!-- entry-title -->
							</header><!-- entry-header -->
							<div class="entry-content">
								<?php the_excerpt(); ?>
								<a href="<?php the_permalink(); ?>" class="button primary">Read More</a>
							</div><!-- entry-content -->
						</article><!-- entry -->
					<?php endwhile; ?>
				<?php  
					the_posts_pagination( array(
					'prev_text' => 'Previous',
					'next_text' => 'Next'
					) );
				?>

				<?php else : ?>
					<p><?php _e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'twentyseventeen' ); ?></p>
				<?php endif; ?>	
				</main><!-- content-text -->
				<?php get_sidebar(); ?>
			</div><!-- container-grid -->
		</div><!-- main-content -->



<?php

get_footer();