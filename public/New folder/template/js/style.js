
// Ẩn hiện đăng ký đăng nhập
$(document).ready(function () {
    $('.signup-container').hide();
    $('.login-container').hide();
    $('#dangnhap').click(function () {
        $('.login-container').slideToggle();
        $('.signup-container').fadeOut();
        $('.login-container').css({"position": "absolute", "z-index": "99999","margin": "7%" });
        $('.login-container div.row').css("background-color", "#fff");
    });
    $('#dangky').click(function () {
        $('.signup-container').slideToggle();
        $('.login-container').fadeOut();
        $('.signup-container').css({"position": "absolute", "z-index": "99999","margin": "7%" });
        $('.signup-container div.row').css("background-color", "#fff");
    });
    $('#chuyendk').click(function (event) {
        $('.signup-container').fadeIn();
        $('.login-container').fadeOut();
    });
    $('#chuyendn').click(function (event) {
        $('.signup-container').fadeOut();
        $('.login-container').fadeIn();
    });
});

// Ẩn hiện about, timeline
$(document).ready(function () {
    $('.all-timeline').hide();
    $('#chuyenabout').css("color", "#23527c");
    $('#chuyentimeline').click(function () {
        $('.all-timeline').fadeIn('slow');
        $('.all-about').hide('slow');
        $('#chuyenabout').css("color", "");
    });
    $('#chuyenabout').click(function () {
        $('.all-timeline').fadeOut('slow');
        $('.all-about').show('slow');
    });
});

function readURL(input) {
    if (input.files && input.files[0]) {
  
      var reader = new FileReader();
  
      reader.onload = function(e) {
        $('.image-upload-wrap').hide();
  
        $('.file-upload-image').attr('src', e.target.result);
        $('.file-upload-content').show();
  
        $('.image-title').html(input.files[0].name);
      };
  
      reader.readAsDataURL(input.files[0]);
  
    } else {
      removeUpload();
    }
  }
  
  function removeUpload() {
    $('.file-upload-input').replaceWith($('.file-upload-input').clone());
    $('.file-upload-content').hide();
    $('.image-upload-wrap').show();
  }
  $('.image-upload-wrap').bind('dragover', function () {
          $('.image-upload-wrap').addClass('image-dropping');
      });
      $('.image-upload-wrap').bind('dragleave', function () {
          $('.image-upload-wrap').removeClass('image-dropping');
  });
