<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

  <!-- custom css -->
  <link rel="stylesheet" href="../../css/ec-index.css">
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

    <h2>Kategori</h2>

    <table class="category">
        <thead>
        <tr>
            <th>No</th>
            <th>Gambar</th>
            <th>Nama</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
    <?php foreach ($category as $i => $data) : ?>
        <tr>
            <td><?= $i+1;?></td>
            <td><img src="/img/<?= $data['image']?>" alt="Gambar 1"></td>
            <td><?= $data['name'];?></td>
            <td>
            <!-- edit icon -->
              <a href="/category/edit/<?= $data['id']?>">
                <i class="fas fa-edit"></i>
              </a>

              <!-- delete icon -->
              <a href="/category/delete/<?= $data['id']?>">
                <i class="fas fa-trash-alt"></i>
              </a> 
            </td>
        </tr>
    <?php endforeach;?>
       
        <!-- Add more rows as needed -->
        </tbody>
    </table>
    <!-- button container -->
    <div class="button-container">
      <!-- button add -->
      <a href="/category/create"><button class="btn-add">Add</button></a>
      <!-- button add -->
    </div>

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
    <?php foreach ($room as $i => $data) : ?>
        <tr>
            <td><?= $i+1;?></td>
            <td><img src="/img/<?= $data['image']?>" alt="Gambar 1"></td>
            <td><?= $data['text_span'];?></td>
            <td><?= $data['name'];?></td>
            <td><?= $data['description'];?></td>
            <td>
            
        <!-- edit icon -->
              <a href="/room/edit/<?= $data['id']?>">
                <i class="fas fa-edit"></i>
              </a>

              <!-- delete icon -->
              <a href="/room/delete/<?= $data['id']?>">
                <i class="fas fa-trash-alt"></i>
              </a> 
            </td>
        </tr>
    <?php endforeach;?>
        
        <!-- Add more rows as needed -->
        </tbody>
    </table>
    <!-- button container -->
    <div class="button-container">
      <!-- button add -->
      <a href="/room/create"><button class="btn-add">Add</button></a>
      <!-- button add -->
    </div>

    <h2>Product</h2>

    <table class="product">
        <thead>
        <tr>
            <th>No</th>
            <th>Gambar</th>
            <th>Nama</th>
            <th>Harga</th>
            <th>Category</th>
            <th>Room</th>
            <th>Description</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
    <?php foreach ($product as $i => $data) : ?>
        <tr>
            <td><?= $i+1;?></td>
            <td><img src="/img/<?= $data['image']?>" alt="Gambar 1"></td>
            <td><?= $data['name'];?></td>
            <td><?= $data['price'];?></td>
            <td>
                <?php 
                foreach($category as $datac):
                    if($data['category_id'] == $datac['id']){
                        echo $datac['name'];
                        break;
                    }
                    
                endforeach;
                ?>
            </td>
            <td>
                <?php 
                foreach($room as $datam):
                    if($data['room_id'] == $datam['id']){
                        echo $datam['name'];
                        break;
                    }
                    
                endforeach;
                ?>
            </td>
            <td><?= $data['description'];?></td>
            <td>
            
            
        <!-- edit icon -->
              <a href="/product/edit/<?= $data['id']?>">
                <i class="fas fa-edit"></i>
              </a>

              <!-- delete icon -->
              <a href="/product/delete/<?= $data['id']?>">
                <i class="fas fa-trash-alt"></i>
              </a> 
            </td>
        </tr>
    <?php endforeach;?>
        <!-- Add more rows as needed -->
        </tbody>
    </table>
    <!-- table -->

    <!-- button container -->
    <div class="button-container">
      <!-- button add -->
      <a href="/product/create"><button class="btn-add">Add</button></a>
      <!-- button add -->
    </div>
    </section>

  <script src="/js/scripts.js"></script>
</body>
</html>