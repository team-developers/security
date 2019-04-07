<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>

<?php $error = ""; ?>


<?php include "connection.php";

    $id = $_POST['id'];
    

if($_POST['update']){
    $file = $_FILES['file'];    //It is an array which contains informations                                obout the file.
    
   $file_name = $file['name'];
    $file_type = $file['type'];
    $filetmp = $file['tmp_name'];
    $file_error = $file['error'];
    
    $file_extension = explode('.', $file_name);
   
    $name = $file_extension[0];
    $name = $id;
    
    $file_check = strtolower($file_extension[1]);
    
    $file_ext_mandat = array('jpg');
    
    
    if($id==1 || $id==2 || $id==3){
    
    if(in_array($file_check, $file_ext_mandat)){
        $destination = 'file/'.$name.'.'.$file_extension[1];
        move_uploaded_file($filetmp, $destination);
        
    
$query = "UPDATE slider_image SET image = '$destination' WHERE id = '$id'";
mysqli_query($connection, $query);
    
    }else{
        
        $error .= "<p>Only images with .jpg extension are allowed";
        }
    }else{
        $error .= "<p>Please Enter valid Image id(1, 2 or 3)";
        }
    }?>


  <div><?php echo $error; ?></div>
   <form action="" method="post" enctype="multipart/form-data">
       
       
       <label for="id"><br>Select the image id you want to change-</label>
       <input type="number" name="id">
       <input type="file" name="file"><br>
       <input type="submit" name="update" value="Update">
   </form>
    
</body>
</html>