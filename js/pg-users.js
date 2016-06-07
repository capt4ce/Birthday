$(document).ready(function(){
  $('.datatables').dataTable();

  $('td').click(function(){
    var checkbox=$(this).siblings('td').children('input');
    checkbox.prop("checked", !checkbox.prop("checked"));
  });
});
