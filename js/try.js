$(document).ready(function(){
  $('#profile_file').disabled=false;
  $('#featured_file').disabled=false;
  $('#profile_label').disabled=false;
  $('#featured_label').disabled=false;

  //We can even provide options to ajaxForm to get callbacks like success,error, uploadProgress and beforeSend
  //file upload
  var idd='#' + this.id + '_prog_container';
  if (this.id == 'profile-_pic_form')
    var dir_path='../embed/';
  else
    var dir_path='../profile/';

  $('#profile_file').change(function(){
    $('#profile_pic_form_prog_container').show();
  });

  var options = {

    //beforeSend : this function called before form submission
    beforeSend: function()
    {
      $('#profile_pic_form_prog_container').show();
      //clear everything;
      $(idd).children('.progress-bar').text('0%');
      $(idd).children('.progress-bar').attr('aria-valuenow','0');
      $(idd).children('.progress-bar').attr('style','width:0%');
      $(idd).children('.msg').text('');
    },
    //uploadProgress : this function called when the upload is in progress
    uploadProgress: function(event, position, total, percentComplete)
    {
      $(idd).children('.progress-bar').attr('aria-valuenow',percentComplete);
      $(idd).children('.progress-bar').attr('style', 'width:'+percentComplete+'%');
      $(idd).children('.progress-bar').text(percentComplete + '%');
    },
    //success : this function is called when the form upload is successful.
    success: function()
    {
      $(idd).children('.progress-bar').attr('aria-valuenow','100;');
      $(idd).children('.progress-bar').attr('style','width:100%');
      $(idd).children('.progress-bar').html("100%");
    },
    //complete: this function is called when the form upload is completed.
    complete: function(response)
    {
      alert(response.responseText);
        //$(idd).children('.msg').html("<font color='green'>"+response.responseText+"</font>");
    },
    error: function()
    {
      alert("error");
        //$(idd).children('.msg').html("<font color='red'> ERROR: unable to upload the file</font>");

    }
  };

  var iid='#'+this.id+'_form';
  $(iid).ajaxForm(options);

});

function checkAlert(){
  alert('afa');
}
