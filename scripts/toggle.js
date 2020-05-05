$(function(){
  $('.upload-link').click(function(e) {
    var file_id = e.target.getAttribute("file")
    var target_id = "upload-file" + file_id;
    var target_id2 = "changelog" + file_id;

    if ($('#'+target_id2).is(":visible")) {
      $('#'+target_id2).toggleClass("flex-visible")
    }

    $('#'+target_id).toggle()
  })

  $('.changeLog-link').click(function(e) {
    var file_id = e.target.getAttribute("file")
    var target_id = "changelog" + file_id;
    var target_id2 = "upload-file" + file_id;

    if ($('#'+target_id2).is(":visible")) {
      $('#'+target_id2).toggle()
    }

    $('#'+target_id).toggleClass("flex-visible")
  })
  // $('#create-news-button').click(function() {
  //   $('.create-news-form').toggle()
  // })
});
