<?php
include('connect.php');
$email=$_GET['email'];
$query = $conn->prepare('SELECT id FROM users WHERE email=?');
$query->bind_param('s', $email);
$query->execute();
$array = $query->get_result();
$response = [];
while ($users = $array->fetch_assoc()) {
    $response[]=$users;
}
echo json_encode($response);
?>