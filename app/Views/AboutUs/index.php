<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

  <!-- custom css -->
  <link rel="stylesheet" href="/css/ab.css">
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
      <div class="table-judul">Text Span</div>
      <textarea class="table-column" placeholder=" "><?= $data['text_span'];?></textarea>
      <!-- <div class="table-action">
        <button class="edit-button">Edit</button>
      </div> -->
    </div>
    <div class="table-row">
      <div class="table-judul">Text Header</div>
      <textarea class="table-column" placeholder=""><?= $data['text_header'];?></textarea>
      <!-- <div class="table-action">
        <button class="edit-button">Edit</button>
      </div> -->
    </div>
    <div class="table-row">
      <div class="table-judul">Text Paragraph</div>
      <textarea class="table-column" placeholder=""><?= $data['text_paragraph'];?></textarea>
      <!-- <div class="table-action">
        <button class="edit-button">Edit</button>
      </div> -->
    </div>
  </div>
    <!-- button edit -->
    <a href="/aboutUs/edit/<?= $data['id']?>"><button class="btn-add">Edit</button></a>
    <!-- button edit -->
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

    <?php foreach ($ourTeam as $data) : ?>


        <tr>
            <td>1</td>
            <td><img src="/img/<?= $data['image']?>" alt="Gambar 1"></td>
            <td><?= $data['name'];?></td>
            <td><?= $data['position'];?></td>
            <td>
        <p><a href="/ourTeam/edit/<?= $data['id']?>"><button class="edit-btn">Edit</button></a></p>
        <a href="/ourTeam/delete/<?= $data['id']?>"><button class="delete-btn">Delete</button></a>
            
            
            </td>
        </tr>
    <?php endforeach;?>
        
        <!-- Add more rows as needed -->
        </tbody>
    </table>
    <!-- table image-->

    <!-- button edit -->
    <a href="/ourTeam/create"><button class="btn-add">Add</button></a>
    <!-- button edit -->

    <!-- table -->
    </section>


  <script src="js/scripts.js"></script>
</body>
</html>