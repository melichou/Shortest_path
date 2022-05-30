<?php
require_once "CalcPath.php";
class Display{
    //Attributes
    private CalcPath $calc;

    //Constructor 
    public function __construct(CalcPath $calc){
        $this->calc = $calc;    
    }
    
    //Functions 
    public function displayMap(){
        //Attributes needed
        $mapArray = $this->calc->getMap()->getMapArray();
        $pathArray = $this->calc->getCurrentPath()->getPath();
        $endpos = $this->calc->getEnd()->getPosition();
        $startpos = $this->calc->getStart()->getPosition();

        echo ("Le chemin le plus court est en " . count($pathArray)-1 . " étapes.");

        //Treatment
        foreach ($mapArray as $r => $row) {
            echo nl2br("\n |");
            foreach ($row as $c => $cell) {
                $point = new Point($r,$c);
                if ((in_array($point, $pathArray)) !== false) {
                    $pos = $point->getPosition();
                    switch ($pos) {
                        case $pos == $startpos:
                            echo 'D';
                            break;
                        case $pos == $endpos:
                            echo 'A';
                            break;
                        default:
                            echo 'o';
                            break;
                    }
                } 
                else {
                    echo ($cell ? ' ' : 'x');
                }
                echo '|';
            }
            echo PHP_EOL;
        }
        


        
    }
}
?>