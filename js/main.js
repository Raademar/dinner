$(function(){
  $("#menu-toggle").click(function(e){
    e.preventDefault();
    $("#wrapper").toggleClass("toggled");
  });

  $("#menu-toggle").on("click",function(){
    $("#menu-toggle").toggleClass("change");
  });






});
