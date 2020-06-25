<?php

/**
 * @Author: Dhiraj
 * @Date:   2020-06-25 15:36:39
 * @Last Modified by:   Dhiraj
 * @Last Modified time: 2020-06-25 15:49:02
 */

//Create connection
$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);

//Check connection
if (mysqli_connect_errno()) {
	//Connection failed
	echo "Failed to connect MySQL".mysqli_connect_errno();
}