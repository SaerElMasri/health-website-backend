<?php
header('Access-Control-Allow-Origin: *');
include('connect.php');
$query = $conn->prepare('SELECT * FROM medications');
$query->execute();
$array=$query->get_result();
$response=[];
while ($product= $array->fetch_assoc()) {
    $response[]=$product;
}
echo json_encode($response);
?>