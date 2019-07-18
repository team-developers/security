<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>registration form</title>

    <!-- Font Icon -->
    <link rel="stylesheet" href="fonts/material-icon/css/material-design-iconic-font.min.css">
    <link rel="stylesheet" href="vendor/nouislider/nouislider.min.css">

    <!-- Main css -->
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

    <div class="main">

        <div class="container">
        <div id="success"></div>   
            <div class="signup-content">
                <div class="signup-img">
                    <img src="images/form-img.jpg" alt="">
                    <div class="signup-img-content">
                        <h2>Join Us</h2>
                        <p>Get Ahead in your career!</p>
                    </div>
                </div>
                <div class="signup-form">
                    <form method="POST" class="register-form" id="register-form" enctype="multipart/form-data">
                        <div class="form-row">
                            <div class="form-group">
                                <div class="form-input">
                                    <label for="name" class="required">Full name</label>
                                    <input type="text" name="name" id="first_name" />
                                </div>
                                
                                
                            
                                <div class="form-input">
                                    <label for="qualification" class="required">Highest Qualification</label>
                                    <input type="text" name="qualification" id="company" />
                                </div>
                                <div class="form-input">
                                    <label for="email">Email (Optional)</label>
                                    <input type="text" name="email" id="email" />
                                </div>
                                <div class="form-input">
                                    <label for="phone_number" class="required">Phone number</label>
                                    <input type="text" name="phone" id="phone_number" />
                                </div>
                            </div>
                            <div class="form-group">
                                
                            
                                <div class="form-input">
                                    <label for="dob" class="required">Date of Birth (dd-mm-yyyy)</label>
                                    <input type="text" name="dob" id="chequeno" />
                                </div>
                                
                                <div class="form-input">
                                    <label for="city" class="required">city/Village/Town</label>
                                    <input type="text" name="city"/>
                                </div>
                                
                            </div>
                            <div class="form-group">
                                
                            
                                <div class="form-input">
                                    <label for="resume" class="required">Upload your Resume</label>
                                    <input type="file" name="resume" />
                                </div>
                                
                            </div>
                        </div>
                        
                        <div class="form-submit">
                            <input type="submit" value="Submit" class="submit" id="submit" name="submit" />
                            <input type="submit" value="Reset" class="submit" id="reset" name="reset" />
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
    
                        <?php include "connection.php";


                                if($_POST['submit']){

                                  $name = $_POST['name'];
                                  $qual = $_POST['qualification'];
                                  $city = $_POST['city'] ;
                                  $phone = $_POST['phone'];
                                  $email = $_POST['email'];

                                    $file = $_FILES['resume'];
                                    $file_name = $file['name'];
                                    $temp_name = $file['tmp_name'];
                                    $file_type = $file['type'];
                                    $file_error = $file['error'];

                                    $file_ext = explode('.', $file_name);
                                    $extension = strtolower($file_ext[1]);
                                    $mandat_ext = array('pdf', 'docx');

                                    if(in_array($extension, $mandat_ext)){

                                        $destination = 'Resumes/'.$file_name;
                                        move_uploaded_file($temp_name, $destination);
                                    }


                                    $resume = $_POST['resume'];

                                    $query = "INSERT INTO applicants(name, qualification, city, phone, email, resume)";
                                    $query .= "VALUES ('$name', '$qual', '$city', '$phone', '$email', '$destination')";

                                    if(mysqli_query($connection, $query)){



                                    }


                                }

                    ?>
    
    
    

    <!-- JS -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/nouislider/nouislider.min.js"></script>
    <script src="vendor/wnumb/wNumb.js"></script>
    <script src="vendor/jquery-validation/dist/jquery.validate.min.js"></script>
    <script src="vendor/jquery-validation/dist/additional-methods.min.js"></script>
    <script src="js/main.js"></script>
    
    
    
    
</body><!-- This templates was made by Colorlib (https://colorlib.com) -->
</html>








