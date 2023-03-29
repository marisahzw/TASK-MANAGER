<?php
require_once "FileReader.php";
class GetCompletedAssessments extends FileReader{
    private $selectedFile;
    private $completedAssessments = [];

    function __construct($selectedFile){
        $this->selectedFile = $selectedFile;
    }

    

    public function getCompleted():array{
        $allAssessments = $this->getAssessments($this->selectedFile);
        //check if there are any assessments
        if($allAssessments == null || $allAssessments == []){
            return [];
        }

        foreach ($allAssessments as $assessment) {
            if(strtolower($assessment[5]) == "completed"){
                $this->completedAssessments[] = $assessment;
            }
        }

        return $this->completedAssessments;
    }
}

