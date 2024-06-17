<?php
include 'connection.php';
if(isset($_POST['add'])){
$text = $_POST['text_area'];
$image_name = basename($_FILES['image']['name']) ;
        $image_type = pathinfo($image_name , PATHINFO_EXTENSION);
        $allowtype = array('jpeg','png','jpg','gif');
        if(in_array($image_type , $allowtype)){
            $image = $_FILES['image']['tmp_name'];
            $product_image = addslashes(file_get_contents($image));
            $sql = "INSERT INTO blog (text,image) VALUES ('$text','$product_image')";
            mysqli_query($conn, $sql);
            $message[] = 'تم النشر';
            header('location:admin_blog.php');
        }else{
            $message[] = 'يرجي اضافة صورة';
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
    <iframe src="header.html" width="100%" frameborder="0"></iframe>
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
    <form action="" class="new_post" style="margin-bottom:50px ;" enctype="multipart/form-data" method="post">
        <h2 style="text-align: center;">منشور جديد</h2>
        <textarea name="text_area" placeholder="....بم تفكر"></textarea>
        <label style="font-size:17px;" for="image">اضف صورة</label>
        <input type="file" name="image"  style="border: none; margin: 0 0 20px 0 ;">
        <button name="add" type="submit" >نشر</button>
    </form>
    <div class="posts">
    <?php
        $sql = "SELECT * FROM blog";
        $result = mysqli_query($conn, $sql);
        if($result->num_rows > 0){
            while($row = mysqli_fetch_assoc($result)){
        ?>
        <form action="" method="post">
        <div class="post">
        <input type="hidden" name="product_id" value=" <?php echo $row['id']; ?>">
            <img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($row['image']); ?>" alt="">
            <p> <?php echo $row['text']; ?></p>
            <button class="button" style="background-color: #feeaea;" name="delete" type="submit" >ازالةالمنشور</button>
        </div>
        </form>
        <?php
            }
        }else{
            ?>
            <h1>لا يوجد منشورات حتي الان</h1>
            <?php
            };
            ?>
            <?php
        if(isset($_POST['delete'])){
            $product_id = $_POST['product_id'];
            $sql = "DELETE  FROM blog WHERE id = '$product_id'";
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