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
  
    <link href="navbar-fixed-top.css" rel="stylesheet">
 </head>
<body>
<?php 
echo '<br><br><br>';
if(isset($_POST['register'])) 
{ 
$dbhost = 'localhost'; 
$dbuser = 'root'; 
$dbpass = ''; 
$conn = mysqli_connect($dbhost, $dbuser, $dbpass); 
if(! $conn ) 
{ 
die('Could not connect: ' . mysql_error()); 
} 
$ename = $_POST['ename'];
$eid=$_POST['eid'];
$sql = "INSERT INTO employees ". 
"(eid,ename) ". 
"VALUES ". 
"('$eid','$ename')"; 
$en="/^[a-zA-Z]{3,50}$/";
if(!preg_match($en,$ename))
{
echo '<div class="alert alert-warning">
    <strong>Warning!</strong>  Please enter name</div></br>';
}
else
{
mysqli_select_db($conn,'emp'); 
$retval = mysqli_query( $conn, $sql ); 
if(! $retval ) 
{ 
die('Could not enter data: ' . mysql_error()); 
} 
echo '<div class="alert alert-success">
    <strong>Success!</strong>    Employee Registered in Database</div></br>';
mysqli_close($conn); 
}
} 
?> 
<center>

 <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="adminhome.php">Admin Home</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
            <li class="active"><a href="register.php">Employee Registration</a></li>
            <li><a href="att.php">Employee Attendance</a></li>
            <li><a href="view.php">View Attendance</a></li>
           <li><a href="index.php">Logout</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>
	<br><br>
	<font color="orange"><b><h2>Hello admin, You can add the employees with their details here </h2></b></font><br><br><br>
	<div class="container">
    <hr>
    <h2>Employee Registration</h2>
    <div class="alert alert-warning hidden">
      <span></span>
      <button type="button" class="close" onclick="$('.alert').addClass('hidden');">&times;</button>
    </div>
    <table class="table table-bordered table-striped">
      <thead>
        <tr>
          <th>Registration</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>
            <form method="post">
              <div class="form-group">
                <label>Employee ID</label>
                <input class="form-control" placeholder="Enter Id" type="text" id="eid" name="eid">
              </div>
              <div class="form-group">
                <label>Employee Name</label>
                <input class="form-control" placeholder="Enter Name" type="text" id="ename" name="ename">
              </div>
              <input name="register" id="register" type="submit" class="btn btn-primary pull-right">
            </form>
          </td>
             
        </tr>
      </tbody>
    </table>
  </div>
	
	
	
	
	
	</center>
</body>
</html>
