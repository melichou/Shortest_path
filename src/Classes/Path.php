<?php 
require_once "Classes/Point.php";
class Path{
    //Attributes
    private array $path;
    private Map $map;

    //Constructor 
    public function __construct(Point $start, Map $map){
        $this->path[] = $start->getPosition();
        $this->map = $map;
    }
  
    //Getters
    public function getPath() : array{
        return $this->path;
    }

    //Functions
    public function addPoint(Point $nextpoint, Point $currentpoint){
        //Get position of the points as an array
        $currentpos = $currentpoint->getPosition();
        $nextpos = $nextpoint->getPosition();

        //Get map in array and positions
        $maparray = $this->map->getMapArray();
        $mapX = count($maparray);
        $mapY = count($maparray[0]);
      
        //Setting available points to add 
        $points = [
            [$currentpos[0] - 1, $currentpos[1]],
            [$currentpos[0] + 1, $currentpos[1]],
            [$currentpos[0], $currentpos[1] - 1],
            [$currentpos[0], $currentpos[1] + 1]
        ];

        //checking if next point is in map & empty
        if (in_array($nextpos,$points) && $nextpos[0] <= $mapX && $nextpos[1] <= $mapY ){

            //checking if point isn't already in path
            if (!in_array($nextpos,$this->path)){
                $this->path[] = $nextpos;
            }
            else {
                throw new Exception("Nous sommes déjà passé par ce point au cours du chemin");
            }
        }
        else {
            throw new Exception("Ce point n'est pas accessible (case bloqué ou hors de la carte).");
        }
        
    }
}
?>