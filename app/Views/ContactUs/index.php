


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

  <!-- custom css -->
  <link rel="stylesheet" href="../../css/ct.css">
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
            
            <label for="">name</label>
            <br/>
            <input type="text" name="name" size="50" value="<?= $data['name'];?>"/>
            <br/>
            <label for="">phone</label>
            <br/>
            <input type="number" name="phone" size="50" value="<?= $data['phone'];?>"/>
            <br/>
            <label for="">location</label>
            <br/>
            <input type="text" name="location" size="50" value="<?= $data['location'];?>"/>
            <br/>
            <label for="">website</label>
            <br/>
            <input type="text" name="website" size="50" value="<?= $data['website'];?>"/>
            <br/>
            <label for="">whatsapp</label>
            <br/>
            <input type="text" name="whatsapp" size="50" value="<?= $data['whatsapp'];?>"/>
            <br/>
            <label for="">instagram</label>
            <br/>
            <input type="text" name="instagram" size="50" value="<?= $data['instagram'];?>"/>
            <br/>
            <label for="">facebook</label>
            <br/>
            <input type="text" name="facebook" size="50" value="<?= $data['facebook'];?>"/>
            <br/>
            <label for="">email</label>
            <br/>
            <input type="email" name="email" size="50" value="<?= $data['email'];?>"/>
            <br/>
            <label for="">message</label>
            <br/>
            <input type="text" name="message" size="50" value="<?= $data['message'];?>"/>
            <br/><br/>

            <input type="submit" value="Edit">
  </form>
  <?php endforeach;?>
  <script src="/js/scripts.js"></script>
</body>
</html>
