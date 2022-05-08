$(document).ready(function(){
  $("a").on('click', function(event) {
    if (this.hash !== "") {
      event.preventDefault();
      var hash = this.hash;
      $('html, body').animate({
        scrollTop: $(hash).offset().top
      }, 800, function(){
        window.location.hash = hash;
      });
    } 
  });

  $("#myBtn").click(function(){
    $("html,body").animate({scrollTop:0},1000);
  });




});

var position = $(window).scrollTop();

// should start at 0

$(window).scroll(function() {
  var scroll = $(window).scrollTop();
  if(scroll > position) {
    console.log('scrollDown');
    $('.hero').css({
      'height' : '0vh'

    });
  } else {
    console.log('scrollUp');
  }
  position = scroll;
});


