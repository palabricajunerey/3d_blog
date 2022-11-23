<?php
define('ENABLE_PAGE', true); //enabled pages
$blog = true;
include 'header.php';


//if the post button is clicked
if (isset($_POST['post'])) {
    $title = $_POST['title'];
    $content = $_POST['content'];

    //insert to DB or table
    $insert = $conn->prepare("INSERT INTO blog (post_title, post_content) VALUES (?, ?)");
    $insert->execute(array(
        //binding to our table
        $title,
        $content
    ));
    echo '
    <script>
        alert("Data Inserted!");
    </script>
    
    ';
}

//delete a data from blog table
if(isset($_GET['del'])){
    $id = $_GET['id'];

    $delete = $conn->prepare("DELETE FROM blog WHERE post_id = ?");
    $delete->execute([
        $id
    ]);

    echo '
    <script>
        alert("Data Deleted!");
        location.href = "blog.php";
    </script>
    
    ';
}

?>

<!-- content start -->
<div class="container">
    <div class="row">
        <div class="col-3 shadow mt-4">
            <form method="POST" action="blog.php">
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
                    $rows = $conn->query("SELECT * FROM blog");
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
                            <td><?= $counter++;?></td>
                            <td><?= $value['post_title']; ?></td>
                            <td><?= $value['post_content'];?></td>
                            <td><a href="blog.php?del&id=<?= $value['post_id'];?>">✖</a></td>
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