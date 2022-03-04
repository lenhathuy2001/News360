<?php
// include "class/cartegory_class.php";
// define('__ROOT__', dirname(dirname(__FILE__))); 
// require_once(__ROOT__.'../admin/class/comment_class.php');
 ?>
<?php
$comment = new comment();
if (!isset($_GET['userA_id'])|| $_GET['userA_id']==NULL){
    echo "<script>window.location = 'memberlist.php'</script>";
	 }
else {$userA_id = $_GET['userA_id'];
    }
    $delete_member = $comment  -> delete_member($userA_id);
    header('Location:memberlist.php');
?>