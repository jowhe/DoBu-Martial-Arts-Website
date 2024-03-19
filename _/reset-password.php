<?php
    include('config.php');
	session_start();
    $email = $_SESSION['email'];
	$password = mysqli_real_escape_string($mysqli, $_POST['password']);
    $oldPassHash = crypt($password, "..ssl");
    $passwordNew = mysqli_real_escape_string($mysqli, $_POST['passNew']);
    $password_hash = crypt($passwordNew, '..ssl');
	
	$sql = "UPDATE users SET pasword='$password_hash' WHERE email='$email' AND password='$oldPassHash'";
	if($mysqli->query($sql) === TRUE){
		echo '<script>
			alert("Somethig");
		</script>';
	}

?>