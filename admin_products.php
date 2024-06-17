<?php
    include 'connection.php';
if(isset($_POST['add'])){
    $name =$_POST['name'];
    $price = $_POST['price'];
    if(!empty($_FILES['image']['name'])){
        $image_name = basename($_FILES['image']['name']) ;
        $image_type = pathinfo($image_name , PATHINFO_EXTENSION);
        $allowtype = array('jpeg','png','jpg','gif');
        if(in_array($image_type , $allowtype)){
            $image = $_FILES['image']['tmp_name'];
            $product_image = addslashes(file_get_contents($image));
            $sql = "INSERT INTO products (name , price,image) VALUES ('$name','$price','$product_image')";
            mysqli_query($conn, $sql);
            $message[] = 'تم اضافة المنتج بنجاح';
            header('location:admin_products.php');
        }else{
            $message[] = 'يرجي اضافة صورة';
        }
    }else{
        $message[] = "يرجي اضافة صورة للمنج" ;
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>بن المهندس</title>
</head>
<body style="background-color:#fdf7f0;">
    <iframe src="header.html" frameborder="0" width="100%"></iframe>
    <?php
    if(isset($message)){
        foreach($message as $message){
            echo '
            <div class="alert">
                <p>'. $message.'</p>
                <p class="x_sign"></p>
            </div>
            ';
        }
    }
    ?>
   
    <form action="" class="add_product" method="post" enctype="multipart/form-data">
        <h1 style="text-align: center;">اضف منتج</h1>
        <input type="text" name="name" placeholder="اسم المنتج" required>
        <input type="text" name="price" placeholder="السعر" required>
        <label style="font-size:17px;" for="image">اضف صورة</label>
        <input type="file" name="image" id="image" style="border: none;" required>
        <button name="add" type="submit">اضف المنتج</button>
    </form>
    <div class="products">
    <?php
        
        $sql = "SELECT * FROM products";
        $result = mysqli_query($conn, $sql);
        if($result->num_rows > 0){
            while($row = mysqli_fetch_assoc($result)){
        ?>
        <form action="" method="post">
        <div class="product">
            <input type="hidden" name="product_id" value=" <?php echo $row['id']; ?>">
            <div class="img_container">
                <img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($row['image']); ?>" alt="">
            </div>
            <div class="details">
                <h2> <?php echo $row['name'] ?></h2>
                <p>السعر:<span style="color: #ff0000; font-weight:bold;"><?php echo $row['price'] ?></span> جنيه</p>
               <button class="button" style="background-color: #feeaea;" name="delete" type="submit" >ازالة المنتج</button>
            </div>
        </div>
        </form>
        
        <?php
            }
        }else{
            ?>
            <h1>لا يوجد منتجات حتي الان</h1>
            <?php
            };
            ?>
             <?php
        if(isset($_POST['delete'])){
            $product_id = $_POST['product_id'];
            $sql = "DELETE  FROM products WHERE id = '$product_id'";
            mysqli_query($conn , $sql);

        }
        ?>
    </div>
    <script>
        let x_sign = document.querySelector('.x_sign');
        let parent = x_sign.closest('div');
        x_sign.addEventListener('click',function(){
            parent.remove();
        })
    </script>
</body>
</html>