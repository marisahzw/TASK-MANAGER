<?php
class UploadAssessmentFile{
    private $errors = [];
    private $allowedFileExtensions = ["txt","csv"];
    private function uploadFile($file){
        $filesDirectory = "data";

        if(empty($file["name"])){
            $this->errors["true"] = false;
            $this->errors["message"] = "Select a file first.";
            return;
        }

        $fileExtension = pathinfo($file["name"])["extension"];
        if(in_array($fileExtension,$this->allowedFileExtensions)){
            $destination = $filesDirectory."/".time()."_".$file["name"];
            if(move_uploaded_file($file["tmp_name"], $destination)){
                //Set a session to the current uploaded file to know the file that needs to be used in the program
                $_SESSION["currentFileInUse"] = $destination;
                
                $this->errors["status"] = false;
                $this->errors["message"] = "File successfully uploaded.";

                header("Location:index.php?route=current");
            }else{
                $this->errors["status"] = true;
                $this->errors["message"] = "Unable to upload file. Try again later.";
            }
        }else{
            $this->errors["status"] = true;
            $this->errors["message"] = ".".$fileExtension." files  are not allowed. Only text(.txt) and .csv files are allowed!";
        }
    }

    public function upload($uploadedFile):array{
        $this->uploadFile($uploadedFile);
        return $this->errors;
    }
    
}