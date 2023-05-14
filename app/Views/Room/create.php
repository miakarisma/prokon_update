
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

  <!-- custom css -->
  <link rel="stylesheet" href="../../css/ec.css">
  <title>E-commerce</title>
</head>
<body>
  <!-- back button -->
  <div class="circle">
    <a href=<?=base_url('/ecommerce')?> class="back-button">
      <i class="fa fa-arrow-left"></i>
    </a>
  </div>
  <!-- back button -->
  <h1>E-commerce</h1>
  <h2>Room</h2>
  <?= \Config\Services::validation()->listErrors();?>

        <form action="/room/save" method="POST" enctype="multipart/form-data">
            <?= csrf_field() ?>
            <label for="image" id="image" class="img-label">Room Image</label>
            <img src="/img/default.jpg" width="200px" class="img-preview">
            <input type="file" id="image" name="image" accept="image/*" class="img-input" onChange="prevImg()"/>
            <br/>
            <label for="">name</label>
            <br/>
            <input type="text" name="name" size="50"/>
            <br/>
            <label for="">text_span</label>
            <br/>
            <input type="text" name="text_span" size="50"/>
            <br/><br/>
    <input type="submit" value="Submit">
  </form>
  <script src="/js/scripts.js"></script>
</body>
</html>