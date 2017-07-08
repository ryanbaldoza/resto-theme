<?php  

$image_1 = get_field('image_1');
$image_2 = get_field('image_2');
$image_3 = get_field('image_3');



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
			<main class="text-center content-text">
				<?php the_content(); ?>
			</main><!-- text-center content-text -->


		<div class="box-information clear">
			<div class="single-box">
	
				<?php 
					$img_thumbnail1 = wp_get_attachment_image_src( $image_1['id'], 'boxes');
				 ?>
		
				<img src="<?php echo $img_thumbnail1[0] ?>" alt="<?php echo $image_1['alt']; ?>" class="box-img">
				<div class="content-box">
					<?php the_field('description_1'); ?>
				</div><!-- content-box -->
			</div><!-- single-box -->
			<div class="single-box" id="second-box">
				<div class="content-box" id="second-content">
					<?php the_field('description_2'); ?>
				</div><!-- content-box -->
				<?php 
					$img_thumbnail = wp_get_attachment_image_src( $image_2['id'], 'boxes');
				 ?>
				<img src="<?php echo $img_thumbnail[0] ?>" alt="<?php echo $image_2['alt']; ?>" class="box-img">

			</div><!-- single-box -->
			<div class="single-box">
				<?php 
					$img_thumbnail = wp_get_attachment_image_src( $image_3['id'], 'boxes');
				 ?>
				<img src="<?php echo $img_thumbnail[0] ?>" alt="<?php echo $image_3['alt']; ?>" class="box-img">
				<div class="content-box">
					<?php the_field('description_3'); ?>
				</div><!-- content-box -->
			</div><!-- single-box -->
			
		</div><!-- box-information clear -->
	</div><!-- main-content container content-wrapper -->
	<?php endwhile; ?>

<?php

get_footer();