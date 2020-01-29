
$(function(){
  $('.account-menu-item').click(function(e) {
    console.log('kek');
    e.preventDefault();
    var pageName = $(this).attr('data_target');
    $.ajax({
      url: pageName,
      cache: true,
      success: function(html){
        $("#account-content").html(html);
      }
    });
  });

});
