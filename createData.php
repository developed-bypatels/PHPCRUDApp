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

// includes 'connect.php' for database connectivity
require 'connect.php';
// starting session
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// stores into variable from the form with method POST
$number_edit = filter_input(INPUT_POST, "number");
$software_edit = filter_input(INPUT_POST, "software");
$year_edit = filter_input(INPUT_POST, "year");
$projects_edit = filter_input(INPUT_POST, "projects");
$description_edit = filter_input(INPUT_POST, "description");
$lastDone_edit = filter_input(INPUT_POST, "last_Done");
$hours_edit = filter_input(INPUT_POST, "hours");

// conditions returns true if the user has filled up information
if (isset($software_edit) && isset($year_edit) && isset($projects_edit) && isset($description_edit) && isset($hours_edit)) {

    // sql statement for creating data and stores into database
    $sql = "INSERT INTO  `000736376`.`ExpenseReports` (
`Number` ,
`Software` ,
`Year` ,
`Projects` ,
`Description` ,
`LastDone` ,
`Hours`
)
VALUES (
':Number', :Software, :Year,  :Projects, :Description, :lastDone ,:Hours
)";

    // prepare sql statement for creating data
    $statement_edit = $dbh->prepare($sql);
    
    // binding value to the statement to save from sql injection attacks
    $statement_edit->bindValue(':Software', $software_edit);
    $statement_edit->bindValue(':Year', $year_edit);
    $statement_edit->bindValue(':Projects', $projects_edit);
    $statement_edit->bindValue(':Description', $description_edit);
    $statement_edit->bindValue(':lastDone', $lastDone_edit);
    $statement_edit->bindValue(':Hours', $hours_edit);

    // condition returns true if the statement executes successfully
    if ($statement_edit->execute()) {
        // directs to next page
        header('location:table.php');
    } else {
        echo "Error updating record: " . $statement_edit->error;
    }
}
?>