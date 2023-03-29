<?php
class Router{
    private $fileName;
    function __construct($fileName){
        $this->fileName = $fileName;
    }

    public function route(){
        $filePath = "views/".$this->fileName.".php";
        if(file_exists($filePath)){
            return $filePath;
        }
        return "views/404Error.php";
    }
}