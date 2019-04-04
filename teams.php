<?php 
   require('inc/config.php');
?>


<!DOCTYPE html>
<html>
<head>
	<title>Teams</title>
	
	    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="css/footer.css">
        <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		<link rel="stylesheet" type="text/css" href="css/advertise.css">
		<link rel="stylesheet" type="text/css" href="css/purchase.css">
</head>
<body style="background-color: #212F3C;"><!--#CCD1D1  #5D6D7E -->
      <style>
hr { 
  display: block;
  margin-top: 0.5em;
  margin-bottom: 0.5em;
  margin-left: auto;
  margin-right: auto;
  border-style: inset;
  border-width: 1px;
} 
</style>
	<nav class="navbar navbar-inverse">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="home.php">MNNIT Allahabad</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav navbar-right">
        <li><a href="teams.php">Teams</a></li>
        <li><a href="bought_products.php">Projects</a></li>
        <li><a href="message.php">Sponsors</a></li>
            <li><a href="about_us.php">Winners</a></li>
            <li><a href="about_us.php">Mentor Teachers</a></li>
            <li><a href="about_us.php">Expenditure</a></li>
        <li class="dropdown"><a href="purchase.php" class="dropdown-toggle" data-toggle="dropdown"><?php echo $_SESSION['email']; ?><span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="change_password.php">Change Password</a></li>
          <li><a href="logout.php">Logout</a></li>
        </ul>
        </li>
      </ul>
    </div>
  </div>
</nav>

<!-- Side navigation -->
<div class="sidenav">
  <a href="laptop_purchase.php">Laptop</a>
  <a href="mobile_purchase.php">Mobile</a>
  <a href="book_purchase.php">Books</a>
  <a href="purchase.php">All Products</a>
</div>

<!-- Page content -->
<!-- Page content -->

  

<?php

$query = "SELECT * FROM teams  ";
$result = mysqli_query($db,$query);
while ($row = mysqli_fetch_assoc($result)) {
    $name = $row["tname"];
    $project = $row["proid"];
    $tid=$row["tid"];
    $i=1;
    $query2="SELECT pid From tmembers where tid=$tid";
    $result2=mysqli_query($db,$query2);
    $query4="SELECT proname From projects where proid=$project";
    $result4=mysqli_query($db,$query4);
    $row5=mysqli_fetch_assoc($result4);
       ?>
    	<div class="container">
            <div class="row row-margin-bottom">
            <div class="col-md-9 no-padding lib-item" data-category="view">
                <div class="lib-panel">
                    <div class="row box-shadow">
                        <div class="col-md-6">
                            <img class="lib-img-show" src="images/team.jpg">
                        </div>
                        
                        <div class="col-md-6">
                            <div class="lib-row lib-header">
                                <p><b>Team Name : </b><u><?php echo $row["tname"]; ?></u></p>
                                <div class="lib-header-seperator"></div>
                            </div>
                            <div class="lib-row lib-header">
                            	<p><b>Project : </b><u><?php echo $row5["proname"];?></u></p>
                            </div>
                            <hr>
                            <?php 
                            while($row2=mysqli_fetch_assoc($result2))
                            {
                                $pid=$row2["pid"];
                                $query3="SELECT * FROM memberd where pid='$pid'";
                                $result3=mysqli_query($db,$query3);
                                $row3=mysqli_fetch_assoc($result3);
                                ?>
                                <div class="lib-row lib-header">
                                <p><b>Member : <?php echo $i;?> </b></p>
                            </div>
                                <div class="lib-row lib-data">
                                <p><b>Name : </b><?php echo $row3["pname"];?></p>
                            </div>
                            <div class="lib-row lib-data">
                                <p><b>Contact : </b><?php echo $row3["pcontact"];?></p>
                            </div>
                            <div class="lib-row lib-data">
                                <p><b>Email ID : </b><?php echo $row3["pemail"];?></p>
                            </div>
                            <div class="lib-row lib-data">
                                <p><b>Github : </b><?php echo $row3["pgithub"];?></p>
                            </div>
                            <div class="lib-row lib-data">
                                <p><b>Address : </b><?php echo $row3["paddress"];?></p>
                            </div>
                            <div class="lib-row lib-data">
                                <p><b>College : </b><?php echo $row3["pcollege"];?></p>
                            </div>
                       
<hr>
                            <?php $i=$i+1;}
                            ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-1"></div>
            
        </div>

    </div>
    <hr>
<?php }?>

</body>