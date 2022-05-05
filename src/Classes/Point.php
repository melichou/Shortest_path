<?php
class Point{
    //Attributes
    private int $axeX;
    private int $axeY;
    private array $position;

    //Constructor
    public function __construct(int $axeX, int $axeY){
        $this->axeX = $axeX;
        $this->axeY = $axeY;
        $this->position[0] = $axeX;
        $this->position[1] = $axeY;
    }
    //Getters
    public function getPosition() : array{
        return $this->position; 
    }
    public function getAxeX() : int{
        return $this->axeX;
    }
    public function getAxeY() : int{
        return $this->axeY;
    }

}
?>