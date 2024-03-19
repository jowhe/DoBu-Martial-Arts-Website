<?php

    function debug_to_console($data) {
        $output = $data;
        if (is_array($output))
            $output = implode(',', $output);

            echo "<script>console.log('Debug Objects: " . $output . "' );</script>";
    }

    $db_host = 'hostname';
    $db_user = 'username';
    $db_password = 'password';
    $db_db = 'database';
    $db_port = 3306;

    $mysqli = new mysqli(
        $db_host,
        $db_user,
        $db_password,
        $db_db
    );

    if ($mysqli->connect_error) {
        echo 'Errno: '.$mysqli->connect_errno;
        echo '<br>';
        echo 'Error: '.$mysqli->connect_error;
        exit();
    }

   //$mysqli->close();

?>