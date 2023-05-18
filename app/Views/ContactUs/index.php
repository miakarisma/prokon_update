<!DOCTYPE html>
<html lang="en">
<head>
 <meta charset="UTF-8">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <!-- Font Awesome -->
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

 <!-- custom css -->
 <link rel="stylesheet" href="../../css/ct-index.css">
 <title>Contact</title>
</head>
<body>
 <!-- back button -->
 <div class="circle">
 <a href=<?=base_url('/admin')?> class="back-button">
 <i class="fa fa-arrow-left"></i>
 </a>
 </div>
 <!-- back button -->
 
 <h1>Contact Footer</h1>
 <?php foreach ($contactUs as $data) : ?>
 <?= \Config\Services::validation()->listErrors();?>

 <form action="/contactUs/update/<?= $data['id']; ?>" method="POST" enctype="multipart/form-data">
 <?= csrf_field() ?>
 
 <div class='form-group'>
  <label for="">Name</label>
  <input type="text" name="name" size="50" value="<?= $data['name'];?>"/>
 </div>

 <div class='form-group'>
  <label for="">Phone</label>
  <input type="number" name="phone" size="50" value="<?= $data['phone'];?>"/>
 </div>

 <div class='form-group'>
  <label for="">Location</label>
  <input type="text" name="location" size="50" value="<?= $data['location'];?>"/>
 </div>

 <div class='form-group'>
  <label for="">Website</label>
  <input type="text" name="website" size="50" value="<?= $data['website'];?>"/>
 </div>

 <div class='form-group'>
  <label for="">Whatsapp</label>
  <input type="text" name="whatsapp" size="50" value="<?= $data['whatsapp'];?>"/>
 </div>

 <div class='form-group'>
  <label for="">Instagram</label>
  <input type="text" name="instagram" size="50" value="<?= $data['instagram'];?>"/>
 </div>

 <div class='form-group'>
  <label for="">Facebook</label>
  <input type="text" name="facebook" size="50" value="<?= $data['facebook'];?>"/>
 </div>

 <div class='form-group'>
  <label for="">Email</label>
  <input type="email" name="email" size="50" value="<?= $data['email'];?>"/>
 </div>


<div class='submit-button'>
  <input type='submit' value='Save'>
</div>

 </form>
 <?php endforeach;?>
 <script src="/js/scripts.js"></script>
</body>
</html>
