<?php
include('connect.php');
$patient_id = $_POST['patient_id'];
$status = $_POST['status'];
$query = $conn->prepare('SELECT * FROM user_service WHERE patient_id= ?');
$query -> bind_param('i', $patient_id);
$query -> execute();
$result = $query -> get_result();
$row = $result -> fetch_assoc();

$response = [];
if(!empty($row)){
    $sql = "UPDATE user_service set status = ? WHERE patient_id= ?";
    $query = $conn->prepare($sql);
    $query->bind_param('si', $status,$patient_id);
    $query->execute();
    $response['response'] = "Service Status Changed";
} else{
    $response['response'] = "Patient does not exist";
}
echo json_encode($response);


?>