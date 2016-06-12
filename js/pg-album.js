$(document).ready(function(){
  $('#pictures_upload_label').removeClass('disabled');
  $('#pictures_upload').prop('disabled', false);

  $('#pictures_upload').on('change', function(){
    var options = {
      target: '#new',
      beforeSubmit: function(e){
        $('#new_status').text('Uploading...');
        $('#progress').show();
        $('#new_status').show();
      },
      success: function(e){
        $('#progress').hide();
        $('#new_status').hide();
      },
      error: function(e){

      }
    }
    $('#pictures').ajaxForm(options).submit();
  });
});
