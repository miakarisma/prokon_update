<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- font awesome cdn link  -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

  <link rel="stylesheet" type="text/css" href="css/forgot-style.css">
  <title>Forgot Password</title>
</head>
<body>
  <div class="sign-in">
    <div class="background">
       <!-- back button -->
       <div class="circle">
            <a href=<?=base_url('/')?> class="back-button">
              <i class="fa fa-arrow-left"></i>
            </a>
          </div>
          <!-- back button -->
      <a href="/index">
        <img alt="" class="rectangle-27" src="https://static.overlay-tech.com/assets/d6c8c6f4-ad26-4a8b-a09d-659c87a7602a.png">
      </a>
      <p class="design-your-dream-space-with-our-expert">
        Design your dream space with our expert consultants. From concept to completion, we'll work with you to bring your vision to life and create a space that reflects your unique style and personality
      </p>
    </div>
    <div class="flex-wrapper-four">
      <!-- back button -->
      <div class="circle-login">
            <a href=<?=base_url('/')?> class="back-button">
              <i class="fa fa-arrow-left"></i>
            </a>
          </div>
          <!-- back button -->
      <div class="login">
        <div class="title">
          <p class="l-ogin">Forgot Password</p>
          <p class="please-enter-your-login-details-to-sign">Please enter your new password</p>
        </div>
        <?= \Config\Services::validation()->listErrors();?>
        <!-- Start form -->
        <form method="POST" action="/login/forgotPass">
          <?= csrf_field() ?>
          <!-- Start TextField Email -->
          <div class="texfield-email">
            <input class="rectangle-28" type="email" id="email" name="email" placeholder="Email">
            <div class="flex-wrapper-two">
              <p class="e-mail">Email</p>
            </div>
          </div>
          <!-- End TextField Email -->
          <!-- Start TextField New Password -->
          <div class="texfield-pass">
            <input class="rectangle-28" type="password" id="new-password" name="new-password" placeholder="New Password">
            <div class="flex-wrapper-two">
              <p class="password">New Password</p>
            </div>
          </div>
          <!-- End TextField New Password -->
          <!-- Start TextField Retype Password -->
          <div class="texfield-pass">
            <input class="rectangle-28" type="password" id="retype-password" name="retype-password" placeholder="Retype Password">
            <div class="flex-wrapper-two">
              <p class="password">Retype Password</p>
            </div>
          </div>
          <!-- End TextField Retype Password -->
          <!-- Button Submit -->
          <a href="#">
            <button class="login-bar" type="submit">
              <p style="color: white;">Submit</p>
            </button>
          </a>
        </form>
        <!-- End form -->
        <!-- Start Company -->
        <div class="out">
          <div class="line-1"></div>
          <div class="flex-wrapper-three">
            <p class="pass">madju studio design</p>
          </div>
        </div>
        <!-- End Company -->
      </div>
    </div>
  </div>
</body>
</html>
