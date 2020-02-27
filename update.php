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

// includes 'connect.php' for database connctivity
require 'connect.php';

// starting session for further use
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// prerparing sql statement for updating data and the values are not provided to it 
// to save program from sql injection attack
$sql = "UPDATE  `000736376`.`ExpenseReports` SET
                    `Software` =  :software,
                    `Year` =  :year,
                    `Projects` =  :projects,
                    `Description` =  :description,
                    `LastDone` =  :last_Done,
                    `Hours` =  :hours WHERE  `ExpenseReports`.`Number` =:number";

// storing values from the form into variable
$software_edit = filter_input(INPUT_POST, "software");
$year_edit = filter_input(INPUT_POST, "year");
$projects_edit = filter_input(INPUT_POST, "projects");
$description_edit = filter_input(INPUT_POST, "description");
$lastDone_edit = filter_input(INPUT_POST, "last_Done");
$hours_edit = filter_input(INPUT_POST, "hours");

// getting primary number for editing specific field
$var = $_SESSION['number'];

// preparing sql statement for exectution
$statement_edit = $dbh->prepare($sql);

// binding value to the statement to save from sql injection 
$statement_edit->bindValue(':number', $var);
$statement_edit->bindValue(':software', $software_edit);
$statement_edit->bindValue(':year', $year_edit);
$statement_edit->bindValue(':projects', $projects_edit);
$statement_edit->bindValue(':description', $description_edit);
$statement_edit->bindValue(':last_Done', $lastDone_edit);
$statement_edit->bindValue(':hours', $hours_edit);

// condition returns true if the statement executese successfully
if ($statement_edit->execute()) {
    // directs to next page
    header('location:table.php');
}
// error updating record
else {
    echo "Error updating record: " . $statement_edit->error;
}
?>