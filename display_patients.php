<?php
include('connect.php');
$query = $conn->prepare('SELECT * FROM users WHERE usertype_id=3');
$query->execute();
$array=$query->get_result();
$response=[];
while ($product= $array->fetch_assoc()) {
    $response[]=$product;
}
echo json_encode($response);
?>