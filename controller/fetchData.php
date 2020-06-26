<?php

/**
 * @Author: Dhiraj
 * @Date:   2020-06-25 19:18:12
 * @Last Modified by:   TheMrDhiraj
 * @Last Modified time: 2020-06-26 09:15:11
 */
	require 'config/config.php';
	require 'config/db.php';
	// Get all data
	$query = 'SELECT * FROM counter LIMIT 5';
	$result = mysqli_query($conn, $query);
	$data = mysqli_fetch_all($result, MYSQLI_ASSOC); //Gets array of data
	// Get count data
	$count = 'SELECT count FROM count';
	$countResult = mysqli_query($conn, $count);
	$getCount = mysqli_fetch_assoc($countResult); //Gets single data

	//sum
	
	//Free result
	mysqli_free_result($result);
	mysqli_free_result($countResult);
	//Close connection
	mysqli_close($conn);
