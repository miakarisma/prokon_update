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
    <h1>Daftar category</h1>
    <p><a href="/category/create">Add New Product</a></p>
    <?php foreach ($category as $data) : ?>
    <fieldset>
        <h3><li><?= $data['name'];?></li></h3>
        <p><img src="/img/<?= $data['image']?>" alt="category image" width="300px"></p>
        <br/>
        <p><a href="category/delete/<?= $data['id']?>">delete</a></p>
        <a href="/category/edit/<?= $data['id']?>">edit</a>
    </fieldset>
    <?php endforeach;?>
</body>
</html>