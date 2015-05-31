$(function(){
  if ($(window).width() < 767) {
   $("body").css("font-size","12px");
} else {
  $("body").css("font-size","16px");
}
if ($(window).width() < 992) {
  $("#captcha input").before("<br>");
  }

  $('#nav').click(function() {
    $(this).toggleClass('open');
  });
  $('.regBody .login-regRedirect').outerHeight($('.regBody .login-inputs').height());

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
}

});
  $('#izmjeni').click(function(){
    $('.edit-text').addClass("hidden");
    $('.edit-input').removeClass("hidden");
    $('#izmjeni').addClass("hidden");
    $('#save').removeClass("hidden");
    $('#quit').removeClass("hidden");
     return false;
  });
  $('#quit').click(function(){
    $('.edit-text').removeClass("hidden");
    $('.edit-input').addClass("hidden");
    $('#izmjeni').removeClass("hidden");
    $('#save').addClass("hidden");
    $('#quit').addClass("hidden");
     return false;
  });

});