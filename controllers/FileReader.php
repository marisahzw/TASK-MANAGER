<?php
class FileReader{
    private $fileContents = [];
    
    protected function getAssessments($fileName){
        //Check existence of the file in the server
        if(file_exists($fileName)){
            //Read the contents of the file
            if(($handle = fopen($fileName, "r")) !== false){
                while(($data = fgetcsv($handle, 1000)) !== false){
                    $this->fileContents[] = $data;
                }
                fclose($handle);
                //print_r($this->allAssessments);
                return $this->fileContents;
            }
        }
    }
}