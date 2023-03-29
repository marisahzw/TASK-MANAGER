<div>
    <h2>List of Current Assessments</h2>
    <div>
        <?php
            
            if(isset($_POST["updateCurrent"])){
                $assessmentID = $_POST["updateCurrentToCompleted"]??null;
                if (isset($updateAssessmentFile)) {
                    $updateAssessmentFile->updateCurrentToCompleted($assessmentID);
                }
            }

        if (isset($getCurrentAssessments)) {
            $allCurrent =  $getCurrentAssessments->getCurrent();
        }
        if (isset($allCurrent)) {
            if($allCurrent == []){?>
             <span>No current assessments</span>
             <?php
             }else{
                 ?>
                 <form method="POST" action="">
                     <table >
                         <?php
                             foreach ($allCurrent as $key => $current) {?>
                                 <tr>
                                     <td> <?php echo $current[0] ?> </td>
                                         <td> <?php echo $current[1] ?> </td>
                                         <td> <?php echo $current[2] ?> </td>
                                         <td> <?php echo $current[3] ?> </td>
                                         <td> <?php echo $current[4] ?> </td>
                                         <td>
                                             <label>
                                                 <input
                                                     type="checkbox"
                                                     value = "<?php echo $current[0] ?>"
                                                     name="updateCurrentToCompleted"/>
                                             </label>
                                         </td>
                                 </tr>

                     <?php
                         }
                     ?>
                     </table>
                     <br>
                     <button type="submit" name="updateCurrent">Update</button>
                 </form>
                 <?php
             }
        }
            ?>
        
    </div>
    
</div>
