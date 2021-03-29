<?php 
	include_once '../core/session.class.php';
	include_once '../core/users.class.php';
	include_once '../core/core.function.php';
	echo register();
	function register()
	{
		$session = new Session();
		$user_obj = new Users();
		if (isset($_POST['email'])) {
			$email = $_POST['email'];
			$first_name = $_POST['first_name'];
			$last_name = $_POST['last_name'];
			$password = md5($_POST['password']);

			if ($user_obj->check_email($email)) {
				return displayWarning($email.' has already been registered. Try a unique one');
			}

			if ($user_obj->register_user($first_name,$last_name,$email,$password)) {
				$user = $user_obj->fetch_user($email);
				$session->create_session('bus_user',$user);
				return 1;
			}
			else{
				return displayWarning('Error With Server! Try again.');
			}
		}
	}
?>