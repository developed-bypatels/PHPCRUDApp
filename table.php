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
// starting session for further use
if (session_status() == PHP_SESSION_NONE) {
    session_start();
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
                    // preparing sql statement for getting all data from database
                    $state = $dbh->prepare('SELECT * FROM ExpenseReports');
                    // executing statement for displaying data
                    $state->execute();

                    // looping through all data in database
                    while ($line = $state->fetch()) {

                        // fetches the specific value and stores into the varaible
                        $software = $line['Software'];
                        $year = $line['Year'];
                        $projects = $line['Projects'];
                        $description = $line['Description'];
                        $last_Done = $line['LastDone'];
                        $hours = $line['Hours'];

                        // printing rest of data from database
                        echo "<tr>"
                        . "<td>" . $software . "</td>"
                        . "<td>" . $year . "</td>"
                        . "<td>" . $projects . "</td>"
                        . "<td>" . $description . "</td>"
                        . "<td>" . $last_Done . "</td>"
                        . "<td>" . $hours . "</td>"
                        . "<td>" . "
    <a href='delete.php?number=" . $line['Number'] . "'><img src='delete.png' alt='Delete' width='42' height='42'></a>
    <a href='edit.php?number=" . $line['Number'] . "'><img src='edit.png' alt='Edit' width='38' height='38'</a>
 " . "</td></tr>";
                    }
                    ?>
                </table>
                <div class="sortDivison">
                    <br><button class="sortButton">Sort</button>
                    <div class="sortLinks">
                        <a href="<?php echo 'sort.php?sortingField=Number'; ?>">Primary (Asc)</a>
                        <a href="<?php echo 'sort.php?sortingField=Software'; ?>">Software (Asc)</a>
                        <a href="<?php echo 'sort.php?sortingField=Year'; ?>">Year (Asc)</a>
                        <a href="<?php echo 'sort.php?sortingField=Projects'; ?>">Projects (Asc)</a>
                        <a href="<?php echo 'sort.php?sortingField=Hours'; ?>">Hours (Asc)</a>
                    </div>
                </div>
                <br><br><form action='create.php' method="POST"><input type='submit' value='Create' name='Create' class='create'/>

            </div>
        </div>

    </body>     
</html>
