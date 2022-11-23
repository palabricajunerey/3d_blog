<?php 
try{
    if(!defined('ENABLE_PAGE')){
        header("location: index.php");
    }

    $host = "localhost";
    $dbname = "3d_blog";
    $user = "root";
    $password = "";

    $conn = new PDO ("mysql:host=$host;dbname=$dbname", $user, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

    // if($conn == true){
    //     echo "Database connected";
    // }else{
    //     echo "Something went wrong!";
    // }
} catch (PDOException $err){
    echo $err->getMessage();
}

?>