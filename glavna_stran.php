
<html>
<head>
<title>glavna stran</title>
<meta charset="utf-8" />
<link rel="stylesheet" type='text/css' href='hitrost_opazovanja_stil.css'>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>



</head>

<body bgcolor='#F2E0F7'>
<center>
<font id='navodila' class='tema5'> klikni na eno od iger v tabeli</font>
</center>
<br>



  <div class="row">
    <div class="col-sm-2" style="background-color:lavender;"><a href='jezikoslovec.php'>jeziki<a></div>
    <div class="col-sm-2" style="background-color:lavender;"><a href='spomin.html'>spomin<a></div>
    <div class="col-sm-2" style="background-color:lavenderblush;"><a href='spomin_stevil.html'>spomin števil<a></div>
    <div class="col-sm-2" style="background-color:lavender;"><a href='hitrost_opazovanja.php'>hitrost opazovanja<a></div>
    <div class="col-sm-2" style="background-color:lavenderblush;"><a href='uganka.php'>uganke<a></div>
    <div class="col-sm-2" style="background-color:lavender;"><a href='geografija.php'>geografija<a></div>	
  </div>
</div>




<?php 

$servername = "localhost";
$mysql_database = "id1370995_jeziki";
$username = "id1370995_lukal";
$password = "geslo";

// Create connection
$conn = new mysqli($servername, $username, $password, $mysql_database);
//mysql_select_db($username,$conn);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
//echo "Connected successfully";
$sql1  = 'SELECT COUNT(*) as cc FROM uganka';
$result1 = $conn->query($sql1);
if ($result1->num_rows > 0) {
     // output data of each row
     while($row = $result1->fetch_assoc()) {
         //echo "<br> uganko die hard je resilo: ". $row["cc"].  "<br>";
         $uganka=$row["cc"]; 

     }
} else {
     echo "0 results";
}
$sql2  = 'SELECT COUNT(*) as cc FROM otok WHERE odgovor="oboje"';
$result2 = $conn->query($sql2);
if ($result2->num_rows > 0) {
     // output data of each row
     while($row = $result2->fetch_assoc()) {
         //echo "<br> uganko samotni otok je rešilo: ". $row["cc"].  "<br>";
         $otok=$row["cc"]; 

     }
} else {
     echo "0 results";
}


$sql3  = 'SELECT COUNT(*) as cc FROM kravate WHERE odgovor="siv"';
$result3 = $conn->query($sql3);
if ($result3->num_rows > 0) {
     // output data of each row
     while($row = $result3->fetch_assoc()) {
         //echo "<br> uganko stekli psi je rešilo: ". $row["cc"].  "<br>";
         $kravata=$row["cc"]; 

     }
} else {
     echo "0 results";
}
$sql4  = 'SELECT COUNT(*) as cc FROM lagati WHERE odgovor="drugi"';
$result4 = $conn->query($sql4);
if ($result4->num_rows > 0) {
     // output data of each row
     while($row = $result4->fetch_assoc()) {
         $kljuc=$row["cc"]; 

     }
} else {
     echo "0 results";
}

$conn->close();

?>
<center>
<table border='3' bgcolor='#A9E2F3'>
<tr>
<td>
<font class='tema3'>
ime uganke:
</font>
</td>
<td>
<font class='tema3'>
die hard 3
</font>
</td>
<td>
<font class='tema3'>
samotni otok
</font>
</td>
<td>
<font class='tema3'>
stekli psi
</font>
<td>
<font class='tema3'>
lažnivci
</font>
</td>
</td>
</tr>
<tr>
<td>
<font class='tema3'>
rešilo:
</font>
</td>
<td>
<font class='tema3' id='diehard'>

</font>
</td>
<td>
<font class='tema3' id='otok'>

</font>
</td>
<td>
<font class='tema3' id='steklipsi'>

</font>
<td>
<font class='tema3' id='laz'>

</font>
</tr>
</table>
</center>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>

<script>

$(document).ready(function(){

	$("#diehard").text(<?php echo json_encode($uganka); ?>);
	$("#otok").text(<?php echo json_encode($otok); ?>);
	$("#steklipsi").text(<?php echo json_encode($kravata); ?>);
	$("#laz").text(<?php echo json_encode($kljuc); ?>);	
	
})

</script>




</body>


</html>