<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

  <!-- custom css -->
  <link rel="stylesheet" href="../../css/fpindex.css">
  <title>Front page</title>
</head>
<body>
  <!-- back button -->
  <div class="circle">
    <a href=<?=base_url('/admin')?> class="back-button">
      <i class="fa fa-arrow-left"></i>
    </a>
  </div>
  <!-- back button -->
  <h1>Front page</h1>
  <section class="table-data">
  <!-- table -->
    <table>
        <thead>
        <tr>
            <th>No</th>
            <th>Gambar</th>
            <th>Text Header</th>
            <th>Text Span</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
    <?php 
    $i = 0;
    foreach ($frontPage as $data) : 
        $i++;
        ?>
        <tr>
          <td data-label="No"><?=$i?></td>
          <td data-label="Gambar"><img src="/img/<?= $data['image']?>" alt="Gambar"></td>
          <td data-label="Text Header"><?= $data['text_header'];?></td>
          <td data-label="Text Span"><?= $data['text_span'];?></td>
          <td data-label="Actions">
          <a href="frontPage/edit/<?= $data['id']?>">
          <i class="fas fa-edit"></i>
          </a>
          <a href="/frontPage/delete/<?= $data['id']?>">
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
      <a href="/frontPage/create"><button class="btn-add">Add</button></a>
      <!-- button add -->
    </div>

    </section>

  <script src="/js/scripts.js"></script>
</body>
</html>