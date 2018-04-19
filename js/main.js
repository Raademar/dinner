
$(function(){
  $("#menu-toggle").click(function(e){
    e.preventDefault();
    $("#wrapper").toggleClass("toggled");
  });

  $("#menu-toggle").on("click",function(){
    $("#menu-toggle").toggleClass("change");
  });

  //$(".profile-link-hover").on("mouseover", function(){
    //$(".profile-link-hover").addClass("text-success")
//  });

  // $("#submitRegistration").click(function(e){
  //   e.preventDefault();
  //   $('#submitRegistration').notify("Thank you for signing up and welcome to our world!", "success");
  // });


  // $.ajax({
  //   url: '/dinner/admin/register.php',
  //   type: "POST",
  //   data: {
  //
  //   },
  //   success: function(data){
  //     data.preventDefault();
  //       $('#flash-success').toggleClass('success-toggle')
  //   }
  // });

});


  //happening modal
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

  function recenthappeningmodal(id){
    var data = {"id": id,};
    jQuery.ajax({
      url: '/dinner/includes/recenthappeningmodal.php',
      method: 'post',
      data: data,
      success: function(data){
        jQuery('body').prepend(data);
        jQuery('#recent-happening').modal('toggle');
      },
      error: function(){
        alert("Oh no.. Something went wrong!");
      }
    });
  }
