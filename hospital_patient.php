<?php
    include("connect.php");
    $hospital_id = $_POST['hospital_id'];
    $patient_id = $_POST['patient_id'];
    $query = $conn ->prepare('insert into hospital_users(hospital_id, patient_id) values (?,?)');
    $query -> bind_param('ii',$hospital_id, $patient_id);
    $query -> execute();
    $response['status'] = 'Success';
    echo json_encode($response);
?>