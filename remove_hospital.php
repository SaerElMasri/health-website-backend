<?php
include('connect.php');
$id = $_GET["id"];
$query = $conn->prepare('SELECT id FROM hospitals WHERE hospital_id = ?');
$query->bind_param('i', $id );
$query->execute();
$result = $query -> get_result();
$row = $result -> fetch_assoc();
$sql="DELETE FROM hospitals WHERE hospital_id=?";
$query = $conn -> prepare($sql);
$query -> bind_param('i', $id);
$query->execute();
$response=[];
$response['status'] = "Hospital has been deleted";
echo json_encode($response);
?>