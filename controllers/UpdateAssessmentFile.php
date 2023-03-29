<?php
require_once "FileWriter.php";
class UpdateAssessmentFile extends FileWriter{
    private $currentFileInUse;
    private $assessmentID;
    function __construct($currentFileInUse){
        $this->currentFileInUse = $currentFileInUse;
        parent::__construct($this->currentFileInUse);
    }

    public function updateCurrentToCompleted($assessmentID){
        //loop the entire file in use and set status from current to completed
        if($assessmentID == null){
            echo "<p>Select an assessment first then click update button to make it completed.</p>";
            return false;
        }
        $this->write($assessmentID);
    }

    public function updateCompletedToCurrent($assessmentID){
        //loop the entire file in use and set status from completed to current
        if($assessmentID == null){
            echo "<p>Select an assessment first then click update button to make it current.</p>";
            return false;
        }
        $this->write($assessmentID);
    }
}