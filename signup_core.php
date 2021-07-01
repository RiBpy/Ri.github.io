<?php require_once("connection.php");?>
<?php
if(isset($_REQUEST["signup"])){
    $fname=htmlentities($_REQUEST["fname"]);
    $lname=htmlentities($_REQUEST["lname"]);
    $username=htmlentities($_REQUEST["uname"]);
    $email=htmlentities($_REQUEST["email"]);

    $password=$_REQUEST["pass"];
    $encPass=md5(sha1($_REQUEST["pass"]));
    $createAuth=md5(sha1($username.$password));

    $img_name=$_FILES["profile_pic"]["name"];
    $tmp_name=$_FILES["profile_pic"]["tmp_name"];
    $new_img_name=uniqid().str_replace(" ","_","$img_name");
    $location="avatar/";
    move_uploaded_file("$tmp_name",$location."$new_img_name");

   

$insert="INSERT INTO bbl_tbl (fname,lname,username,email,password,dp,auth) VALUES('$fname','$lname','$username','$email','$encPass','$new_img_name','$createAuth')";
$runQuery=mysqli_query($conn, $insert);
if($runQuery==true){
 header("location:signup.php?signup_success");
}else{
    echo "something wrong";
}    
}
?>