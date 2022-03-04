<?php
include "../class/index_class.php";

?>
<?php
$index = new index;
$baiviet_id = $_GET['baiviet_id'];
$content = $_GET['content'];
$comment_user = $_GET['comment_user'];
$insert_comment = $index -> insertcomment($baiviet_id,$content,$comment_user)
?>

<?php
$show_comment = $index ->showcomment($baiviet_id);
if($show_comment){while($result=$show_comment->fetch_assoc()){

?>

<li><span><i class="fas fa-user"></i><?php echo $result['comment_user'] ?></span><p><?php echo $result['comment_noidung'] ?></p></li>

<?php
}}
?>