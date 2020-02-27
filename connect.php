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

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
$username = '000736376';
$password = '19980314';

try 
{
    // Connecting to database using PDO
    $dbh = new PDO("mysql:host=localhost;dbname=000736376",$username,$password);
    // variable for handling program gracefully showing output that erroe occured in connecting
    $connected = TRUE;
    // storing status of connection in session variable
    $_SESSION['connected'] = TRUE;
}
catch(PDOException $e)
{
    echo $e->getMessage();
    // storing status as not connected with database
    $connected = FALSE;
    // for showing output on respected actions
    $_SESSION['connected'] = FALSE;
}
?>