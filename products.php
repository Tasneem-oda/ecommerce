<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>بن المهندس</title>
</head>
<body style="background-color:#fdf7f0;">
    <iframe src="header.html" frameborder="0"width="100%" ></iframe>
    <div class="banner">
        <p>اجود حبات البن الارابيكا والروبيسكا</p>
    </div>
    <div class="products">
    <?php
        include 'connection.php';
        $sql = "SELECT * FROM products";
        $result = mysqli_query($conn, $sql);
        if($result->num_rows > 0){
            while($row = mysqli_fetch_assoc($result)){
        ?>
        <div class="product">
            <div class="img_container">
                <img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($row['image']); ?>" alt="">
            </div>
            <div class="details">
                <h2> <?php echo $row['name'] ?></h2>
                <p>السعر:<span style="color: #ff0000; font-weight:bold;"><?php echo $row['price'] ?></span> جنيه</p>
               <a href="" class="button" >اطلب الان</a>
            </div>
        </div>
        
        <?php
            }
        }else{
            ?>
            <h1>لا يوجد منتجات حتي الان</h1>
            <?php
            };
            ?>
    </div>
    <?php include 'footer.php'; ?>
</body>
</html>