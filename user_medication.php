<?php
    include("connect.php");
    $medication_id = $_POST['medication_id'];
    $patient_id = $_POST['patient_id'];
    $quantity = $_POST['quantity'];

    $query = $conn ->prepare('insert into user_has_medications(user_id, medication_id, quantity) values (?,?, ?)');
    $query -> bind_param('iii', $patient_id, $medication_id, $quantity);
    $query -> execute();
    $response['Status'] = 'Success';
    echo json_encode($response);
?>