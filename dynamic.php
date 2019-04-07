<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>

<?php include "connection.php";


if($_POST['submit']){
    $file = $_FILES['file'];    //It is an array which contains informations                                obout the file.
    
   $file_name = $file['name'];
    $file_type = $file['type'];
    $filetmp = $file['tmp_name'];
    $file_error = $file['error'];
    
    $file_extension = explode('.', $file_name);
    $file_check = strtolower($file_extension[1]);
    
    $file_ext_mandat = array('jpg', 'png', 'jpeg');
    
    if(in_array($file_check, $file_ext_mandat)){
        $destination = 'file/'.$file_name;
        move_uploaded_file($filetmp, $destination);
        
    
$query = "INSERT INTO slider_image(image)";
$query .= "VALUES ('$destination')";

mysqli_query($connection, $query);
    }}
    if($_POST['show']){
        $q = "SELECT * FROM slider_image";
        $result = mysqli_query($connection, $q);        
        while($row = mysqli_fetch_array($result)){ ?>
        <img src="<?php echo $row['image']; ?>">
    	<?php } }?>


   <form action="" method="post" enctype="multipart/form-data">
       Username
       <input type="file" name="file"><br>
       <input type="submit" name="submit">
       <input type="submit" name="show" value="show">
   </form>
    
</body>
</html>