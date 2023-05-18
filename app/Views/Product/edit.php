<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

  <!-- custom css -->
  <link rel="stylesheet" href="../../css/product-edit.css">
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

        <form action="/product/update/<?= $product['id']; ?>" method="POST" enctype="multipart/form-data">
            <?= csrf_field() ?>
            <input type="hidden" name="imagePrevName" value="<?= $product['image'] ?>">
            <label for="">Product Name</label>
            <br/>
            <?php
              $textName = $product['name'];
              $textNameLength = strlen($textName);
            ?>
            <input type="text" name="name" size="50" oninput="displayCharacterCount('textarea1', 'count1', this.value, <?= $textNameLength; ?>)" maxlength="20" value="<?= $product['name']; ?>"/>
            <br/>
            <label for="">Price</label>
            <input type="number" step="any" name="price" value="<?= $product['price']; ?>"/>
            <br/>
            <label for="">Description</label>
            <?php
              $textDescription = $product['description'];
              $textDescriptionLength = strlen($textDescription);
            ?>
            <textarea id="textarea2" name="description" cols="30" rows="10" oninput="displayCharacterCount('textarea2', 'count2', this.value, <?= $textDescriptionLength; ?>)" maxlength="515"><?= $product['description']; ?></textarea>
            <span id="count2"><?= $textDescriptionLength; ?>/515</span>
            <br/>
    <label for="">category</label>
            <select name="category_id">
              <?php

                  foreach ($category as $data) {
                      echo "<option value='{$data['id']}' ".($product['category_id'] == $data['id'] ? 'selected' : '') .">{$data['name']}</option>";
                  }
              ?>
          </select>
            <br/>
    <label for="">room</label>
            <select name="room_id">
              <?php

                  foreach ($room as $data) {
                      echo "<option value='{$data['id']}' ".($product['room_id'] == $data['id'] ? 'selected' : '') .">{$data['name']}</option>";
                  }
              ?>
          </select>
            <br/>

            <label for="image" id="image" class="img-label">Product Image</label>
            <img src="/img/<?= $product['image'] ?>" width="200px" class="img-preview">
            <input type="file" id="image" name="image" class="img-input" onChange="prevImg()"/>
            <br/><br/>
            <input type="submit" value="Edit">

            <script>
// scripts-limit-char.js
document.addEventListener("DOMContentLoaded", function() {
  // Function to display character count
  function displayCharacterCount(textareaId, countElementId, maxLength) {
    var textarea = document.getElementById(textareaId);
    var countElement = document.getElementById(countElementId);
    var currentLength = textarea.value.length;

    // Update the character count
    countElement.textContent = currentLength + "/" + maxLength;
  }

  // Function to initialize character count for all textareas
  function initializeCharacterCount() {
    var textareas = document.getElementsByTagName("textarea");

    for (var i = 0; i < textareas.length; i++) {
      var textarea = textareas[i];
      var maxLength = textarea.getAttribute("maxlength");
      var countElementId = "count" + (i + 1);

      // Update character count on page load
      displayCharacterCount(textarea.id, countElementId, maxLength);

      // Add event listener for input event
      textarea.addEventListener("input", (function(countElementId, maxLength) {
        return function() {
          displayCharacterCount(this.id, countElementId, maxLength);
        };
      })(countElementId, maxLength));
    }
  }

  // Call the initializeCharacterCount function
  initializeCharacterCount();
});
</script>
  </form>
  <script src="/js/scripts.js"></script>
  
</body>
</html>