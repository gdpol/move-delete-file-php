<!DOCTYPE HTML>

<html>

<head>
   <meta charset="UTF-8">
   <title>Untitled</title>
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
   <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css">
<style type="text/css">

.content{
   width: 100%;
   margin-right: 5px;
   border: 1px solid gray;
   border-radius: 3px;
}

</style>

</head>

<body>

<?php

$folder_path = "../../uploads/";
$num_files = glob($folder_path ."*.{JPG,jpeg,jpg,gif,png,bmp}", GLOB_BRACE);
$folder = opendir($folder_path);

if($num_files > 0){
   $i = 1;
   ?>

   <div class="container container-fluid ">
       <div class="row" style="background:#FFFFCC">
          <div class="container">
             <div class="row">
          <div class="col-2 text-center text-primary font-weight-bold">Εικόνα</div>
          <div class="col-8 text-center text-primary font-weight-bold">Φάκελος</div>
          <div class="col-1 text-center text-primary font-weight-bold">Μεταφορά</div>
          <div class="col-1 text-right text-primary font-weight-bold text-truncate">Διαγραφή</div>
          </div>
        </div>


   <?php
    while(false !== ($file = readdir($folder))&&($i<$num_files)){
        $file_path = $folder_path.$file;
        $extension = strtolower(pathinfo($file ,PATHINFO_EXTENSION));
        if($extension=='jpg' || $extension =='png' || $extension == 'gif' || $extension == 'bmp' || $extension == 'jpeg'){
?>


       <div class="content text-center" id = "photos">
          <img src="<?= $file_path ?>" id="img_<?=$i?>" width="auto" height="50" alt="" style="float:left; margin-left:1em; margin: 3px"/>
          <span class="del" style="float:right; padding-right: 0.5em" data-id=<?=$i?>><img src="../../images/delete.png" height="50" title="Διαγραφή"></span>
          <span class="move" style="float:right; padding-right: 0.5em" data-id=<?=$i?>><img src="../../images/move_icon.jpg" height="50" title="Μετακίνηση"></span>
          <span class="text:center" style="padding-right:1em"><?php echo realpath($file_path); ?></span>
      </div>

<?php
 $i++;
        }
    }

}else{
    echo "the folder was empty !";
}
closedir($folder);

 ?>
</div>
</div>

<div id="div1"></div>
         <!--<br><br><br><br><br><br><br><br><br><br><br><br><br><br>
        <div id="div1"></div>-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootbox.js/5.4.0/bootbox.min.js"></script>
<!--<script src="move_photo.js"></script> -->
<script src="delete_photo.js"></script>

<script>
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
                    //$("#div1").html(data);
                    $("#img_" + id).parent().css({"display": "none"})
                  }
               });//ajax
            }
         });

      });
 });
</script>
</body>

</html>