<?php  

get_header();
?>


	<?php while(have_posts()): the_post(); ?>
		<div class="hero" style="background-image:url(<?= get_the_post_thumbnail_url(); ?>);">
			<div class="hero-content">
				<div class="hero-text">
					<h1><?php the_title(); ?></h1>
					<h5><?php bloginfo('description'); ?></h5>
				</div><!-- hero-text -->
			</div><!-- hero-content -->
		</div><!-- hero -->
		
		<div class="main-content container content-wrapper">
			<main class="content-text">
				<div class="entry-information clear">
					<div class="date">
						<time>
							<?php echo the_time('d'); ?>
							<span><?php echo the_time('M'); ?></span>
						</time>
					</div><!-- date -->
					<p class="author">
						<i class="fa fa-user" aria-hidden="true"></i>
						<?php the_author(); ?>
					</p><!-- author -->
				</div><!-- entry-information -->
				<?php the_content(); ?>
			</main><!-- content-text -->

			<div class="comment-list">
				<ol class="commentlist">
					<?php  
						$comments = get_comments(array(
							'post_id'		=>	$post->ID,
							'status'		=>	'approve'	
						));

						wp_list_comments(array(
							'per_page'			=> 10,
							'reverse_top_level'	=> false
						), $comments);
					?>
				</ol>
			</div><!-- comment-list -->

			<div class="comments">
				<?php comment_form(); ?>
			</div><!-- comments -->
		</div><!-- main-content container content-wrapper -->

	<?php endwhile; ?>

<?php

get_footer();