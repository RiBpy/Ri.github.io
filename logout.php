<?php require_once("connection.php");
$logout=setcookie("ami",$Auth,time()-36000);
if($logout){
    header("location:login.php?loged_out");
}
?>
