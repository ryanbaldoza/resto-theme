<?php  

function lapizzeria_options() {
	add_menu_page('La Pizzeria', 'La Pizzeria Options', 'administrator', 'lapizzeria_options', 'lapizzeria_adjustments', get_template_directory_uri() . '/img/icon-pizza-slice.png', 21);

	add_submenu_page('lapizzeria_options', 'Reservations', 'Reservations', 'administrator', 'lapizzeria_reservations', 'lapizzeria_reservations');
}
add_action('admin_menu', 'lapizzeria_options');


function lapizzeria_settings() {

	//La Pizzeria Google Maps
	register_setting('lapizzeria_options_gmaps', 'lapizzeria_gmaps_latitude');
	register_setting('lapizzeria_options_gmaps', 'lapizzeria_gmaps_longitude');
	register_setting('lapizzeria_options_gmaps', 'lapizzeria_gmaps_zoom');
	register_setting('lapizzeria_options_gmaps', 'lapizzeria_gmaps_key');

	//La Pizzeria Information Group
	register_setting('lapizzeria_options_info', 'lapizzeria_info_address');
	register_setting('lapizzeria_options_info', 'lapizzeria_info_shophours');
}
add_action('init', 'lapizzeria_settings');

function lapizzeria_adjustments() { ?>

	<div class="wrap">
		<h1>La Pizzeria Options</h1>

		<form action="options.php" method="post">
			<?php  
				settings_fields('lapizzeria_options_gmaps');
				do_settings_sections('lapizzeria_options_gmaps');
			?>

			<h2>Google Maps</h2>
			<table class="form-table">
				<tr valign="top">
					<th scope="row">Latitude: </th>
					<td>
						<input type="text" name="lapizzeria_gmaps_latitude" value="<?php echo esc_attr(get_option('lapizzeria_gmaps_latitude')); ?>" class="regular-text">
					</td>
				</tr>
				<tr valign="top">
					<th scope="row">Longitude: </th>
					<td>
						<input type="text" name="lapizzeria_gmaps_longitude" value="<?php echo esc_attr(get_option('lapizzeria_gmaps_longitude')); ?>" class="regular-text">
					</td>
				</tr>
				<tr valign="top">
					<th scope="row">Zoom: </th>
					<td>
						<input type="text" name="lapizzeria_gmaps_zoom" value="<?php echo esc_attr(get_option('lapizzeria_gmaps_zoom')); ?>" class="regular-text">
					</td>
				</tr>
				<tr valign="top">
					<th scope="row">API Key: </th>
					<td>
						<input type="text" name="lapizzeria_gmaps_key" value="<?php echo esc_attr(get_option('lapizzeria_gmaps_key')); ?>" class="regular-text">
					</td>
				</tr>
			</table>
			<?php  
				settings_fields('lapizzeria_options_info');
				do_settings_sections('lapizzeria_options_info');
			?>
			<h2>Restaurant Information</h2>
			<table class="form-table">
				<tr valign="top">
					<th scope="row">Address: </th>
					<td>
						<input type="text" name="lapizzeria_info_address" value="<?php echo esc_attr(get_option('lapizzeria_info_address')); ?>" class="regular-text">
					</td>
				</tr>
				<tr valign="top">
					<th scope="row">Shop Hours: </th>
					<td>
						<input type="text" name="lapizzeria_info_shophours" value="<?php echo esc_attr(get_option('lapizzeria_info_shophours')); ?>" class="regular-text">
					</td>
				</tr>

			</table>
			<?php submit_button(); ?>
		</form>
	</div>


<?php
}

function lapizzeria_reservations() { ?>
	<div class="wrap">
		<h1>Reservations</h1>
		<table class="wp-list-table widefat striped">
			<thead>
				<tr>
					<th class="manage-column">ID</th>
					<th class="manage-column">Name</th>
					<th class="manage-column">Date of Reservation</th>
					<th class="manage-column">Email</th>
					<th class="manage-column">Contact No.</th>
					<th class="manage-column">Message</th>
				</tr>
			</thead>
			<tbody>
				<?php 
					global $wpdb;
					$table = $wpdb->prefix . 'reservations';
					$reservations = $wpdb->get_results("SELECT * FROM $table", ARRAY_A);

					foreach ($reservations as $reservation) : ?>
				
				<tr>
					<td><?php echo $reservation['id'] ?></td>
					<td><?php echo $reservation['name'] ?></td>
					<td><?php echo $reservation['date'] ?></td>
					<td><?php echo $reservation['email'] ?></td>
					<td><?php echo $reservation['phone'] ?></td>
					<td><?php echo $reservation['message'] ?></td>
				</tr>


				<?php endforeach; ?>	
				
			</tbody>
		</table>
	</div>



<?php  }

?> 