<?php
include('connect.php');
$id=$_GET['id'];
$query = $conn->prepare('SELECT * FROM services WHERE id=?');
$query->bind_param('i', $id);
$query->execute();
$array = $query->get_result();
$response = [];
while ($services = $array->fetch_assoc()) {
    $response[]=$services;
}
echo json_encode($response);
?>