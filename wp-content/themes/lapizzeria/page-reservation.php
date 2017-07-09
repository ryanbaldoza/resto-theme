<?php  
/*
*	Template Name: Contact Us
*/


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
		
		<div class="main-content container content-wrapper reservation">
			<main class="content-text clear">
				<div class="reservation-info">
					<form method="post" class="reservation-form">
						<h3 class="primary-text">Reservation Form</h3>
						<div class="field">
							<input type="text" name="name" placeholder="Your Name" required>
						</div>
						<div class="field">
							<input type="email" name="email" placeholder="Your Email" required>
						</div>
						<div class="field">
							<input type="tel" name="phone" placeholder="Your Contact No." required>
						</div>
						<div class="field">
							<input type="text" id="datetimepicker" name="date" placeholder="Date" required>
						</div>

						<div class="field">
							<textarea name="message" id="" cols="30" rows="10" placeholder="Your Message"></textarea>
						</div>
						<input type="submit" name="reservation" value="Send Reservation" class="button primary">
						<input type="hidden" name="hidden" value="1">
					</form><!-- reservation-form -->
				</div><!-- reservation-info -->
			</main><!-- content-text -->
		</div><!-- main-content container -->

	<?php endwhile; ?>

<?php

get_footer();