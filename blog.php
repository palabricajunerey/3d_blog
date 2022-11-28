<?php
define('ENABLE_PAGE', true); //enabled pages
$blog = true;
include 'header.php';

if(!isset($_SESSION['logged_in'])){
    $err_msg = "You have to logged-in first!";
    header("location: login.php?err_msg=$err_msg");
}


//if the post button is clicked
if (isset($_POST['post'])) {
    $user_id = $_POST['u_id'];
    $title = $_POST['title'];
    $content = $_POST['content'];

    //insert to DB table
    $insert = $conn->prepare("INSERT INTO blog (post_title, post_content, user_id) VALUES (?, ?, ?)");
    $insert->execute(array(
        //binding to our table
        $title,
        $content,
        $user_id
    ));

    $msg = "Post created!";
}

//delete a data from blog table
if (isset($_GET['del'])) {
    $id = $_GET['id'];

    $delete = $conn->prepare("DELETE FROM blog WHERE post_id = ?");
    $delete->execute([
        $id
    ]);

    $err_msg = "Post Deleted!";
}

//for updating you data
if(isset($_POST['update'])){
    $id = $_POST['post_id'];
    $title = $_POST['title'];
    $content = $_POST['content'];

    $update = $conn->prepare("UPDATE blog set post_title = ?, post_content = ? WHERE post_id = ?");
    $update->execute([
        //binding
        $title,
        $content,
        $id
    ]);

    $msg = "Post Updated!";
}

?>

<!-- content start -->
<div class="container">
    <div class="row">
        <div class="col-3 shadow mt-4">
            <?php
            if (isset($_GET['update'])) { ?>
                <form method="POST" action="blog.php">
                    <?php 
                        $id = $_GET['id'];

                        $data = $conn->prepare("SELECT * FROM blog WHERE post_id = ?");
                        $data->execute([$id]);
                        
                        foreach($data as $value){ ?>

                        <input type="hidden" name="post_id" value="<?= $value['post_id'] ?>">                      
                    <div class="mb-3">
                        <label for="title" class="form-label">Edit Post Title</label>
                        <input name="title" class="form-control" id="title" placeholder="Required title" value="<?= $value['post_title'] ?>">
                    </div>
                    <div class="mb-3">
                        <label for="content" class="form-label">Edit Content</label>
                        <textarea name="content" class="form-control" id="content" placeholder="Required Content"><?= $value['post_content'] ?></textarea>
                    </div>
                    <div class="mb-3">
                        <a href="blog.php"><button class="btn btn-secondary">Cancel</button></a>
                        <button class="btn btn-primary" name="update">Update Post</button>
                    </div>
                    <?php  } ?>
                </form>
         <?php  } else { ?>
                <form method="POST" action="blog.php">
                    <div class="mt-4 mb-3">
                        <?php
                        if (isset($msg)) {
                            echo '
                            <div class="alert alert-primary alert-dismissible fade show" role="alert">
                            <strong>' . $msg . '</strong>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                          </div>
                            ';
                        } elseif (isset($err_msg)) {
                            echo '
                            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                            <strong>' . $err_msg . '</strong>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                          </div>
                            ';
                        }
                        ?>
                    </div>
                    <input type="hidden" name="u_id" value="<?= $_SESSION['u_id'] ?>">
                    <div class="mb-3">
                        <label for="title" class="form-label">Post Title</label>
                        <input name="title" class="form-control" id="title" placeholder="Required title" required>
                    </div>
                    <div class="mb-3">
                        <label for="content" class="form-label">Content</label>
                        <textarea name="content" class="form-control" id="content" placeholder="Required Content" required></textarea>
                    </div>
                    <div class="mb-3">
                        <button class="btn btn-primary" name="post">Post</button>
                    </div>
                </form>
            <?php   }   ?>
        </div>
        <!--2nd col -->
        <div class="col m-4">
            <table class="table">
                <tr>
                    <thead>
                        <th>#</th>
                        <th>Title</th>
                        <th>Content</th>
                        <th>Action</th>
                    </thead>
                </tr>
                <tr>
                    <?php
                    //fetching data to DB table blog
                    $counter = 1;
                    $id = $_SESSION['u_id'];
                    $rows = $conn->prepare("SELECT * FROM blog WHERE user_id = ?");
                    $rows->execute([$id]);
                    foreach ($rows as $value) { ?>

                        <!-- // echo $value['post_title'] . " " . $value['post_content'];
                    
                    // echo'
                    // <tbody>
                    //     <td>'. $value['post_id'] .'</td>
                    //     <td>' . $value['post_title'] .'</td>
                    //     <td>' . $value['post_content'] . '</td>
                    // </tbody>
                    // '; -->
                        <tbody>
                            <td>
                                <?= $counter++; ?>
                            </td>
                            <td>
                                <?= $value['post_title']; ?>
                            </td>
                            <td>
                                <?= $value['post_content']; ?>
                            </td>
                            <td>
                                <a href="blog.php?update&id=<?= $value['post_id']; ?>" class="text-decoration-none">✏</a> |
                                <a href="blog.php?del&id=<?= $value['post_id']; ?>" class="text-decoration-none">✖</a>
                            </td>
                        </tbody>
                    <?php } ?>
                </tr>
            </table>
        </div>
    </div>
</div>

<script>
    document.title = "Blog";
</script>
<!-- content end -->
</body>

</html>