
var swiper = new Swiper('.swiper_features', {
    // Optional parameters
    direction: 'horizontal',
    loop: true,
    autoplay: {
      delay: 2500,
      disableOnInteraction: false,
    },
    // And if we need scrollbar
    scrollbar: {
      el: '.swiper-scrollbar',
    },
});

var swiper_product = new Swiper('.swiper_product',{
     // Optional parameters
     direction: 'horizontal',
     loop: true,
    //  autoplay: {
    //    delay: 2500,
    //    disableOnInteraction: false,
    //  },

     // Navigation arrows
     navigation: {
       nextEl: '.next',
       prevEl: '.prev',
     },

});
