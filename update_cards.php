<?php include "connection.php";

if(isset($_POST['submit'])){
    $error = " ";
        $content = $_POST['content'];
        $id = $_POST['id'];

        $file = $_FILES['file'];    //It is an array which contains informations obout the file.

           $file_name = $file['name'];
            $file_type = $file['type'];
            $filetmp = $file['tmp_name'];
            $file_error = $file['error'];

            $file_extension = explode('.', $file_name);

            $name = $file_extension[0];
            $name = $id;

            $file_check = strtolower($file_extension[1]);

            $file_ext_mandat = array('jpg', 'jpeg');


            if(in_array($file_check, $file_ext_mandat)){
                $destination = 'File/Cards/'.$name.'.'.$file_extension[1];
                move_uploaded_file($filetmp, $destination);


        $query = "UPDATE cards SET image = '$destination' WHERE id = '$id'";
        mysqli_query($connection, $query);

            }else{

                $error .= "<p>Only images with .jpg extension are allowed";
                }
    
       $q1 = "UPDATE cards SET content = '$content' WHERE id = $id";
      mysqli_query($connection, $q1);
    
    }
   
?>

<div><?php echo $error; ?></div>
<form action="" method="post" enctype="multipart/form-data">
   <label for="id">Select the id Whose information you want to change.</label>
    <select name="id" id="">
        <option value="1">1</option>
        <option value="2">2</option>
        <option value="3">3</option>
    </select><br><br>
    <input type="file" name="file"><br><br>
    
    <label for="content">Enter Paragraph you want update.</label><br>
    <textarea name="content" cols="30" rows="10"></textarea><br>
    
     <input type="submit" name="submit">
    
</form>