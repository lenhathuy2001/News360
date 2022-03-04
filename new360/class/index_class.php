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
        $string = preg_replace("/(à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ)/", "a", $string);
        $string = preg_replace("/(è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ)/", "e", $string);
        $string = preg_replace("/(ì|í|ị|ỉ|ĩ)/", "i", $string);
        $string = preg_replace("/(ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ)/", "o", $string);
        $string = preg_replace("/(ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ)/", "u", $string);
        $string = preg_replace("/(ỳ|ý|ỵ|ỷ|ỹ)/", "y", $string);
        $string = preg_replace("/(đ)/", "d", $string);
        $string = preg_replace("/(À|Á|Ạ|Ả|Ã|Â|Ầ|Ấ|Ậ|Ẩ|Ẫ|Ă|Ằ|Ắ|Ặ|Ẳ|Ẵ)/", "A", $string);
        $string = preg_replace("/(È|É|Ẹ|Ẻ|Ẽ|Ê|Ề|Ế|Ệ|Ể|Ễ)/", "E", $string);
        $string = preg_replace("/(Ì|Í|Ị|Ỉ|Ĩ)/", "I", $string);
        $string = preg_replace("/(Ò|Ó|Ọ|Ỏ|Õ|Ô|Ồ|Ố|Ộ|Ổ|Ỗ|Ơ|Ờ|Ớ|Ợ|Ở|Ỡ)/", "O", $string);
        $string = preg_replace("/(Ù|Ú|Ụ|Ủ|Ũ|Ư|Ừ|Ứ|Ự|Ử|Ữ)/", "U", $string);
        $string = preg_replace("/(Ỳ|Ý|Ỵ|Ỷ|Ỹ)/", "Y", $string);
        $string = preg_replace("/(Đ)/", "D", $string);
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
            $alert = "Tên đăng nhập hoặc mật khẩu không đúng";
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