<div>
    <h2>Upload Assessments File</h2>
    <?php
        if(isset($_POST["uploadFile"])){
            $file = $_FILES["file"];
            if (isset($uploadAssessmentFile)) {
                $results = $uploadAssessmentFile->upload($file);
            }
            if($results["status"] = true){

                echo $results["message"] ?>

                <br>
            <?php
            }
        }
    ?>
    <form method="POST" action="" enctype="multipart/form-data">
        <input type="file" name="file"/>
        <button type="submit" name="uploadFile">Upload</button>
    </form>

    <br>
    <p>
        CSV file must be in the following format - id, course_name, assessment_name, date, time, status[Completed/Current]
    </p>
    <div>
    <?php
    if (isset($getallUploadedFiles)) {
        $files = $getallUploadedFiles->allFiles();
    }
    if (isset($files)) {
        if(count($files)>0){?>
            <hr>
            <h2>Files Previously Uploaded (Now in data Folder)</h2>
            <ul>
                <?php
                    for($i=count($files)-1; $i >=0; $i--) {?>
                        <li><a href="index.php?route=upload&file=<?php echo $files[$i] ?>"><?php echo $files[$i] ?></a></li>
                    <?php
                    }
                    ?>
            </ul>
        <?php
        }
    }
            ?>
       
    </div>
</div>
<?php

//echo show_source(__FILE__);
?>