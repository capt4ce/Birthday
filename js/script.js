$(document).ready(
  function(){
    $active_date=$("#active_time").html();
    $count_time=new Date($active_date);
    $("#countdown").countdown({
      timestamp: $count_time,
      callback: function(days, hours, minutes, seconds){
        if (days==0 && hours==0 && minutes==0 && seconds==0){
          location.reload();
        }
      }
    });
  }
);
