<?php
    include("connect.php");
    $user_id = $_POST['user_id'];
    $blood_type = $_POST['blood_type'];
    $EHR = $_POST['EHR'];
    $query = $conn ->prepare('insert into partients_info(user_id, blood_type, EHR) values (?,?,?)');
    $query -> bind_param('iss', $user_id, $blood_type, $EHR);
    $query -> execute();
    $response['Status'] = 'Success';
?>