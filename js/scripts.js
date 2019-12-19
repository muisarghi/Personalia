$("document").ready(function(){
      /*script untuk infield label*/
      $(".uiCreate").click(function(e){
        $(".uiFormInput").css("display", "table-row");
        $(".uiFormInput").addClass("Active");
        e.preventDefault();
      });
      $(".uiFormInput label").inFieldLabels();
      $(".uiFormInput input:submit").click(function(){
        $(".uiFormInput").css("display", "");
        $(".uiFormInput").removeClass("Active");
      });
    $(".imenus a[href='"+window.location+"']").addClass("aHighlight");
    $('a[rel*=facebox]').facebox();
    $('li.more').click(function(){
      $(this).addClass('hide');
      $(this).siblings().removeClass('hide');
    });
    $(".aHighlight").parent().siblings().removeClass('hide');
    $(".aHighlight").parent().parent().find('li.more').addClass('hide');;
    $(".aHighlight").parent().removeClass('hide');
});