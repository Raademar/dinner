
$(function(){
  $("#menu-toggle").click(function(e){
    e.preventDefault();
    $("#wrapper").toggleClass("toggled");
  });

  $("#menu-toggle").on("click",function(){
    $("#menu-toggle").toggleClass("change");
  });

});

function upcominghappeningmodal(id){
  var data = {"id": id,};
  jQuery.ajax({
    url: '/dinner/includes/upcominghappeningmodal.php',
    method: 'post',
    data: data,
    success: function(data){
      jQuery('body').prepend(data);
      jQuery('#upcoming-happening').modal('toggle');
    },
    error: function(){
      alert("Something went wrong!");
    }
  });
}
