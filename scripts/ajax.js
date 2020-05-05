
$(function(){
  $('.account-menu-item').click(function(e) {
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

  $('.team-menu-item').click(function(e) {
    e.preventDefault();
    var pageName = $(this).attr('data_target');
    $.ajax({
      url: pageName,
      cache: true,
      success: function(html){
        $("#team-content").html(html);
      }
    });
  });

  $('.join-create-option').click(function(e) {
    e.preventDefault();
    var pageName = $(this).attr('data_target');
    $.ajax({
      url: pageName,
      cache: true,
      success: function(html){
        $("#team-container").html(html);
      }
    });
  });

  $('.admin-menu-item').click(function(e) {
    e.preventDefault();
    var pageName = $(this).attr('data_target');
    $.ajax({
      url: pageName,
      cache: true,
      success: function(html){
        $("#admin-content").html(html);
      }
    });
  });

  $('.admin-doc-menu-item').click(function(e) {
    e.preventDefault();
    var pageName = $(this).attr('data_target_docs');
    $.ajax({
      url: pageName,
      cache: true,
      success: function(html){
        $("#docs-content").html(html);
      }
    });
  });

});
