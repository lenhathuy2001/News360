<?php
include 'header.php';
$index = new index;
?>
<?php
if (!isset($_GET['baiviet_id'])|| $_GET['baiviet_id']==NULL){
    echo "<script>window.location = 'index.html</script>";
	 }
else {$baiviet_id = $_GET['baiviet_id'];
    }
    $show_product_indexC = $index -> show_product_indexC($baiviet_id);
    if($show_product_indexC ){$resultC = $show_product_indexC->fetch_assoc();$danhmuc_id=$resultC['baiviet_danhmuc']; }
    
?>  

   <section class="baiviet">
       <div class="container">
           <div class="baiviet-content row">
               <div class="baiviet-content-left">
                    <h1><?php echo $resultC['baiviet_tieude'] ?></h1> <br>
                     <span style="color: #58257B;"> <?php echo $resultC['danhmuc_ten'] ?> | <?php echo $resultC['baiviet_ngay'] ?>| <?php echo $resultC['baiviet_tacgia'] ?></span> <br> <br>
                    <p style="font-weight: bold; ttext-align: justify;"><?php echo $resultC['baiviet_mota'] ?></p><br>
                    <div class="noidung_baiviet">
                    <?php echo $resultC['baiviet_noidung'] ?>
                    </div>
                    <br>
                    <div class="comment">
                        <div class="comment-text">
                            <?php
                            if(Session::get('user_ten'))
                            {
                            ?>
                            <p>Chào <span style="color:#58257B;"><?php echo Session::get('user_ten') ?></span><span style="color: red; font-size:20px">&#10084;</span></p>
                            <input type="checkbox">
                            <textarea id="comment-content" name="" placeholder="Ý kiến của bạn"></textarea> <br>
                            <input id="baiviet_id" type="hidden" value="<?php echo $resultC['baiviet_id'] ?>">
                            <input id="comment_user" type="hidden" value="<?php echo Session::get('user_ten') ?>">
                            
                            <button id="comment-btn">Gửi Bình luận</button>
                           <?php
                          } else {
                           ?>
                            <p style="color:#58257B">Đăng nhập để bình luận<span style="color:red">*</span>:</p>
                            <textarea name="" placeholder="Ý kiến của bạn"></textarea> <br>
                            <?php
                           }
                            ?>
                        </div>
                    </div>
                    <div class="comment-ideal">
                        <div class="comment-ideal-title">
                        <?php 
                         $show_comment = $index ->showcomment($baiviet_id);
                         if($show_comment){$i = 0;while($result=$show_comment->fetch_assoc()){
                             $i++;
                             
                         }}
                        ?>
                            <p style="color:#58257B">Ý kiến (<span style="color:#58257B"><?php if(isset($i)) {echo $i;} else {echo "&#9759;";}; ?></span>):</p>
                        </div>
                        <div id="comment-ideal" class="comment-ideal-content">
                        <?php
                        $show_comment = $index ->showcomment($baiviet_id);
                        if($show_comment){while($result=$show_comment->fetch_assoc()){
                       
                        ?>

                        <li><span><i class="fas fa-user"></i><?php echo $result['comment_user'] ?></span><p><?php echo $result['comment_noidung'] ?></p></li>

                        <?php
                      
                        }}
                        ?>
                        </div>
                      
                    </div>
               </div>
               <div class="baiviet-content-right">
               <?php
                $show_product_indexD = $index -> show_product_indexD($danhmuc_id,$baiviet_id);
                if($show_product_indexD){while($resultD = $show_product_indexD->fetch_assoc()){              
                ?>
                    <div class="baiviet-content-right-item row">
                        <div class="baiviet-content-right-item-right">
                        <img src="admin/uploads/<?php echo $resultD['baiviet_anh'] ?>" alt="">
                        </div>   
                        <div class="baiviet-content-right-item-left">
                            <h1><a href="baiviet/<?php echo $resultD['baiviet_id'] ?>-<?php $resultZ = $index -> makeUrl($resultD['baiviet_tieude']); echo $resultZ?>"><?php echo $resultD['baiviet_tieude'] ?></a></h1>
                        </div>          
                    </div> 
                    <?php
                     }}
                    ?>  
                </div>
           </div>
       </div>
       
   </section>
   <script>
    $(document).ready(function(){
        $("#comment-btn").click(function(){
            // alert($(this).val())
            var x = $("#baiviet_id").val()
            var y = $("#comment-content").val()
            var z = $("#comment_user").val()
        //    alert(z)

            if (y!="" )
           {
            $.get ("ajax/comment_ajax.php", {baiviet_id:x,content:y,comment_user:z}, function(data) {
                $("#comment-ideal").html(data);
            })
           }

        })
    })
</script>
   
<?php
include 'footer.php'
?>