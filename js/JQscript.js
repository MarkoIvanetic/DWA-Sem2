$(function(){

  if ($(window).width() < 767) {
   $("body").css("font-size","12px");
} else {
  $("body").css("font-size","16px");
}

  $('#nav').click(function() {
    $(this).toggleClass('open');
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
}

});
});