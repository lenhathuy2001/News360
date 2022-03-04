<?php
include "../class/index_class.php";

?>
<?php
$index = new index;
$text = $_GET['text']
?>

<?php
$search_text = $index ->search_text($text);
if($search_text) {while($result = $search_text ->fetch_assoc()){


?>

<div id="conten-center-content-item" class="conten-center-content-item">
    <img src="admin/uploads/<?php echo $result['baiviet_anh'] ?>" alt="">
    <h1><a href="baiviet/<?php echo $result['baiviet_id'] ?>-<?php $resultZ = $index -> makeUrl($result['baiviet_tieude']); echo $resultZ?>"><?php echo $result['baiviet_tieude'] ?></a></h1>
    <a style="color:#58257B" href="<?php echo $result['baiviet_danhmuc']?>-<?php $resultD = $index ->makeUrl($result['danhmuc_ten']); echo $resultD ?>.html"><?php echo $result['danhmuc_ten'] ?></a>
</div>
<?php
}}
?>