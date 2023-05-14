<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Madju Design Interior</title>
    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <!-- swiper -->
    <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />
    <!-- custom css -->
    <link rel="stylesheet" href="css/cart.css">
</head>
<body>
    
    <!-- header -->

    <section class="header">
        
        <nav class="navbar">
            <ul class="nav-list">
                
            <li class="nav-item"><a href="/userStore"><img alt="" src="https://static.overlay-tech.com/assets/7a7cbf53-98ff-4420-819f-4a3d30d082f7.svg" />Store</a></li>
                <li class="nav-item"><a href="/userProject"><img alt="" src="https://static.overlay-tech.com/assets/8c2308f0-8860-45e1-974e-20ce2012ee5c.svg" />Projects</a></li>
                <li class="nav-item"><a href="/userService"><img alt="" src="https://static.overlay-tech.com/assets/983ca7e7-ad35-4572-8cae-75b535818c10.svg" />Services</a></li>
                <li class="nav-item nav-item-image">
                <a href="/page">
                  <img
                  alt="logo-madju"
                  class="logo-madju"
                  src="https://static.overlay-tech.com/assets/5e0c9ada-d7d1-4696-bd9a-34a8a1129f7e.png"
                  />
                  <!-- <div class="half-circle"> -->
                    <img
                    alt="logo-madju"
                    class="half-circle"
                    src="https://static.overlay-tech.com/assets/6518e249-ef29-408e-85e4-4aa517864d9d.svg"
                    />
                  <!-- </div> -->
                </a>
                </li>
                <li class="nav-item"><a href="/userAbout"><img alt="" src="https://static.overlay-tech.com/assets/f7a595d3-9b53-46d8-9f92-b2f21381fc0e.svg" />About Us</a></li>
                <li class="nav-item"><a href="/userContact"><img alt="" class="vector" src="https://static.overlay-tech.com/assets/f03eb309-7334-4f10-845a-0976efcbe014.svg" />Contact Us</a></li>
                <?php if (!session('id')) { ?>
                    <li class="nav-item"><a href="/login"><img alt="" class="vector" src="https://static.overlay-tech.com/assets/e2b1e584-eb4f-406f-b97d-5c5155a264ba.svg" />Sign In</a></li>
                <?php } 
                    else { ?>
                        <li class="nav-item"><a href="/logout"><img alt="" class="vector" src="https://static.overlay-tech.com/assets/e2b1e584-eb4f-406f-b97d-5c5155a264ba.svg" />Sign Out</a></li>
                <?php } ?>
              </ul>
        </nav>

        <div class="icons">
            <!-- <div id="cart-btn"></div>
            <div id="account-btn"></div> -->
            <div id="menu-btn" class="fas fa-bars"></div>
        </div>

    </section>
    <!-- header -->

    <!-- product -->

    <section class="product" id="product">

        <h1 class="heading" id="heading">Your <span> Item</span></h1>

        <div class="box-container">
    <table class="styled-table">
        <thead>
            <tr>
                <th>No.</th>
                <th>Picture</th>
                <th>Name</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $total_price=0;
            foreach ($cart as $index => $data) : 
                $total_price = $total_price + ($data['product_price'] * $data['quantity']);
            ?>
                <tr>
                    <td><?= $index + 1 ?></td>
                    <td><img src="/img/<?= $data['image'] ?>"/></td>
                    <td><?= $data['product_name'] ?></td>
                    <td><?= $data['product_price'] ?></td>
                    <td>
                        <div class="quantity">
                            <input type="button" value="-" class="quantity-btn" onclick="location.href='<?= base_url('cart/minButton/'.$data['id'].'') ?>'">
                            <span><?= $data['quantity'] ?></span>
                            <input type="button" value="+" class="quantity-btn" onclick="location.href='<?= base_url('cart/plusButton/'.$data['id'].'') ?>'">
                        </div>
                    </td>
                    <td>
                        <!-- <div class="action"> -->
                            <input class="action" type="button" value="Remove" class="action-btn" onclick="location.href='<?= base_url('cart/removeButton/'.$data['id'].'') ?>'">
                        <!-- </div> -->
                    </td>
                </tr>
            <?php endforeach;?>
            <tr>
                <td colspan="3"></td>
                <td colspan="2">Total Price:</td>
                <td><?= $total_price ?></td>
            </tr>
        </tbody>
    </table>
</div>

    </section>

    <!-- product -->

    <!-- footer -->
    <footer class="footer" id="contact">
        <div class="box-container">
            <div class="box">
                <h3>Location</h3>
                <div class="map-container">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d126748.56400419367!2d107.56075552119081!3d-6.90344237941637!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e68e6398252477f%3A0x146a1f93d3e815b2!2sBandung%2C%20Bandung%20City%2C%20West%20Java!5e0!3m2!1sen!2sid!4v1682763058950!5m2!1sen!2sid" 
                    width="250" 
                    height="150" 
                    style="border:0;" 
                    allowfullscreen="" 
                    loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                  </div>

            </div>
            <div class="box">
                <h3>Judul</h3>
                <a href="#">
                    <i>
                        <img
                    alt=""
                    class="vector"
                    src="https://static.overlay-tech.com/assets/613deaec-0474-4962-8ac8-a4fed9ef3b96.svg"
                    />
                    </i>
                    +6287689566
                </a>
                <a href="#">
                    <i>
                        <img
                        alt=""
                        class="vector"
                        src="https://static.overlay-tech.com/assets/d57061ae-6d98-438c-84e4-584eb9d3441d.svg"
                        />
                    </i>
                    Bandung City
                </a>
                <a href="#">
                    <i>
                        <img
                        alt=""
                        class="vector"
                        src="https://static.overlay-tech.com/assets/b8d97384-b755-4356-9316-63e30f472b15.svg"
                        />
                    </i>
                    madju-studio.com
                </a>
            </div>
            <div class="box">
                <h3>Judul</h3>
                <a href="#">
                    <i>
                        <img
                    alt=""
                    class="vector-social"
                    src="https://img.icons8.com/color/48/null/whatsapp--v1.png"
                    />
                    </i>
                    +6287689566
                </a>
                <a href="#">
                    <i>
                        <img
                        alt=""
                        class="vector-social"
                        src="https://img.icons8.com/fluency/48/null/instagram-new.png"
                        />
                    </i>
                    Madju Studio
                </a>
                <a href="#">
                    <i>
                        <img
                        alt=""
                        class="vector-social"
                        src="https://img.icons8.com/color/48/null/facebook-circled--v1.png"
                        />
                    </i>
                    Madju Studio
                </a>
            </div>
            <div class="box">
                <h3>Judul</h3>
                <a href="#">
                    <i>
                        <img
                        alt=""
                        class="vector-social"
                        src="https://img.icons8.com/color/48/null/gmail-new.png"
                        />
                    </i>
                    Madju Studio
                </a>

            </div>

        </div>
        <!-- Copyright -->
        <div class="line-container">
            <div class="line-left"></div>
            <h3>copyright     2022 Budiman</h3>
            <div class="line-right"></div>
        </div>
        <!-- Copyright -->

        <div class="share">
            <a href="#" class="fab fa-facebook-f"></a>
            <a href="#" class="fab fa-twitter"></a>
            <a href="#" class="fab fa-instagram"></a>
            <a href="#" class="fab fa-linkedin"></a>
            <a href="#" class="fab fa-pinterest"></a>
        </div>
    </footer>
    <!-- footer -->

    <script src="https://unpkg.com/swiper@7/swiper-bundle.min.js"></script>
    <!-- custom js -->
    <script src="js/script.js"></script>
</body>
</html>

