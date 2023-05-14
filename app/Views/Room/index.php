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
    <h1>Daftar room</h1>
    <p><a href="/room/create">Add New Room</a></p>
    <?php foreach ($room as $data) : ?>
    <fieldset>
        <h3><li><?= $data['name'];?> | <?= $data['text_span'];?></li></h3>
        <p><img src="/img/<?= $data['image']?>" alt="room image" width="300px"></p>
        <br/>
        <p><a href="room/delete/<?= $data['id']?>">delete</a></p>
        <a href="/room/edit/<?= $data['id']?>">edit</a>
    </fieldset>
    <?php endforeach;?>
</body>
</html>