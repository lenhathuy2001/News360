<?php
include "header.php";
include "leftside.php";
// include "class/cartegory_class.php";
// define('__ROOT__', dirname(dirname(__FILE__))); 
// require_once(__ROOT__.'../admin/class/comment_class.php');
?>
<?php
$comment = new comment;
if ($_SERVER['REQUEST_METHOD'] === 'POST'){
    $user_ten = $_POST['user_ten'];
    $user_password = md5($_POST['user_password']);
	$insert_member = $comment ->insert_member($user_ten,$user_password);

}
?>
        <div class="admin-content-right">
            <div class="cartegory-add-content">
                <form action="" method="POST" enctype="multipart/form-data">
                    <label for="">Tên thành viên<span style="color: red;">*</span></label> <br>
                    <input type="text" name="user_ten"> <br>   <br> 
                    <label for="">Mật khẩu<span style="color: red;">*</span></label> <br>
                    <input type="text" name="user_password">
                    <button class="admin-btn" type="submit">Gửi</button>             
                </form>
            </div>           
        </div>
    </section>
    <section>
    </section>
    <script src="js/script.js"></script>
</body>
</html>  