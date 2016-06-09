var input='';
$(document).ready(function(){
  $('#profile_file').prop('disabled',false);
  $('#featured_file').prop('disabled',false);
  $('#profile_label').removeClass('disabled');
  $('#featured_label').removeClass('disabled');

  $('td').click(function(){
    var checkbox=$(this).siblings('td').children('input');
    checkbox.prop("checked", !checkbox.prop("checked"));
  });

  var prog='#'+input+'_prog_container';
  var options = {
    //data: {inputID: input, dir_path: path_dir},
    //beforeSend : this function called before form submission
    beforeSend: function()
    {
      $(prog).show();
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
      $('#'+input+'_name').val(document.getElementById(input).value);
      alert(response.responseText);
        //$(idd).children('.msg').html("<font color='green'>"+response.responseText+"</font>");
    },
    error: function()
    {
      alert("error");
        //$(idd).children('.msg').html("<font color='red'> ERROR: unable to upload the file</font>");

    }
  };
  $('form.upload').ajaxForm(options);
});
