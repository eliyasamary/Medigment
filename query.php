<?php
    $query1 = "SELECT * FROM tbl_204_medicine;"; // for all meds
    $query2 = "SELECT * FROM tbl_204_carer_patient as c 
                INNER JOIN tbl_204_users as u ON c.patient_id = u.user_id
                WHERE c.carer_id='". echo $GET_["id"] ."';"; // for patients list
    $query3 = "SELECT * FROM tbl_204_medicine_patient
                WHERE user_id ='" . echo $GET_["id"] . "';"; // for all meds for patient
?>
 