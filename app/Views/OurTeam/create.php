<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

  <!-- custom css -->
  <link rel="stylesheet" href="../../css/ab-create-ourteam.css">
  <title>About Us</title>
</head>
<body>
  <!-- back button -->
  <div class="circle">
    <a href="<?=base_url('/aboutUs')?>" class="back-button">
      <i class="fa fa-arrow-left"></i>
    </a>
  </div>
  <!-- back button -->
  <h1>Our Team</h1>
        <?= \Config\Services::validation()->listErrors();?>

        <form action="/ourTeam/save" method="POST" enctype="multipart/form-data">
            <?= csrf_field() ?>
            <label for="image" id="image" class="img-label">Image</label>
            <img src="/img/default.jpg" width="200px" class="img-preview">
            <input type="file" id="image" name="image" accept="image/*" class="img-input" onChange="prevImg()"/>
    <p class="judul-text">Nama</p>
    <input name="name" type="text" placeholder="Isikan dengan nama">
    <p class="judul-text">Posisi</p>
    <input name="position" type="text" placeholder="Isikan posisi pekerja">
    <input type="submit" value="Submit">
  </form>
  <script src="../../js/scripts.js"></script>
</body>
</html>