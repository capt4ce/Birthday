var input='';
var prog='';
//var errorR=false;
$(document).ready(function(){
  $('#profile_file').prop('disabled',false);
  $('#featured_file').prop('disabled',false);
  $('#profile_label').removeClass('disabled');
  $('#featured_label').removeClass('disabled');

  $('td').click(function(){
    var checkbox=$(this).siblings('td').children('input');
    checkbox.prop("checked", !checkbox.prop("checked"));
  });

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
      $('#'+input+'_status').html($('#'+input+'_status').html() + '<a class="cancel" id="'+input+'_cancel"><span class="glyphicon glyphicon-remove"></span></a>');
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
  $('#wish').ajaxForm({
    beforeSend: function(){
      $('#status').modal('show');
    },
    complete: function(response){
      $('.modal-footer').show();
      if (response.responseText=='empty'){
        $('.modal-body').html(
          '<div class="alert alert-danger"><span class="glyphicon glyphicon-remove"> Name and Wish field may not empty</span></div>'
        );
      //  errorR=true;
      }
      else{
        $('.modal-body').html(
          '<div class="alert alert-success"><span class="glyphicon glyphicon-ok"> '+response.responseText+'</span></div>'
        );
    //    errorR=false;
      }
    },
    error: function(){
      $('.modal-body').html(
        '<div class="alert alert-danger">Unknown error has occured</div>'
      );
    }
  });

  $('.file_name').on('click','a', function(){
    var input=this.id;
    input=input.substring(0, input.length - 7);
    alert(input);
    $('#'+input+'_status').text('No picture selected as your picture');
    $('#'+input+'_name').val('');
    $('#'+input+'_prog_container').children('.progress-bar').text('0%');
    $('#'+input+'_prog_container').children('.progress-bar').attr('aria-valuenow','0');
    $('#'+input+'_prog_container').children('.progress-bar').attr('style','width:0%');
    $('#'+input+'_prog_container').hide();
  });

});
