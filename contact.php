<!DOCTYPE html>
<html>
 <head>
  <link rel="stylesheet" href="css/style.css"/>
  <title>Admin Login Page</title>
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/bootstrap-theme.min.css">
  <script src="js/jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/login.js"></script>
   <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
   <!-- Custom styles for this template -->
    <link href="navbar-fixed-top.css" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
.card {
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
  max-width: 300px;
  margin: auto;
  text-align: center;
  font-family: arial;
}

.title {
  color: grey;
  font-size: 18px;
}

button {
  border: none;
  outline: 0;
  display: inline-block;
  padding: 8px;
  color: white;
  background-color: #000;
  text-align: center;
  cursor: pointer;
  width: 100%;
  font-size: 18px;
}

a {
  text-decoration: none;
  font-size: 15px;
  color: black;
}

button:hover, a:hover {
  opacity: 0.7;
}
</style>
 </head>
 <body>
 <?php

if(isset($_POST['login']))
{
	$userid=$_POST['userid'];
	$password=$_POST['password'];
	
	echo '<br><br><br>';
	
	if($userid=="")
		echo '<div class="alert alert-warning">
    <strong>Warning!</strong>   User Id Cannot Be Null</div><br>';
	else if($password=="")
		echo '<div class="alert alert-warning">
    <strong>Warning!</strong>Password Cannot Be Null</div><br>';
	else if($userid!="admin" || $password!="admin"){
		echo '<div class="alert alert-warning">
    <strong>Warning!</strong>ID/Password Mismatch</div><br>';
		header("Location: index.php");
	}
	else
		header("Location: adminhome.php");
}
?>
    <!-- Fixed navbar -->
    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="index.php">Online Attendance</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
            <li><a href="index.php">Home</a></li>
            
            <li class="active"><a href="contact.php">Contact</a></li>
          
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>
  
 <br><br><h2 style="text-align:center">My Profile Card</h2>

<div class="card">
  <img src="https://lh3.googleusercontent.com/-MK8WiXPi5cU/WwkOPCFnFvI/AAAAAAAAJuk/XELsJJlF4vE_KhjIYXWDpnYuerCV9OVYACK8BGAs/s512/8479496945013911554%253Faccount_id%253D16" alt="sandy" height="330px" width="100%">
  <h1>Sai Sandeep </h1>
  <p class="title"><b>Student</b></p>
  <p>VIT University, Vellore</p>
  <div style="margin: 4px 0;">
   
    <a href="#"><i class="fa fa-twitter"></i></a>  
    <a href="#"><i class="fa fa-linkedin"></i></a>  
    <a href="#"><i class="fa fa-facebook"></i></a> 
 </div>
 <p><button>Contact</button></p>

 </div>	
 </body>
</html>
