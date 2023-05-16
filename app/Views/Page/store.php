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
                <li class="nav-item"><a href="/userStore"><i class="fas fa-th"></i> Category</a></li>
                <li class="nav-item"><a href="/userProject"><i class="fas fa-percent"></i> Sale</a></li>
                <li class="nav-item">
                    <form class="form-search" id="my-form">
                        <input class="input-search" type="text" placeholder="Search...">
                        <button class="btn-search" type="submit">Search</button>
                    </form>
                </li>
                <li class="nav-item"><a href="/cart"><i class="fas fa-shopping-cart"></i> Shopping Cart</a></li>
                <?php if (!session('id')) { ?>
                    <li class="nav-item"><a href="/login"><img alt="" class="vector" src="https://static.overlay-tech.com/assets/e2b1e584-eb4f-406f-b97d-5c5155a264ba.svg" /> Sign In</a></li>
                <?php } 
                    else { ?>
                        <li class="nav-item"><a href="/logout"><img alt="" class="vector" src="https://static.overlay-tech.com/assets/e2b1e584-eb4f-406f-b97d-5c5155a264ba.svg" /> Sign Out</a></li>
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
                            <a href="/login/isLogged_in" class="btn">Shop Now</a>
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
                <i class="fa fa-couch fa-3x"></i>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
              </div>   
              <a href="store.html"><h3>All Categories > </h3>
              </a>
              <div class="all-line"></div>           
            </div>
            <?php foreach ($category as $i => $data) : if($i>2)break;?>
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
                    <a href="/userRoomDesc/<?= $data['id']; ?>" class="btn">add to cart</a>
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
            <form action="/cart/add" method="POST">
                <?= csrf_field() ?>
                <input type="hidden" name="account_id" value="<?= (!session('id') ? -1 : session('id'))?>">
                <input type="hidden" name="product_id" value="<?= $data['id']?>">
            <div class="box">
                <a href="/userProductDesc/<?= $data['id']; ?>" class="fas fa-eye"></a>
                <img src="/img/<?= $data['image']?>" alt="">
                <h3><?= $data['name'];?></h3>
                <div class="stars">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star-half-alt"></i>
                </div>
                <div class="price"><?= $data['price'];?></div>
                <input type="submit" value="add to cart" class="btn" name="submit_btn">
            </div>
            </form>
        <?php endforeach;?>
        </div>

    </section>
    <h1 id="kolom">aaaaaaa</h1>

    <!-- product -->

    

    <!-- footer -->
    <footer class="footer" id="contact">
        <div class="box-container">
            <div class="box">
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
                
                <a href="#">
                    <i>
                        <img
                    alt=""
                    class="vector"
                    src="https://static.overlay-tech.com/assets/613deaec-0474-4962-8ac8-a4fed9ef3b96.svg"
                    />
                    </i>
                    <?= $contactUs[0]['phone'];?>
                </a>
                <a href="#">
                    <i>
                        <img
                        alt=""
                        class="vector"
                        src="https://static.overlay-tech.com/assets/d57061ae-6d98-438c-84e4-584eb9d3441d.svg"
                        />
                    </i>
                    <?= $contactUs[0]['location'];?>
                </a>
                <a href="#">
                    <i>
                        <img
                        alt=""
                        class="vector"
                        src="https://static.overlay-tech.com/assets/b8d97384-b755-4356-9316-63e30f472b15.svg"
                        />
                    </i>
                    <?= $contactUs[0]['website'];?>
                </a>
            </div>
            <div class="box">
                
                <a href="#">
                    <i>
                        <img
                    alt=""
                    class="vector-social"
                    src="https://img.icons8.com/color/48/null/whatsapp--v1.png"
                    />
                    </i>
                    <?= $contactUs[0]['whatsapp'];?>
                </a>
                <a href="#">
                    <i>
                        <img
                        alt=""
                        class="vector-social"
                        src="https://img.icons8.com/fluency/48/null/instagram-new.png"
                        />
                    </i>
                    <?= $contactUs[0]['instagram'];?>
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
                
                <a href="#">
                    <i>
                        <img
                        alt=""
                        class="vector-social"
                        src="https://img.icons8.com/color/48/null/gmail-new.png"
                        />
                    </i>
                    <?= $contactUs[0]['facebook'];?>
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
    </footer>
    <!-- footer -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/swiper@7/swiper-bundle.min.js"></script>
    <!-- custom js -->
    <script src="/js/script.js"></script>
    <script src="/js/jquery-3.7.0.min.js"></script>
    <script>
        getProductByCat();
        function getProductByCat(){
            $.ajax({
                type: 'GET',
                url: '<?php echo base_url()."userStore/cat" ?>',
                dataType: 'json',
                contentType: 'json',
                success: function(data){
                    console.log(data);
                    var productByCat="";
                    for(var i=0;i<data.length;i++){
                        productByCat+= data[i].id+" ";
                        productByCat+= data[i].name+" ";
                        productByCat+= data[i].price+" ";
                    }
                    $('#kolom').html(productByCat);
                }
            });
        }
    </script>
</body>
</html>