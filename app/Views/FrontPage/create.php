
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

  <!-- custom css -->
  <link rel="stylesheet" href="/css/fp-create.css">
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
            <img src="/img/default.jpg" width="200px" class="img-preview">
            <label for="image" id="image" class="img-label">FrontPage Image</label>
            <input type="file" id="image" name="image" accept="image/*" class="img-input" onChange="prevImg()"/>
    <h3>Tagline Poster</h3>
    <textarea id="textarea1" name="text_header" rows="4" cols="50" placeholder="Tagline di atas gambar" oninput="displayCharacterCount('textarea1', 'count1', this.value)" maxlength="45"></textarea>
    <span id="count1">0/45</span>

    <h3>Mini-tagline Poster</h3>
    <textarea id="textarea2" name="text_span" rows="4" cols="50" placeholder="Mini tagline di bawah Tagline utama" oninput="displayCharacterCount('textarea2', 'count2', this.value)" maxlength="20"></textarea>
    <span id="count2">0/19</span>

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
</script>
</body>
</html>