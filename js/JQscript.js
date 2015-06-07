$(function(){
  if ($(window).width() < 767) {
   $("body").css("font-size","12px");
} else {
  $("body").css("font-size","16px");
}
if ($(window).width() < 992) {
  $("#captcha input").before("<br>");
  }

   // Get an array of all element heights
  var elementHeights = $('.ads-front').map(function() {
    return $(this).outerHeight();
  }).get();

  // Math.max takes a variable number of arguments
  // `apply` is equivalent to passing each height as an argument
  var maxHeight = Math.max.apply(null, elementHeights);
  // Set each height to the max height
  if ($(window).width() > 767) {
  $('.ads-front').height(maxHeight);
  }

  $('.site-title').click(function(){
    window.location.replace("index.php");
  });
  $('#nav').click(function() {
    $(this).toggleClass('open');
  });
  $('.regBody .login-regRedirect').outerHeight($('.regBody .login-inputs').height());


  //main page filter by tag
  $("input[name=radios]:radio").change(function () {
    $(".ads-front").slideDown(200);
    $(".ads-front-container input[value='"+$(this).val()+"']").closest(".ads-front").slideUp(100);
    $('html, body').stop().animate({
        scrollTop: $(".tag-selector").offset().top
    }, 500);
  });

 $("#click").click(function(){
  	$(".ads-front-container").append('<div class="ads-front col-sm-6 col-md-4">');
  	$(".ads-front:last")
  	.append('<h2 class="col-xs-12">Dajem kornjaču i akvarij</h2>')
  	.append('<h3 class="col-xs-12">Zagreb</h3>')
  	.append('<p class="col-xs-12">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec consectetur egestas risus ut tempor. Praesent eu fringilla nisl. Nullam blandit id nisi ac dapibus. Pellentesque laoreet, nisi vel mollis posuere, mi est fermentum mauris, quis tempus libero sem ullamcorper nisi.</p>')
  	.append('<button class="red-button red-button-front col-xs-6">Više</button>');
  });

 $('.radio-tags label').change(function () {
    console.log($(this).find("input").val());
    $('.radio-tags label').removeClass("active-checkbox");
    $(this).addClass("active-checkbox");
    });
 
 $("#logout").click(function(){
   $.ajax({ url: 'includes/logout.php' });
});

$( window ).resize(function() {

if ($(window).width() < 767) {
   $("body").css("font-size","12px");
} else {
  $("body").css("font-size","16px");

   // Get an array of all element heights
  var elementHeights = $('.ads-front').map(function() {
    return $(this).outerHeight();
  }).get();

  // Math.max takes a variable number of arguments
  // `apply` is equivalent to passing each height as an argument
  var maxHeight = Math.max.apply(null, elementHeights);
  // Set each height to the max height
  $('.onlyIndex .ads-front').height(maxHeight);
}
});


  $('#izmjeni').click(function(){
    $('.edit-text').addClass("hidden");
    $('.passchange').removeClass("hidden");
    $('.edit-input').removeClass("hidden");
    $('#izmjeni').addClass("hidden");
    $('#save').removeClass("hidden");
    $('#quit').removeClass("hidden");
     return false;
  });
  $('#quit').click(function(){
    $('.edit-text').removeClass("hidden");
    $('.passchange').addClass("hidden");
    $('.edit-input').addClass("hidden");
    $('#izmjeni').removeClass("hidden");
    $('#save').addClass("hidden");
    $('#quit').addClass("hidden");
     return false;
  });

});