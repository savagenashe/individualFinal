<!-- 
    Panashe Taruwinga
    09922023
    adding a new customer to the Database
 -->
<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "id18099858_signup";

//testing database connnection
$conn = new mysqli($servername,$username,$password,$dbname);

if ($conn->connect_error){

    die($conn->connect_error);
}


 $username = $_POST["username"];
 $email = $_POST["email"];
 $password = password_hash($_POST["password"], PASSWORD_DEFAULT);


// sending feedback to user upon succesful or failure to register
if(isset($_POST['btn'])){

    $sql = "INSERT INTO tbl_member (username, email, password) values ('$username', '$email', '$password')";

    if ($conn->query($sql)=== TRUE){ // if query happens
        echo "inserted $search succefully";

        echo '<script>alert("REGRISTRATION SUCCESSFUL")</script>';
        echo '<script>window.location = "register.php"</script>';

        header("Location: login.php");
    }
    else{
        echo "insertion not successful!";
    
    }
   
}

?>