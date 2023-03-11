<?php
    include("connect.php");
    $hospital_name = $_POST['hospital_name'];
    $hospital_address = $_POST['hospital_address'];
    $hospital_phoneNumber = $_POST['hospital_phoneNumber'];
    $hospital_email = $_POST['hospital_email'];
    $facebook_url = $_POST['facebook_url'];

    $check_hospital = $conn -> prepare('select hospital_email from hospitals where hospital_email =?');
    $check_hospital -> bind_param('s', $hospital_email);
    $check_hospital -> execute();
    $check_hospital -> store_result();
    $hospital_exists = $check_hospital -> num_rows();

    if($hospital_exists > 0){
        $response['status'] = 'Failed to register hospital';
    }else{
        $query = $conn ->prepare('insert into hospitals(hospital_name, hospital_address, hospital_phoneNumber, hospital_email, facebook_url) values (?,?,?,?,?)');
        $query -> bind_param('sssss',$hospital_name, $hospital_address, $hospital_phoneNumber, $hospital_email, $facebook_url);
        $query -> execute();
        $response['status'] = 'Success';
    }
    echo json_encode($response);
?>