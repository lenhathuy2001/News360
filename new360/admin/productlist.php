<?php
include "header.php";
include "leftside.php";
// include "class/product_class.php";
include_once "../helper/format.php";
// define('__ROOT__', dirname(dirname(__FILE__))); 
// // include "class/product_class.php";
// require_once(__ROOT__.'../admin/class/product_class.php');
?>
<?php
$product = new product();
$fm = new Format();

?>
        <div class="admin-content-right">
            <div class="table-content">
                <table>
                    <tr>
                        <th>Stt</th>
                        <th>ID</th>
                        <th>Tiêu đề</th>
                        <th>Ngày</th>
                        <th>Tác giả</th>
                        <th>Danh mục</th>
                        <th>Mô tả</th>   
                        <th>Nội dung</th> 
                        <th>Ảnh</th>                  
                        <th>Tùy chỉnh</th>
                    </tr>
                  <?php
                  $show_product = $product ->show_product();
                  if($show_product){$i=0; while($result = $show_product ->fetch_assoc()){$i++;

                 
                  ?>
                    <tr>
                        <td> <?php echo $i ?></td>
                        <td> <?php echo $result['baiviet_id'] ?></td>
                        <td> <?php echo $fm -> textShorten($result['baiviet_tieude'],$limit = 30) ;?></td>
                        <td> <?php echo $result['baiviet_ngay'] ?></td>
                        <td> <?php echo $result['baiviet_tacgia'] ?></td>
                        <td> <?php echo $result['danhmuc_ten'] ?></td>
                        <td> <?php echo $fm -> textShorten($result['baiviet_mota'],$limit = 30) ; ?></td>
                        <td> <?php echo $fm -> textShorten($result['baiviet_noidung'],$limit = 0) ; ?></td>
                        <td> <img style="width: 100px; height: 50px" src="uploads/<?php echo $result['baiviet_anh'] ?>" alt=""></td>                   
                        <td><a href="productedit.php?product_id=<?php echo $result['baiviet_id'] ?>">Sửa</a>|
                        <a href="productdelete.php?product_id=<?php echo $result['baiviet_id'] ?>">Xóa</a></td>
                    </tr>
                    <?php
                     }}
                  ?>
                </table>
               </div>        
        </div>
    </section>
    <section>
    </section>
    <script src="js/script.js"></script>
</body>
</html>  