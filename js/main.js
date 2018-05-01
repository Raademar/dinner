$(function() {
  $('#menu-toggle').click(function(e) {
    e.preventDefault();
    $('#wrapper').toggleClass('toggled');
  });

  $('#menu-toggle').on('click', function() {
    $('#menu-toggle').toggleClass('change');
  });
});

// register redirect to login after success message shown.
if (
  window.location.href ==
  'http://localhost/dinner/admin/register.php?success=true'
) {
  function registeredUserTransfer() {
    setTimeout(function() {
      window.location.href('http://localhost/dinner/admin/login.php');
    }, 2000);
  }
}

//draggable content function
function dragstart_handler(ev) {
  console.log('dragStart');
  ev.dataTransfer.setData('text/html', ev.target.id);
  ev.dataTransfer.dropEffect = 'move';
  $('#target').addClass('.hiddenDragdrop');
}

function dragover_handler(ev) {
  ev.preventDefault();
  ev.dataTransfer.dropEffect = 'move';
}
function drop_handler(ev) {
  ev.preventDefault();
  var data = ev.dataTransfer.getData('text/html');
  ev.target.appendChild(document.getElementById(data));
  $('#target').removeClass('.hiddenDragdrop');
}

//happening modal
function upcominghappeningmodal(id) {
  var data = { id: id };
  jQuery.ajax({
    url: '/dinner/includes/upcominghappeningmodal.php',
    method: 'post',
    data: data,
    success: function(data) {
      jQuery('body').prepend(data);
      jQuery('#upcoming-happening').modal('toggle');
    },
    error: function() {
      alert('Something went wrong!');
    }
  });
}

function recenthappeningmodal(id) {
  var data = { id: id };
  jQuery.ajax({
    url: '/dinner/includes/recenthappeningmodal.php',
    method: 'post',
    data: data,
    success: function(data) {
      jQuery('body').prepend(data);
      jQuery('#recent-happening').modal('toggle');
    },
    error: function() {
      alert('Oh no.. Something went wrong!');
    }
  });
}
