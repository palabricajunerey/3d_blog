<?php
define('ENABLE_PAGE',true); //enabled pages
$signup = true;
include 'header.php';

if(isset($_SESSION['logged_in'])){
    header("location: blog.php");
}

//if signup is clicked
if(isset($_POST['signup'])){
    $fName = $_POST['f_name'];
    $lName = $_POST['l_name'];
    $email = $_POST['email'];
    $pass = $_POST['password'];
    $pass2 = $_POST['password2'];

    $check = $conn->prepare("SELECT * FROM users WHERE email = ?");
    $check->execute([$email]);
    //var_dump($check->rowCount());
    if($check->rowCount() != 0){
        $err_msg = "Email already registered";
    }elseif($pass != $pass2){
        $err_msg = "Password do not match!";
    }else{
        $hash_password = password_hash($pass, PASSWORD_DEFAULT);
        $reg = $conn->prepare("INSERT INTO users(first_name, last_name, email, password) VALUES(?, ?, ?, ?)");
        $reg->execute([
            $fName,
            $lName,
            $email,
            $hash_password
        ]);

        $msg = "User has been Registered!";
    }
}

?>

<!-- content start -->
<div class="container">
    <div class="row justify-content-center mt-4">
        <div class="col-6 shadow p-3">
            <form method="POST" action="signup.php">
                <?php 
                if(isset($err_msg)){
                    echo '
                            <div class="alert alert-warning alert-dismissible fade show mt-2" role="alert">
                            <strong>' . $err_msg . '</strong>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                          </div>
                            ';
                }elseif(isset($msg)){
                    echo '
                            <div class="alert alert-primary alert-dismissible fade show mt-2" role="alert">
                            <strong>' . $msg . '</strong>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                          </div>
                            ';
                }
                ?>
                <div class="row mb-3">
                    <label for="f_name" class="col-sm-4 col-form-label">First Name</label>
                    <div class="col-sm-8">
                        <input type="text" name="f_name" class="form-control" id="f_name">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="l_name" class="col-sm-4 col-form-label">Last Name</label>
                    <div class="col-sm-8">
                        <input type="text" name="l_name" class="form-control" id="l_name">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="email" class="col-sm-4 col-form-label">Email</label>
                    <div class="col-sm-8">
                        <input type="email" name="email" class="form-control" id="email">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="password" class="col-sm-4 col-form-label">Password</label>
                    <div class="col-sm-8">
                        <input type="password" name="password" class="form-control" id="password">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="confirm_password" class="col-sm-4 col-form-label">Confirm Password</label>
                    <div class="col-sm-8">
                        <input type="password" name="password2" class="form-control" id="confirm_password">
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-3">
                        <button type="submit" name="signup" class="btn btn-primary">Sign up</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <script>
    document.title = "Signup";
</script>
    <!-- content end -->
    </body>

    </html>