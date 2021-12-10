<!-- 
    Panashe Taruwinga
    09922023
    Registering a new User
 -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=proxim-nova">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">

  
    
    <!-- styling -->
    <style>
      #page-main {
    display: flex;
    flex-direction: column;
    align-items: left;
    margin-left: 30vw;
    margin-right: 5vw;
    padding-top: 1vw;
    line-height: 27.2px;
    align-content: center;
    width: 50%;
        border-color: unset;
    }
    #form{
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        padding-top: 2vw;
    }

    h2{
        align-items: center;
        color: #104832;
    }
    #form-area{
        width: 75%;
        padding-right: 5vw;
    }

    #form-and-tips{
        width: 70%;
    }

    .field-group {
        display: flex;
        flex-direction: row;
        justify-content: space-between;
        align-items: center;
        width: 90%;
        margin-bottom: 25px;
    }

    .field-group label{
        width: 20%;
        font-weight: 700;
    }

    .field-group input, select{
        width: 80%;
        height: 40px;
        border: 0.5px solid black;
        border-radius: 5px;
        padding-left: 25px;
    }

    #next{
        background: #104832;
        border: none;
        border-radius: 5px;
        width: 40%;
        color: white;
        height: 40px;
        margin-top: 25px;
        margin-left: 10vw;
    }

    button{
        font-weight: bold;
    }
	body{
        background-image:url("./assets/bg1.jpg");
        background-position: center; /* Center the image */
        background-repeat: no-repeat; /* Do not repeat the image */
        background-size: cover; /* Resize the background image to cover the entire container */
    
        }
        
    </style>

</head>
<body>
    
<!-- Creating a registration form
that takes Username, email, password
 -->
<div id="page-main">
    <div id="form"  align=center>
    <h2 class="bg-success" style="color:white;">Register Form </h2>
    <div id="form-area" align=center>
        <form onsubmit="return signupValidation(this)" action="addCustomer.php" id="form" method="post" >
            <div class="field-group">
                <label for="name" class="bg-light">Username</label>
                <input type="text" id="username" required="true" name="username" placeholder="Username">
            </div>

            <div class="field-group">
                <label for="email" class="bg-light">Email</label>
                <input type="text" id="email" name="email" required="true" placeholder="Emails">
            </div>


            <div class="field-group">
                <label for="password" class="bg-light">Password</label>
                <input type="password" id="password" required="true" name="password" placeholder="Password">
            </div>

            <div class="field-group">
                <label for="confirm_password" class="bg-light">Confirm Password</label>
                <input type="password" id="confirm_password" required="true" name="=confirm_password" placeholder="Confirm Password">
            </div>

            <button id="next" type="submit" name="btn" value="submit">Submit</button>

            <a href="login.php" style="color:white;">ALREADY HAVE AN ACCOUNT?</a>
        </form>
    </div>
</div>
</body>

<!-- validating the above credentials -->
<script type="text/javascript"  src="registerValidation.js"></script>
</html>