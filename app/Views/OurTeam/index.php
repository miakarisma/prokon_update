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
    <h1>Daftar ourTeam</h1>
    <p><a href="/ourTeam/create">Add New team</a></p>
    <?php foreach ($ourTeam as $data) : ?>
    <fieldset>
        <h3><li><?= $data['name'];?> | <?= $data['position'];?></li></h3>
        <p><img src="/img/<?= $data['image']?>" alt="ourTeam image" width="300px"></p>
        <br/>
        <p><a href="ourTeam/delete/<?= $data['id']?>">delete</a></p>
        <a href="/ourTeam/edit/<?= $data['id']?>">edit</a>
    </fieldset>
    <?php endforeach;?>
</body>
</html>