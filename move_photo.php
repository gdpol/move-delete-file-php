<?php
function copy_photo($src,$dst){
   $src_file = @file_get_contents($src);
   //$contentx =@file_get_contents($file1);
   $dst_fold = fopen($dst, "w");
   fwrite($dst_fold, $src_file);
   fclose($dst_fold);
   /*if ($src_file === FALSE) {
      $status=false;
   }else //$status=true;
   if ($status=true){
      echo "file is copied";
   }*/
}

        $getfile = $_POST['path'];
        //$file = basename($getfile);
        $extension = pathinfo($getfile, PATHINFO_EXTENSION);

        echo "Id: $getfile <br/>";
        //echo "$file<br/>";

        $filename = "photo_".date("dmy_His").".$extension";
        $dst_file = "../../photos/$filename";
        echo "$dst_file<br/>";
        echo copy_photo($getfile, $dst_file);
        unlink($getfile);

?>
