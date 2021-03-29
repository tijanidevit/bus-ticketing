<?php 
	include_once '../core/trips.class.php';
	include_once '../core/core.function.php';

	echo fetch_destination_times();
	function fetch_destination_times(){
		$trip_obj = new Trips();
		$output = '';
		$destination_trip = $trip_obj->fetch_destination_details($_POST['destination_id']);

		foreach ($destination_trip as $dt) {
			$output .= '<option value="'.$dt['bus_id'].'">'.$dt['bus'].'</option>';
		}

		return $output;
	}
?>