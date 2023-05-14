<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

  <!-- custom css -->
  <link rel="stylesheet" href="../../css/ec.css">
  <title>E-commerce</title>
</head>
<body>
  <!-- back button -->
  <div class="circle">
    <a href=<?=base_url('/admin')?> class="back-button">
      <i class="fa fa-arrow-left"></i>
    </a>
  </div>
  <!-- back button -->
  <h1>E-commerce</h1>

  <section class="table-data">
  <!-- table -->

    <h2>Kategori (Selalu 3)</h2>

    <table class="category">
        <thead>
        <tr>
            <th>No</th>
            <th>Gambar</th>
            <th>Text Paragraph</th>
            <th>Nama</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
    <?php foreach ($category as $data) : ?>
        <tr>
            <td>1</td>
            <td><img src="/img/<?= $data['image']?>" alt="Gambar 1"></td>
            <td>Text 1</td>
            <td><?= $data['name'];?></td>
            <td>
            <a href="/category/edit/<?= $data['id']?>"><button class="edit-btn">Edit</button></a>
            </td>
        </tr>
    <?php endforeach;?>
       
        <!-- Add more rows as needed -->
        </tbody>
    </table>

    <h2>Room</h2>

    <table class="room">
        <thead>
        <tr>
            <th>No</th>
            <th>Gambar</th>
            <th>Diskon</th>
            <th>Judul</th>
            <th>description</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
    <?php foreach ($room as $data) : ?>
        <tr>
            <td>1</td>
            <td><img src="/img/<?= $data['image']?>" alt="Gambar 1"></td>
            <td><?= $data['text_span'];?></td>
            <td><?= $data['name'];?></td>
            <td><?= $data['description'];?></td>
            <td>
            
        <a href="/room/edit/<?= $data['id']?>"><button class="edit-btn">Edit</button></a>
        <p><a href="room/delete/<?= $data['id']?>"><button class="delete-btn">Delete</button></a></p>
            </td>
        </tr>
    <?php endforeach;?>
        
        <!-- Add more rows as needed -->
        </tbody>
    </table>
    <!-- button add -->
    <a href="/room/create"><button class="btn-add">Add</button></a>
    <!-- button add -->

    <h2>Product</h2>

    <table class="product">
        <thead>
        <tr>
            <th>No</th>
            <th>Gambar</th>
            <th>Nama</th>
            <th>Harga</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
    <?php foreach ($product as $data) : ?>
        <tr>
            <td>1</td>
            <td><img src="/img/<?= $data['image']?>" alt="Gambar 1"></td>
            <td><?= $data['name'];?></td>
            <td><?= $data['price'];?></td>
            <td>
            
            
        <a href="/product/edit/<?= $data['id']?>"><button class="edit-btn">Edit</button></a>
        <p><a href="product/delete/<?= $data['id']?>"><button class="delete-btn">Delete</button></a></p>
            </td>
        </tr>
    <?php endforeach;?>
        <!-- Add more rows as needed -->
        </tbody>
    </table>
    <!-- table -->

    <!-- button add -->
    <a href="/product/create"><button class="btn-add">Add</button></a>
    <!-- button add -->
    </section>

  <script src="/js/scripts.js"></script>
</body>
</html>