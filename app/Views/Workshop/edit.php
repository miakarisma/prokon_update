


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

  <!-- custom css -->
  <link rel="stylesheet" href="../../css/workshop-edit.css">
  <title>Front page</title>
</head>
<body>
  <!-- back button -->
  <div class="circle">
    <a href=<?=base_url('/workshop')?> class="back-button">
      <i class="fa fa-arrow-left"></i>
    </a>
  </div>
  <!-- back button -->
  <h1>Front page</h1>
  <?= \Config\Services::validation()->listErrors();?>

    <form action="/workshop/update/<?= $workshop['id'] ?>" method="POST" enctype="multipart/form-data">
    <?= csrf_field() ?>
    <input type="hidden" name="imagePrevName" value="<?= $workshop['image'] ?>">

    <label for="image" id="image" class="img-label">FrontPage Image</label>
    <img src="/img/<?= $workshop['image'] ?>" width="200px" class="img-preview">
    <input type="file" id="image" name="image" class="img-input" accept="image/*" onChange="prevImg()"/>

    <input type="submit" value="Submit">
  </form>
  <script src="/js/scripts.js"></script>
</body>
</html>