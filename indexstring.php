<?php
$xml = '<?xml version="1.0" encoding="utf-8" ?> 
<documentElement>
<personnel>
           <person>
                       <firstName>John</firstName>
                       <surname>Smith</surname>
           </person>
           <person>
                       <firstName>Gina</firstName>
                       <surname>Jones</surname>
           </person>
	<person>
                       <firstName>Simone</firstName>
                       <surname>Jackson</surname>
           </person>
</personnel>
</documentElement>';

$sxml = simplexml_load_string($xml);
foreach($sxml->personnel->person as $person)
{
    $person->firstName = ucfirst(strtolower(strrev($person->firstName)));
    var_dump($person);
}

$f = fopen('test.csv', 'w');
createCsv($sxml, $f);
fclose($f);

function createCsv($xml,$f)
{
    $put_arr = array("generated id", "first name", "surname"); 
    fputcsv($f, $put_arr , ";");
    $i=0;
    
    foreach ($xml->personnel->person as $item)  
    {
        $i++;
        $put_arr = array($i, $item->firstName, $item->surname); 
        fputcsv($f, $put_arr , ";");
    }
}

?>