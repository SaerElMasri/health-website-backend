<?php
    include("connect.php");
    $medication_name = $_POST['medication_name'];
    $medication_cost = $_POST['medication_cost'];

    $query = $conn ->prepare('insert into medications(name, cost) values (?,?)');
    $query -> bind_param('ss',$medication_name, $medication_cost);
    $query -> execute();
    $response['Status'] = 'Success';
    echo json_encode($response);
?>