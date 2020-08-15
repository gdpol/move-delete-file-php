$(document).ready(function(){

         $(".content .move").click(function() {

            var id = $(this).data('id');
            var imgElement_src = $( '#img_'+id ).attr("src");
             // Confirm box
            bootbox.confirm("Η φωτογραφία θα μετακινηθεί στις εμφανίσιμες", function(result) {
            if (result){
               // AJAX Request
               $.ajax({
                  url:'move_photo.php',
                  data:{path:imgElement_src},
                  type:'POST',
                  success:function(data, textStatus, jqXHR) {

                       $("#img_" + id).parent().css({"display": "none"})
                  }
               });//ajax
            }
         });

      });
 });