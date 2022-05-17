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
$calc->shortestPath($path);

$path = $calc->getCurrentPath();
$shortest = $calc->isFounded();

//var_dump($path);
var_dump($shortest);
echo "test";



?>