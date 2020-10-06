<?php

// Checking if arguments were passed via bash script
if(isset($argv[1]) && isset($argv[2]))
{
    $input = $argv[1].".xml";
    $output = "data/".$argv[2].".csv";
} else {
    $input = "example.xml";
    $output = "data/persons.csv";
}


libxml_use_internal_errors(TRUE);
$xml = simplexml_load_file($input); // Loading XML file

if(!($xml instanceof SimpleXMLElement))
{
    $errors = libxml_get_errors();

    $errorStr = "Invalid XML " . (!empty($errors)) ? "(" . count($errors) .
                " errors returned):\n":'. Unknown error.' . "\n";

    if(!empty($errors)){
        foreach($errors as $key => $error)
            $errorStr .= ($key + 1) . ")  " . $error->message . "\n";
    }

    echo 'Error ' . $errorStr;
    exit;
}


function createCsv($xml, $output)
{
    $f = fopen($output, 'w'); // CSV file to be saved
    $row = array("generated id", "first name", "surname");
    fputcsv($f, $row , ";");

    $i=0;

    foreach($xml->xpath('/personnel/person') as $person) {
        if(!empty($person->firstName) && !empty($person->surname)) // Check if First name and Surname are not empty
        {
            $i++;
            $person->firstName = ucfirst(strtolower(strrev($person->firstName))); // Reversing name with first letter capitalized
            $row = array($i, $person->firstName, $person->surname);
            fputcsv($f, $row , ";");
        }
    }
    if($i>0)
    {
        echo basename($output)." file saved with ".$i." rows!";
    }
    else {
        echo "There is no data found to be saved to the ".basename($output)." file!";
    }
    fclose($f);
}

createCsv($xml, $output);
?>
