<html>
<head>
  <link rel="stylesheet" href="css/style.css"/>
  <title>Admin Login Page</title>
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/bootstrap-theme.min.css">
  <script src="js/jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/login.js"></script>
  <meta name="viewport" content="width=device-width, initial-scale=1">
<style>
.dot {
    height: 30px;
    width: 30px;
    background-color: #66ff99;
    border-radius: 60%;
    display: inline-block;
}
</style>
    <link href="navbar-fixed-top.css" rel="stylesheet">
 </head>
<body>
<?php 
function isLeap($year)  
{  
    return (date('L', mktime(0, 0, 0, 1, 1, $year))==1);  
}  
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
$emm = $_POST['emm'];
$eyy = $_POST['eyy'];
$eid=$_POST['eid'];
$sql = "select count(*) from att where emm='$emm' and eyy='$eyy' and eid='$eid'";
mysqli_select_db($conn,'emp'); 
$retval = mysqli_query( $conn, $sql ); 
if(! $retval ) 
{ 
die('Could not enter data: ' . mysql_error()); 
} 
$count=0;
$d=0;
echo '<br><br>';

echo '<font color="orange">Employee  '.$eid.'  percentage of Attendance in the month  '.$emm.'  and year   '.$eyy.'  is  ----></font>';
while($row = mysqli_fetch_array($retval)){
	
	if($emm==4 or $emm==6 or $emm==9 or $emm==11)
	$a=$row[0]*3.3333;
elseif($emm==2){
	if(isLeap($eyy))
	$a=$row[0]*3.5714;
else
	$a=$row[0]*3.7037;
}
else
	$a=$row[0]*3.2258;
	echo '<font color="blue">'.$a.'</font>%<br><br>';
}
$sql= "select edd from att where emm='$emm' and eyy='$eyy' and eid='$eid'";
mysqli_select_db($conn,'emp'); 
$retval = mysqli_query( $conn, $sql );
while($row = mysqli_fetch_array($retval)){
	  $count=$count+1;
	}

if($emm==4 or $emm==6 or $emm==9 or $emm==11)
	$d=30;
elseif($emm==2){
	if(isLeap($eyy))  
	$d=28;
else
	$d=27;
	
}
else
	$d=31;
echo '<font color="darkblue">Total Number of Days in the month  '.$emm.'  and year   '.$eyy.'  is  ----></font>';
echo '<font color="blue">'.$d.'</font>  days <br><br>';

echo '<font color="green">Employee  '.$eid.'  Total Number of present days in the month  '.$emm.'  and year   '.$eyy.'  is  ----></font>';
echo '<font color="blue">'.$count.'</font>  days <br><br>';
if($emm==4 or $emm==6 or $emm==9  or $emm==11)
	$count=30-$count;
elseif($emm==2){
	if(isLeap($eyy)) 
	$count=28-$count;
else
	$count=27-$count;
}
else
	$count=31-$count;
echo '<font color="#cc00ff">Employee  '.$eid.'  Total Number of Absent days in the month  '.$emm.'  and year   '.$eyy.'  is ----></font>';
echo '<font color="blue">'.$count.'</font>  days <br><br>';
if($a<75)
	echo '<font color="red">Less Attendance Percentage </font></br>';
else
	echo '<font color="green">Good Percentage </font></br>';
mysqli_close($conn); 
}


if(isset($_POST['dis'])) 
{ 
$dbhost = 'localhost'; 
$dbuser = 'root'; 
$dbpass = ''; 
$conn = mysqli_connect($dbhost, $dbuser, $dbpass); 
if(! $conn ) 
{ 
die('Could not connect: ' . mysql_error()); 
} 
$emm = $_POST['emm'];
$eyy = $_POST['eyy'];
$eid=$_POST['eid'];
$sql = "select edd from att where emm='$emm' and eyy='$eyy' and eid='$eid'";
mysqli_select_db($conn,'emp'); 
$retval = mysqli_query( $conn, $sql ); 
if(! $retval ) 
{ 
die('Could not enter data: ' . mysql_error()); 
} 

echo '<br><br>';
echo '<font color="#00ccff"><h4>Employee  '.$eid.' present in the following Dates of given month  '.$emm.' and year '.$eyy.' :</h4></font><br>';
while($row = mysqli_fetch_array($retval)){
	
	echo '<span class="dot"><h4>'.$row[0].'</h4></span> &nbsp;';
}

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
            <li><a href="att.php">Employee Attendance</a></li>
            <li class="active"><a href="view.php">View Attendance</a></li>
           <li><a href="index.php">Logout</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>
	<br><br>
	<font color="orange"><b><h2>Hello admin, You can View employees attendance here </h2></b></font><br>
	
	<div class="container">
    <hr><br>
    <h2>View Employee Attendance</h2>
    <div class="alert alert-warning hidden">
      <span></span>
      <button type="button" class="close" onclick="$('.alert').addClass('hidden');">&times;</button>
    </div>
    <table class="table table-bordered table-striped">
      <thead>
        <tr>
          <th>View Attendance</th>
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
        <div style="float:left;">Month<input type="number" id="emm" name="emm" style=" white-space: nowrap; width:100%" placeholder="mm" min="1" max="12"/></div>
	    <div style="float:left;">Year<input type="number" id="eyy" name="eyy" style=" white-space: nowrap; width:100%" placeholder="yy" min="1900" max="5000"/></div></span>		
    			
              </div><br><br><br><br>
			  <input name="dis" id="dis" value="Display Attendance" type="submit" class="btn btn-primary pull-right">&nbsp; &nbsp;
              <input name="att" id="att" value="show percentage" type="submit" class="btn btn-primary pull-left">
            </form>
          </td>
             
        </tr>
      </tbody>
    </table>
  </div>
	
	
	</center>
	
</body>
</html>
