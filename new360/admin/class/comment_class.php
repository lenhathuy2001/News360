<?php
// include "../lib/database.php";
// include "../helper/format.php"
?>

<?php
class comment
{

   private $db;
   private $fm;

   public function __construct()
   {
       $this ->db = new Database();
       $this ->fm = new Format();
   }

   public function show_comment(){
    $query = "SELECT * FROM tbl_comment ORDER BY comment_id DESC";
    $result = $this -> db ->select($query);
    return $result;
}
public function show_member(){
    $query = "SELECT * FROM tbl_user ORDER BY userA_id DESC";
    $result = $this -> db ->select($query);
    return $result;
}
public function delete_comment($comment_id){
    $query = "DELETE  FROM tbl_comment WHERE comment_id = '$comment_id'";
    $result = $this -> db ->delete($query);
    return $result;
    // if($result) {$alert = "<span class = 'alert-style'> Delete Thành công</span> "; return $alert;}
    // else {$alert = "<span class = 'alert-style'> Delete Thất bại</span>"; return $alert;}
  


}
   
public function insert_member($user_ten,$user_password){
            $query = "INSERT INTO tbl_user (user_ten,user_password) VALUES ('$user_ten','$user_password')";
            $result = $this ->db ->insert($query);
            header('Location:memberlist.php');
            return $result;
           
          
        }
    
        public function delete_member($userA_id){
            $query = "DELETE  FROM tbl_user WHERE userA_id = '$userA_id'";
            $result = $this -> db ->delete($query);
            return $result;
            // if($result) {$alert = "<span class = 'alert-style'> Delete Thành công</span> "; return $alert;}
            // else {$alert = "<span class = 'alert-style'> Delete Thất bại</span>"; return $alert;}
          
        
        
        }


       
   }


?>