<?php 
	include_once '../core/session.class.php';
	include_once '../core/users.class.php';
	include_once '../core/core.function.php';

	$session = new Session();
	$user_obj = new Users();

	if (isset($_POST['email'])) {
		$email = $_POST['email'];
		$password = md5($_POST['password']);

		if ($user_obj->user_login($email,$password)) {
			$user = $user_obj->fetch_user($email);
			$session->create_session('bus_user',$user);
			echo 1;
		}
		else{
			echo displayWarning('Invalid Credentials');
		}
	}

	else{
		echo "No input made";
	}
?>