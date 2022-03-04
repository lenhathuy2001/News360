<?php

include "header.php";
include "leftside.php";
// define('__ROOT__', dirname(dirname(__FILE__))); 
// include "class/product_class.php";
// require_once(__ROOT__.'../admin/class/product_class.php');
?>
<?php
$product = new product();
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])){
	$insert_product = $product ->insert_product($_POST,$_FILES);
    // header('Location:brandlist.php');

}

?>
 <div class="admin-content-right">
            <div class="product-add-content">
                <?php
                if(isset($insert_product)){echo $insert_product; }
                ?>
                <form action="productadd.php" method="POST" enctype="multipart/form-data">
                    <label for="">Tiêu Đề bài viết<span style="color: red;">*</span></label> <br>
                    <input type="text" name="baiviet_tieude"> <br>
                    <label for="">Ngày bài viết<span style="color: red;">*</span></label> <br>
                    <input type="text" name="baiviet_ngay"> <br>
                    <label for="">Tác giả bài viết<span style="color: red;">*</span></label> <br>
                    <input type="text" name="baiviet_tacgia"> <br>
                    <label for="">Chọn danh mục bài viết<span style="color: red;">*</span></label> <br>
                    <select name="cartegory_id" id="">
                        <option value="#">--Chọn--</option>
                        <?php
                        $show_danhmuc = $product ->show_danhmuc();
                        if($show_danhmuc){while($result=$show_danhmuc->fetch_assoc()){
                        ?>
                        <option value="<?php echo $result['danhmuc_id'] ?>"><?php echo $result['danhmuc_ten'] ?></option>
                        <?php
                        }}
                        ?>
                    </select>
                    <label for="">Mô tả ngắn<span style="color: red;">*</span></label> <br>
                    <textarea name="baiviet_mota" cols="60" rows="5"> </textarea><br>       
                    <label for="">Nội dung bài viết<span style="color: red;">*</span></label> <br>
                    <textarea  id="ckeditor" name="baiviet_noidung"  cols="60" rows="10"> </textarea><br>   
                    <label for="">Ảnh đại diện<span style="color: red;">*</span></label> <br>
                    <input type="file" name="baiviet_anh"> <br>   
                    <button class="admin-btn" name="submit" type="submit">Gửi</button>  
                </form>
            </div>           
        </div>
    </section>
    <section>
    </section>
    <script src="js/script.js"></script>
    <script>
//     $(".ckeditor").each(function(){
//         CKEDITOR.replace( this.id, {
// 	filebrowserBrowseUrl: '/ckfinder/ckfinder.html',
// 	filebrowserUploadUrl: '/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files'
// } );
//     })
CKEDITOR.replace( 'ckeditor', {
	filebrowserBrowseUrl: 'ckfinder/ckfinder.html',
	filebrowserUploadUrl: 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files'
} );
    

    </script>
</body>
</html>  