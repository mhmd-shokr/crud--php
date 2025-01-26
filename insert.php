<?php
include("dbcon.php")
?>

<?php
if($_SERVER["REQUEST_METHOD"]=="POST")
{
  
    $Fname = $_POST['fname'];
    $Lname = $_POST['lname'];
    $Age    = $_POST['age'];

   if($Fname == "" || empty($Fname) ){

       header ('location: index.php? message = you need to fill the first name');

   }else{

    $query= "INSERT INTO `students`(`first_name`,`last_name`, `age`) values('$Fname','$Lname','$Age')" ;
   
    $result= mysqli_query($connection,$query);

    if(!$result){

        die("query failed".mysqli_error());
    }      
     else{

    header("location:index.php? insert_msg = inserted successfully");

      }

   }     
}


?>