<?php
require('simple_html_dom.php');

$html = file_get_html('https://marketdata.set.or.th/mkt/marketsummary.do?country=US&language=en');

$i=0;
$mArray = array();
foreach ($html -> find ('td') as $e)
{
    array_push($mArray,$e -> innertext);
    // echo $e -> innertext .'</br>';
    $i++;
    if($i>7){break;}}

    $first = str_split($mArray[1]);
    $second = str_split($mArray[7]);
    $point = strpos($mArray[7],'.');

    $result = array();
    $result["No"] = $first[count($first)-1].''.$second[$point-1];
    $result["Set"] = $mArray[1];
    $result["Value"] = $mArray[7];

    echo json_encode($result);

?>