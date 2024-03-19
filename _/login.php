<?php
include('config.php');

session_start();

$email = mysqli_real_escape_string($mysqli, $_POST['email']);
debug_to_console($email);

$password = mysqli_real_escape_string($mysqli, $_POST['password']);
debug_to_console($password);

$password_hash = crypt($password, '..ssl');
debug_to_console($password_hash);

$sql = "SELECT * FROM users WHERE email ='$email' AND password ='$password_hash'";
$result = $mysqli->query($sql);

if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()){
            $_SESSION['email'] = $email;
            $_SESSION['membership'] = $row['membership'];
            $_SESSION['logged'] = true;

            echo'<script>window.location = "../account.php";</script>';
            exit();
            $mysqli->close();
        }
    }
else {
    $_SESSION['logged'] = false;
    $_SESSION['invalid'] = true;
    echo '<script type="text/javascript">';
	echo '
    window.location = "../account.php"
			</script>';
	} 
	
	$mysqli->close();

?>