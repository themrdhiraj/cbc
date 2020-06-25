<?php
/**
* @Author: Dhiraj
* @Date:   2020-06-25 15:28:30
* @Last Modified by:   Dhiraj
* @Last Modified time: 2020-06-25 20:43:57
*/
require('config/config.php');
require('config/db.php');

	//Get form data
	$player1 = mysqli_real_escape_string($conn, $_POST['player1']);
	$player2 = mysqli_real_escape_string($conn, $_POST['player2']);
	$player3 = mysqli_real_escape_string($conn, $_POST['player3']);
	$player4 = mysqli_real_escape_string($conn, $_POST['player4']);
	if ($_REQUEST['count'] % 2 == 1) {
		// For insert
		$query = "INSERT INTO counter(player1, player2, player3, player4) VALUES($player1, $player2, $player3, $player4)";
		
		//Insert & Update
		if (mysqli_query($conn, $query)) {
				$count = $_REQUEST['count'] + 1;
				$update = "UPDATE count SET count = $count WHERE id = 1";
			if (mysqli_query($conn, $update)) {
				header('Location:'.ROOT_URL.'');
			}
		}else{
			echo 'Error:'.mysqli_error($conn);
		}
	}else{
		// For update
		$a = $_REQUEST['count'] / 2;
		$b = $_REQUEST['count'] - $a;
		$query = "UPDATE counter
					SET
					p1ot = $player1,
					p2ot = $player2,
					p3ot = $player3,
					p4ot = $player4
					WHERE id = $b";
		
		//Insert & Update
		if (mysqli_query($conn, $query)) {
				$count = $_REQUEST['count'] + 1;
				$update = "UPDATE count SET count = $count WHERE id = 1";
				if (mysqli_query($conn, $update)) {
					header('Location:'.ROOT_URL.'');
				}
		}else{
			echo 'Error:'.mysqli_error($conn);
		}
	}