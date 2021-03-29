<?php 
	include_once '../../core/destinations.class.php';
	include_once '../../core/core.function.php';

	echo add_destination();
	function add_destination(){
		$destination_obj = new Destinations();
		$destination = $_POST['destination'];

		if ($destination_obj->check_destination_existence($destination)) {
			return  displayWarning($destination.' already exist');
		}
		if ($destination_obj->add_destination($destination)) {
			return 1;
		}
		else{
			return displayError('Unable to add');
		}
	}
?>