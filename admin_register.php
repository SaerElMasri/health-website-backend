<?php
    include("connect.php");
    $user_id = $_POST['user_id'];
    $data_created = $_POST['date_created'];
    $query = $conn ->prepare('insert into admin(user_id, date_created) values (?,?)');
    $query -> bind_param('is', $user_id, $data_created);
    $query -> execute();
    $response['Status'] = 'Success';
?>