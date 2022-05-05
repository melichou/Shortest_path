<?php
class Point{
    //Attributes
    private int $axeX;
    private int $axeY;
    private array $position;

    public function __construct(int $axeX, int $axeY){
        $this->axeX = $axeX;
        $this->axeY = $axeY;
        $this->position[0] = $axeX;
        $this->position[1] = $axeY;
    }
}
?>