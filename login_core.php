<?php require_once("connection.php");
?>
<?php
if(isset($_REQUEST["login"])){
 $username=htmlentities($_REQUEST["username"]);
 $password=htmlentities($_REQUEST["pass"]);
 $Auth=md5(sha1($username.$password));

 $select="SELECT *FROM bbl_tbl WHERE auth='$Auth'";
 $runQuery=mysqli_query($conn ,$select);
 $count=mysqli_num_rows($runQuery);
 if($runQuery==true){
    if($count===1){
       setcookie("ami",$Auth,time()+86400);
        header ("location:personal_info.php?login_success");
    }else{
        header("location:login.php?wrong_info");
    }
 }else{
    header("location:login.php?wrong_info");
 }
}
?>