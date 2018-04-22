$(function() {
  $('#menu-toggle').click(function(e) {
    e.preventDefault();
    $('#wrapper').toggleClass('toggled');
  });

  $('#menu-toggle').on('click', function() {
    $('#menu-toggle').toggleClass('change');
  });

  $('.image-thumbnail-hover').hover(function() {
    $(this).html;
  });
});

//draggable content function
function dragstart_handler(ev) {
  console.log('dragStart');
  ev.dataTransfer.setData('text/html', ev.target.id);
  ev.dataTransfer.dropEffect = 'move';
  $('.hiddenDragdrop').toggle('.hiddenDragdrop');
}

function dragover_handler(ev) {
  ev.preventDefault();
  ev.dataTransfer.dropEffect = 'move';
}
function drop_handler(ev) {
  ev.preventDefault();
  var data = ev.dataTransfer.getData('text/html');
  ev.target.appendChild(document.getElementById(data));
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
