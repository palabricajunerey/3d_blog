<?php
define('ENABLE_PAGE',true); //enabled pages
$signup = true;
include 'header.php';
?>


<!-- content start -->
<div class="container">
    <div class="row justify-content-center mt-4">
        <div class="col-5 shadow p-3">
            <form>
                <div class="row mb-3">
                    <label for="inputEmail3" class="col-sm-4 col-form-label">First Name</label>
                    <div class="col-sm-8">
                        <input type="email" class="form-control" id="inputEmail3">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="inputEmail3" class="col-sm-4 col-form-label">Last Name</label>
                    <div class="col-sm-8">
                        <input type="email" class="form-control" id="inputEmail3">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="inputEmail3" class="col-sm-4 col-form-label">Email</label>
                    <div class="col-sm-8">
                        <input type="email" class="form-control" id="inputEmail3">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="inputPassword3" class="col-sm-4 col-form-label">Password</label>
                    <div class="col-sm-8">
                        <input type="password" class="form-control" id="inputPassword3">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="inputPassword3" class="col-sm-4 col-form-label">Confirm Password</label>
                    <div class="col-sm-8">
                        <input type="password" class="form-control" id="inputPassword3">
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-3">
                        <button type="submit" class="btn btn-primary">Sign up</button>
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