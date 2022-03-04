<?php
include 'header.php';
$index = new index;
?>
<?php
if (isset($_GET['danhmuc_id'])){
    $danhmuc_id = $_GET['danhmuc_id'];}
?>  
    <section class="content-top">
        <div class="container">
            <div class="content-top-content row">
                <?php
                $show_danhmuc_indexC = $index -> show_danhmuc_indexC($danhmuc_id);
                if($show_danhmuc_indexC){while($resultC = $show_danhmuc_indexC->fetch_assoc()){              
                ?>
                <div class="content-top-left">
                   <img src="admin/uploads/<?php echo $resultC['baiviet_anh'] ?>" alt="">
                    <h1><a href="baiviet/<?php echo $resultC['baiviet_id'] ?>-<?php $resultZ = $index -> makeUrl($resultC['baiviet_tieude']); echo $resultZ?>"><?php echo $resultC['baiviet_tieude'] ?></a></h1>
                    
                </div>
                <?php
                     }}
                ?>     
                <div class="content-top-right">
                <?php
                $show_danhmuc_indexA = $index -> show_danhmuc_indexA($danhmuc_id);
                if($show_danhmuc_indexA){while($resultA = $show_danhmuc_indexA->fetch_assoc()){              
                ?>
                    <div class="content-top-right-item row">
                        <div class="content-top-right-item-left">
                        <h1><a href="baiviet/<?php echo $resultA['baiviet_id'] ?>-<?php $resultZ = $index -> makeUrl($resultA['baiviet_tieude']); echo $resultZ?>"><?php echo $resultA['baiviet_tieude'] ?></a></h1>
                        </div>
                        <div class="content-top-right-item-right">
                        <img src="admin/uploads/<?php echo $resultA['baiviet_anh'] ?>" alt="">
                        </div>                   
                    </div>    
                    <?php
                     }}
                ?>                             
                </div>
            </div>
        </div>
    </section>
    <section class="conten-center">
        <div class="container">
            <div class="conten-center-content row">
            <?php
                $show_danhmuc_indexB = $index -> show_danhmuc_indexB($danhmuc_id);
                if($show_danhmuc_indexB){while($resultB = $show_danhmuc_indexB->fetch_assoc()){              
                ?>
                <div class="conten-center-content-item">
                <img src="admin/uploads/<?php echo $resultB['baiviet_anh'] ?>" alt="">
                <h1><a href="baiviet/<?php echo $resultB['baiviet_id'] ?>-<?php $resultZ = $index -> makeUrl($resultB['baiviet_tieude']); echo $resultZ?>"><?php echo $resultB['baiviet_tieude'] ?></a></h1>
                </div>
                <?php
                     }}
                ?>      
            </div>
        </div>
    </section>
<?php
include 'footer.php'
?>