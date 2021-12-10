<!-- 
    PANASHE TARUWINGA
    09922023

    HOME PAGE TO DISPLAY ITEMS IN STORE TO THE USER

    source: Youtube- Weblesson
 -->

<?php
session_start();
// session_start();

if (isset($_SESSION["username"])) {
    $username = $_SESSION["username"];
    
} else {
   header("Location: login.php");
}

$connect = mysqli_connect("localhost","root","","id18099858_signup");


// adding item to cart
if(isset($_POST["add_to_cart"]))
{
    //checking if the shopping cart variable has data
    // and adding items to shopping cart
    if(isset($_SESSION["cart"]))
    {
        // collecting data from the arrays
        $item_array_id = array_column($_SESSION["cart"], "item_id");
        if(!in_array($_GET["id"], $item_array_id))
        {
            //$count = count($_SESSION["cart"]);
            $item_array = array(
                'item_id'           =>$_GET["id"],
                'item_name'         =>$_POST["hidden_name"],
                'item_price'        =>$_POST["hidden_price"], 
                'item_quantity'     =>$_POST["quantity"]                 
            );
            array_push($_SESSION['cart'], $item_array);
            //$_SESSION["shopping_cart"][$count] = $item_array;  
        }
        else
        {
            // displaying information to user
            echo '<script>alert("Item Already Added")</script>';
            echo '<script>window.location="home.php"</script>';
        }
    }
    else
    {
        $item_array = array(
            'item_id'           => $_GET["id"],
            'item_name'         => $_POST["hidden_name"], 
            'item_price'        => $_POST["hidden_price"], 
            'item_quantity'     => $_POST["quantity"],  
        );
        $_SESSION["cart"][0] = $item_array;
    }
}

// DELETING AN ITEM
if(isset($_GET["action"]))
{
    if($_GET["action"] == "delete" )
    {
        foreach($_SESSION["cart"] as $keys => $values) 
        {
            if($values["item_id"] == $_GET["id"])
            {
                //destroying the item
                unset($_SESSION["cart"][$keys]);
                echo '<script>alert("ITEM REMOVED")</script>';
                echo '<script>window.location = "home.php"</script>';
            }
        }
    }
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="stylesheet" href="Home.css" media="screen"> -->
    <link rel="stylesheet" href="cartStyle.css">
    <title>Cart</title>
 
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script> 
    
    <link rel="stylesheet" href="nicepage.css" media="screen">
    <link rel="stylesheet" href="Home.css" media="screen">
    <link href="assets/css/phppot-style.css" type="text/css"
  	rel="stylesheet" />
    <link rel="stylesheet" href="styles.css">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic,900italic,900' rel='stylesheet' type='text/css'>
    <link href="assets/css/user-registration.css" type="text/css"
        rel="stylesheet" />
        <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <script class="u-script" type="text/javascript" src="jquery.js" defer=""></script>
    <script class="u-script" type="text/javascript" src="nicepage.js" defer=""></script>
    <meta name="generator" content="Nicepage 4.0.3, nicepage.com">
    <link id="u-theme-google-font" rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i|Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i">
    <link id="u-page-google-font" rel="stylesheet" href="https://fonts.googleapis.com/css?family=Playfair+Display:400,400i,500,500i,600,600i,700,700i,800,800i,900,900i|Raleway:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i">
        
 
</head>
<body style="background-color:#90EE90;">
    <a name="top"></a>

    <!-- Navigation Bar -->
    <!-- Image and text -->
    <nav class="navbar navbar-light bg-light" style="background-color:green">
    <a class="navbar-brand" href="#">
        <img src="./images/83-removebg-preview.png" width="120" height="120" class="d-inline-block align-top" alt="">
    </a>
    </nav>
    <nav style="margin-left:100px; color:black;" >
        <div>
        <ul class="navbarnav">
        <li>
            <a class="navlink" style="margin-left:20px;" href="home.php">Home <span class="sr-only">(current)</span></a>
        </li>
        <li >
            <a class="navlink" style="margin-left:20px;" href="About.html">About</a>
        </li>
        <li>
            <a class="navlink" style="margin-left:20px;" href="Contact.html">Contact</a>
        </li>

        <li class="navlink" style="margin-left:20px;">
                <a href="#cart">
                    <ion-icon name ="basket"></ion-icon>Cart<span></span>
                </a>
            </li>
        <!-- <button href="login.php" style="background-color:red; color:white;margin-left:1200px" value="logout">LOGOUT</button> -->
        <h2><a href="login.php" style="color:white; background-color:red;margin-left:1200px"><b>LOGOUT</b></a></h2>
        </ul>
    </div>
    </nav>


    <!-- Displaying all the products in the database -->
    <br />
    <div class = "container" style="width:1200px;">
        <h1 class= " text-primary" align="center"> BROWSE ITEMS </h1><br />

        <h3 class="text-info" align="center" style="color:black;"> FRUITS & PERISHABLES </h3><br />

        <?php
            $query = "SELECT * FROM produce ORDER BY id ASC";
            $result = mysqli_query($connect, $query);

            if(mysqli_num_rows($result) > 0)
            {
                while ($row = mysqli_fetch_array($result))
                {
            ?>

            <!-- Displaying the browsing page to the User
                taking the items from the database
            -->
            <div class="col-md-4">
                <form method="post" action="home.php?action=add&id=<?php echo $row["id"]; ?>">
                    <div style="border:1px solid #333; background-color: #00FF40; border-radius: 5px; padding: 16px;" align="center">
                    <img src="./images/<?php echo $row["name"];?>.png" width="240" height="240" alt="IMAGE"/><br />
                        <h2 class="text-info"><?php echo $row["name"]; ?></h2>
                        <h4 class="text"><?php echo $row["description"]; ?></h4>


                        <h2 class="text-danger">$ <?php echo $row["price"] ?></h2>
                        <input type="text" name="quantity" class = "form-control" value="1" />
                        <input type="hidden" name="hidden_name" value="<?php echo $row["name"]; ?>" />
                        <input type="hidden" name="hidden_price" value="<?php echo $row["price"]; ?>" />

                        <input type = "submit" name="add_to_cart" style="margin: top 5px;" class="btn btn-success" value="Add to Cart" />
                    </div>
                </form>
                <br /><br /><br>
            </div>
            <?php            
                }
            }
            ?>

            
            <br /><br /><br><br /><br /><br>
            <h3 class="text-info" align="center" style="color:black;"> ANIMALS </h3><br />
            <?php
                $query = "SELECT * FROM livestock ORDER BY id ASC";
                $result = mysqli_query($connect, $query);

                if(mysqli_num_rows($result) > 0)
                {
                    while ($row = mysqli_fetch_array($result))
                    {
            ?>
            <!-- Displaying the browsing page to the User
                        taking the items from the database
            -->
            <div class="col-md-4">
                <form method="post" action="home.php?action=add&id=<?php echo $row["id"]; ?>">
                    <div style="border:1px solid #333; background-color: #00FF40; border-radius: 5px; padding: 16px;" align="center">
                        <img src="./images/<?php echo $row["name"];?>.png" width="240" height="240" alt="IMAGE"/><br />
                        <h2 class="text-info"><?php echo $row["name"]; ?></h2>
                        <h4 class="text"><?php echo $row["description"]; ?></h4>


                        <h4 class="text-danger">$ <?php echo $row["price"] ?></h4>
                        <input type="text" name="quantity" class = "form-control" value="1" />
                        <input type="hidden" name="hidden_name" value="<?php echo $row["name"]; ?>" />
                        <input type="hidden" name="hidden_price" value="<?php echo $row["price"]; ?>" />

                        <input type = "submit" name="add_to_cart" style="margin: top 5px;" class="btn btn-success" value="Add to Cart" />
                    </div>
                </form>
                <br /><br /><br>
            </div>

            <?php            
                }
            }
            ?>

            <!-- Displaying the cart to the User -->
            <div style="clear:both"></div>
            <br><br><br>


            <!-- creating the table -->
            <h2 id = "cart" class="text-primary" align="center"> ORDER DETAILS </h2>
            <div class="table-responsive" style="color:black;">
                <table class="table table-bordered" style="background-color:#32CD32;">
                    <tr>
                        <th width="40%">ITEM NAME</th>
                        <th width="10%">QUANTITY</th>
                        <th width="20%">PRICE</th>
                        <th width="15%">TOTAL</th>
                        <th width="5%">ACTION</th>
                    </tr>
                    <?php
                        if(!empty($_SESSION["cart"]))
                        {
                            $total=0;
                            foreach($_SESSION["cart"] as $keys => $values)
                            {

                    ?>
                    <tr>
                        <td><?php echo $values["item_name"]; ?></td>
                        <td><?php echo $values["item_quantity"]; ?></td>
                        <td><?php echo $values["item_price"]; ?></td>

                        <!-- showing numbers in 2 decimal places -->
                        <td><?php echo number_format($values["item_quantity"] * $values["item_price"], 2); ?></td>

                        <!-- adding delete button -->
                        <td><a href="home.php?action=delete&id=<?php echo $values["item_id"]; ?>"><span class = "text-danger"> REMOVE </span></a> </td>
                    </tr>

                    <?php
                        // calculating total price
                        $total = $total + ($values["item_quantity"] * $values["item_price"]);
                        }
                    ?>
                    <!-- showing total price -->
                    <tr>
                        <td colspan="3" style="align: right;">TOTAL</td>
                        <td style="align: right;">$ <?php echo number_format($total, 2); ?></td>
                        <td></td>
                    </tr>
                    <?php
                    }
                    ?>
                </table>
            </div>    
        </div>


        <div class="mt-4" style="margin-left:1300px">
          <!-- TOP -->
          <a href="#top" type="button" class="btn btn-floating btn-danger btn-lg"><i class="fab fa-facebook-f">BACK TO TOP</i></a>
          <!-- Dribbble -->

        </div>
      </div>
<footer class="u-align-center-md u-align-center-sm u-align-center-xs u-clearfix u-footer u-image u-shading u-footer" id="sec-7bee" data-image-width="1280" data-image-height="854"><div class="u-clearfix u-sheet u-sheet-1">
        <a href="home.php" class="u-border-2 u-border-white u-image u-image-default u-logo u-image-1" data-image-width="569" data-image-height="438">
          <img src="images/83-removebg-preview1.png" class="u-logo-image u-logo-image-1">
        </a>
        <p class="u-align-center-lg u-align-center-md u-align-center-xl u-text u-text-white u-text-1">~ THE PRIDE OF THE NATION ~</p>
        <div class="u-align-left u-social-icons u-spacing-10 u-social-icons-1">
          <a class="u-social-url" title="facebook" target="_blank" href=""><span class="u-icon u-social-facebook u-social-icon u-icon-1"><svg class="u-svg-link" preserveAspectRatio="xMidYMin slice" viewBox="0 0 112 112" style=""><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#svg-537d"></use></svg><svg class="u-svg-content" viewBox="0 0 112 112" x="0" y="0" id="svg-537d"><circle fill="currentColor" cx="56.1" cy="56.1" r="55"></circle><path fill="#FFFFFF" d="M73.5,31.6h-9.1c-1.4,0-3.6,0.8-3.6,3.9v8.5h12.6L72,58.3H60.8v40.8H43.9V58.3h-8V43.9h8v-9.2
            c0-6.7,3.1-17,17-17h12.5v13.9H73.5z"></path></svg></span>
          </a>
          <a class="u-social-url" title="twitter" target="_blank" href=""><span class="u-icon u-social-icon u-social-twitter u-icon-2"><svg class="u-svg-link" preserveAspectRatio="xMidYMin slice" viewBox="0 0 112 112" style=""><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#svg-8715"></use></svg><svg class="u-svg-content" viewBox="0 0 112 112" x="0" y="0" id="svg-8715"><circle fill="currentColor" class="st0" cx="56.1" cy="56.1" r="55"></circle><path fill="#FFFFFF" d="M83.8,47.3c0,0.6,0,1.2,0,1.7c0,17.7-13.5,38.2-38.2,38.2C38,87.2,31,85,25,81.2c1,0.1,2.1,0.2,3.2,0.2
            c6.3,0,12.1-2.1,16.7-5.7c-5.9-0.1-10.8-4-12.5-9.3c0.8,0.2,1.7,0.2,2.5,0.2c1.2,0,2.4-0.2,3.5-0.5c-6.1-1.2-10.8-6.7-10.8-13.1
            c0-0.1,0-0.1,0-0.2c1.8,1,3.9,1.6,6.1,1.7c-3.6-2.4-6-6.5-6-11.2c0-2.5,0.7-4.8,1.8-6.7c6.6,8.1,16.5,13.5,27.6,14
            c-0.2-1-0.3-2-0.3-3.1c0-7.4,6-13.4,13.4-13.4c3.9,0,7.3,1.6,9.8,4.2c3.1-0.6,5.9-1.7,8.5-3.3c-1,3.1-3.1,5.8-5.9,7.4
            c2.7-0.3,5.3-1,7.7-2.1C88.7,43,86.4,45.4,83.8,47.3z"></path></svg></span>
          </a>
          <a class="u-social-url" title="instagram" target="_blank" href=""><span class="u-icon u-social-icon u-social-instagram u-icon-3"><svg class="u-svg-link" preserveAspectRatio="xMidYMin slice" viewBox="0 0 112 112" style=""><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#svg-2b91"></use></svg><svg class="u-svg-content" viewBox="0 0 112 112" x="0" y="0" id="svg-2b91"><circle fill="currentColor" cx="56.1" cy="56.1" r="55"></circle><path fill="#FFFFFF" d="M55.9,38.2c-9.9,0-17.9,8-17.9,17.9C38,66,46,74,55.9,74c9.9,0,17.9-8,17.9-17.9C73.8,46.2,65.8,38.2,55.9,38.2
            z M55.9,66.4c-5.7,0-10.3-4.6-10.3-10.3c-0.1-5.7,4.6-10.3,10.3-10.3c5.7,0,10.3,4.6,10.3,10.3C66.2,61.8,61.6,66.4,55.9,66.4z"></path><path fill="#FFFFFF" d="M74.3,33.5c-2.3,0-4.2,1.9-4.2,4.2s1.9,4.2,4.2,4.2s4.2-1.9,4.2-4.2S76.6,33.5,74.3,33.5z"></path><path fill="#FFFFFF" d="M73.1,21.3H38.6c-9.7,0-17.5,7.9-17.5,17.5v34.5c0,9.7,7.9,17.6,17.5,17.6h34.5c9.7,0,17.5-7.9,17.5-17.5V38.8
            C90.6,29.1,82.7,21.3,73.1,21.3z M83,73.3c0,5.5-4.5,9.9-9.9,9.9H38.6c-5.5,0-9.9-4.5-9.9-9.9V38.8c0-5.5,4.5-9.9,9.9-9.9h34.5
            c5.5,0,9.9,4.5,9.9,9.9V73.3z"></path></svg></span>
          </a>
          <a class="u-social-url" title="linkedin" target="_blank" href=""><span class="u-icon u-social-icon u-social-linkedin u-icon-4"><svg class="u-svg-link" preserveAspectRatio="xMidYMin slice" viewBox="0 0 112 112" style=""><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#svg-0f0b"></use></svg><svg class="u-svg-content" viewBox="0 0 112 112" x="0" y="0" id="svg-0f0b"><circle fill="currentColor" cx="56.1" cy="56.1" r="55"></circle><path fill="#FFFFFF" d="M41.3,83.7H27.9V43.4h13.4V83.7z M34.6,37.9L34.6,37.9c-4.6,0-7.5-3.1-7.5-7c0-4,3-7,7.6-7s7.4,3,7.5,7
            C42.2,34.8,39.2,37.9,34.6,37.9z M89.6,83.7H76.2V62.2c0-5.4-1.9-9.1-6.8-9.1c-3.7,0-5.9,2.5-6.9,4.9c-0.4,0.9-0.4,2.1-0.4,3.3v22.5
            H48.7c0,0,0.2-36.5,0-40.3h13.4v5.7c1.8-2.7,5-6.7,12.1-6.7c8.8,0,15.4,5.8,15.4,18.1V83.7z"></path></svg></span>
          </a>
        </div>
      </div></footer>

    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
  
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <script src= "main.js"></script>
</body>
</html>