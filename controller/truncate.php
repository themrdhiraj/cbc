<?php
/**
* @Author: Dhiraj
* @Date:   2020-06-25 20:07:09
* @Last Modified by:   Dhiraj
* @Last Modified time: 2020-06-25 20:11:18
*/

require('../config/config.php');
require('../config/db.php');
session_start();
	$truncate = 'TRUNCATE TABLE counter';

	$reset = "UPDATE count SET count = 1 WHERE id = 1";
	if (mysqli_query($conn, $truncate) && mysqli_query($conn, $reset)) {
		$_SESSION['message'] = '<div class="alert alert-info" role="alert"><strong>New Game</strong></div>';
	header('Location:'.ROOT_URL.'');
	}else{
		echo 'Error:'.mysqli_error($conn);
	}