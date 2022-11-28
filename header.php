<?php 
session_start();

if(!defined('ENABLE_PAGE')){
    header("location: index.php");
}

include 'config.php';
// if(!$pwede){
//     header("location: index.php");
// }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog</title>
</head>
<!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">

<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>

<body>
    <!-- NavBAr start -->
    <nav class="navbar navbar-expand-lg bg-light">
        <div class="container">
            <a class="navbar-brand" href="#">LOGO HERE</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <?php
                        if (isset($index)) {
                            echo '<a class="nav-link active" aria-current="page" href="index.php"><b>Home</b></a>';
                        } else {
                            echo '<a class="nav-link" aria-current="page" href="index.php">Home</a>';
                        }
                        ?>
                    </li>
                    <li class="nav-item">
                        <?php 
                        if(isset($blog)){
                            echo '<a class="nav-link active" href="blog.php"><b>Blogs</b></a>';
                        }else{
                            echo '<a class="nav-link" href="blog.php">Blogs</a>';
                        }
                        ?>
                    </li>
                    <li class="nav-item">
                        <?php 
                        if(isset($about)){
                            echo '<a class="nav-link active" href="about.php"><b>About</b></a>';
                        }else{
                            echo '<a class="nav-link" href="about.php">About</a>';
                        }
                        ?>
                    </li>
                    <li class="nav-item">
                        <?php 
                            if(isset($_SESSION['logged_in'])){
                                echo '<a class="nav-link" href="logout.php">Logout</a>';
                            }else{ ?>
                                <?php 
                        if(isset($login)){
                            echo '<a class="nav-link active" href="login.php"><b>Login</b></a>';
                        }else{
                            echo '<a class="nav-link" href="login.php">Login</a>';
                        }
                        ?>
                    </li>
                    <li class="nav-item">
                        <?php 
                        if(isset($signup)){
                            echo '<a class="nav-link active" href="signup.php"><b>Signup</b></a>';
                        }else{
                            echo '<a class="nav-link" href="signup.php">Signup</a>';
                        }
                        ?>
                        <?php  } ?>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- NavBAr end -->