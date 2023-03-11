<?php
include("connect.php");

$email = $_POST['email'];
$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$dob = $_POST['dob'];
$usertype = $_POST['usertype_id'];
$password = $_POST['password'];
$hashed_password = password_hash($password, PASSWORD_BCRYPT);

$response = array();

$check_email = $conn->prepare('SELECT email FROM users WHERE email = ?');
$check_email->bind_param('s', $email);
$check_email->execute();
$check_email->store_result();
$email_exists = $check_email->num_rows();

if ($email_exists > 0) {
    $response['resutl'] = 'Failed to register user';
} else {
    $query = $conn->prepare('INSERT INTO users(first_name, email, password, dob, usertype_id, last_name) VALUES (?, ?, ?, ?, ?, ?)');
    $query->bind_param('ssssis', $first_name, $email, $hashed_password, $dob, $usertype, $last_name);
    $query->execute();
    $query->close();
    $response['result'] = 'Success';
}

echo json_encode($response);
?>
