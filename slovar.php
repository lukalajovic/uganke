<html>
<head>
<title>vstavljenje besed</title>
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>


<body>
<h1>V spodnja polja vpiši slovensko besedo, nemsko besedo in temo kamor spada</h1>
<a href='glavna_stran.php'>nazaj na glavno stran<a>
<br>


<br>
<center>
  <form class="form-inline" method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">

    <input type="radio" name="jezik" value="n">nemščina
	<input type="radio" name="jezik" value="c">češčina
	
	<br>
    <div class="form-group">
      <label for="slova">SLO:</label>
      <input type="text" class="form-control"  placeholder="slovenska beseda" name="slova">
    </div>
    <div class="form-group">

      <input type="text" class="form-control" placeholder="tuja beseda" name="nema">
    </div>
	
    <div class="form-group">

      <input type="text" class="form-control" placeholder="tema" name="tem">
    </div>

    <div class="form-group">


	  <input type="submit" class="form-control" value='vstavi'>
    </div>	

  </form>
</center>


<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // collect value of input field
    $si = $_POST['slova']; 
    $de = $_POST['nema']; 
    $te = $_POST['tem']; 
    if ((empty($si)||empty($de))||empty($te)) {
        echo "nic ni napisano";
    } 
	else {
                echo $si;
                echo $de;
                echo $te;    
		$servername = "localhost";
		$mysql_database = "id1370995_jeziki";
		$username = "id1370995_lukal";
		$password = "geslo";
	// Create connection
		$conn = new mysqli($servername, $username, $password, $mysql_database);
		// Check connection
		if ($conn->connect_error) {
			die("Connection failed: " . $conn->connect_error);
		}
		$jez=$_POST['jezik']; 
		if($jez=='n'){
				$sql = "INSERT INTO slonem (slo,nem,tema) VALUES (\"$si\",\"$de\",\"$te\")";
		}
		else{
			$sql = "INSERT INTO sloceh (slo,ceh,tema) VALUES (\"$si\",\"$de\",\"$te\")";
		}											

		if ($conn->query($sql) === TRUE) {
			echo "dodali ste novo besedo";
		} 
		else {
			echo "Error: " . $sql . "<br>" . $conn->error;
		}		
	
	
	
	
	
		$conn->close();


	}




	
	
}
?>




</body>

</html>