<?php include 'config.php'; ?>

<!DOCTYPE html>
<html>
<head>
    <title>JobConnect</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">
<div class="container-fluid bg-white shadow-sm p-3 d-flex justify-content-between">
    <h4>💼 JobConnect</h4>
    <button class="btn btn-primary rounded-pill">Create Post</button>
</div>

<div class="container mt-4">
    <div class="card p-3 mb-4">
        <form method="POST">
            <input type="text" name="name" class="form-control mb-2" placeholder="Your Name" required>
            <input type="text" name="role" class="form-control mb-2" placeholder="Your Role" required>
            <textarea name="content" class="form-control mb-2" placeholder="Share an update..." required></textarea>
            <button type="submit" name="post" class="btn btn-primary">Post</button>
        </form>
    </div>

    <?php
    if(isset($_POST['post'])){
        $name = $_POST['name'];
        $role = $_POST['role'];
        $content = $_POST['content'];

        mysqli_query($conn, "INSERT INTO posts (name, role, content) VALUES ('$name','$role','$content')");
    }
    ?>
    <?php
    $result = mysqli_query($conn, "SELECT * FROM posts ORDER BY id DESC");

    while($row = mysqli_fetch_assoc($result)){
    ?>
    <div class="card mb-3 p-3">

        <div class="d-flex align-items-center mb-2">
            <div class="bg-primary text-white rounded-circle d-flex justify-content-center align-items-center me-2" style="width:40px;height:40px;">
                <?php echo strtoupper($row['name'][0]); ?>
            </div>
            <div>
                <strong><?php echo $row['name']; ?></strong><br>
                <small class="text-muted"><?php echo $row['role']; ?> • <?php echo $row['created_at']; ?></small>
            </div>
        </div>

        <p><?php echo $row['content']; ?></p>

        <div class="d-flex justify-content-around text-muted">
            <span>👍 Like</span>
            <span>💬 Comment</span>
            <span>🔗 Share</span>
        </div>

    </div>
    <?php } ?>

</div>

</body>
</html>
