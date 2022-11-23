<?php 
define('ENABLE_PAGE',true); //enabled pages
$login = true;
include 'header.php'; 
?>


<!-- content start -->
<div class="container">
    <div class="row justify-content-center">
        <div class="col-5 shadow p-3">
            <form>
                <div class="row mb-3">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Email</label>
                    <div class="col-sm-10">
                        <input type="email" class="form-control" id="inputEmail3">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="inputPassword3" class="col-sm-2 col-form-label">Password</label>
                    <div class="col-sm-10">
                        <input type="password" class="form-control" id="inputPassword3">
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Log in</button>
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