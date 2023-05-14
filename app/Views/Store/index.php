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
    <h1>Daftar product</h1>
    <p><a href="/product/create">Add New Product</a></p>
    <?php foreach ($product as $data) : ?>
    <fieldset>
        <h3><li><?= $data['name'];?> | <?= $data['price'];?></li></h3>
        <p><img src="/img/<?= $data['image']?>" alt="product image" width="300px"></p>
        <?= $data['description'];?>
        <br/>
        <p><a href="product/delete/<?= $data['id']?>">delete</a></p>
        <a href="/product/edit/<?= $data['id']?>">edit</a>
    </fieldset>
    <?php endforeach;?>
</body>
</html>