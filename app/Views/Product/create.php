<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

  <!-- custom css -->
  <link rel="stylesheet" href="../../css/product-create.css">
  <title>E-commerce</title>
</head>
<body>
  <!-- back button -->
  <div class="circle">
    <a href="<?=base_url('/ecommerce')?>" class="back-button">
      <i class="fa fa-arrow-left"></i>
    </a>
  </div>
  <!-- back button -->
  <h1>E-commerce</h1>
  <h2>Product</h2>
  <?= \Config\Services::validation()->listErrors();?>

        <form action="/product/save" method="POST" enctype="multipart/form-data">
            <?= csrf_field() ?>
            <label for="">Product Name</label>
            <br/>
            <input id="textarea1" type="text" name="name" size="50" oninput="displayCharacterCount('textarea1', 'count1', this.value)" maxlength="30"/>
            <span id="count1">0/30</span>
            <br/>
            <label for="">Price</label>
            <input type="number" step="any" name="price"/>
            <br/>
            <label for="">Description</label>
            <textarea id="textarea2" name="description" id="" cols="30" rows="10" oninput="displayCharacterCount('textarea2', 'count2', this.value)" maxlength="515"></textarea>
            <span id="count2">0/515</span>
            <br/>
  <label for="">category</label>
            <select name="category_id">
              <?php

                  foreach ($category as $data) {
                      echo "<option value='{$data['id']}'>{$data['name']}</option>";
                  }
              ?>
          </select>
          <label for="">room</label>
            <br/>

            <select name="room_id">
              <?php

                  foreach ($room as $data) {
                      echo "<option value='{$data['id']}'>{$data['name']}</option>";
                  }
              ?>
          </select>
            <br/>

            <label for="image" id="image" class="img-label">Product Image</label>
            <img src="/img/default.jpg" width="200px" class="img-preview">
            <input type="file" id="image" name="image" class="img-input" accept="image/*" onChange="prevImg()"/>
            <br/><br/>
    <input type="submit" value="Submit">
  </form>
  <script src="/js/scripts.js"></script>
  <script>
  // scripts-limit-char.js
  function displayCharacterCount(textareaId, countId, text) {
  var maxLength = document.getElementById(textareaId).getAttribute("maxlength");
  var currentLength = text.length;

  // Update the character count
  var countElement = document.getElementById(countId);
  countElement.textContent = currentLength + "/" + maxLength;
}
</body>
</html>