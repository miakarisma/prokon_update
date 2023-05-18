<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

  <!-- custom css -->
  <link rel="stylesheet" href="/css/pj-index.css">
  <title>Projects</title>
</head>
<body>
  <!-- back button -->
  <div class="circle">
    <a href=<?=base_url('/admin')?> class="back-button">
      <i class="fa fa-arrow-left"></i>
    </a>
  </div>
  <!-- back button -->
  <h1>Projects</h1>
  <section class="table-data">
  <!-- table -->
    <table>
        <thead>
        <tr>
            <th>No</th>
            <th>Gambar</th>
            <th>Judul</th>
            <th>Keterangan</th>
            <th>Tanggal</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
    <?php foreach ($project as $i => $data) : ?>
        <tr>
            <td><?=$i+1?></td>
            <td><img src="/img/<?= $data['image']?>" alt="Gambar 1"></td>
            <td><?= $data['name'];?></td>
            <td><?= $data['description'];?></td>
            <td><?= $data['date'];?></td>
            <td>

           <!-- Edit and Trash Icons -->
            <a href="/project/edit/<?= $data['id']?>">
              <i class="fas fa-edit"></i>
            </a> 
            <a href="/project/delete/<?= $data['id']?>">
              <i class="fas fa-trash-alt"></i> 
            </a>
            
            
        
            </td>
        </tr>
    <?php endforeach;?>
        
        <!-- Add more rows as needed -->
        </tbody>
    </table>
    <!-- table -->

       <!-- button add -->
    <div class="button-container">
      <a href="/project/create"><button class="btn-add">Add</button></a> 
    </div>
    </section>

  <script src="../../js/scripts.js"></script>
</body>
</html>