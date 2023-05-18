document.addEventListener('DOMContentLoaded', function() {
  var halfCircle = document.querySelector('.half-circle');
  var navLinks = document.querySelectorAll('.nav-item a');

  // Check if max-width is 1280 and add class to half-circle element
  var screenWidth = window.innerWidth;
  if (screenWidth >= 1100 && screenWidth <= 1280) {
    halfCircle.style.bottom = '-54px';
    halfCircle.style.width = '200px';
    halfCircle.style.height = '57px';
  }
  else if (screenWidth <= 1099) {
    halfCircle.style.bottom = '-49px';
    halfCircle.style.width = '170px';
    halfCircle.style.height = '50px';
  }

  // Add hover event listener to navigation links
  navLinks.forEach(function(link) {
    link.addEventListener('mouseenter', function() {
      // Get the ID of the hovered link
      var linkId = this.id;

      // Set the translateX value based on the link ID
      var translateX = getTranslateX(linkId);

      // Apply the translateX value to the half-circle element
      halfCircle.style.transform = 'translateX(' + translateX + ')';

      // Add the slide-in class to animate the half-circle
      halfCircle.classList.add('slide-in');
    });

    link.addEventListener('mouseleave', function() {
      var currentPageId = document.querySelector('html').id;
      var maxWidth = window.screen.width;
      
      switch (currentPageId) {
        // Store
        case 'store':
          // 1920
          if(maxWidth > 1660 && maxWidth <= 1920){
            halfCircle.style.transform = 'translateX(-320%)';
          }
          // 1660
          else if(maxWidth > 1600 && maxWidth <= 1660){
            halfCircle.style.transform = 'translateX(-280%)';  
          }
          // 1600
          else if(maxWidth == 1600){
            halfCircle.style.transform = 'translateX(-270%)';  
          }
          // 1440
          else if(maxWidth > 1366 && maxWidth <= 1480){
            halfCircle.style.transform = 'translateX(-250%)';  
          }
          // 1366
          else if(maxWidth > 1280 && maxWidth <= 1366){
            halfCircle.style.transform = 'translateX(-245%)';  
          }
          // 1280
          else if(maxWidth > 1180 && maxWidth <= 1280){
            halfCircle.style.transform = 'translateX(-270%)';  
          }
          // 1180
          else if(maxWidth >= 1100 && maxWidth <= 1180){
            halfCircle.style.transform = 'translateX(-230%)';  
          }
          else{
          halfCircle.style.transform = 'translateX(-260%)';
          }
          break;
        // Project 
        case 'project':
          // 1920
          if(maxWidth > 1660 && maxWidth <= 1920){
            halfCircle.style.transform = 'translateX(-230%)';
          }
          // 1660
          else if(maxWidth > 1600 && maxWidth <= 1660){
            halfCircle.style.transform = 'translateX(-207%)';  
          }
          // 1600
          else if(maxWidth == 1600){
            halfCircle.style.transform = 'translateX(-200%)';  
          }
          // 1440
          else if(maxWidth > 1366 && maxWidth <= 1480){
            halfCircle.style.transform = 'translateX(-185%)';  
          }
          // 1366
          else if(maxWidth > 1280 && maxWidth <= 1366){
            halfCircle.style.transform = 'translateX(-180%)';  
          }
          // 1280
          else if(maxWidth > 1180 && maxWidth <= 1280){
            halfCircle.style.transform = 'translateX(-200%)';  
          }
          // 1180
          else if(maxWidth >= 1100 && maxWidth <= 1180){
            halfCircle.style.transform = 'translateX(-175%)';  
          }
          else{
          halfCircle.style.transform = 'translateX(-190%)';
          }
          break;
        // Service
        case 'service':
          // 1920
          if(maxWidth > 1660 && maxWidth <= 1920){
            halfCircle.style.transform = 'translateX(-140%)';
          }
          // 1660
          else if(maxWidth > 1600 && maxWidth <= 1660){
            halfCircle.style.transform = 'translateX(-130%)';  
          }
          // 1600
          else if(maxWidth == 1600){
            halfCircle.style.transform = 'translateX(-120%)';  
          }
          // 1440
          else if(maxWidth > 1366 && maxWidth <= 1480){
            halfCircle.style.transform = 'translateX(-115%)';  
          }
          // 1366
          else if(maxWidth > 1280 && maxWidth <= 1366){
            halfCircle.style.transform = 'translateX(-110%)';  
          }
          // 1280
          else if(maxWidth > 1180 && maxWidth <= 1280){
            halfCircle.style.transform = 'translateX(-125%)';  
          }
          // 1180
          else if(maxWidth >= 1100 && maxWidth <= 1180){
            halfCircle.style.transform = 'translateX(-110%)';  
          }
          else{
          halfCircle.style.transform = 'translateX(-120%)';
          }
          break;
        // About
        case 'about':
          // 1920
          if(maxWidth > 1660 && maxWidth <= 1920){
            halfCircle.style.transform = 'translateX(40%)';
          }
          // 1660
          else if(maxWidth > 1600 && maxWidth <= 1660){
            halfCircle.style.transform = 'translateX(30%)';  
          }
          // 1600
          else if(maxWidth == 1600){
            halfCircle.style.transform = 'translateX(25%)';  
          }
          // 1440
          else if(maxWidth > 1366 && maxWidth <= 1480){
            halfCircle.style.transform = 'translateX(25%)';  
          }
          // 1366
          else if(maxWidth > 1280 && maxWidth <= 1366){
            halfCircle.style.transform = 'translateX(20%)';  
          }
          // 1280
          else if(maxWidth >= 1000 && maxWidth <= 1280){
            halfCircle.style.transform = 'translateX(25%)';  
          }
          else{
            halfCircle.style.transform = 'translateX(20%)';  
          }
          break;
        // Contact
        case 'contact':
           // 1920
          if(maxWidth > 1660 && maxWidth <= 1920){
            halfCircle.style.transform = 'translateX(130%)';
          }
          // 1660
          else if(maxWidth > 1600 && maxWidth <= 1660){
            halfCircle.style.transform = 'translateX(105%)';  
          }
          // 1600
          else if(maxWidth == 1600){
            halfCircle.style.transform = 'translateX(100%)';  
          }
          // 1440
          else if(maxWidth > 1366 && maxWidth <= 1480){
            halfCircle.style.transform = 'translateX(85%)';  
          }
          // 1366
          else if(maxWidth > 1280 && maxWidth <= 1366){
            halfCircle.style.transform = 'translateX(80%)';  
          }
          // 1280
          else if(maxWidth > 1180 && maxWidth <= 1280){
            halfCircle.style.transform = 'translateX(100%)';  
          }
          // 1180
          else if(maxWidth >= 1100 && maxWidth <= 1180){
            halfCircle.style.transform = 'translateX(90%)';  
          }
          else{
            halfCircle.style.transform = 'translateX(95%)';
          }
          break;
        // Default
        default:
          halfCircle.style.transform = 'translateX(-50%)';
          break;
      }
      return translateX;
    });
  });

  // Function to determine the translateX value based on the link ID
  function getTranslateX(linkId) {
    var translateX = '0';
    var maxWidth = window.screen.width;

    // Assign different translateX values based on the link ID
    // 1920
    if(maxWidth > 1660 && maxWidth <= 1920){
      switch (linkId) {
        case 'store-nav':
          translateX = '-320%';
          break;
        case 'projects-nav':
          translateX = '-230%';
          break;
        case 'service-nav':
          translateX = '-140%';
          break;
        case 'about-nav':
          translateX = '40%';
          break;
        case 'contact-nav':
          translateX = '130%';
          break;
        case 'logo-nav':
          translateX = '-50%';
          break;
        case 'login-nav':
          translateX = '220%';
          break;
        // Add more cases for other link IDs and their corresponding translateX values
      }
    }
    // 1660
    else if(maxWidth > 1600 && maxWidth <= 1660){
      switch (linkId) {
        case 'store-nav':
          translateX = '-280%';
          break;
        case 'projects-nav':
          translateX = '-207%';
          break;
        case 'service-nav':
          translateX = '-130%';
          break;
        case 'about-nav':
          translateX = '30%';
          break;
        case 'contact-nav':
          translateX = '105%';
          break;
        case 'logo-nav':
          translateX = '-50%';
          break;
        case 'login-nav':
          translateX = '185%';
          break;
        // Add more cases for other link IDs and their corresponding translateX values
      }
    }
    // 1600
    else if(maxWidth == 1600){
      switch (linkId) {
        case 'store-nav':
          translateX = '-270%';
          break;
        case 'projects-nav':
          translateX = '-200%';
          break;
        case 'service-nav':
          translateX = '-120%';
          break;
        case 'about-nav':
          translateX = '25%';
          break;
        case 'contact-nav':
          translateX = '100%';
          break;
        case 'logo-nav':
          translateX = '-50%';
          break;
        case 'login-nav':
          translateX = '175%';
          break;
        // Add more cases for other link IDs and their corresponding translateX values
      }
    }
    // 1440
    else if(maxWidth > 1366 && maxWidth <= 1480){
      switch (linkId) {
        case 'store-nav':
          translateX = '-250%';
          break;
        case 'projects-nav':
          translateX = '-185%';
          break;
        case 'service-nav':
          translateX = '-115%';
          break;
        case 'about-nav':
          translateX = '25%';
          break;
        case 'contact-nav':
          translateX = '85%';
          break;
        case 'logo-nav':
          translateX = '-55%';
          break;
        case 'login-nav':
          translateX = '155%';
          break;
        // Add more cases for other link IDs and their corresponding translateX values
      }
    }
    // 1366
    else if(maxWidth > 1280 && maxWidth <= 1366){
      switch (linkId) {
        case 'store-nav':
          translateX = '-245%';
          break;
        case 'projects-nav':
          translateX = '-180%';
          break;
        case 'service-nav':
          translateX = '-110%';
          break;
        case 'about-nav':
          translateX = '20%';
          break;
        case 'contact-nav':
          translateX = '80%';
          break;
        case 'logo-nav':
          translateX = '-50%';
          break;
        case 'login-nav':
          translateX = '140%';
          break;
        // Add more cases for other link IDs and their corresponding translateX values
      }
    }
    // 1280
    else if(maxWidth > 1180 && maxWidth <= 1280){
      switch (linkId) {
        case 'store-nav':
          translateX = '-270%';
          break;
        case 'projects-nav':
          translateX = '-200%';
          break;
        case 'service-nav':
          translateX = '-125%';
          break;
        case 'about-nav':
          translateX = '25%';
          break;
        case 'contact-nav':
          translateX = '100%';
          break;
        case 'logo-nav':
          translateX = '-50%';
          break;
        case 'login-nav':
          translateX = '180%';
          break;
        // Add more cases for other link IDs and their corresponding translateX values
      }
    }
    // 1180
    else if(maxWidth >= 1100 && maxWidth <= 1180){
      switch (linkId) {
        case 'store-nav':
          translateX = '-250%';
          break;
        case 'projects-nav':
          translateX = '-190%';
          break;
        case 'service-nav':
          translateX = '-120%';
          break;
        case 'about-nav':
          translateX = '20%';
          break;
        case 'contact-nav':
          translateX = '90%';
          break;
        case 'logo-nav':
          translateX = '-50%';
          break;
        case 'login-nav':
          translateX = '160%';
          break;
        // Add more cases for other link IDs and their corresponding translateX values
      }
    }
    else{
      switch (linkId) {
        case 'store-nav':
          translateX = '-260%';
          break;
        case 'projects-nav':
          translateX = '-190%';
          break;
        case 'service-nav':
          translateX = '-120%';
          break;
        case 'about-nav':
          translateX = '20%';
          break;
        case 'contact-nav':
          translateX = '95%';
          break;
        case 'logo-nav':
          translateX = '-50%';
          break;
        case 'login-nav':
          translateX = '170%';
          break;
        // Add more cases for other link IDs and their corresponding translateX values
      }
    }
    

    return translateX;
  }
});
