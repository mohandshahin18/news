$(document).ready(function(){


  $("#nav-icon3").click(function(){
    $(".menu-mobile").slideToggle();
});

$('#nav-icon3').click(function(){
  $(this).toggleClass('open');
});




var scrollWindow = function() {
  $(window).scroll(function(){
    var $w = $(this),
        st = $w.scrollTop(),
        navbar = $('.navbar-sec')
        sd = $('.js-scroll-wrap');


    if (st > 1) {
      if ( !navbar.hasClass('scrolled') ) {
        navbar.addClass('scrolled');  
      }
    } 
    if (st < 1) {
      if ( navbar.hasClass('scrolled') ) {
        navbar.removeClass('scrolled sleep');
      }
    } 
    if ( st > 180 ) {
      if ( !navbar.hasClass('awake') ) {
        navbar.addClass('awake'); 
      }
      
      if(sd.length > 0) {
        sd.addClass('sleep');
      }
    }
    if ( st < 180 ) {
      if ( navbar.hasClass('awake') ) {
        navbar.removeClass('awake');
        navbar.addClass('sleep');
      }
      if(sd.length > 0) {
        sd.removeClass('sleep');
      }
    }
  });
};
scrollWindow();
  


// for index page 
  $('.products-carousel').owlCarousel({
    items : 4,
    rtl : true ,
    loop:true,
    margin:20,
    nav:false,
    dots:true,
    autoplay : true ,
    autoplaySpeed : 600 ,
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
          items:3
      },
      1100:{
        items:4  
        }
    }
  });



  // for mobile page 
  $('.similar-carousel').owlCarousel({
    items : 5,
    rtl : true ,
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


  // for show info divice  page 
  $('.similar-diviice-carousel').owlCarousel({
    items : 4,
    rtl : true ,
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
            items:1
        },
        600:{
            items:2
        },
        800:{
          items:3
      },
      1100:{
        items:4  
        }
    }
  });


    //for button save & unsave in explore section
    $(".unSave").on("click",function(){  
      $(this).toggleClass("fa fa-heart-o").toggleClass("fa fa-heart").toggleClass("unSave").toggleClass("save"); 
    });


    min = 1; // Minimum of 0
  max = Infinity; // Maximum of 10
  $(".minus").on("click", function() {
    if ($('.count').val() > min) {
      $('.count').val(parseInt($('.count').val()) - 1 );
      $('.counter').text(parseInt($('.counter').text()) - 1 );
    }
  });
  $(".plus").on("click", function() {
    if ($('.count').val() < max) {
      $('.count').val(parseInt($('.count').val()) + 1 );
      $('.counter').text(parseInt($('.counter').text()) + 1 );
    }
  });




$(".plus").click(function(){
  let price = document.getElementById("price").innerHTML;
  let amount = document.getElementById("amount").value;
  let total = +price * +amount ;
    document.getElementById("total").innerHTML =   total.toFixed(2);
    console.log(price);
  });

  $(".minus").click(function(){
    let price = document.getElementById("price").innerHTML;
    let amount = document.getElementById("amount").value;
    let total = +price * +amount ;
      document.getElementById("total").innerHTML =   total.toFixed(2);
    });
  

    $(".read-more").on("click", function() {
      $("#about-info").css({
        height : "auto",
      });
      $(".show-less").show();
      $(".read-more").hide();
      
    });


    $(".show-less").on("click", function() {
      $("#about-info").css({
        height : "146px",
      });
      $(".read-more").show();
      $(".show-less").hide();
      
    });



});

$('.slider-for').slick({
  slidesToShow: 1,
  slidesToScroll: 1,
  arrows: true,
  fade: false,
  asNavFor: '.slider-nav',
  rtl: false
});
$('.slider-nav').slick({
  slidesToShow: 5,
  slidesToScroll: 1,
  asNavFor: '.slider-for',
  dots: false,
  focusOnSelect: true,
  rtl: false
});

$('a[data-slide]').click(function(e) {
  e.preventDefault();
  var slideno = $(this).data('slide');
  $('.slider-nav').slick('slickGoTo', slideno - 1);


  // 
});



function lgn(){
  app.get("/",(_req,res)=>{
      res.render("index");
  });
}


