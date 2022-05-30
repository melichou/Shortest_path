<?php
require_once "Path.php";
require_once "Display.php";
class CalcPath{
    //Attributes 
    private Map $map;
    private Path $currentpath;
    private Path $shortestpath;
    private Point $startpoint;
    private Point $endpoint;
    private bool $founded = false;

    //Constructor
    public function __construct(Map $currentmap, Point $startpoint, Point $endpoint){
        $this->map = $currentmap;
        $this->startpoint = $startpoint;
        $this->endpoint = $endpoint;
        $this->currentpath = new Path($startpoint);
        $this->shortestpath = new Path($startpoint);

    }

    //Getters
    public function getCurrentPath() : Path{
        return $this->currentpath;
    }

    public function getShortestPath() : Path{
        return $this->shortestpath;
    }
    public function getMap() : Map{
        return $this->map;
    }
    public function getEnd(): Point{
        return $this->endpoint;
    }
    public function getStart(): Point{
        return $this->startpoint;
    }

    //Functions 
    public function addPoints(Point $thispoint, Point $endpoint, Path $currentpath){
        //Getting position of current point
        $currentpos = $thispoint->getPosition();
        $endpos = $endpoint->getPosition();

        //Getting map in array
        $maparray = $this->map->getMapArray();

        //Setting available points        
        $points = [
            [$currentpos[0] - 1, $currentpos[1]],
            [$currentpos[0] + 1, $currentpos[1]],
            [$currentpos[0], $currentpos[1] - 1],
            [$currentpos[0], $currentpos[1] + 1],
        ];

        //Testing if end position is in points
        foreach ($points as $point){
            $test = new Point($point[0], $point[1]);
            if($point === $endpos){
                //$end = new Point($point[0],$point[1]);
                //$currentpath->addPoint($end);
                $currentpath->addPoint($test);
                $this->currentpath = $currentpath;
                //return $currentpath;
                $this->founded = true;
                $disp = new Display($this);
                $disp->displayMap();
                exit;
            }
        }
            

        //Treatment 
        foreach ($points as $point){
            //creating Point object
            $test = new Point($point[0], $point[1]);
    
            //testing if current point x or y is not < 0 and if current point is in map
            if ($point[0] < 0 || $point[1] < 0 || $point[0] >= count($maparray) || $point[1] >= count($maparray[0])){
                continue;
            }

            //testing if current position is not a blocked case in map
            if (($maparray[$point[0]][$point[1]]) == 0){
                continue;
            }
                
            //testing if current point is not already in path
            if(in_array($test, $currentpath->getPath())){
                continue;
            }
            
            $currentpath->addPoint($test);
            unset($points);
            unset($currentpos);
            //var_dump($currentpath);
            $this->addPoints($test, $endpoint, $currentpath);
        }
    }

    public function shortestPath(Path $currentpath) {
        //attributes 
        if (empty($this->shortestpath) || !(in_array($this->endpoint, $this->shortestpath->getPath())) ){
            $this->shortestpath = $currentpath;
            $newpath = new Path($this->startpoint);
            $this->addPoints($this->startpoint,$this->endpoint,$newpath); 
        }
        else {
            $shortest = $this->shortestpath->getPath();
            $current = $currentpath->getPath();
            if (count($current) <= count($shortest)){
                return $this->currentpath;
            }
            else{
                return $this->shortestpath;
            }
        }
        
    }

    public function isFounded(){
        if($this->founded == true){
            if (empty($this->shortestpath) || !( in_array($this->endpoint, $this->shortestpath->getPath()) ) ){
                $this->shortestpath = $this->currentpath;
                $newpath = new Path($this->startpoint);
                $this->addPoints($this->startpoint,$this->endpoint,$newpath); 
            }
            else {
                $shortest = $this->shortestpath->getPath();
                $current = $this->currentpath->getPath();
                if (count($current) <= count($shortest)){
                    return $this->currentpath;
                }
                else{
                    return $this->shortestpath;
                }
            }        
        }
        else {
            $this->addPoints($this->start, $this->end, $this->getCurrentPath());
        }
    }
}

?>