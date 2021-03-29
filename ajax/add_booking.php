<?php 
	session_start();
	include_once '../core/bookings.class.php';
	include_once '../core/buses.class.php';
	include_once '../core/core.function.php';

	echo add_booking();
	function add_booking(){
		$booking = new Bookings();
		$bus_obj = new Buses();

		if (!isset($_SESSION['bus_user'])) {
			return displayWarning('Please Login <a href="login">Here</a> to Proceed.');
		}
		$user_id = $_SESSION['bus_user']['id'];


		// return json_encode($_POST);

		$destination_id = $_POST['destination_id'];
		$take_off_time_id = $_POST['take_off_time_id'];
		$bus_id = $_POST['bus_id'];
		$traveling_date = $_POST['traveling_date'];
		$booked_seats = $_POST['seats'];
		$amount = $_POST['amount'];


		$bus_seats = $bus_obj->fetch_bus($bus_id)['seats'];

		

		$bookedo_seats = $booking->check_booked_seats($destination_id,$take_off_time_id,$bus_id,$traveling_date);

		if ($bookedo_seats['sum(booked_seats)'] <= $bus_seats || $bookedo_seats['sum(booked_seats)'] == null){		
			if ($booking->add_booking($user_id,$destination_id,$take_off_time_id,$bus_id,$traveling_date,$booked_seats,$amount)) {
				return $booking->user_last_booking($user_id)['id'];
			}
		}
		else{
			return displayError('Not enough seats '. ($bus_seats - $bookedo_seats['sum(booked_seats)']). 'available');
		}
	}
?>