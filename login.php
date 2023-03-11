<?php
include('connect.php');
header('Access-Control-Allow-Origin:*');

$email = $_POST['email'];
$password = $_POST['password'];

$query = $conn->prepare('select id,first_name,last_name,email,password, usertype_id from users where email=?');
$query->bind_param('s', $email);
$query->execute();

$query->store_result();
$num_rows = $query->num_rows();
$query->bind_result($id, $first_name, $last_name, $email, $hashed_password, $usertype_id);
$query->fetch();
$response = [];
$hash = substr( $hashed_password, 0, 60 );
if ($num_rows == 0) {
    $response['response'] = "user not found";
} else {
    
    if (password_verify($password, $hash)) {
        $response['response'] = "logged in";
        $response['user_id'] = $id;
        $response['first_name'] = $first_name;
        $response['last_name'] = $last_name;
        $response['usertype_id'] = $usertype_id;
        
    } else {
        $response["response"] = "Incorrect password";
    }
}

echo json_encode($response);
?>