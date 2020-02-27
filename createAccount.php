<?php
/*
  To change this license header, choose License Headers in Project Properties.
  To change this template file, choose Tools | Templates
  and open the template in the editor.
 */
/*
  Created on : 3-Jan-2018, 8:57:27 PM
  Author     : I am Prerak Patel and my student number is 000736376 and I haven't shared my program
 */

// including the connect.php for database connectivity
require 'connect.php';
// starting the session for further use
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// storing username variable from the form
$username = filter_input(INPUT_POST, "username");
// storing email into variable
$email = filter_input(INPUT_POST, "email");
// storing password into variable
$passCon = filter_input(INPUT_POST, "password");
// storing confirmation of password
$confirm = filter_input(INPUT_POST, "confirm");

// if all the input fields are filled up the value then condition returns true
if (isset($username) && isset($password) && isset($email) && isset($confirm)) {
    // if the password entered first is not same as entered for confirmation
    if ($passCon != $confirm) {
        echo '<script language="javascript">'
        . 'alert("You entered incorrect password")'
        . '</script>';
    }
    // if both the passwords are same then this condition returns true
    else {
        // sql statement for storing the credentials that user entered for creating account
        $sql = "INSERT INTO  `000736376`.`login` VALUES (:username, :email, :password)";
        // prepares the sql statement
        $statement = $dbh->prepare($sql);

        // binds the variables into statement to save from sql injection attacks
        $statement->bindValue(':username', $username);
        $statement->bindValue(':email', $email);
        $statement->bindValue(':password', $passCon);

        // executing statement
        if ($statement->execute()) {
            // directs to next page on succe
            header('location:login.php');
        } else {
            echo '<script language="javascript">'
            . 'alert("Error Creating account")'
            . '</script>';
        }
    }
}
?>

<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <title>My Portfolio</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <link rel="stylesheet" type="text/css" href="styleSheet.css">

    </head>
    <body>
        <div class="register">
            <div class="registerform">
                <form action="<? $_SERVER['PHP_SELF']; ?>" method="POST">
                    <input type="text" placeholder="username" name="username"/>
                    <input type="text" placeholder="email" name="email"/>
                    <input type="password" placeholder="password" name="password"/>
                    <input type="password" placeholder="confirm password" name="confirm"/>
                    <input type="submit" class="button" value="CREATE ACCOUNT"/>
                </form>
            </div>
        </div>
    </body>
</html>