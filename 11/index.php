<?php
require_once "db.php";

$sql = 'SELECT * from employees';
$query = $db->query($sql);
$employees = $query->fetchAll(PDO::FETCH_ASSOC);

// echo "<pre>";
// print_r($employees);
// echo "</pre>";

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>User Registration</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>

<body>
  <h1 style="text-align: center;">YUP TECHNOLOGY</h1>
  <?php if (isset($_GET['status']) && $_GET['status'] = 'success') {
    echo "<p style='color:green;'>İstifadəçi uğurla əlavə olundu!</p>";
    header("refresh:2;index.php");
  }

  ?>
  <a href="create.php" class="btn btn-outline-primary" style="margin-left: 90%; margin-top: 10px;">Əlavə et</a>
  <hr>
  <table class="table table-borderless">
    <thead>
      <tr>
        <th scope="col">S/N</th>
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
      <?php
      $i=1;
       foreach ($employees as $employee) { 
         ?>
        <tr>
          <td><?= $i++?></td>
          <td><?= $employee['fullname'] ?></td>
          <td><?= $employee['role'] ?></td>
          <td><?= $employee['salary'] ?></td>
          <td><?= $employee['email'] ?></td>
          <td><?= $employee['phone'] ?></td>
          <td>
            <span class="badge bg-danger"><?php if ($employee['marial_status'] == 0) {echo "Evli";} ?></span>
            <span class="badge bg-warning text-dark"><?php if ($employee['marial_status'] == 1) {echo "Subay";} ?></span>
          </td>
          <td><?= substr($employee['created_at'], 0, -9) ?></td>
          <td>
            <button type="button" class="btn btn-outline-primary">Redaktə et</button>
            <button type="button" class="btn btn-outline-danger">Sil</button>
          </td>
        </tr>

      <?php } ?>
    </tbody>
  </table>


</body>

</html>