<?php require_once("connection.php")?>
<?php
if(isset($_REQUEST["editBtn"])){
    $editingId=$_REQUEST["editingId"];
    echo $editingId;
    die();
    $fname=htmlentities($_REQUEST["fname"]);
    $lname=htmlentities($_REQUEST["lname"]);
    $username=htmlentities($_REQUEST["uname"]);
    $email=htmlentities($_REQUEST["email"]);
    
    $img_name=$_FILES["profile_pic"]["name"];
    $tmp_name=$_FILES["profile_pic"]["tmp_name"];
    $new_img_name=uniqid().str_replace(" ","_","$img_name");
    $location="avatar/";
    move_uploaded_file("$tmp_name",$location."$new_img_name");

    
   
    $update="UPDATE bbl_tbl SET fname='$fname', lname='$lname', username='$username' , email='$email', dp='$new_img_name' WHERE id=$editingId";
    $runQuery=mysqli_query($conn,$update);
    if($runQuery){
        header("location:personal_info.php?updated");
    }else{
        echo"something worng";
    }
}
?>