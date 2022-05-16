<?php
  require_once "db.php";

  $sql = "SELECT * from employees WHERE is_deleted = '0' ";
  $query = $db->query($sql);
  $employees = $query->fetchAll(PDO::FETCH_ASSOC);

  // echo "<pre>";
  // print_r($employees);
  // echo "</pre>";

  if(isset($_GET['sil'])){
    $query = $db->prepare("delete from employees where id =:id");

    $delete = $query->execute([
        'id' =>$_GET['id']
    ]);
   if($delete){
    header("refresh:2;index.php");
   }
  }


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Registration</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>

<body>
    <h1 style="text-align: center;">YUP TECHNOLOGY</h1>
    <?php if(isset($_GET['status']) && $_GET['status']='success'){
      echo "Istifadeci ugurla elave olundu.";
      header("refresh:2;index.php");
    }
      
    ?>
    <a href="create.php" class="btn btn-outline-primary" style="margin-left: 90%; margin-top: 10px;">Əlavə et</a>
    <hr>
    <table class="table table-borderless">
        <thead>
          <tr>
            <th scope="col">S/N</th>
            <th scope="col">Image</th>
            <th scope="col">Ad Soyad</th>
            <th scope="col">Vəzifə</th>
            <th scope="col">Maaş<br>(AZN)</th>
            <th scope="col">Email</th>
            <th scope="col">Telefon</th>
            <th scope="col">Ailə Vəziyyəti</th>
            <th scope="col">Qeydiyyat Tarixi</th>
            <th scope="col">Əməliyyatlar</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach($employees as $key => $employee){ ?>
            <tr>
              <th><?= ++$key ?></th>
              <th><img style="height: 50px; width: 50px;" src="<?= $employee['image'] ?>" ></th>
              <td><?= $employee['fullname'] ?></td>
              <td><?= $employee['role'] ?></td>
              <td><?= $employee['salary'] ?></td>
              <td><?= $employee['email'] ?></td>
              <td><?= $employee['phone'] ?></td>
              <td>
                
              <span class="badge <?= $employee['marial_status']==1 ? "bg-warning text-dark" : "bg-danger" ?>">
                  <?= $employee['marial_status']==1 ? "Subay" : "Evli"  ?> 
              </span>
                
              </td>
              <td><?= substr($employee['created_at'],0,10) ?></td>
              <td>
                  <button onclick="Edit(<?= $employee['id'] ?>)" type="button" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">Redaktə et</button>
                  <form action="delete.php" method="post">
                        <input type="hidden" name="employeeId" value="<?= $employee['id'] ?>">
                        <input type="submit" value="Delete" name="deleteEmployee">
                  </form>
                  <!-- <button onclick="Delete(<?= $employee['id'] ?>)" type="button" class="btn btn-outline-danger">Sil</button> -->
              </td>
            </tr>

            <?php } ?>
        </tbody>
      </table>





<!-- Redakte Et -->

<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">İşçi Redaktə</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form action="update-data.php" method="POST">
      <input type="hidden" id="employeeId" name="employeeId">
      <div class="mb-3">
        <label for="formGroupExampleInput" class="form-label">Ad Soyad:</label>
        <input type="text" class="form-control" id="fullName" name="fullName">
        
      </div>
      <div class="mb-3">
        <label for="formGroupExampleInput2" class="form-label">Vəzifə:</label>
        <input type="text" class="form-control" id="role" name="role">
       
      </div>
      <div class="mb-3">
        <label for="formGroupExampleInput" class="form-label">Maaş:</label>
        <input type="text" class="form-control" id="salary" name="salary">
      </div>
      <div class="mb-3">
        <label for="formGroupExampleInput2" class="form-label">Email:</label>
        <input type="mail" class="form-control" id="email" name="email">
      </div>
      <div class="mb-3">
        <label for="formGroupExampleInput" class="form-label">Telefon:</label>
        <input type="text" class="form-control" id="phone" name="phone">
      </div>
      <p>Ailə vəziyyəti:</p>
      <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" id="marial_statusMarried" name="marial_status" value="1">
        <label class="form-check-label" for="inlineRadio1">Evli</label>
      </div>
      <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="marial_status" id="marial_statusSingle" value="2">
        <label class="form-check-label" for="inlineRadio2">Subay</label>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Bağla</button>
        <button type="submit" name="updateData" class="btn btn-primary">Redaktə Et</button>
      </div>
    </form>
      </div>

    </div>
  </div>
</div>   
  

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.4.10/dist/sweetalert2.all.min.js"></script>

<script>


function Edit(id){

  $.ajax({
    type:"GET",
    url: "update-data.php",
    data: {
      employeeId: id
    },
    success: function( data ) {
      let employeeData = JSON.parse(data);
      // console.log(employeeData);
      $("#employeeId").val(employeeData[0].id);
      $("#fullName").val(employeeData[0].fullname);
      $("#role").val(employeeData[0].role);
      $("#email").val(employeeData[0].email);
      $("#phone").val(employeeData[0].phone);
      $("#salary").val(employeeData[0].salary);
      if(employeeData[0].marial_status=='0'){
        $('#marial_statusMarried').prop('checked', true)
      }
      else{
        $('#marial_statusSingle').prop('checked', true)
      }
    }
});


}



function Delete(id){

  Swal.fire({
  title: 'Are you sure?',
  text: "You won't be able to revert this!",
  icon: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Yes, delete it!'
}).then((result) => {
  if (result.isConfirmed) {

    location.href = "index.php?sil=ok&id=" + id;

    // Swal.fire(
    //   'Deleted!',
    //   'Your file has been deleted.',
    //   'success'
    // )
  }
})


}


</script>

</body>

</html>