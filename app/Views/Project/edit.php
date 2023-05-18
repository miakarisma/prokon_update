<!DOCTYPE html>
<html lang="en">
<head>
 <meta charset="UTF-8">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <!-- Font Awesome -->
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

 <!-- custom css -->
 <link rel="stylesheet" href="../../css/pj-edit.css">
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

 <form action="/project/update/<?= $project['id']; ?>" method="POST" enctype="multipart/form-data">
 <?= csrf_field() ?>
 <input type="hidden" name="imagePrevName" value="<?= $project['image'] ?>">
 
 <img src="/img/<?= $project['image'] ?>" width="200px" class="img-preview">
 <label for="image" id="image" class="img-label">Project Image</label>
 <input type="file" id="image" name="image" class="img-input" onChange="prevImg()"/>

 <h3>Project Name</h3>
 <div class="textarea-container">
 <input type="text" name="name" size="50" value="<?= $project['name'];?>"/>
 </div>

  <h3>Description</h3>
 <div class="textarea-container">
 <textarea name="description" rows="4" cols="50" placeholder="">
 <?= $project['description']; ?>
 </textarea>
 </div>

 <h3>Date</h3>
 <div class="textarea-container">
 <input type="date" name="date" value="<?= $project['date']; ?>"/>
 </div>

 <input type="submit" value="Edit">
 </form>
 <script src="/js/scripts.js"></script>
</body>
</html>
