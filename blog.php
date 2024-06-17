<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>بن المهندس</title>
</head>
<body  style="background-color: #fdf7f0;">
    <iframe src="header.html" frameborder="0" width="100%"></iframe>
    <div class="posts">
    <?php
    include 'connection.php';
        $sql = "SELECT * FROM blog";
        $result = mysqli_query($conn, $sql);
        if($result->num_rows > 0){
            while($row = mysqli_fetch_assoc($result)){
        ?>
        <div class="post">
            <img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($row['image']); ?>" alt="">
            <p> <?php echo $row['text']; ?></p>
        </div>
        <?php
            }
        }else{
            ?>
            <h1>لا يوجد منشورات حتي الان</h1>
            <?php
            };
            ?>
    </div>
    <?php include 'footer.php'; ?>
</body>
</html>