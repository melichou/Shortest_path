<?php
require_once "Path.php";
class CalcPath{
    //Attributes 
    private Map $map;
    private Path $currentpath;
    private Path $shortestpath;
    private Point $startpoint;
    private Point $endpoint;

    //Constructor
    public function __construct(Map $currentmap, Point $startpoint, Point $endpoint){
        $this->map = $currentmap;
        $this->startpoint = $startpoint;
        $this->endpoint = $endpoint;
        $this->currentpath = new Path($startpoint);
    }

    //Getters
    public function getCurrentPath() : Path{
        return $this->currentpath;
    }

    //Functions 
    public function addPoints(Point $thispoint, Point $endpoint, Path $currentpath){
        //Getting position of current point
        $currentpos = $thispoint->getPosition();
        $endpos = $endpoint->getPosition();

        //Getting map in array
        $maparray = $this->map->getMapArray();

        //Getting path in array
        $path = $currentpath->getPath();

        //Setting available points
        $points = [
            [$currentpos[0] - 1, $currentpos[1]],
            [$currentpos[0] + 1, $currentpos[1]],
            [$currentpos[0], $currentpos[1] - 1],
            [$currentpos[0], $currentpos[1] + 1],
        ];

        //Treatment 
        foreach ($points as $point){
            $test = new Point($point[0], $point[1]);
            if ($point[0] < 0 || $point[1] < 0 || $point[0] >= count($maparray) || $point[1] >= count($maparray[0])){
                continue;
            }
            if (($maparray[$point[0]][$point[1]]) == 0){
                continue;
            }
                
            if(in_array($test, $currentpath->getPath())){
                continue;
            }
            if($test === $endpoint){
                $valid = $test;
                $currentpath->addPoint($valid);
                $this->currentpath = $currentpath;
                var_dump($currentpath);
                return $currentpath;

            }
            else{
                $valid = $test;
                $currentpath->addPoint($valid);
                var_dump($currentpath);
                unset($points);
                $path = [];
                unset($currentpos);
                $this->addPoints($valid, $endpoint, $currentpath);
            } 
        } 
    }
        
    
    

    public function shortestPath(Path $currentpath){
        //attributes 
        $endpos = $this->endpoint->getPosition();
        if (!empty($this->shortestPath) && in_array($endpos,$this->shortestPath->getPath())){
            $shortest = $this->shortestpath->getPath();
            if ($currentpath < $shortest){
                return $this->currentpath;
            }
            elseif ($currentpath > $shortest){
                return $this->shortestpath;
            }
            else {
                throw new Exception("Les deux chemins sont équidistances");
            }
        }
        else {
            $this->shortestPath = $currentpath;
            $newpath = new Path($this->startpoint);
            $this->addPoints($this->startpoint,$this->endpoint,$newpath);
            $this->shortestPath($this->currentpath);
        }
        
    }
    public function testGetShortestPath(Point $point, Point $end, Path $path){
        global $shortest;

        if (!empty($shortest) && count($path->getPath()) >= count($shortest->getPath())){
            return $shortest;
        }


        if($point->getAxeX() == $end->getAxeX() && $point->getAxeY() == $end->getAxeY()){
            $shortest = $path;
            return $path;
        }

        $currentpos = $point->getPosition();
        $map = $this->map->getMapArray();

        $points = [
            [$currentpos[0] - 1, $currentpos[1]],
            [$currentpos[0] + 1, $currentpos[1]],
            [$currentpos[0], $currentpos[1] - 1],
            [$currentpos[0], $currentpos[1] + 1],
        ];

        foreach ($points as $point) {
            if ($point[0] < 0 || $point[1] < 0 || $point[0] >= count($map) || $point[1] >= count($map[0])) {
                continue;
            }
            if (0 == $map[$point[0]][$point[1]]) {
                continue;
            }
            if (in_array($point, $path->getPath())) {
                continue;
            }
            $valid = new Point($point[0],$point[1]);
            $path->addPoint($valid);
            var_dump($valid);
            $this->testGetShortestPath($valid, $end, $path);
        }

    }
}
?>