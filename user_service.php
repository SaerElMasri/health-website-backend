<?php
    include("connect.php");
    $patient_id = $_POST['patient_id'];
    $service_id = $_POST['service_id'];
    $status = $_POST['status'];
    
    
    $query = $conn ->prepare('insert into user_service(patient_id, service_id, status) values (?,?,?)');
    $query -> bind_param('iis',$patient_id, $service_id, $status);
    $query -> execute();
    $response['status'] = 'Success';

    echo json_encode($response);
?>