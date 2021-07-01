<?php 
if(!isset($_COOKIE["ami"])){
    header("location:login.php");
}?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="icon" href="img/Riaz.png">
    <link rel="stylesheet" href="css/style.css">
    <title>My portfolio wbsite</title>
    
</head>
<body>

<div class="navbar sticky-top navbar-dark navbar-expand-md py-lg-3" id="mainNav">
    <div class="container">
        <div><a href="index.php">
            <img src="img/Riaz.png" style="width:50px; height:50px;"alt="nav-logo" class="logo"/>
           </a>
        </div>
<button class="navbar-toggler ml-auto" data-toggle="collapse" data-target="#navItem" aria-controls="navbarResponsive" aria-expanded="false" 
aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
        <div class="collapse navbar-collapse" id="navItem">
            <ul class="navbar-nav mx-auto">
                <li class="nav-item px-lg-4"><a class="nav-link  text-uppercase " href="index.php">Home</a></li>
                <li class="nav-item px-lg-4"><a class="nav-link text-uppercase" href="about.php">About me</a></li>
                <li class="nav-item px-lg-4"><a class="nav-link text-uppercase " href="work.php">my work</a></li>
                <li class="nav-item dropdown px-lg-4"><a class="nav-link text-uppercase droodown-toggle" data-toggle="dropdown" >contact me &raquo;</a>
                  <div class="dropdown-menu" id="dropdown">
                      <a href="send_email.php" class="dropdown-item text-decoration-none">Email Us</a>
                      <a href="login.php" class="dropdown-item text-decoration-none">Login</a>
                        <a href="signup.php" class="dropdown-item text-decoration-none">Sign Up</a>
                  </div>
                </li>
                <?php if(isset($_COOKIE["ami"])){
                   echo'<li class="nav-item dropdown px-lg-4"><a class="nav-link text-uppercase droodown-toggle" data-toggle="dropdown" >Profile &raquo;</a>';
                }
                ?>
                        <div class="dropdown-menu" id="dropdown">
                            <?php                      
                            if(isset($_COOKIE["ami"])){                             
                                echo '<a href="logout.php" class="dropdown-item text-decoration-none">Logout</a>';
                                echo '<a href="offer.php" class="dropdown-item text-decoration-none">offer</a>';
                                echo '<a href="personal_info.php" class="dropdown-item text-decoration-none">profile</a>';
                            }
                            ?>             
                        </div>
                    </li>
            </ul>
        </div>
    </div>
</div>
<?php
require_once("connection.php");
if(isset($_REQUEST["edit_id"])){
    $editId=$_REQUEST["edit_id"];

$select="SELECT * FROM bbl_tbl WHERE id=$editId";
$runQuery=mysqli_query($conn ,$select);
    while($row=mysqli_fetch_array($runQuery)){     
        ?>
        <form action="edit_core.php" method="POST" enctype="multipart/form-data">

        <section class="card py-5">
      <div class="container align-center">
          <div class="row justify-content-center">
              <div class="col-md-6 text-center">
              <img class="rounded-circle DP" src="avatar/<?php echo $row['dp']?>" style="width:120px; height:150px;" alt="Profile Image">
                    <input type="file" name="profile_pic">          
              
                <div class="card-content text-center">
                    <h5><strong>Firt Name: </strong><input type="text" placeholder="Fist Name" name="fname" value="<?php echo $row["fname"];?>"></h5>
                    <h5><strong>Last Name: </strong><input type="text" placeholder="Last Name" name="lname" value="<?php echo $row["lname"];?>"></h5>
                    <h5><strong>User Name: </strong><input type="text" placeholder="User Name" name="uname" value="<?php echo $row["username"];?>"></h5>
                    <h5><strong>Email: </strong><input type="text" placeholder="Email" name="email" value="<?php echo $row["email"];?>"></h5>
                    <input type="hidden" name="editingId" value="<?php echo $editId?>"/>
                </div>
                <input value="Update" name="editBtn" type="submit" class="btn btn-outline-info">
              </div>  
          </div>
      </div>
    </section>
    </form>

        <?php
    }
}
?>

<footer id="footer" class="py-5">
    <div class="container ">
        <div class="row text-light">
                <div class="col-lg-4 col-md-4 d-none d-md-block ">
                    <img src="img/Riaz.png" style="width:50px;height:50px;" alt="Logo">
                    <p class="lead">I am in web design and development sector since  2017.In those year,s i have gathered a lot of experiance in this sector.So if you have any web related work feel free to contact with me.</p>
                    <span>&copy; portfolio 2020</span>
                    <p class="lead">Designed and Developed by <a href="https://www.fb.com/RiBpy" class='text-decoration-none text-info'>Riaz Bappy</a></p>
                </div>
                <div id="social" class="col-lg-4 col-md-5 col-sm-6 mt-5 pr-lg-3">
                   <div class="align-center mb-5">
                        <h2 class="text-center">Find Me On</h2>
                        <div class="navbar navbar-expand-sm pt-5">
                            <div class="social-links ">
                                <ul class="navbar-menu">
                                        <li class="nav-item m-1"><a href="https://www.fb.com/RiBpy"><i class=" nav-link fa fa-facebook"></i></a></li>
                                        <li class="nav-item m-1"><a href=""><i class=" nav-link fa fa-twitter"></i></a></li>
                                        <li class="nav-item m-1 "><a href=""><i class=" nav-link fa fa-instagram"></i></a></li>
                                        <li class="nav-item m-1"><a href=""><i class=" nav-link fa fa-linkedin"></i></a></li>                                        
                                </ul>
                            </div>
                        </div>
                   </div>
                </div>
                <div class=" col-lg-4 col-md-3 col-sm-6 text-center-sm-down pl-5" id="address">
                    <h4 class="">Address</h4>
                    <p><strong>Home:</strong> 784</p>
                    <h3></h3>
                    <p><strong>Road: </strong>Stadium Road</p>
                    <p>Hatiya,Noakhali,Bangladesh</p>
                    <h4 class="">Phone</h4>
                    <p>0123456789</p>
                    <h4 class="">Email</h4>
                    <p>ribpy22@gmail.com</p>

                </div>
        </div>
    </div>
    
</footer>

<script src="js/jquery.slim.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/progresscircle.js"></script>
<script src="js/slick.min.js"></script>
<script src="js/main.js"></script>
<script type="text/javascript" src="js/vanilla-tilt.min.js"></script>
</body>
</html>