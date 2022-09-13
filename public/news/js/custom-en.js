$(document).ready(function(){





    // for show info divice  page
    $('.similar-diviice-carousel').owlCarousel({
      items : 3,
      rtl : false ,
      loop:true,
      margin:20,
      nav:true,
      dots:false,
      autoplay : true ,
      autoplaySpeed : 1000 ,
      smartSpeed : 800 ,
      autoplayTimeout : 3000 ,
      autoplayHoverPause : true ,
      responsive:{
          0:{
              items:1
          },
          600:{
              items:2
          },
          800:{
            items:2
        },
        1100:{
          items:3
          }
      }
    });



      // for mobile page
  $('.similar-carousel').owlCarousel({
    items : 5,
    rtl : false ,
    loop:true,
    margin:20,
    nav:true,
    dots:false,
    autoplay : true ,
    autoplaySpeed : 600 ,
    smartSpeed : 800 ,
    autoplayTimeout : 3000 ,
    autoplayHoverPause : true ,
    responsive:{
        0:{
            items:2
        },
        600:{
            items:3
        },
        800:{
          items:4
      },
      1100:{
        items:5
        }
    }
  });
});



