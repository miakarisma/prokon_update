let navbar = document.querySelector('.header .navbar');
let menuBtn = document.querySelector('#menu-btn');

menuBtn.onclick = () =>{
    menuBtn.classList.toggle('fa-times');
    navbar.classList.toggle('active');
};

window.onscroll = () =>{
    menuBtn.classList.remove('fa-times');
    navbar.classList.remove('active');
}

const header = document.querySelector('.header');

window.onscroll = () => {
  if (window.pageYOffset > 0) {
    header.classList.add('small');
  } else {
    header.classList.remove('small');
  }
};

var swiper = new Swiper(".home-slider", {
    autoplay: {
        delay: 7500,
        disableOnInteraction: false,
    },
    grabCursor: true,
    loop:true,
});

var swiper = new Swiper(".team-slider", {
    autoplay: {
        delay: 7500,
        disableOnInteraction: false,
    },
    grabCursor: true,
    loop:true,
    spaceBetween: 20,
    breakpoints: {
        0: {
            slidesPerView: 1,
        },

        768: {
            slidesPerView: 2,
        },

        991: {
            slidesPerView: 3,
        },
    },
});

// ------
const toggleBtn = document.getElementById('toggle-btn');
const sidebar = document.getElementById('sidebar');
const main = document.querySelector('main');

toggleBtn.addEventListener('click', () => {
  if (sidebar.style.left === '-250px') {
    sidebar.style.left = '0';
    main.style.paddingLeft = '265px';
  } else {
    sidebar.style.left = '-250px';
    main.style.paddingLeft = '15px';
  }
});

window.addEventListener('resize', () => {
  if (window.innerWidth > 768) {
    sidebar.style.left = '-250px';
    main.style.paddingLeft = '15px';
  }
});

window.addEventListener('scroll', () => {
  if (window.scrollY > 0) {
    toggleBtn.style.backgroundColor = 'rgba(145, 104, 72, 0.1)';
  } else {
    toggleBtn.style.backgroundColor = 'transparent';
  }
  
  
  if (document.body.scrollTop > 80 || document.documentElement.scrollTop > 80) {
    document.querySelector(".navbar").style.height = "60px";
  } else {
    document.querySelector(".navbar").style.height = "80px";
  }
});

