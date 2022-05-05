<?php 
require_once "Classes/Point.php";
class Path{
    //Attributes
    private array $path;

    //Functions
    public function addPoint(Point $point){
        $pos = $point->getPosition();
        $this->path += $pos;
    }
}
?>