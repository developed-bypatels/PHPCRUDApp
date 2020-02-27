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


// session started for futher use in the program
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// includes the 'conect.php' for checking the database is connected or not
require 'connect.php';
// stores the primary numeber into session variable
$_SESSION['number'] = filter_input(INPUT_GET, "number");

?>
<html>
    <head>
        <title>My Portfolio</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
            
        <link rel="stylesheet" type="text/css" href="styleSheet.css">
        
    </head>
    <body>
        <div class="tableForm">
            <div class="tableDisplay">
                <h1>Software Report</h1>
                <table>
                    <tr>
                        <th>Software</th>
                        <th>Year</th>
                        <th>Projects</th>
                        <th>Description</th>
                        <th>Last<span class='underscore'>_</span>Used</th>
                        <th>Hours<span class='underscore'>_</span>Worked</th>
                        <th>Action</th>
                    </tr>
                    <?php
                    
                    // preparing th sql statement
                    $state = $dbh->prepare('SELECT * FROM ExpenseReports');
                    
                    // executing the prepared statement 
                    $state->execute();
                    
                    // looping through the all rows in the database
                    while ($line = $state->fetch()) {
                        
                        // fetches the specific value and stores into the varaible 
                        $software = $line['Software'];
                        $year = $line['Year'];
                        $projects = $line['Projects'];
                        $description = $line['Description'];
                        $last_Done = $line['LastDone'];
                        $hours = $line['Hours'];

                        // printing out the variable
                        echo "<tr>"
                        . "<td>" . $software . "</td>"
                        . "<td>" . $year . "</td>"
                        . "<td>" . $projects . "</td>"
                        . "<td>" . $description . "</td>"
                        . "<td>" . $last_Done . "</td>"
                        . "<td>" . $hours . "</td>"
                        . "<td>" . "
                " . "</td></tr>";
                    }
                    ?>

                    <form action="createData.php" method='POST'>
                        <tr>
                            <td><input type='varchar' name='software' min='1' max='30'></td>
                            <td><input type='year' name='year'></td>
                            <td><input type='int' name='projects'></td>
                            <td><input type='text' name='description'></td>
                            <td><input type='date' name='last_Done'></td>
                            <td><input type='int' name='hours'></td>
                            <td><input type='submit' value='Create' name='Update' class='update'/></td>
                        </tr>
                    </form>

                </table>
            </div>
        </div>
    </body>
</html>
