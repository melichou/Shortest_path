<?php
class Map{
    //Attributes 
    private array $map;

    //Constructor
    public function __construct(array $map){
        $this->map = $map;
    }

    //Getter
    public function getMap() : Map{
        return $this;
    }
    public function getMapArray() : array{
        return $this->map;
    }
}
?>