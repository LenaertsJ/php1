<?php
$student =	array(
    "voornaam" =>  "Jan",
    "naam" =>  "Janssens",
    "straat" =>  "Oude baan",
    "huisnr" =>  "22",
    "postcode" =>  2800,
    "gemeente" =>  "Mechelen",
    "geboortedatum" =>  "14/05/1991",
    "telefoon" =>  "015 24 24 26",
    "e-mail" =>  "jan.janssens@gmail.com"
);

function studentToTable($student_array) {
    echo "<h1>Student</h1>";
    echo "<table>";
    foreach ($student_array as $x => $x_value) {
        echo "<tr><td>" . ucfirst($x) . "</td><td>" . $x_value . "</td></tr>";
    }
}

studentToTable($student);