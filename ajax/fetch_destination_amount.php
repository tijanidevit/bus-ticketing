<?php 
	include_once '../core/trips.class.php';
	include_once '../core/core.function.php';

	echo fetch_destination_amount();
	function fetch_destination_amount(){
		$trip_obj = new Trips();
		$destination_id = $_POST['destination_id'];
		$bus_id = $_POST['bus_id'];
		$take_off_time_id = $_POST['destination_id'];

		$destination_trip = $trip_obj->fetch_trip_details($destination_id,$bus_id,$take_off_time_id);

		return floatval($destination_trip['amount']);
	}
?>