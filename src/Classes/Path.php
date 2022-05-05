<?php 
require_once "Classes/Point.php";
class Path{
    //Attributes
    private array $path;

    //Getters
    public function getPath() : array{
        return $this->path;
    }
    //Functions
    public function addPoint(Point $point){
        $pos = $point->getPosition();
        $this->path += $pos;
    }

}
?>