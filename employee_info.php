<?php
    include("connect.php");
    $user_id = $_POST['user_id'];
    $SSN = $_POST['SSN'];
    $date_joined = $_POST['date_joined'];
    $position = $_POST['position'];
    $hospital_id = $_POST['hospital_id'];
    $query = $conn ->prepare('insert into employees_info(user_id, SSN, date_joined, position, hospital_id) values (?,?,?, ?)');
    $query -> bind_param('isssi', $user_id, $SSN, $date_joined, $position, $hospital_id);
    $query -> execute();
    $response['Status'] = 'Success';
?>