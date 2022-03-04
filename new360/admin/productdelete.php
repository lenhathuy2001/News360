<?php
include "header.php";
include "leftside.php";
// include "class/product_class.php";
// define('__ROOT__', dirname(dirname(__FILE__))); 
// include "class/product_class.php";
// require_once(__ROOT__.'../admin/class/product_class.php');
 ?>
<?php
$product = new product();
if (!isset($_GET['product_id'])|| $_GET['product_id']==NULL){
    echo "<script>window.location = 'productlist.php'</script>";
	 }
else {$product_id = $_GET['product_id'];
    }
    $delete_product = $product  -> delete_product($product_id);
    header('Location:productlist.php');
?>