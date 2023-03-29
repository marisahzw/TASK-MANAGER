<?php
class GetAllUploadedFiles
{
    private $filesDirectory = "data";
    private $uploadedFiles = [];
    private function getAllFiles(){
        //scan all files in the files directory
        $files = scandir($this->filesDirectory);
        $files = array_values(array_diff(scandir($this->filesDirectory), array(".","..")));
        
        $this->uploadedFiles = $files;
    }

    public function allFiles():array{
        $this->getAllFiles();
        return $this->uploadedFiles;
    }

}
