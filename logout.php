<?php 
	session_start();

	unset($_SESSION['bus_user']);

	header('location: login');
?>