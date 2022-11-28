<?php 
define('ENABLE_PAGE',true); //enabled pages
$login = true;
include 'header.php';

if(isset($_SESSION['logged_in'])){
    header("location: blog.php");
}

if(isset($_POST['login'])){
    $email = $_POST['email'];
    $password = $_POST['password'];

    $check = $conn->prepare("SELECT * FROM users WHERE email = ?");
    $check->execute([$email]);

    foreach($check as $value){
        if($value['email'] == $email && password_verify($password, $value['password'])){
            $_SESSION['logged_in'] = true;
            $_SESSION['u_id'] = $value['user_id'];

            header("location: blog.php");
        }else{
            $err_msg = "Email or Password do not match!";
        }
    }
}
?>

<!-- content start -->
<div class="container">
    <div class="row justify-content-center">
        <div class="col-6 shadow p-3">
            <form method="POST" action="login.php">
                <?php 
                    if(isset($err_msg)){
                        echo '
                                <div class="alert alert-warning alert-dismissible fade show mt-2" role="alert">
                                <strong>' . $err_msg . '</strong>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                              </div>
                                ';
                    }elseif(isset($_GET['err_msg'])){
                        echo '
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        <strong>' . $_GET['err_msg'] . '</strong> 
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
             ';
                    }
                ?>
                <div class="row mb-3">
                    <label for="email" class="col-sm-2 col-form-label">Email</label>
                    <div class="col-sm-10">
                        <input type="email" name="email" class="form-control" id="email">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="password" class="col-sm-2 col-form-label">Password</label>
                    <div class="col-sm-10">
                        <input type="password" name="password" class="form-control" id="password">
                    </div>
                </div>
                <button name="login" class="btn btn-primary">Log in</button>
            </form>
        </div>
    </div>
</div>
<script>
    document.title = "Login";
</script>
<!-- content end -->
</body>

</html>