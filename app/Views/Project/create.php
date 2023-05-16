<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

  <!-- custom css -->
  <link rel="stylesheet" href="../../css/pj.css">
  <title>Projects</title>
</head>
<body>
  <!-- back button -->
  <div class="circle">
    <a href=<?=base_url('/project')?> class="back-button">
      <i class="fa fa-arrow-left"></i>
    </a>
  </div>
  <!-- back button -->
  <h1>Projects</h1>
  <?= \Config\Services::validation()->listErrors();?>

        <form action="/project/save" method="POST" enctype="multipart/form-data">
            <?= csrf_field() ?>
            <label for="">Project Name</label>
            <br/>
            <input type="text" name="name" size="50"/>
            <br/>
            <label for="">Description</label>
            <textarea name="description" id="" cols="30" rows="10"></textarea>
            <br/>
            <label for="">Date</label>
            <input type="date" name="date"/>
            <br/>
            <label for="image" id="image" class="img-label">Project Image</label>
            <img src="/img/default.jpg" width="200px" class="img-preview">
            <input type="file" id="image" name="image" class="img-input" accept="image/*" onChange="prevImg()"/>
            <br/><br/>
    <input type="submit" value="Submit">
  </form>
  <script src="/js/scripts.js"></script>
</body>
</html>