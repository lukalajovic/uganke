<html>

<head>
<link rel="stylesheet" type='text/css' href='stil2.css'>

<meta charset="utf-8">

<title>samotni otok</title>

</head>

<body class='svetlo_zelena'>

<img src='otok.jpg' width='400' height='400' align='right'>
<h1> UGANKA NA SAMOTNEM OTOKU </h1>
<a href='kravate.html'>naslednja uganka</a>
<p id="pokazi" class="naslov"> pokaži uganko</p>
<font id="navodila" class='vprasanje'> Na samotni otok priplavajo 3 zaboji v prvem so jabolka v drugem so pomaranče v tretjem jabolka in pomaranče. <br>
Vsaka ima napis ena ima napis jabolka druga pomaranča in tretje jabolka in pomaranče. <br>
Če veš, da so vsi napisi zamenjani iz katere škatle moraš povleči točno en sadež in ga pogledati, da lahko sklepaš kaj je v vseh. 
 </font>
 <br>
 <?php
// define variables and set to empty values
$sadje="";
$ime="";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $sadje = test_input($_POST["sadje"]);
  $ime = test_input($_POST["ime"]);
}


?>
 
<form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
jabolka<input type="radio" name="sadje" value="jabolko">
pomaranče<input type="radio" name="sadje" value="pomaranca">
mešano<input type="radio" name="sadje" value="oboje">
<br>
ime<input type="text" name="imee">
<input type="submit">
</form>

 <?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // collect value of input field


    if (empty($sadje)||empty($ime)){
        echo "";
    } 
	else {
        echo $sadje;
  
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

       
		$sql = "INSERT INTO otok (ime,odgovor) VALUES (\"$sadje\",\"$ime\")";
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



 <img src='otok2.jpg' width='600' height='400' align='left'>
 
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script type="text/javascript" src="jsotok.js"></script>

</body>

</html>
<font id="navodila" class='vprasanje'></font>