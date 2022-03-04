<?php
if(isset($_GET['admin_id'])){
    Session::destroyAdmin();
}
?>

<section class="admin-content row space-between">
        <div class="admin-content-left">
        <div class="header-top-left">
            <a href=""><p> <span>N</span>ews360</p></a>
        </div>
            <ul>
                <li><a  href="#"> <img style="width:20px" src="icon/hi.png" alt="">Chào:  <span style="color:blueviolet; font-size:22px"><?php echo Session::get('admin_name') ?></span><span style="color: red; font-size:20px">&#10084;</span></a>
                <li><a href="#"> <img style="width:20px" src="icon/comments.png" alt="">Bình Luận</a>
                    <ul>
                        <li><a href="commentlist.php">Danh sách</a></li>                    
                    </ul>
                </li>
                <li><a href="#"><img style="width:20px" src="icon/membership.png" alt="">Thành Viên</a>
                    <ul>
                        <li><a href="memberlist.php">Danh sách</a></li>
                        <li><a href="memberadd.php">Thêm</a></li>
                    </ul>
                </li>
                <li><a href="#"><img style="width:20px" src="icon/options.png" alt="">Danh Mục</a>
                    <ul>
                        <li><a href="cartegorylist.php">Danh sách</a></li>
                        <li><a href="cartegoryadd.php">Thêm</a></li>
                    </ul>
                </li>
                <li><a href="#"><img style="width:20px" src="icon/article.png" alt="">Bài Viết</a>
                    <ul>
                        <li><a href="productlist.php">Danh sách</a></li>
                        <li><a href="productadd.php">Thêm</a></li>
                    </ul>
                </li>
                <li><a href="?admin_id=<?php echo Session::get('admin_id') ?>"> <img style="width:20px" src="icon/logout.png" alt="">Đăng Xuất</a>
                    
                </li>
            </ul>
        </div>