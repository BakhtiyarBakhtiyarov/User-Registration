<?php
session_start();

if($_SERVER['REQUEST_METHOD']=='POST'){
    require_once "db.php";
    require "functions.php";
    // $fullName = $_POST['fullname'];
    if(($_POST['fullname'])){
        $fullName = input($_POST['fullname']);
        $_SESSION['fullNameError'] = '';
    }
    else{
        $_SESSION['fullNameError'] = 'Ad Soyad boş buraxıla bilməz!';
        header("Location:create.php");
    }


    if(($_POST['role'])){
        $role = input($_POST['role']);
        $_SESSION['roleError'] = '';
    }
    else{
        $_SESSION['roleError'] = 'Vəzifə boş buraxıla bilməz!';
        header("Location:create.php");
    }

    if(($_POST['salary'])){
        $salary = input($_POST['salary']);
        $_SESSION['salaryError'] = '';
    }
    else{
        $_SESSION['salaryError'] = 'Maaş boş buraxıla bilməz!';
        header("Location:create.php");
    }

    if(($_POST['email'])){
        $email = input($_POST['email']);
        $_SESSION['emailError'] = '';
    }
    else{
        $_SESSION['emailError'] = 'Email boş buraxıla bilməz!';
        header("Location:create.php");
    }

    if(($_POST['phone'])){
        $phone = input($_POST['phone']);
        $_SESSION['phoneError'] = '';
    }
    else{
        $_SESSION['phoneError'] = 'Nömrə boş buraxıla bilməz!';
        header("Location:create.php");
    }

    if(($_POST['marial_status'])){
        $marialStatus = input($_POST['marial_status']);
        $_SESSION['marialStatusError'] = '';
    }
    else{
        $_SESSION['marialStatusError'] = 'Ailə vəziyyəti boş buraxıla bilməz!';
        header("Location:create.php");
    }
    // $role = $_POST['role'];
    // $salary = $_POST['salary'];
    // $email = $_POST['email'];
    // $phone = $_POST['phone'];
    // $marialStatus = $_POST['marial_status'];


    $query = $db->prepare('insert into employees set fullname = ? ,role = ? ,salary = ? , email = ? ,phone = ? ,marial_status = ?');
    $insert = $query->execute(array($fullName,$role,$salary,$email,$phone,$marialStatus));

    if($insert){
        header("Location:index.php?status=succes");
    }
}
else{
    header("Location:index.php");
}




?>