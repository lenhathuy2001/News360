<?php
include 'header.php'
?>
    <section class="content-top">
        <div class="container">
            <div class="content-top-content row">
                <?php
                $show_product_index=$index->show_product_index();
                if(isset($show_product_index)){$result = $show_product_index->fetch_assoc();}
                ?>
                <div class="content-top-left">
                    <img src="admin/uploads/<?php echo $result['baiviet_anh'] ?>" alt="">
                    <h1><a href="baiviet/<?php echo $result['baiviet_id'] ?>-<?php $resultZ = $index -> makeUrl($result['baiviet_tieude']); echo $resultZ?>"><?php echo $result['baiviet_tieude'] ?></a></h1>
                    <a style="color:#58257B"  href="<?php echo $result['baiviet_danhmuc']?>-<?php $resultD = $index ->makeUrl($result['danhmuc_ten']); echo $resultD ?>.html"><?php echo $result['danhmuc_ten'] ?></a>
                </div>
                <div class="content-top-right">
                <?php
                $show_product_indexA = $index -> show_product_indexA();
                if($show_product_indexA){while($resultA = $show_product_indexA->fetch_assoc()){              
                ?>
                    <div class="content-top-right-item row">
                        <div class="content-top-right-item-left">
                            <h1><a href="baiviet/<?php echo $resultA['baiviet_id'] ?>-<?php $resultZ = $index -> makeUrl($resultA['baiviet_tieude']); echo $resultZ?>"><?php echo $resultA['baiviet_tieude'] ?></a></h1>
                            <a style="color:#58257B"  href="<?php echo $result['baiviet_danhmuc']?>-<?php $resultD = $index ->makeUrl($result['danhmuc_ten']); echo $resultD ?>.html"><?php echo $resultA['danhmuc_ten'] ?></a>
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
                $show_product_indexB = $index -> show_product_indexB();
                if($show_product_indexB){while($resultB = $show_product_indexB->fetch_assoc()){              
                ?>
                <div class="conten-center-content-item">
                <img src="admin/uploads/<?php echo $resultB['baiviet_anh'] ?>" alt="">
                <h1><a href="baiviet/<?php echo $resultB['baiviet_id'] ?>-<?php $resultZ = $index -> makeUrl($resultB['baiviet_tieude']); echo $resultZ?>"><?php echo $resultB['baiviet_tieude'] ?></a></h1>
                <a style="color:#58257B" href="<?php echo $result['baiviet_danhmuc']?>-<?php $resultD = $index ->makeUrl($result['danhmuc_ten']); echo $resultD ?>.html"><?php echo $resultB['danhmuc_ten'] ?></a>
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