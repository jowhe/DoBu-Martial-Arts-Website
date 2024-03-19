<?php
	include('config.php');
	session_start();
	$email = $_SESSION['email'];
	$membership = $_SESSION['membership'];

	$memPOST = mysqli_real_escape_string($mysqli, $_POST['membership']);
	
	$sql = "UPDATE users SET membership='$memPOST' WHERE email='$email'";
	if($mysqli->query($sql) === TRUE){
		echo '<script>
			window.location = "../account.php";
		</script>';
		$_SESSION['membership'] = $memPOST;
	}
	
?>