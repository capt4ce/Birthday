var input='';
$(document).ready(function(){
  $('#profile_file').disabled=false;
  $('#featured_file').disabled=false;
  $('#profile_label').disabled=false;
  $('#featured_label').disabled=false;

  $('td').click(function(){
    var checkbox=$(this).siblings('td').children('input');
    checkbox.prop("checked", !checkbox.prop("checked"));
  });

  var prog='#'+input+'_prog_container';
  if (input == 'profile_file')
    var path_dir='../profile/';
  else
    var path_dir='../embed/';
  var options = {
    data: {inputID: input, dir_path: path_dir},
    //beforeSend : this function called before form submission
    beforeSend: function()
    {
      $('#profile_pic_form_prog_container').show();
      //clear everything;
      $(prog).children('.progress-bar').text('0%');
      $(prog).children('.progress-bar').attr('aria-valuenow','0');
      $(prog).children('.progress-bar').attr('style','width:0%');
      $(prog).children('.msg').text('');
    },
    //uploadProgress : this function called when the upload is in progress
    uploadProgress: function(event, position, total, percentComplete)
    {
      $(prog).children('.progress-bar').attr('aria-valuenow',percentComplete);
      $(prog).children('.progress-bar').attr('style', 'width:'+percentComplete+'%');
      $(prog).children('.progress-bar').text(percentComplete + '%');
    },
    //success : this function is called when the form upload is successful.
    success: function()
    {
      $(prog).children('.progress-bar').attr('aria-valuenow','100;');
      $(prog).children('.progress-bar').attr('style','width:100%');
      $(prog).children('.progress-bar').html("100%");
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
  $('form').ajaxForm(options);
});
