<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <!-- custom css -->
    <link rel="stylesheet" href="/css/fp-edit.css">
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

    <form action="/frontPage/update/<?= $frontPage['id']; ?>" method="POST" enctype="multipart/form-data">
        <?= csrf_field() ?>
        <input type="hidden" name="imagePrevName" value="<?= $frontPage['image'] ?>">
        
        <img src="/img/<?= $frontPage['image'] ?>" width="200px" class="img-preview">
        <label for="image" id="image" class="img-label">Image</label>
        <input type="file" id="image" name="image" class="img-input" accept="image/*" onChange="prevImg()"/>

        <h3>Tagline Poster</h3>
        <div class="textarea-container">
            <?php
                $textHeader = $frontPage['text_header'];
                $textHeaderLength = strlen($textHeader);
            ?>
            <textarea id="textarea1" name="text_header" rows="4" cols="50" placeholder="Tagline di atas gambar postur" oninput="displayCharacterCount('textarea1', 'count1', this.value, <?= $textHeaderLength; ?>)" maxlength="45"><?= $frontPage['text_header'];?></textarea>
            <span id="count1"><?= $textHeaderLength; ?>/45</span>
        </div>

        <h3>Mini-tagline Poster</h3>
        <div class="textarea-container">
            <?php
                $textSpan = $frontPage['text_span'];
                $textSpanLength = strlen($textSpan);
            ?>
            <textarea id="textarea2" name="text_span" rows="4" cols="50" placeholder="Mini tagline di bawah Tagline utama" oninput="displayCharacterCount('textarea2', 'count2', this.value, <?= $textSpanLength; ?>)" maxlength="20"><?= $frontPage['text_span'];?></textarea>
            <span id="count2"><?= $textSpanLength; ?>/20</span>
        </div>

        <input type="submit" value="Submit">
    </form>
    <script src="/js/scripts.js"></script>

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
</body>
</html>
