<?php
require_once "Classes/Path";
class CalcPath{
    //Attributes 
    private Path $path;

    //Constructor
    public function __construct(){

    }
    //Functions 
    public function shortestPath(Path $shortest, Path $current) : Path{
        //attributes 
        $currentpath = $current->getPath;
        $shortestpath =$shortest->getPath;

        if ($currentpath < $shortestpath){
            return $current;
        }
        elseif ($currentpath > $shortestpath){
            return $shortest;
        }
        else {
            throw new Exception("Les deux chemins sont équidistances");
        }
    }
}
?>