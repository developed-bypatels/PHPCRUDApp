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

// include 'connect.php' database connectivity
require 'connect.php';
// starting session for further use
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// storing sorting field in the variable
$field = $_GET['sortingField'];

try {
    // preparing sql statement for sorting
    $sql = "SELECT * FROM `ExpenseReports`";

    // Now adding string to sql statement for sorting
    if ($field == 'Number') {
        $sql .= "ORDER BY  `Number` ASC LIMIT 0 , 30";
    } elseif ($field == 'Software') {
        $sql .= "ORDER BY  `Software` ASC LIMIT 0 , 30";
    } elseif ($field == 'Year') {
        $sql .= "ORDER BY  `Year` ASC LIMIT 0 , 30";
    } elseif ($field == 'Projects') {
        $sql .= "ORDER BY  `Projects` ASC LIMIT 0 , 30";
    } elseif ($field == 'Hours') {
        $sql .= "ORDER BY  `Hours` ASC LIMIT 0 , 30";
    }
    
    // preparing sql statement
    $stmt = $dbh->prepare($sql);

    // if conditions returns true for executing statement
    if ($stmt->execute()) {
        // directs to next page
        header('location:table.php');
    } else {
        echo "Error sorting" . $stmt->error;
    }
} catch (PDOException $e) {
    echo $e->getMessage();
}
?>