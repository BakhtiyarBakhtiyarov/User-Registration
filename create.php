<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Registration</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>

<body>
  <div class="container">
    <h4>İşçi Əlavə</h4>

    <form action="action.php" method="post" enctype="multipart/form-data">
    <div class="mb-3">
        <label for="formGroupExampleInput" class="form-label">İstifadəçi şəkli:</label>
        <input type="file" class="form-control" id="formGroupExampleInput" name="file">
      </div>
      <div class="mb-3">
        <label for="formGroupExampleInput" class="form-label">Ad Soyad:</label>
        <input type="text" class="form-control" id="formGroupExampleInput" name="fullname">
        <span style="color: red;"><?=$_SESSION['fullNameError']; ?></span>
      </div>
      <div class="mb-3">
        <label for="formGroupExampleInput2" class="form-label">Vəzifə:</label>
        <input type="text" class="form-control" id="formGroupExampleInput2" name="role">
        <?=$_SESSION['roleError']; ?>
      </div>
      <div class="mb-3">
        <label for="formGroupExampleInput" class="form-label">Maaş:</label>
        <input type="text" class="form-control" id="formGroupExampleInput" name="salary">
        <?=$_SESSION['salaryError']; ?>
      </div>
      <div class="mb-3">
        <label for="formGroupExampleInput2" class="form-label">Email:</label>
        <input type="mail" class="form-control" id="formGroupExampleInput2" name="email">
        <?=$_SESSION['emailError']; ?>
      </div>
      <div class="mb-3">
        <label for="formGroupExampleInput" class="form-label">Telefon:</label>
        <input type="text" class="form-control" id="formGroupExampleInput" name="phone">
        <?=$_SESSION['phoneError']; ?>
      </div>
      <p>Ailə vəziyyəti:</p>
      <?=$_SESSION['marialStatusError']; ?>
      <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="marial_status" id="inlineRadio1" value="0">
        <label class="form-check-label" for="inlineRadio1">Evli</label>
      </div>
      <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="marial_status" id="inlineRadio2" value="1">
        <label class="form-check-label" for="inlineRadio2">Subay</label>
      </div>
      <hr style="width: 100%;">
      <input type="submit" class="btn btn-primary" name="submit" />
    </form>


  </div>
</body>

</html>