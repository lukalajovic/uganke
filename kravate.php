<html>

<head>
<link rel="stylesheet" type='text/css' href='stil2.css'>

<meta charset="utf-8">

<title>kravate</title>

</head>

<body class='siva'>
<a href="lagati.html">naslednja uganka</a>
<img src='mr-blonde-mr-white-and-mr-pink-get-the-cop.jpg' width='400' height='400' align='right'>
<h1> GOSPOD MODR GOSPOD RDEČ PA GODPOD SIV </h1>
<p id="pokazi" class="naslov"> pokaži uganko</p>
<font id="navodila" class='vprasanje'> So gospod Modr, gospod Rdeč in Gospod Siv. <br>
Eden nosi modro kravato, drug sivo in tretji nosi rdečo kravato. <br>
Gospod Modr reče gospodu v rdeči obleki
<br> >>a veš, da imamo danes vsi drugačno kravato od našega priimka <<. Kakšno kravato ima gospod Modr? 
 </font>
 <br>
<form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
modr<input type="radio" name="kr" value="modr">
rdeč<input type="radio" name="kr" value="rdec">
siv<input type="radio" name="kr" value="siv">
<br>
ime<input type="text" name="imee">
<input type="submit">
</form>

 <?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // collect value of input field
    $ime = $_POST['imee']; 
    $kravata = $_POST['kr']; 

    if (empty($kravata)||empty($ime)){
        echo "prazno";
    } 
	else {
        echo $kravata;
        echo "<br>";       
        echo $ime;
  
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
                else{
                echo "uspesna povezava <br>";
                }

       
		$sql = "INSERT INTO kravate (ime,odgovor) VALUES (\"$ime\",\"$kravata\")";
		echo $sql."<br>";											

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




 <img src='Reservoir-Dogs-Fresh-New-Hd-Wallpaper.jpg' width='600' height='400' align='left'>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script type="text/javascript" src="jsotok.js"></script>

</body>

</html>