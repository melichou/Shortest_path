<?php
class Point{
    //Attributes
    private array $position;

    //Constructor
    public function __construct(int $axeX, int $axeY){
        $this->position[0] = $axeX;
        $this->position[1] = $axeY;
    }
    //Getters
    public function getPosition() : array{
        return $this->position; 
    }
    public function getAxeX() : int{
        return $this->position[0];
    }
    public function getAxeY() : int{
        return $this->position[1];
    }

}
?>