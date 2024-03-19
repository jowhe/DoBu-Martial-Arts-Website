<?php
    include("config.php");
    session_start();

    $sql="SELECT email FROM users WHERE email = ?";
    $stmt = $mysqli->prepare($sql);
    $stmt->bind_param("s", $_GET['q']);
    $stmt->execute();
    $stmt->store_result();
    $stmt->bind_result($qemail);
    $stmt->fetch();
    $stmt->close();

    if($qemail){
        $_SESSION['emailexists'] = true;
        echo 'true';
    }else{
        $_SESSION['emailexists'] = false;
        echo 'false';
    }
?>