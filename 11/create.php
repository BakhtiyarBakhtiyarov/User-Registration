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

    <form action="action.php" method="post">
      <div class="mb-3">
        <label for="formGroupExampleInput" class="form-label">Ad Soyad:</label>
        <input type="text" class="form-control" id="formGroupExampleInput" name="fullname">
        <span style="color: red;"><?=$_SESSION['fullNameError']; ?> </span>
      </div>
      <div class="mb-3">
        <label for="formGroupExampleInput2" class="form-label">Vəzifə:</label>
        <input type="text" class="form-control" id="formGroupExampleInput2" name="role">
        <span style="color: red;"> <?=$_SESSION['roleError']; ?> </span>
      </div>
      <div class="mb-3">
        <label for="formGroupExampleInput" class="form-label">Maaş:</label>
        <input type="text" class="form-control" id="formGroupExampleInput" name="salary">
        <span style="color: red;"> <?=$_SESSION['salaryError']; ?> </span>
      </div>
      <div class="mb-3">
        <label for="formGroupExampleInput2" class="form-label">Email:</label>
        <input type="mail" class="form-control" id="formGroupExampleInput2" name="email">
        <span style="color: red;"> <?=$_SESSION['emailError']; ?> </span>
      </div>
      <div class="mb-3">
        <label for="formGroupExampleInput" class="form-label">Telefon:</label>
        <input type="text" class="form-control" id="formGroupExampleInput" name="phone">
        <span style="color: red;"> <?=$_SESSION['phoneError']; ?> </span>
      </div>
      <p>Ailə vəziyyəti:</p>
     
      <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="marial_status" id="inlineRadio1" value="1">
        <label class="form-check-label" for="inlineRadio1">Evli</label>
      </div>
      <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="marial_status" id="inlineRadio2" value="2">
        <label class="form-check-label" for="inlineRadio2">Subay</label>
      </div>
      <br>
      <span style="color: red;"> <?=$_SESSION['marialStatusError']; ?></span>
      <hr style="width: 100%;">
      <input type="submit" class="btn btn-primary" name="submit" />
    </form>


  </div>
</body>

</html>