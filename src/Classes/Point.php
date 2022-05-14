<?php
class Point{
    //Attributes
    private array $position;
    private array $points;

    //Constructor
    public function __construct(int $axeX, int $axeY){
        $this->position[0] = $axeX;
        $this->position[1] = $axeY;
    }
    //Getters & setters
    public function getPosition() : array{
        return $this->position; 
    }
    public function getAxeX() : int{
        return $this->position[0];
    }
    public function getAxeY() : int{
        return $this->position[1];
    }
    public function getPoints() : array {//not used because it doesn't work
        //Getting current position
        $currentpos = $this->getPosition();
        //Setting points available
        $points = [
            [$currentpos[0] - 1, $currentpos[1]],
            [$currentpos[0] + 1, $currentpos[1]],
            [$currentpos[0], $currentpos[1] - 1],
            [$currentpos[0], $currentpos[1] + 1],
        ];
        $this->points = $points;
        return $points;
    }


}
?>