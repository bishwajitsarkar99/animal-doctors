//===== Sticky 
// $(window).on('scroll', function(event) {    
//     var scroll = $(window).scrollTop();
//     if (scroll < 235) {
//         $(".navigation").removeClass("sticky");
//     } else{
//         $(".navigation").addClass("sticky");
//     }
// });

window.onscroll = function() {myFunction()};

var navbar = document.getElementById("navbar");
var sticky = navbar.offsetTop;

function myFunction() {
  if (window.pageYOffset >= sticky) {
    navbar.classList.add("sticky")
  } else {
    navbar.classList.remove("sticky");
  }
}