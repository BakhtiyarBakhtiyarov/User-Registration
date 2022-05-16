<?php


require_once "db.php";


     $query = $db->prepare("update employees set is_deleted=:is_deleted where id =:id");


    $delete = $query->execute([
        'id' =>$_POST['employeeId'],
        'is_deleted' => '1'
    ]);

   if($delete){
    header("refresh:2;index.php");
   }
  