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

// includes connect.php
require 'connect.php';
// session starts
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
// stores username value into variable
$user = filter_input(INPUT_POST, "username");
// stores password value into variable
$pass = filter_input(INPUT_POST, "password");
// stores value into session variabe for further use
$_SESSION['user'] = $user;
$_SESSION['pass'] = $pass;
$cookie = $_COOKIE['count'];
// boolean varibale declared keeping track of login status
$loginFlag;
// direct user to next page if the user has already provided credentials for login
if (isset($_SESSION['loginStatus'])) {
    header('location:table.php');
}
// if the value is stored into this variable 
if (isset($user) && isset($pass)) {

    // prepares the sql statement for execution
    $state = $dbh->prepare('SELECT * FROM login');
    // executes the statement
    $state->execute();

    // loops through the database
    while ($line = $state->fetch()) {
        // if the username and password entered by the user matches with database value
        if ($user == $line['username'] && $pass == $line['password']) {
            // boolean value containing login status is changed to true
            $loginFlag = true;
            $_SESSION['loginStatus'] = true;
            // loactes to next as login success
            header('location:table.php');
            break;
        }

        // if the user enters wrong username and/or password
        else {
            $loginFlag = false;
            $_SESSION['loginStatus'] = false;
        }
    }

    // printing userfriendly message for wrong username and/or password
    if (!$loginFlag) {
        echo '<script language="javascript">'
        . 'alert("Wrong username and/or password!!")'
        . '</script>';
    }
}
?>

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
                    <input class="text" type="text" placeholder="username" name="username"/>
                    <input class="text" type="password" placeholder="password" name="password" />
                    <input class="button" type="submit" name="login" value="LOGIN">
                    <p class="display">Not registered? <a href="createAccount.php">Create an account</a></p>
                </form>
            </div>
        </div>
    </body>
</html>
