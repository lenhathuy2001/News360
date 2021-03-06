<?php
 define('__ROOT__', dirname(dirname(__FILE__))); 
 require_once(__ROOT__.'../lib/database.php');
 require_once(__ROOT__.'../lib/session.php');
 require_once(__ROOT__.'../helper/format.php');
//  include_once '../helper/format.php';
//  include_once '../lib/database.php';
?>

<?php
 class index
 {

    private $db;
    private $fm;

    public function __construct()
    {
        $this ->db = new Database();
        $this ->fm = new Format();
    }
    public function show_product_index(){
        // $query = "SELECT * FROM tbl_baiviet ORDER BY baiviet_id DESC";
        $query = "SELECT tbl_baiviet.*, tbl_danhmuc.danhmuc_ten
        FROM tbl_baiviet INNER JOIN tbl_danhmuc ON tbl_baiviet.baiviet_danhmuc = tbl_danhmuc.danhmuc_id
        ORDER BY tbl_baiviet.baiviet_id DESC LIMIT 0,1  ";
        $result = $this -> db ->select($query);
        return $result;
    }
    public function show_danhmuc_index(){
        $query = "SELECT * FROM tbl_danhmuc ORDER BY danhmuc_id";
        // $query = "SELECT tbl_baiviet.*, tbl_danhmuc.danhmuc_ten
        // FROM tbl_baiviet INNER JOIN tbl_danhmuc ON tbl_baiviet.baiviet_danhmuc = tbl_danhmuc.danhmuc_id
        // ORDER BY tbl_danhmuc.danhmuc_id DESC LIMIT 0,1  ";
        $result = $this -> db ->select($query);
        return $result;
    }
    public function show_product_indexA(){
        // $query = "SELECT * FROM tbl_baiviet ORDER BY baiviet_id DESC";
        $query = "SELECT tbl_baiviet.*, tbl_danhmuc.danhmuc_ten
        FROM tbl_baiviet INNER JOIN tbl_danhmuc ON tbl_baiviet.baiviet_danhmuc = tbl_danhmuc.danhmuc_id
        ORDER BY tbl_baiviet.baiviet_id DESC LIMIT 1,3   ";
        $result = $this -> db ->select($query);
        return $result;
    }
    public function show_danhmuc_indexA($danhmuc_id){
        // $query = "SELECT * FROM tbl_baiviet ORDER BY baiviet_id DESC";
        $query = "SELECT tbl_baiviet.*, tbl_danhmuc.danhmuc_ten
        FROM tbl_baiviet INNER JOIN tbl_danhmuc ON tbl_baiviet.baiviet_danhmuc = tbl_danhmuc.danhmuc_id
        WHERE danhmuc_id = '$danhmuc_id'
        ORDER BY tbl_baiviet.baiviet_id DESC LIMIT 1,3   ";
        $result = $this -> db ->select($query);
        return $result;
    }
    public function show_product_indexB(){
        // $query = "SELECT * FROM tbl_baiviet ORDER BY baiviet_id DESC";
        $query = "SELECT tbl_baiviet.*, tbl_danhmuc.danhmuc_ten
        FROM tbl_baiviet INNER JOIN tbl_danhmuc ON tbl_baiviet.baiviet_danhmuc = tbl_danhmuc.danhmuc_id
        ORDER BY tbl_baiviet.baiviet_id DESC LIMIT 4,12   ";
        $result = $this -> db ->select($query);
        return $result;
    }
    public function show_danhmuc_indexB($danhmuc_id){
        // $query = "SELECT * FROM tbl_baiviet ORDER BY baiviet_id DESC";
        $query = "SELECT tbl_baiviet.*, tbl_danhmuc.danhmuc_ten
        FROM tbl_baiviet INNER JOIN tbl_danhmuc ON tbl_baiviet.baiviet_danhmuc = tbl_danhmuc.danhmuc_id
        WHERE danhmuc_id = '$danhmuc_id'
        ORDER BY tbl_baiviet.baiviet_id DESC LIMIT 4,12   ";
        $result = $this -> db ->select($query);
        return $result;
    }
    public function show_product_indexC($baiviet_id){
        // $query = "SELECT * FROM tbl_baiviet ORDER BY baiviet_id DESC";
        $query = "SELECT tbl_baiviet.*, tbl_danhmuc.danhmuc_ten
        FROM tbl_baiviet INNER JOIN tbl_danhmuc ON tbl_baiviet.baiviet_danhmuc = tbl_danhmuc.danhmuc_id
        WHERE baiviet_id = '$baiviet_id'";
        $result = $this -> db ->select($query);
        return $result;
    }
    public function show_danhmuc_indexC($danhmuc_id){
        // $query = "SELECT * FROM tbl_baiviet ORDER BY baiviet_id DESC";
        $query = "SELECT tbl_baiviet.*, tbl_danhmuc.danhmuc_ten
        FROM tbl_baiviet INNER JOIN tbl_danhmuc ON tbl_baiviet.baiviet_danhmuc = tbl_danhmuc.danhmuc_id
        WHERE danhmuc_id = '$danhmuc_id' ORDER BY tbl_baiviet.baiviet_id DESC LIMIT 0,1";
        $result = $this -> db ->select($query);
        return $result;
    }
    public function show_product_indexD($danhmuc_id,$baiviet_id){
        // $query = "SELECT * FROM tbl_baiviet ORDER BY baiviet_id DESC";
        $query = "SELECT tbl_baiviet.*, tbl_danhmuc.danhmuc_ten
        FROM tbl_baiviet INNER JOIN tbl_danhmuc ON tbl_baiviet.baiviet_danhmuc = tbl_danhmuc.danhmuc_id 
        WHERE danhmuc_id = '$danhmuc_id' && baiviet_id != '$baiviet_id'  
        ORDER BY tbl_baiviet.baiviet_id DESC LIMIT 0,10";
        $result = $this -> db ->select($query);
        return $result;
    }
    public function show_product(){
        // $query = "SELECT * FROM tbl_baiviet ORDER BY baiviet_id DESC";
        $query = "SELECT tbl_baiviet.*, tbl_danhmuc.danhmuc_ten
        FROM tbl_baiviet INNER JOIN tbl_danhmuc ON tbl_baiviet.baiviet_danhmuc = tbl_danhmuc.danhmuc_id
        ORDER BY tbl_danhmuc.danhmuc_id DESC  ";
        $result = $this -> db ->select($query);
        return $result;
    }
    public function show_danhmuc(){
        $query = "SELECT * FROM tbl_danhmuc ORDER BY danhmuc_id DESC";
        $result = $this -> db ->select($query);
        return $result;
    }
    // public function show_danhmucE($danhmuc_id){
    //     $query = "SELECT * FROM tbl_danhmuc WHERE danhmuc_id = '$danhmuc_id' ORDER BY danhmuc_id DESC";
    //     $result = $this -> db ->select($query);
    //     return $result;
    // }
    // public function show_subcartegory(){
    //     $query = "SELECT * FROM tbl_subcartegory ORDER BY subcartegory_id DESC";
    //     $result = $this -> db ->select($query);
    //     return $result;
    // }
    public function get_product($product_id){
        $query = "SELECT * FROM tbl_baiviet WHERE baiviet_id = '$product_id'";
        $result = $this -> db ->select($query);
        return $result;
    }
    // public function get_product_img($product_id){
    //     $query = "SELECT * FROM tbl_product_img WHERE product_id = '$product_id'";
    //     $result = $this -> db ->select($query);
    //     return $result;
    // }
    
        

    public function makeUrl($string){
        $string = trim($string);
        $string = str_replace(' ','-',$string);
        $string = strtolower($string);
        $string = preg_replace("/(??|??|???|???|??|??|???|???|???|???|???|??|???|???|???|???|???)/", "a", $string);
        $string = preg_replace("/(??|??|???|???|???|??|???|???|???|???|???)/", "e", $string);
        $string = preg_replace("/(??|??|???|???|??)/", "i", $string);
        $string = preg_replace("/(??|??|???|???|??|??|???|???|???|???|???|??|???|???|???|???|???)/", "o", $string);
        $string = preg_replace("/(??|??|???|???|??|??|???|???|???|???|???)/", "u", $string);
        $string = preg_replace("/(???|??|???|???|???)/", "y", $string);
        $string = preg_replace("/(??)/", "d", $string);
        $string = preg_replace("/(??|??|???|???|??|??|???|???|???|???|???|??|???|???|???|???|???)/", "A", $string);
        $string = preg_replace("/(??|??|???|???|???|??|???|???|???|???|???)/", "E", $string);
        $string = preg_replace("/(??|??|???|???|??)/", "I", $string);
        $string = preg_replace("/(??|??|???|???|??|??|???|???|???|???|???|??|???|???|???|???|???)/", "O", $string);
        $string = preg_replace("/(??|??|???|???|??|??|???|???|???|???|???)/", "U", $string);
        $string = preg_replace("/(???|??|???|???|???)/", "Y", $string);
        $string = preg_replace("/(??)/", "D", $string);
        return $string;
    }

    public function search_text($text){
        $query = "SELECT tbl_baiviet.*, tbl_danhmuc.danhmuc_ten
        FROM tbl_baiviet INNER JOIN tbl_danhmuc ON tbl_baiviet.baiviet_danhmuc = tbl_danhmuc.danhmuc_id
        WHERE baiviet_tieude REGEXP '$text' ORDER BY tbl_baiviet.baiviet_id";
        $result = $this -> db ->select($query);
        return $result;

    }

    public function check_user($user_name,$user_password){
        $query = "SELECT * FROM tbl_user  WHERE user_ten = '$user_name' AND user_password = '$user_password' LIMIT 1 ";
        $result = $this -> db ->select($query);
        if($result!=false) {
            $value = $result ->fetch_assoc();
            // Session::set('user_login',true);
            Session::set('user_ten',$value['user_ten']);
            Session::set('user_id',$value['userA_id']);
        }
        else {
            $alert = "T??n ????ng nh???p ho???c m???t kh???u kh??ng ????ng";
            return $alert;
        }
        // return $result;
    }
    public function insertcomment($baiviet_id,$content,$comment_user) {
        $query = "INSERT INTO tbl_comment (baiviet_id,comment_noidung,comment_user) VALUES ('$baiviet_id','$content','$comment_user')";
        $result = $this ->db ->insert($query);
        return $result;               
    }
    public function showcomment($baiviet_id){
        $query = "SELECT * FROM tbl_comment WHERE baiviet_id = '$baiviet_id' ORDER BY comment_id DESC";
        $result = $this -> db ->select($query);
        return $result;
    }

}
 
?>