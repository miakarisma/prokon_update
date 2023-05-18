<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

  <!-- custom css -->
  <link rel="stylesheet" href="/css/ab-index.css">
  <title>About Us</title>
</head>
<body>
  <!-- back button -->
  <div class="circle">
    <a href="<?=base_url('/admin')?>" class="back-button">
      <i class="fa fa-arrow-left"></i>
    </a>
  </div>
  <!-- back button -->
  <h1>About Us</h1>
  <section class="table-data">
  <!-- table -->

  <h2>Keterangan About Us</h2>
    <?php foreach ($aboutUs as $data) : ?>
  <div class="table-container">
    <div class="table-row">
      <div class="table-judul">Mini Tagline</div>
      <div class="table-column" placeholder="Mini tagline di atas judul"><?= $data['text_span'];?></div>
    </div>
    <div class="table-row">
      <div class="table-judul">Judul</div>
      <div class="table-column" placeholder="Judul"><?= $data['text_header'];?></div>
    </div>
    <div class="table-row">
      <div class="table-judul">Deskripsi</div>
      <div class="table-column" placeholder="">Deskripsi<?= $data['text_paragraph'];?></div>
    </div>
  </div>
     <!-- button container -->
      <div class="button-container">
        <!-- button edit -->
        <a href="/aboutUs/edit/<?= $data['id']?>"><button class="btn-add">Edit</button></a>
        <!-- button edit -->
      </div>
  <?php endforeach;?>
  
      

    <h2 class="judul-team">Gambar Team</h2>

    <!-- table image-->
    <table>
        <thead>
        <tr>
            <th>No</th>
            <th>Gambar</th>
            <th>Nama</th>
            <th>Posisi</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>

    <?php foreach ($ourTeam as $i => $data) : ?>


        <tr>
            <td><?= $i+1;?></td>
            <td><img src="/img/<?= $data['image']?>" alt="Gambar 1"></td>
            <td><?= $data['name'];?></td>
            <td><?= $data['position'];?></td>
            <td>
        <!-- edit icon -->
              <a href="/ourTeam/edit/<?= $data['id']?>">
                <i class="fas fa-edit"></i>
              </a>

              <!-- delete icon -->
              <a href="/ourTeam/delete/<?= $data['id']?>">
                <i class="fas fa-trash-alt"></i>
              </a> 
            
            
            </td>
        </tr>
    <?php endforeach;?>
        
        <!-- Add more rows as needed -->
        </tbody>
    </table>
    <!-- table image-->

    <!-- button container -->
    <div class="button-container">
      <!-- button add -->
      <a href="/ourTeam/create"><button class="btn-add">Add</button></a>
      <!-- button add -->
    </div>

    <!-- table -->
    </section>


  <script src="js/scripts.js"></script>
</body>
</html>