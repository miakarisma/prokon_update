
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

        <form action="/aboutUs/update/<?= $aboutUs['id']; ?>" method="POST" enctype="multipart/form-data">
            <?= csrf_field() ?>
    <h3>Text Span</h3>
    <textarea name="text_span" rows="4" cols="50" placeholder=""><?= $aboutUs['text_span'];?></textarea>
    <h3>Text Header</h3>
    <textarea name="text_header" rows="4" cols="50" placeholder=""><?= $aboutUs['text_header'];?></textarea>
    <h3>Text Paragraph</h3>
    <textarea name="text_paragraph" rows="4" cols="50" placeholder=""><?= $aboutUs['text_paragraph'];?></textarea>
    <input type="submit" value="Submit">
  </form>
  <script src="../../js/scripts.js"></script>
</body>
</html>
