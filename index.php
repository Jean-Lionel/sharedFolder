<?php
if(isset($_FILES['image'])){
   $errors= array();
   $file_name = $_FILES['image']['name'];
   $file_size =$_FILES['image']['size'];
   $file_tmp =$_FILES['image']['tmp_name'];
   $file_type=$_FILES['image']['type'];
   
      // $extensions= array("jpeg","jpg","png", "pdf", "docx");
   
      // if(in_array($file_ext,$extensions)=== false){
      //    $errors[]="extension not allowed, please choose a JPEG or PNG file.";
      // }
   
   if($file_size > 100097152000){
      $errors[]='File size must be small than 100097152000 kb';
   }

   if (!file_exists('uploads')) {
     mkdir('uploads', 0777, true);
  }
  
  if(empty($errors)==true){
   move_uploaded_file($file_tmp,"uploads/".$file_name);
   echo "UPLUOD SUCCES ". "<br> <br> <br>";
   echo "NOM DU FICHIER " . $file_name . "<br>";
   echo "TYPE DU FICHIER " . $file_type . "<br>";
   echo "TAILLE DU FICHIER " . $file_size . " KB <br>";

}else{
   print_r($errors);
}
}
?>
<html>
<body>
   
   <form action="" method="POST" enctype="multipart/form-data">
      <input type="file" name="image" />
      <input type="submit"/>
   </form>
   
</body>
</html>