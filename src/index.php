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
$path = new Path($start);

$calc = new CalcPath($map,$start,$end);
$test = $calc->shortestPath($path);
var_dump($test);


?>