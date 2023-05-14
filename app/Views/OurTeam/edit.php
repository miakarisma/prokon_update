<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

  <!-- custom css -->
  <link rel="stylesheet" href="../../css/ab.css">
  <title>About Us</title>
</head>
<body>
  <!-- back button -->
  <div class="circle">
    <a href="table-about.html" class="back-button">
      <i class="fa fa-arrow-left"></i>
    </a>
  </div>
  <!-- back button -->
  <h1>About Us</h1>
        <?= \Config\Services::validation()->listErrors();?>

        <form action="/ourTeam/update/<?= $ourTeam['id']; ?>" method="POST" enctype="multipart/form-data">
            <?= csrf_field() ?>
            <input type="hidden" name="imagePrevName" value="<?= $ourTeam['image'] ?>">

            <label for="image" id="image" class="img-label">OurTeam Image</label>
            <img src="/img/<?= $ourTeam['image'] ?>" width="200px" class="img-preview">
            <input type="file" id="image" name="image" class="img-input" accept="image/*" onChange="prevImg()"/>
            <label for="">name</label>
            <br/>
            <input type="text" name="name" size="50" value="<?= $ourTeam['name'];?>"/>
            <br/>
            <label for="">text span</label>
            <br/>
            <input type="text" name="position" size="50" value="<?= $ourTeam['position'];?>"/>
    <input type="submit" value="Submit">
  </form>
  <script src="../../js/scripts.js"></script>
</body>
</html>