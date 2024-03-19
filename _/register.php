<?php
    include('config.php');

    session_start();

    //Set session variables to be used on website
    $_SESSION['email'] = $_POST['email'];
    $_SESSION['membership'] = $_POST['membership'];

    //Escape all $_POST variables to protect against SQL injections

    $email = mysqli_real_escape_string($mysqli, $_POST['email']);
    $password = mysqli_real_escape_string($mysqli, $_POST['registered_password']);
    $membership = mysqli_real_escape_string($mysqli, $_POST['membership']);
    $password_hash = crypt($password, '..ssl');

    //selecting any users where the email matches in the database and responding via an if statement.
    // This isn't needed as Validation.js will cover if the email already exists, I will keep this in in the event of javascript being disabled.
    $sql = "SELECT * FROM users WHERE email ='$email'";
    $result = $mysqli->query($sql);

    if($result->num_rows > 0){
        // Email exists
        echo '<script language="javascript">';
        echo 'alert("Email already taken, please login or use another email.")';
        echo '</script>';
    }else{
        $sql = "INSERT INTO users (email, password, membership) VALUES ('$email', '$password_hash', '$membership')";
        
        if ($mysqli->query($sql) === TRUE){
            echo '<script type="text/javascript">
                    window.location = "../login.php"
                    </script>';
        }else {
            echo "Error: " . $sql . "<br>" . $mysqli->error;
        }
        
        $mysqli->close();
        
    }

?>