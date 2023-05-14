
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

  <!-- custom css -->
  <link rel="stylesheet" href="../../css/fp.css">
  <title>Front page</title>
</head>
<body>
  <!-- back button -->
  <div class="circle">
    <a href=<?=base_url('/frontPage')?> class="back-button">
      <i class="fa fa-arrow-left"></i>
    </a>
  </div>
  <!-- back button -->
  <h1>Front page</h1>
  <?= \Config\Services::validation()->listErrors();?>

    <form action="/frontPage/save" method="POST" enctype="multipart/form-data">
    <?= csrf_field() ?>
            <label for="image" id="image" class="img-label">FrontPage Image</label>
            <img src="/img/default.jpg" width="200px" class="img-preview">
            <input type="file" id="image" name="image" accept="image/*" class="img-input" onChange="prevImg()"/>
    <h3>Text-Header</h3>
    <textarea name="text_header" rows="4" cols="50" placeholder="Text data yang sekarang"></textarea>
    <h3>Text-Span</h3>
    <textarea name="text_span" rows="4" cols="50" placeholder="Text data yang sekarang"></textarea>
    <input type="submit" value="Submit">
  </form>
  <script src="/js/scripts.js"></script>
</body>
</html>