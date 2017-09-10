<html>

<head>
<link rel="stylesheet" type='text/css' href='stil2.css'>

<meta charset="utf-8">

<title>laži</title>

</head>

<body class='svetlo_zelena'>

<img src='ostrzk.jpg' width='400' height='400' align='right'>
<h1> uganka laži in ključa </h1>
<a href='otok.html'>naslednja uganka</a>
<p id="pokazi" class="naslov"> pokaži uganko</p>
<font id="navodila" class='vprasanje'> eden od treh ima ključ <br>
prvi pravi:jaz ga imam <br>
drugi pravi jaz ga nimam <br>
tretji pravi: prvi ga nima <br>
Kdo ima ključ če največ eden govori resnico   
 </font>
 <br>
<form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
jabolka<input type="radio" name="cl" value="prvi">
pomaranče<input type="radio" name="cl" value="drugi">
mešano<input type="radio" name="cl" value="tretji">
<br>
ime<input type="text" name="imee">
<input type="submit">
</form>

 <?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // collect value of input field
    $ime = $_POST['imee']; 
    $kljuc = $_POST['cl']; 

    if (empty($kljuc)||empty($ime)){
        echo "prazno";
    } 
	else {
        echo $kljuc;
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

       
		$sql = "INSERT INTO otok (ime,odgovor) VALUES (\"$ime\",\"$kljuc\")";
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




 
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script type="text/javascript" src="jsotok.js"></script>

</body>

</html>