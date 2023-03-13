<?php
include('connect.php');
$id=$_GET['id'];
$tableName = $_GET['tableName'];
$query = $conn->prepare("SELECT * FROM $tableName WHERE id = ?");
$query->bind_param('i', $id);
$query->execute();
$array = $query->get_result();
$response = [];
while ($users = $array->fetch_assoc()) {
    $response[]=$users;
}
echo json_encode($response);
?>