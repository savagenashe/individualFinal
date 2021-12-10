<?php

$server = "localhost";
$username = "root";
$password = "";
$dbname = "id18099858_signup";


//establishing connection
$connect = mysqli_connect("localhost","root","","id18099858_signup");

//when submit button is clicked
if(isset($_POST['submit'])){

    //checking if the text fields are not empty
    if(!empty($_POST['name']) && !empty($_POST['email']) && !empty($_POST['message']))
    {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $message = $_POST['message'];


        $query = "insert into feedback(name, email, feedback) values('$name','$email','$message')";

        $run = mysqli_query($connect,$query) or die('Error: ' . mysqli_error($connect));

        if($run){
            echo '<script>alert("FORM SUCCESSFULLY SUBMITTED")</script>';
            echo '<script>window.location = "Contact.html"</script>';
        }else{

            echo " Form not submitted!";
        }
    }else{
        echo "all fields must be filled!";
    }
}

?>