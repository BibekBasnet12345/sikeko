<?php
$insert=false;
if(isset($_POST["name"]))//without "name" it wont execute
{
    // set connection variables
$server="localhost";
$username="root";
$password="";
// create a connection
$con=mysqli_connect($server,$username, $password);
// check for connection
if(!$con){
    die("connection to this database failed due to".mysqli_connect_error());
}
// echo "Connection successfully";
// collect post variables
$name = $_POST["name"];
$age = $_POST["age"];
$gender = $_POST["gender"];
$email = $_POST["email"];
$phone = $_POST["phone"];
$desc = $_POST["desc"];
$sql= "INSERT INTO `travel`.`travel` (`name` , `age`,`gender`,`email`,`phone`, `desc`, `date`) VALUES ( '$name', '$age', '$gender', '$email', '$phone', '$desc', current_timestamp());"; 
//   echo $sql;
// exexute the query
   if ($con->query($sql)==true)
   {
    //    flag for connection insertion
       $insert=true;    
    //    echo "successfully Inserted";
   }
   else{
       echo "ERROR:$sql<br> $con->error";
   }
    //connection close
   $con-> close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WelCome To Travel Form</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <img src="bgtravel.jpg" alt="background" class="bg">
    <div class="container">
        <h1>WelCome TO Travel Form</h1>
        <p>Enter Your Details And Submit Your Form To Confirm</p>
        <?php
        if($insert == true){
        echo "<p class='submitMsg'>Thanks For Submitting Your Form.We Are happy To See You In this Trip.</p>";
        }?>
        <form action="index.php" method="post">
            <input type="text" name="name" id="name" placeholder="Enter your name">
            <input type="text" name="age" id="age" placeholder="Enter your Age">
            <input type="text" name="gender" id="gender" placeholder="Gender">
            <input type="text" name="email" id="email" placeholder="Enter Your Email">
            <input type="text" name="phone" id="phone" placeholder="Enter Your PhoneNumber">
            <textarea name="desc" id="desc" cols="30" rows="10" placeholder="Enter any other information here"></textarea>
            <button class="btn">Submit</button>
           
        </form>
    </div>
    <script src="index.js"></script>
</body>
</html>