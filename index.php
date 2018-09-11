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
            <li class="active"><a href="#">Home</a></li>
            
            <li><a href="contact.php">Contact</a></li>
          
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>
  <div class="container">
    <hr><br><br><br><br>
    <h2>For Admin</h2>
    <div class="alert alert-warning hidden">
      <span></span>
      <button type="button" class="close" onclick="$('.alert').addClass('hidden');">&times;</button>
    </div>
    <table class="table table-bordered table-striped">
      <thead>
        <tr>
          <th>Login</th>
         
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>
            <form method="post">
              <div class="form-group">
                <label>User ID</label>
                <input class="form-control" placeholder="Enter Id" type="text" id="userid" name="userid">
              </div>
              <div class="form-group">
                <label>Password</label>
                <input class="form-control" placeholder="Enter Password" type="password" id="password" name="password">
              </div>
              <input name="login" id="login" type="submit" class="btn btn-primary pull-right">
            </form>
          </td>
          
          
        </tr>
      </tbody>
    </table>
  </div>
     <!-- FOOTER -->
      <footer style="background:; height:120%;">
        <p class="pull-right"><a href="#">Back to top</a></p>
      

    </div><!-- /.container -->

	
 </body>
</html>
