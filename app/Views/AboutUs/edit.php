<!DOCTYPE html>
<html lang="en">
<head>
 <meta charset="UTF-8">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <!-- Font Awesome -->
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

 <!-- custom css -->
 <link rel="stylesheet" href="/css/ab-edit.css">
 <title>About Us</title>
</head>
<body>
 <!-- back button -->
 <div class="circle">
 <a href="/aboutUs" class="back-button">
 <i class="fa fa-arrow-left"></i>
 </a>
 </div>
 <!-- back button -->
 <h1>About Us</h1>
 <?= \Config\Services::validation()->listErrors();?>

 <form action="/aboutUs/update/<?= $aboutUs['id']; ?>" method="POST" enctype="multipart/form-data">
    <?= csrf_field() ?>
    <h3>Mini Tagline</h3>
    <div class="textarea-container">
        <?php
            $textSpan = $aboutUs['text_span'];
            $textSpanLength = strlen($textSpan);
        ?>
        <textarea id="textarea1" name="text_span" rows="4" cols="50" placeholder="" oninput="displayCharacterCount('textarea1', 'count1', this.value, <?= $textSpanLength; ?>)" maxlength="20"><?= $textSpan; ?></textarea>
        <span id="count1"><?= $textSpanLength; ?>/20</span>
    </div>
    <h3>Judul</h3>
    <div class="textarea-container">
        <?php
            $textHeader = $aboutUs['text_header'];
            $textHeaderLength = strlen($textHeader);
        ?>
        <textarea id="textarea2" name="text_header" rows="4" cols="50" placeholder="" oninput="displayCharacterCount('textarea2', 'count2', this.value, <?= $textHeaderLength; ?>)" maxlength="35"><?= $textHeader; ?></textarea>
        <span id="count2"><?= $textHeaderLength; ?>/35</span>
    </div>
    <h3>Deskripsi</h3>
    <div class="textarea-container">
        <?php
            $textParagraph = $aboutUs['text_paragraph'];
            $textParagraphLength = strlen($textParagraph);
        ?>
        <textarea id="textarea3" name="text_paragraph" rows="4" cols="50" placeholder="" oninput="displayCharacterCount('textarea3', 'count3', this.value, <?= $textParagraphLength; ?>)" maxlength="230"><?= $textParagraph; ?></textarea>
        <span id="count3"><?= $textParagraphLength; ?>/230</span>
    </div>
    <input type="submit" value="Submit">
 </form>
 <script src="../../js/scripts.js"></script>

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