<?php 
	
	session_start();
	
	include('db.php');
	
	date_default_timezone_set('Asia/Kolkata');
	
	$post_topic =  $conn->real_escape_string($_POST['topic']);

	
	
		try{
			$query = 'INSERT INTO topic(`topic`) VALUES("'.$post_topic.'")';
			
			mysqli_query($conn,$query);

			

			if (isset($_GET['profile'])) {
				header('location: ../profile.php?result=post-added-successful');
			} else {
				header('location: ../home.php?result=post-added-successful');
			}
		}catch (mysqli_sql_exception $e) {
			var_dump($e);
      		exit; 
        }


