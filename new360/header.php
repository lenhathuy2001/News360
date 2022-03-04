<?php
include "class/index_class.php";
Session::init();
$index = new index;
?>
<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST'){
    $user_name = $_POST['user_name'];
    $user_password = md5($_POST['user_password']);
    // var_dump($_POST);
	$check_user = $index ->check_user($user_name,$user_password);
}

?>
<?php
if(isset($_GET['user_id'])){
    Session::destroy();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <base href="https://localhost/new360/">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <script src="https://kit.fontawesome.com/54f0cb7e4a.js" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <title>News 360</title>
</head>
<body>
    <header>
       <div class="container menu-web">
        <div class="header-top row">
            <div class="header-top-left">
                <a href="index.html"><p> <span>N</span>ews360</p></a>
            </div>
            <div class="header-top-center">
                <input id="search-input" type="text" placeholder="Tìm kiếm">
                <i id="search-btn" class="fas fa-search"></i>
            </div>
            <div class="header-top-right">
                <?php
                $user_ten = Session::get('user_ten');
                $user_id = Session::get('user_id');
                if($user_ten == false){
                    echo ('<button id="login-btn">Đăng nhập</button>');
                }
                else {
                    echo ('<button> <a style="color:#333" href="?user_id='.$user_id.'">Đăng xuất</a></button>');
                }
                ?>
               
                <!-- <button id="login-btn">Đăng nhập</button> -->
            </div> 
                  
        </div>
        <div class="header-bottom row">
            <li><a href="index.html"><i class="fas fa-home"></i></a></li>
            <?php
            $show_danhmuc_index = $index ->show_danhmuc_index();

            if($show_danhmuc_index){while($result = $show_danhmuc_index -> fetch_assoc()) {
           
            ?>
            <li><a style="color:#58257B" href="<?php echo $result['danhmuc_id']?>-<?php $resultD = $index ->makeUrl($result['danhmuc_ten']); echo $resultD ?>.html"><?php echo $result['danhmuc_ten'] ?></a></li>
            <?php
                }}
            ?>
        </div>
       </div>
       <div class="login">
                <form action="" method="POST">
                    <span style="color:red;margin-bottom: 12px"><?php   if(isset($check_user)){echo $check_user;} ?></span>
                    <input name="user_name" type="text" placeholder="Tên đăng nhập">
                    <input name="user_password" type="password" placeholder="Mật khẩu" >
                    <button type="submit">Đăng nhập</button>
                    <div class="login-close">&#10007;</div>
                </form>
        </div>    
       <div class="container menu-phone">
           <div  class="menu-phone-content row">
                <i class="fas fa-bars" id="menu-bar"></i>
                <div class="menu-phone-logo">
                    <a href="index.html"><p> <span>N</span>ew360</p></a>
                </div>
                <i class="far fa-user" id="mobile-login-btn"></i>
           </div>
           <div class="menu-phone-content-items">
                <li><a href="index.html"><i class="fas fa-home"></i></a></li>
                <?php
            $show_danhmuc_index = $index ->show_danhmuc_index();

            if($show_danhmuc_index){while($result = $show_danhmuc_index -> fetch_assoc()) {
           
            ?>
            <li><a style="color:#58257B" href="<?php echo $result['danhmuc_id']?>-<?php $resultD = $index ->makeUrl($result['danhmuc_ten']); echo $resultD ?>.html"><?php echo $result['danhmuc_ten'] ?></a></li>
            <?php
                }}
            ?>
           </div>
           <div class="menu-phone-content-search">
               <input type="text" placeholder="Nội dung tìm kiếm">
           </div>
       </div>
    </header>
    <div class="container">
        <div id="search-result" class="conten-center-content row">

        </div>
    </div>
<script>
    $(document).ready(function(){
        $("#search-btn").click(function(){
            // alert($(this).val())
            var x = $("#search-input").val()
            if (x!="")
           {
            $.get ("ajax/index_ajax.php", {text:x}, function(data) {
                $("#search-result").html(data);
            })
           }

        })
    })
</script>