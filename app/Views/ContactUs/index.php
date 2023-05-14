<!DOCTYPE html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Produk</title>
    <style>
        li{
            list-style-type : none;
        }

        fieldset{
            margin : 10px;
        }
    </style>
</head>
<body>
    <h1>Daftar contactUs</h1>
    <p><a href="/contactUs/create">Add New Product</a></p>
    <?php foreach ($contactUs as $data) : ?>
    <fieldset>
        <h3><li><?= $data['name'];?> | <?= $data['phone'];?></li></h3>
        <h3><li><?= $data['location'];?> | <?= $data['website'];?></li></h3>
        <h3><li><?= $data['whatsapp'];?> | <?= $data['instagram'];?></li></h3>
        <h3><li><?= $data['facebook'];?> | <?= $data['message'];?></li></h3>
        <br/>
        <p><a href="contactUs/delete/<?= $data['id']?>">delete</a></p>
        <a href="/contactUs/edit/<?= $data['id']?>">edit</a>
    </fieldset>
    <?php endforeach;?>
</body>
</html>