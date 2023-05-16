<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <!-- custom css -->
    <link rel="stylesheet" href="/css/fpedit.css">
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

        <h3>Text-Header</h3>
        <div class="textarea-container">
            <textarea name="text_header" rows="4" cols="50" placeholder="">
                <?= $frontPage['text_header'];?>
            </textarea>
        </div>

        <h3>Text-Span</h3>
        <div class="textarea-container">
            <textarea name="text_span" rows="4" cols="50" placeholder="">
                <?= $frontPage['text_span'];?>
            </textarea>
        </div>

        <input type="submit" value="Submit">
    </form>
    <script src="/js/scripts.js"></script>
</body>
</html>
