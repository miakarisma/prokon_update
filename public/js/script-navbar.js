document.addEventListener('DOMContentLoaded', function() {
    var halfCircle = document.querySelector('.half-circle');
    var navLinks = document.querySelectorAll('.nav-item a');
  
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
        
        switch (currentPageId) {
          case 'store':
            halfCircle.style.transform = 'translateX(-260%)';
            break;
          case 'project':
            halfCircle.style.transform = 'translateX(-190%)';
            break;
          case 'service':
            halfCircle.style.transform = 'translateX(-120%)';
            break;
          case 'about':
            halfCircle.style.transform = 'translateX(20%)';
            break;
          case 'contact':
            halfCircle.style.transform = 'translateX(95%)';
            break;
          default:
            halfCircle.style.transform = 'translateX(-50%)';
            break;
        }
      });
    });
  
    // Function to determine the translateX value based on the link ID
    function getTranslateX(linkId) {
      var translateX = '0';
  
      // Assign different translateX values based on the link ID
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
  
      return translateX;
    }
  });
  