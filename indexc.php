<?php

// Checking if arguments were passed via bash script
if(isset($argv[1]) && isset($argv[2]))
{
    var_dump($argv);
    $input = $argv[1].".xml";
    $output = "data/".$argv[2].".csv";
} else {
    $input = "example.xml";
    $output = "data/persons.csv";
}
$xml = simplexml_load_file($input); // Loading XML file
$f = fopen($output, 'w'); // CSV file to be saved

function createCsv($xml,$f)
{
    $row = array("generated id", "first name", "surname");
    fputcsv($f, $row , ";");
    $i=0;
    foreach($xml->children() as $child) {
        $i++;
        $key = $child->children()->getName();
        if($key == "firstName") {
            $child->firstName = ucfirst(strtolower(strrev($child->firstName))); // Reversing name with first letter capitalized
        }
        $row = array($i, $child->firstName, $child->surname);
        fputcsv($f, $row , ";");
    }
}

createCsv($xml, $f);
fclose($f);
?>
