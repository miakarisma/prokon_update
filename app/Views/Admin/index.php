<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  
  <!-- custom css -->
  <link rel="stylesheet" href="css/styles2.css">
  <title>Admin Dashboard</title>
</head>
<body>
  <main>
    <nav>
      <ul class="sidebar">
        <li><a href=<?=base_url('/frontPage')?>>Frontpage</a></li>
        <li><a href=<?=base_url('/aboutUs')?>>About Us</a></li>
        <li><a href=<?=base_url('/project')?>>Projects</a></li>
        <li><a href=<?=base_url('/admin')?>>Design Interior</a></li>
        <li><a href=<?=base_url('/admin')?>>Workshop</a></li>
        <li><a href=<?=base_url('/contactUs')?>>Contact</a></li>
        <li><a href=<?=base_url('/ecommerce')?>>eCommerce/Store</a></li>
      </ul>
    </nav>
    <div class="logo-container">
      <img src="assets/logo/madjulogo.jpeg" alt="Logo" class="logo-image">
    </div>
    <!-- Content of each page will be loaded here -->
  </main>
  <script src="js/scripts.js"></script>
</body>
</html>
