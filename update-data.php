<?php

require "db.php";


if(isset($_GET['employeeId'])){
$id = $_GET['employeeId'];

$sql = "SELECT * from employees WHERE id=$id";
$query = $db->query($sql);
$employees = $query->fetchAll(PDO::FETCH_ASSOC);

echo json_encode($employees);
}


if ($_SERVER['REQUEST_METHOD']=='POST'){
$query = $db->prepare("update employees set fullname=:fullname, role=:role, salary=:salary, email:email, phone=:phone  where id =:id");


$updateData = $query->execute([
    'id' =>$_POST['employeeId'],
    'fullname' =>$_POST['fullName'],
    'role' => $_POST['role'],
    'salary' => $_POST['salary'],
    'email' => $_POST['email'],
    'phone' => $_POST['phone']
    // 'marial_status' => $_POST['marial_status']
]);

if($updateData){
header("refresh:2;index.php");
}

}
