<?php 
	
	session_start();
	
	include('db.php');
	
	date_default_timezone_set('Asia/Kolkata');
	
	

	if (isset($_POST['delete'])) {
		$topic = $_POST['delete'];
		$query = "DELETE FROM topic WHERE id='$topic'";
		mysqli_query($conn,$query);
		//echo '<script type="text/javascript">alert("Your Post has been deleted successfully")</script>';
		//echo '<script type="text/javascript">window.open("../profile.php","_self")</script>';
		header('location: ../admin.php');
		
	}

	else{
		$post_topic =  $conn->real_escape_string($_POST['topic']);
	
	
		try{
			$query = 'INSERT INTO topic(`topic`) VALUES("'.$post_topic.'")';
			
			mysqli_query($conn,$query);

			

			if (isset($_GET['profile'])) {
				header('location: ../admin.php');
			} else {
				header('location: ../admin.php');
			}
		}catch (mysqli_sql_exception $e) {
			var_dump($e);
      		exit; 
        }

	}

