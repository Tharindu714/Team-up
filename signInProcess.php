<?php
session_start();

require "connection.php";

$userName = $_POST["uname1"];
$password = $_POST["password1"];
$rememberme = $_POST["rememberme"];

if (empty($userName)) {
    echo ("Please enter your password");
} else if (empty($password)) {
    echo ("Please enter your Password");
} else if (strlen($password) < 5 || strlen($password) > 20) {
    echo ("Password must have between 5-20 charaters");
} else {

    $resultSet = Database::search("SELECT * FROM `user` WHERE `user_name`='" . $userName . "' 
    AND `password`='" . $password . "'");
    $num = $resultSet->num_rows;

    if ($num == 1) {
        $data = $resultSet->fetch_assoc();

        
            echo ("success");

            $_SESSION["user"] = $data;

            if ($rememberme == "true") {

                setcookie("userName", $userName, time() + (60 * 60 * 24 * 365));
                setcookie("password", $password, time() + (60 * 60 * 24 * 365));
            } else {

                setcookie("email", "", -1);
                setcookie("password", "", -1);
            }

            


    } else {
        echo ("Invalid Username or Password");
    }
}

?>