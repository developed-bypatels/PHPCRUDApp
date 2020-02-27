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

// starting session for further uses
session_start();
// includes 'connect.php' for database connectivity
require 'connect.php';
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
// storing primary number to session from form with method GET
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
                    // preparing sql statement for editing record
                    $state = $dbh->prepare('SELECT * FROM ExpenseReports');
                    // executing statement for editing
                    $state->execute();

                    // looping through database to print rest of data
                    while ($line = $state->fetch()) {
                        
                        // fetches the specific value and stores into the varaible
                        $software = $line['Software'];
                        $year = $line['Year'];
                        $projects = $line['Projects'];
                        $description = $line['Description'];
                        $last_Done = $line['LastDone'];
                        $hours = $line['Hours'];

                        // primary number stored 
                        if ($_SESSION['number'] == $line['Number']) {
                            // printing out input record for editing
                            echo "<form action='update.php' method='POST' >"
                            . "<tr>"
                            . "<td><input type='varchar' name='software' min='1' max='30'></td>"
                            . "<td><input type='year' name='year'></td>"
                            . "<td><input type='int' name='projects'></td>"
                            . "<td><input type='text' name='description'></td>"
                            . "<td><input type='date' name='last_Done'></td>"
                            . "<td><input type='int' name='hours'></td>"
                            . "<td><input type='submit' value='Update' name='Update' class='update'/></td>"
                            . "</tr>"
                            . "</form>";
                        } else {
                            // printing rest of data from database
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
                    }
                    ?>

                </table>
            </div>
        </div>
    </body>
</html>
