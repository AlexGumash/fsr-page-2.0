$(function(){
  $('.upload-link').click(function(e) {
    var file_id = e.target.getAttribute("file")
    var target_id = "upload-file" + file_id;

    $('#'+target_id).toggle()
  })
  // $('#create-news-button').click(function() {
  //   $('.create-news-form').toggle()
  // })
});
