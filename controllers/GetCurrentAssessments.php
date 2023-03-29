<?php
require_once "FileReader.php";
class GetCurrentAssessments extends FileReader{
    private $selectedFile;
    private $currentAssessments = [];

    function __construct($selectedFile){
        $this->selectedFile = $selectedFile;
    }

    

    public function getCurrent():array{
        $allAssessments = $this->getAssessments($this->selectedFile);
        //check if there are any assessments
        if($allAssessments == null || $allAssessments == []){
            return [];
        }

        foreach ($allAssessments as $assessment) {
            if(strtolower($assessment[5]) == "current"){
                $this->currentAssessments[] = $assessment;
            }
        }

        return $this->currentAssessments;
    }
}