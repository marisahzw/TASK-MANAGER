
<!DOCTYPE html>
<html lang="eng">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Assignment files</title>
</head>
<body>
<div>
    <a href="index.php?route=current">Current</a>
    <a href="index.php?route=completed">Completed</a>
    <a href="index.php?route=upload">Upload</a>
    </div>
    <br>
    <hr>

<?php

session_start();
$_SESSION;
require_once "views/login.php";
require_once "controllers/Router.php";
require_once "controllers/GetCurrentAssessments.php";
require_once "controllers/GetCompletedAssessments.php";
require_once "controllers/UploadAssessmentFile.php";
require_once "controllers/UpdateAssessmentFile.php";
require_once "controllers/GetAllUploadedFiles.php";

//Get file that needs to be accessed from the url

$currentRoute = $_GET["route"]??"current";
$router = new Router($currentRoute);



$getallUploadedFiles = new GetAllUploadedFiles();
//set session storage to the file that is the most current in the data folder
if(!isset($_SESSION["currentFileInUse"])){
    $filesCount = count($getallUploadedFiles->allFiles());
    $latelyAddedFile = $filesCount>0?"data/".$getallUploadedFiles->allFiles()[$filesCount-1]:"";
    $_SESSION["currentFileInUse"] = $latelyAddedFile;
}

//set session storage to selected file
if(isset($_GET["file"])){
    $selectedFile = "data/".$_GET["file"];
    $_SESSION["currentFileInUse"] = $selectedFile;
    header("Location:index.php?route=current");
}

$getCurrentAssessments = new GetCurrentAssessments($_SESSION["currentFileInUse"]??"");
$getCompletedAssessments = new GetCompletedAssessments($_SESSION["currentFileInUse"]??"");
$uploadAssessmentFile = new UploadAssessmentFile();
$updateAssessmentFile = new UpdateAssessmentFile($_SESSION["currentFileInUse"]??"");

require_once $router->route();

//echo show_source(__FILE__);

// TAFADZWA MARISA 101371922

?>
</body>
<div></div>
<hr>
<?php
include_once 'views/footer.php';
?>
<hr>

</html>