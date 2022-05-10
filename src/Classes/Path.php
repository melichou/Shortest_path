<?php 
require_once "Point.php";
class Path{
    //Attributes
    private array $path;

    //Constructor 
    public function __construct(Point $start){
        $this->path[] = $start->getPosition();
    }
  
    //Getters
    public function getPath() : array{
        return $this->path;
    }

    //Functions
    public function addPoint(Point $nextpoint) : self {
        $pos = $nextpoint->getPosition();
        $this->path[] = $nextpoint;
        return $this;
    }
}
?>