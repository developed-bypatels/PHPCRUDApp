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

// includes 'connect.php' database connctivity
require 'connect.php';
// starting session for further use
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
try 
{   
    // preparing sql statement for deleting record in database
    $stmt = $dbh->prepare('DELETE FROM ExpenseReports WHERE Number =?');
    
    // storing primary number into variable for deleting record
    $num = $_GET['number'];
    
    // executing statement with primary number as a argument
    if ($stmt->execute(array($num))) {
        header('location:table.php');
    }
    // if there is error deleting record
    else {
        echo "Error in deleting" . $stmt->error;
    }
}
catch(PDOException $e)
{
    echo $e->getMessage();
}
?>