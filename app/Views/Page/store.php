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
    <link rel="stylesheet" href="/css/store.css">
</head>
<body>
    
    <!-- header -->

    <section class="header">
        
        <nav class="navbar">
            <ul class="nav-list">
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
                <li class="nav-item"><a href="/userStore"><i class="fas fa-th"></i>Category</a></li>
                <li class="nav-item"><a href="/userProject"><i class="fas fa-percent"></i>Sale</a></li>
                <li class="nav-item">
                    <form class="form-search" id="my-form">
                        <input class="input-search" type="text" placeholder="Search...">
                        <button class="btn-search" type="submit">Search</button>
                    </form>
                </li>
                <li class="nav-item"><a href="/userContact"><i class="fas fa-shopping-cart"></i>Shopping Cart</a></li>
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

    <section class="home" id="home">
        <div class="swiper home-slider">
            <div class="swiper-wrapper">
                <?php foreach ($frontPage as $data) : ?>
                    <div class="swiper-slide slide" style="background: url(../img/<?= $data['image']; ?>) no-repeat;">
                        <div class="content">
                            <h3><?= $data['text_header']; ?></h3>
                            <span><?= $data['text_span']; ?></span>
                            <br>
                            <a href="/login/isLogged_in" class="btn">add to cart</a>
                        </div>
                    </div>
                <?php endforeach;?>

            </div>
        </div>

    </section>

    <!-- home -->

    <!-- category -->
    <section class="category">
        <div class="category-row">
            <div class="category-column">
              <h2>Design</h2>
              <h2>Your Dream</h2>
              <h2 class="category-line">Room</h2>
              <div class="icon-text-container">
                <i class="fa fa-couch fa-6x"></i>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
              </div>   
              <a href="store.html"><h3>All Categories > </h3>
              </a>
              <div class="all-line"></div>           
            </div>
            <?php foreach ($category as $data) : ?>
            <div class="category-column" id="category-image">
              <img src="/img/<?= $data['image']; ?>" alt="Image 1">
              <h4><?= $data['name']; ?></h4>
            </div>
            <?php endforeach;?>
        </div>

        <div class="container-break-line">
            <div class="break-line"></div>
        </div>

    </section>
    <!-- category -->

    <!-- room -->
    <section class="room">
        <div class="room-container">
            <?php foreach ($room as $data) : ?>
            <div class="column content-column">
              <img src="/img/<?= $data['image']; ?>" class="content-column" id="left-column"/>
              <div class="overlay">
                <div class="text">
                    <p><?= $data['text_span']; ?></p>
                    <h2><?= $data['name']; ?></h2>
                    <a href="/login/isLogged_in" class="btn">add to cart</a>
                </div>
              </div>
            </div>
            <?php endforeach;?>
          </div>
    </section>
    
    <!-- room -->

    <!-- product -->

    <section class="product" id="product">

        <h1 class="heading" id="heading">our <span> products</span></h1>

        <div class="box-container">
            <?php foreach ($product as $data) : ?>
            <div class="box">
                <a href="#" class="fas fa-heart"></a>
                <a href="#" class="fas fa-eye"></a>
                <img src="/img/<?= $data['image']; ?>" alt="">
                <h3><?= $data['name']; ?></h3>
                <div class="stars">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star-half-alt"></i>
                </div>
                <div class="price"><?= $data['price']; ?><span><?= $data['price']; ?></span></div>
                <a href="/login/isLogged_in" class="btn">add to cart</a>
            </div>
            <?php endforeach;?>
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
    <script src="../js/script.js"></script>
</body>
</html>