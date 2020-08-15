$(document).ready(function(){

    // Delete
    $('.content .del').click(function(){
        var id = $(this).data('id');
 
        // Selecting image source
        var imgElement_src = $( '#img_'+id ).attr("src");
        // Confirm box
        bootbox.confirm("Η φωτογραφία θα διαγραφεί", function(result) {
            if (result){
               //AJAX request
               $.ajax({
                  url: 'removefile.php',
                  type: 'post',
                  data: {path: imgElement_src},
                  success:function(data, textStatus, jqXHR){
                     $("#img_" + id).parent().css({"display": "none"})
                  }
               });//ajax
            }
        });
   });
});
