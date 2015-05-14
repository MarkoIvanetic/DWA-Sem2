$(function(){
  $('#nav').click(function() {
    $(this).toggleClass('open');
  });

  $("#click").click(function(){
  	$(".ads-front-container").append('<div class="ads-front col-sm-6 col-md-4"></div>');
  });
});