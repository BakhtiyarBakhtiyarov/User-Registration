<?php

require_once "db.php";

$query = $db->prepare("update employees set fullName=:fullname role=:role salary=:salary email:email phone=:phone marial_status=:marial_status where employeeId =:id");


$updateData = $query->execute([
    'id' =>$_POST['employeeId'],
    'fullname' =>$_POST['fullName'],
    'role' => $_POST['role'],
    'salary' => $_POST['salary'],
    'email' => $_POST['email'],
    'phone' => $_POST['phone'],
    'marial_status' > $_POST['marial_status'],
]);

if($updateData){
header("refresh:2;index.php");
}