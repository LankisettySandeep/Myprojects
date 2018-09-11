<html>
<head>
  <link rel="stylesheet" href="css/style.css"/>
  <title>Admin Login Page</title>
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/bootstrap-theme.min.css">
  <script src="js/jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/login.js"></script>
   <script>
function startTime() {
    var today = new Date();
    var h = today.getHours();
    var m = today.getMinutes();
    var s = today.getSeconds();
    m = checkTime(m);
    s = checkTime(s);
    document.getElementById('ctime').value =h + ":" + m + ":" + s;
    var t = setTimeout(startTime, 500);
}
function checkTime(i) {
    if (i < 10) {i = "0" + i};  // add zero in front of numbers < 10
    return i;
}
</script>
    <link href="navbar-fixed-top.css" rel="stylesheet">
 </head>
<body onload="startTime()">
<?php 
echo '<br><br><br>';
if(isset($_POST['att'])) 
{ 
$dbhost = 'localhost'; 
$dbuser = 'root'; 
$dbpass = ''; 
$conn = mysqli_connect($dbhost, $dbuser, $dbpass); 
if(! $conn ) 
{ 
die('Could not connect: ' . mysql_error()); 
} 
$edd = $_POST['edd'];
$emm = $_POST['emm'];
$eyy = $_POST['eyy'];
$checkin= $_POST['ctime'];
$eid=$_POST['eid'];
$sql = "INSERT INTO att ". 
"(eid,edd,emm,eyy,checkin) ". 
"VALUES ". 
"('$eid','$edd','$emm','$eyy','$checkin')"; 
mysqli_select_db($conn,'emp'); 
$retval = mysqli_query( $conn, $sql ); 
if(! $retval ) 
{ 
die('Could not enter data: ' . mysql_error()); 
} 
echo '<div class="alert alert-success">
    <strong>Success!</strong>    Attendance Added </div></br>';
mysqli_close($conn); 
}
if(isset($_POST['catt'])) 
{ 
$dbhost = 'localhost'; 
$dbuser = 'root'; 
$dbpass = ''; 
$conn = mysqli_connect($dbhost, $dbuser, $dbpass); 
if(! $conn ) 
{ 
die('Could not connect: ' . mysql_error()); 
} 
$eid = $_POST['eid'];
$edd = $_POST['edd'];
$emm = $_POST['emm'];
$eyy = $_POST['eyy'];
$checkout= $_POST['ctime'];
$eid=$_POST['eid'];
$sql = "update att set checkout='$checkout' where eid='$eid' and edd='$edd' and emm='$emm' and eyy='$eyy' ";
mysqli_select_db($conn,'emp'); 
$retval = mysqli_query( $conn, $sql ); 
if(! $retval ) 
{ 
die('Could not enter data: ' . mysql_error()); 
} 
echo '<div class="alert alert-success">
    <strong>Success!</strong>    Attendance Added </div></br>';
mysqli_close($conn); 
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
            <li ><a href="register.php">Employee Registration</a></li>
            <li class="active"><a href="att.php">Employee Attendance</a></li>
            <li><a href="view.php">View Attendance</a></li>
           <li><a href="index.php">Logout</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>
	<br><br>
	<font color="orange"><b><h2>Hello admin, You can add the employees attendance here </h2></b></font><br><br><br>
	<div class="container">
    <hr><br>
    <h2>Add Employee Attendance</h2>
    <div class="alert alert-warning hidden">
      <span></span>
      <button type="button" class="close" onclick="$('.alert').addClass('hidden');">&times;</button>
    </div>
    <table class="table table-bordered table-striped">
      <thead>
        <tr>
          <th>Attendance</th>
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
        <div style="float:left;">Date<input type="number" id="edd" name="edd" placeholder="dd" style="width:100%" min="1" max="31"/></div>
	    <div style="float:left;">Month<input type="number" id="emm" name="emm" style=" white-space: nowrap; width:100%" placeholder="mm" min="1" max="12"/></div>
	    <div style="float:left;">Year<input type="number" id="eyy" name="eyy" style=" white-space: nowrap; width:100%" placeholder="yy" min="1900" max="5000"/></div> &nbsp;
		 <div style="float:left;">&nbsp;Time&nbsp;<input type="text" id="ctime" name="ctime" style=" white-space: nowrap; width:100%"/></div>
		</span>		
    			
				<script>
var d = new Date();
document.getElementById("edd").value = d.getDate();
document.getElementById("emm").value = d.getMonth()+1;
document.getElementById("eyy").value = d.getFullYear();
</script>	
              </div><br>
              <input name="att" id="att" type="submit" value="checkin" class="btn btn-primary pull-right"><br><br>
			    <input name="catt" id="catt" type="submit" value="checkout" class="btn btn-primary pull-right">
            </form>
          </td>
             
        </tr>
      </tbody>
    </table>
  </div>
	</center>
</body>
</html>
