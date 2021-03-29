<?php 
	include_once '../../core/buses.class.php';
	include_once '../../core/core.function.php';

	echo add_bus();
	function add_bus(){
		$bus_obj = new Buses();
		$bus = $_POST['bus'];
		$seats = $_POST['seats'];

		if ($bus_obj->check_bus_existence($bus)) {
			return  displayWarning($bus.' already exist');
		}
		if ($bus_obj->add_bus($bus,$seats)) {
			return 1;
		}
		else{
			return displayError('Unable to add');
		}
	}
?>