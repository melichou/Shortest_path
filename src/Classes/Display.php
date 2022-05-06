<?php
class Display{
    //Attributes
    private Map $map;
    private Path $shortest;

    //Constructor 
    public function __construct(){
    
    }
    
    //Functions 
    public function displayMap(Map $map, Path $shortest){
        //Attributes needed
        $mapArray = $map->getMapArray();
        $pathArray = $shortest->getPath();

        
    }
}
?>