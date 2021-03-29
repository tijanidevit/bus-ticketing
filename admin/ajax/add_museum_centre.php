<?php 
	include_once '../../core/museum_centres.class.php';
	include_once '../../core/core.function.php';

	echo add_museum_centre();
	function add_museum_centre(){
		$museum_centre_obj = new museum_centres();
		$centre_category_id = $_POST['centre_category_id'];
		$centre_name = $_POST['centre_name'];
		$address = $_POST['address'];
		$opening_hour = $_POST['opening_hour'];
		$closing_hour = $_POST['closing_hour'];
		$website = $_POST['website'];
		$phone = $_POST['phone'];
		$email = $_POST['email'];
		$overview = $_POST['overview'];

		if ($museum_centre_obj->check_museum_centre_existence($centre_name)) {
			return  displayWarning($centre_name.' already exist');
		}
		$banner = upload_file($_FILES['banner'],'../../uploads/images/');
		if ($museum_centre_obj->add_museum_centre($centre_category_id,$centre_name,$overview,$address,$opening_hour,$closing_hour,$website,$phone,$email,$banner)) {
			return displaySuccess($centre_name.' successfully added');
		}
		else{
			return displayError('Unable to add');
		}
	}
?>