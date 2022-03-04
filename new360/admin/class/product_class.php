<?php
// include "../lib/database.php";
// include_once "../helper/format.php"
?>

<?php
 class product
 {

    private $db;
    private $fm;

    public function __construct()
    {
        $this ->db = new Database();
        $this ->fm = new Format();
    }
    public function insert_product($data,$file){
              $baiviet_ngay = mysqli_real_escape_string($this ->db ->link,$data['baiviet_ngay']);
              $baiviet_tieude = mysqli_real_escape_string($this ->db ->link,$data['baiviet_tieude']);
              $baiviet_tacgia = mysqli_real_escape_string($this ->db ->link,$data['baiviet_tacgia']);
              $category_id = mysqli_real_escape_string($this ->db ->link,$data['cartegory_id']);
              $baiviet_mota = mysqli_real_escape_string($this ->db ->link,$data['baiviet_mota']);
              $baiviet_noidung = mysqli_real_escape_string($this ->db ->link,$data['baiviet_noidung']);
             // kiểm tra hình ảnh và lấy hình ảnh cho và Foder uploads
              $permited = array('jpg','jpeg','png','gif');
              $file_name = $_FILES['baiviet_anh']['name'];
              $file_size = $_FILES['baiviet_anh']['size'];
              $file_temp = $_FILES['baiviet_anh']['tmp_name'];
              $div = explode('.',$file_name);
              $file_ext = strtolower(end($div));
              $unique_image = substr(md5(time()),0,10).'.'.$file_ext;
              $upload_image = "uploads/".$unique_image;
              move_uploaded_file( $file_temp,$upload_image);
              $query = "INSERT INTO tbl_baiviet (baiviet_ngay,baiviet_tieude,baiviet_tacgia,baiviet_danhmuc,baiviet_mota,baiviet_noidung,baiviet_anh) VALUES ('$baiviet_ngay','$baiviet_tieude','$baiviet_tacgia','$category_id','$baiviet_mota','$baiviet_noidung','$unique_image')";
              $result = $this ->db ->insert($query);
              header('Location:productlist.php');
              return $result;               
        }
        // $alert = "<span class = 'alert-style'>Thành công</span> "; return $alert;
    public function show_product(){
        // $query = "SELECT * FROM tbl_baiviet ORDER BY baiviet_id DESC";
        $query = "SELECT tbl_baiviet.*, tbl_danhmuc.danhmuc_ten
        FROM tbl_baiviet INNER JOIN tbl_danhmuc ON tbl_baiviet.baiviet_danhmuc = tbl_danhmuc.danhmuc_id
        ORDER BY tbl_baiviet.baiviet_id DESC  ";
        $result = $this -> db ->select($query);
        return $result;
    }
    public function show_danhmuc(){
        $query = "SELECT * FROM tbl_danhmuc ORDER BY danhmuc_id DESC";
        $result = $this -> db ->select($query);
        return $result;
    }
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
    public function update_product($data,$file,$product_id) {
        $baiviet_ngay = mysqli_real_escape_string($this ->db ->link,$data['baiviet_ngay']);
        $baiviet_tieude = mysqli_real_escape_string($this ->db ->link,$data['baiviet_tieude']);
        $baiviet_tacgia = mysqli_real_escape_string($this ->db ->link,$data['baiviet_tacgia']);
        $category_id = mysqli_real_escape_string($this ->db ->link,$data['cartegory_id']);
        $baiviet_mota = mysqli_real_escape_string($this ->db ->link,$data['baiviet_mota']);
        $baiviet_noidung = mysqli_real_escape_string($this ->db ->link,$data['baiviet_noidung']);
             // kiểm tra hình ảnh và lấy hình ảnh cho và Foder uploads
              $permited = array('jpg','jpeg','png','gif');
              $file_name = $_FILES['baiviet_anh']['name'];
              $file_size = $_FILES['baiviet_anh']['size'];
              $file_temp = $_FILES['baiviet_anh']['tmp_name'];
              $div = explode('.',$file_name);
              $file_ext = strtolower(end($div));
              $unique_image = substr(md5(time()),0,10).'.'.$file_ext;
              $upload_image = "uploads/".$unique_image;
              move_uploaded_file( $file_temp,$upload_image);
             
                $query = "UPDATE tbl_baiviet SET
                              baiviet_ngay = '$baiviet_ngay', 
                              baiviet_tieude = '$baiviet_tieude', 
                              baiviet_tacgia = '$baiviet_tacgia', 
                              baiviet_danhmuc = '$category_id', 
                              baiviet_mota = '$baiviet_mota', 
                              baiviet_noidung = '$baiviet_noidung',
                              baiviet_anh = '$unique_image'
                              WHERE baiviet_id = '$product_id'";
                $result = $this ->db ->insert($query);
                header('Location:productlist.php');
                return $result;
         
              }   
            

    // }
    public function delete_product($product_id){
        $query = "DELETE  FROM tbl_baiviet WHERE baiviet_id = '$product_id'";
        $result = $this -> db ->delete($query);
        if($result) {$alert = "<span class = 'alert-style'> Delete Thành công</span> "; return $alert;}
        else {$alert = "<span class = 'alert-style'> Delete Thất bại</span>"; return $alert;}
      


    }




        
    }

 
?>