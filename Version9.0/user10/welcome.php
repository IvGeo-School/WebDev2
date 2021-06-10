<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="SHS WebDev Login">

    <title>Welcome</title>

    <!-- Bootstrap core JS -->
    <!-- These are needed to get the responsive menu to work -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <style type="text/css">
        body {
            font: 14px sans-serif;
            text-align: center;
        }

    </style>
</head>

<body>
<div class="menu">
        <nav class="navbar navbar-expand-md navbar-dark bg-dark">
            <a href="http://shakonet.isd720.com" class="navbar-brand">Sneaker Mania</a>
            <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarCollapse">
                <div class="navbar-nav">
                    <a onmouseover="style.color='red'" onmouseout="style.color='white'" href="main.html"
                        class="nav-item nav-link active">Home</a>
                    <a onmouseover="style.color='red'" onmouseout="style.color='white'" href="AboutUs.html"
                        class="nav-item nav-link">About Us</a>
                    <a onmouseover="style.color='red'" onmouseout="style.color='white'" href="list.html"
                        class="nav-item nav-link">Lists</a>
                    <a onmouseover="style.color='red'" onmouseout="style.color='white'" href="accessories.html"
                        class="nav-item nav-link">Accessories</a>
                    <a onmouseover="style.color='red'" onmouseout="style.color='white'" href="http://localhost:8080/WebDev2/Version8.0/user10/weather/ebayapi.php"
                        class="nav-item nav-link">Shop Here</a>
                     <a onmouseover="style.color='red'" onmouseout="style.color='white'" href="http://localhost:8080/WebDev2/Version9.0/user10/register.php"
                        class="nav-item nav-link">Make An Account!</a>
                    <a href="mailto:sample@gmail.com?Subject=Hello" class="nav-item nav-link disabled"
                        tabindex="-1"></a>
                    </a>
                </div>
                    <!----------------------------------^ Edit These Items in your Menu ^ ------------->
                </div>
                                <div class="navbar-nav ml-auto">
                    <a href="reset_password.php" class="nav-item nav-link active"><i class="fa fa-cog fa-lg" aria-hidden="true"></i><?php echo htmlspecialchars($_SESSION["username"]); ?></a>

                    <?php if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
                    echo "<a href='logout.php' class='nav-item nav-link btn-danger' onclick='return confirm(\"Are you sure?\");'> Logout </a>";
                    } else { echo "<a href='login.php' class='nav-item nav-link'> Login </a>";} ?>
                </div>
            </div>
        </nav>
    </div>
    <div class="page-header">
        <h1>Hi, <b><?php echo htmlspecialchars($_SESSION["username"]); ?></b>. Welcome to our site.</h1>
    </div>

</body>
 <!-- Footer -->
 <footer class="page-footer font-small special-color-dark pt-4">

<!-- Footer Elements -->
<div class="container">

    <!--Grid row-->
    <div class="row">

        <!--Grid column-->
        <div class="col-md-6 mb-4">

            <!-- Form -->
            <form class="form-inline">
                <input class="form-control form-control-sm mr-3 w-75" type="text"
                    placeholder="Search Here!" aria-label="Search">
            </form>
            <!-- Form -->

        </div>
</html>
