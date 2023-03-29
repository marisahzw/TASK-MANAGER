<?php
require_once "FileReader.php";
class FileWriter extends FileReader{
    private $fileName;
    private $modifiedContents = [];
    function __construct($fileName){
        $this->fileName = $fileName;
    }

    protected function write($assessmentID){
        /*
            Get data from the current file in use in array format.
            Implode the arrays to form strings that will be written back to the text file.
        */
        $fileContents = $this->getAssessments($this->fileName);

       //loop through all the files array then set status accordingly
       foreach ($fileContents as $fileContent) {
            if($fileContent[0] == $assessmentID){
                $fileContent[5] = strtolower($fileContent[5]) == "current"?"Completed":"Current";
            }
            
            $stringLineData = implode(",", $fileContent);
            $this->modifiedContents[] = $stringLineData;
       }

        $this->writeToFile();
    }

    private function writeToFile(){
        if($handle = fopen($this->fileName,"w")){
            foreach ($this->modifiedContents as $modifiedContent) {
                fwrite($handle, $modifiedContent."\r\n");
            }
            fclose($handle);
        }
    }
}