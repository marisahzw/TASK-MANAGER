<div>
    <h2>List of Completed Assessments</h2>
    <div>
    <?php
        if(isset($_POST["updateCompleted"])){
            $assessmentID = $_POST["updateCompletedToCurrent"]??null;

            if (isset($updateAssessmentFile)) {
                $updateAssessmentFile->updateCompletedToCurrent($assessmentID);
            }
        }

    if (isset($getCompletedAssessments)) {
        $allCompleted =  $getCompletedAssessments->getCompleted();
    }

    if (isset($allCompleted)) {
        if($allCompleted == []){
            echo "NO COMPLETED ASSESSMENTS!";?>

        <?php
           }else{?>
           <form method="POST" action="">
            <table >
                <?php
                    foreach ($allCompleted as $key => $completed) {?>
                        <tr>
                           <td> <?php echo $completed[0] ?> </td>
                            <td> <?php echo $completed[1] ?> </td>
                            <td> <?php echo $completed[2] ?> </td>
                            <td> <?php echo $completed[3] ?> </td>
                            <td> <?php echo $completed[4] ?> </td>
                            <td>
                                <label>
                                    <input
                                        type="checkbox"
                                        value = "<?php echo $completed[0] ?>"
                                        name="updateCompletedToCurrent"/>
                                </label>
                            </td>
                    </tr>
                <?php
                    }?>
                </table>
                <br>
                <button type="submit" name="updateCompleted">Update</button>
             </form>
            <?php
           }
    }
        ?>
    </div>
    
</div>

<?php
//echo show_source(__FILE__);
?>