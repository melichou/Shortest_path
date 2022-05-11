<?php
require_once "Classes/CalcPath.php";
require_once "Classes/Path.php";
require_once "Classes/Map.php";
require_once "Classes/Point.php";


echo "test docker shortest path";

$map = new Map([
    [1,1,1,1,1],
    [1,1,0,0,1],
    [0,1,1,0,1],
    [1,1,0,1,1],
    [1,1,1,1,0],
]);
$start = new Point(2,4);
$end = new Point(1,0);

$calc = new CalcPath($map,$start,$end);
$path = new Path($start);

$short = $calc->testGetShortestPath($start,$end,$path);
var_dump($short);


?>