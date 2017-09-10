<html>
<head>
<title> geografija</title>
<meta charset="utf-8" />
<link rel="stylesheet" type='text/css' href='geo_stil.css'>

</head>

<body background="svet.png">
<a href='glavna_stran.php'>nazaj na glavno stran<a>


<?php
$servername = "localhost";
$dbname = "id1370995_jeziki";
$username = "id1370995_lukal";
$password = "geslo";
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
else{
	echo "connection made";
}
$sql = "SELECT country, capital from geo";
$result = $conn->query($sql);
$drzave=array();
$mesta=array();
//$mesta=array();
if ($result->num_rows > 0) {
    // output data of each row

    while($row = $result->fetch_assoc()) {
        //echo "<br> drzava: ". $row["country"]. " - Name: ". $row["capital"]. " ";
		$drzave[]=$row["country"];
		$mesta[]=$row["capital"];
	//echo $drzave[a];

    }
} else {
    echo "0 results";
}


$conn->close();
?> 


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
<script>
var drzave=<?php echo json_encode($drzave) ?>;
var mesta=<?php echo json_encode($mesta) ?>;

var tocke=0;
var cas=150;

var zacelo_se_je=false;
function myTimer(){
	if(zacelo_se_je==true){
		if(cas>0){
			cas-=1;
		}
	$("#cas").text(cas);
	}
	else{
		zacelo_se_je=false;
		$('tabela').hide();
	}
}


var myVar = setInterval(myTimer,1000);

function notr(value, array) {
  return array.indexOf(value) > -1;
}
function zaporedje(n,m){
	var g=1;
	var seznam=new Array();
	while(g<m){
		var f=Math.floor(Math.random()*n+1);
		if(notr(f,seznam)==false){
			//document.write(f);
			seznam.push(f);
			g+=1;
		}
		}					
	return seznam;	
}

function zap(n){
	var g=1;
	var seznam=new Array();
	while(g<n+1){
		var f=Math.floor(Math.random()*n);
		if(notr(f,seznam)==false){
			//document.write(f);
			seznam.push(f);
			g+=1;
		}
		}					
	return seznam;	
}



var st=0;

var mesto=mesta[st];
var drzava=drzave[st];


var v=zaporedje(mesto.length-1,4);
var kandidati=new Array(drzave[v[0]],drzave[v[1]],drzave[v[2]],drzava);
	
var w=zap(4);

function nova(){
	
	st=Math.floor(Math.random()*(drzave.length));
	
	mesto=mesta[st];
	drzava=drzave[st];
	
	v=zaporedje(15,4);
	
	kandidati=new Array(drzave[v[0]],drzave[v[1]],drzave[v[2]],drzava);
	
	w=zap(4);
	
	$('#mesto').text(mesto);
	$('#a').text(kandidati[w[0]]);
	$('#b').text(kandidati[w[1]]);
	$('#c').text(kandidati[w[2]]);
	$('#d').text(kandidati[w[3]]);
	
	$('#a').removeClass();	
	$('#a').addClass("primarna");
	
	$('#b').removeClass();	
	$('#b').addClass("primarna");

	$('#c').removeClass();	
	$('#c').addClass("primarna");

	$('#d').removeClass();	
	$('#d').addClass("primarna");

	
	$('#tocke').text("točke:"+tocke);	
	
}
function zacni(){
	$('#tabela').show();
	tocke=0;
	$('#tocke').text("točke:"+tocke);
	cas=150;
	$('cas').text(cas);
	zacelo_se_je=true;
	nova();
}
$(document).ready(function(){
	$('#tabela').hide();
	nova();	
	$('#zac').click(function(){
		zacni();
	})
	$('#a, #b, #c, #d').click(function(){
		if(cas>0){
			if($(this).text()==drzava){
				tocke+=1;
				nova();
						
			}
			else{
				tocke-=1;
				$('#tocke').text("točke:"+tocke);
				$(this).addClass("napacna");
				$(this).text("x");
				
			}
		}	
	})


	$('#a, #b, #c, #d').mouseover(function(){
	$(this).addClass('izbrana');
	
	})

	$('#a, #b, #c, #d').mouseout(function(){
		$(this).removeClass('izbrana');
	
})



})





</script>


<center>
<h1 id='naslov'> Kviz iz zemljepisa</h1>

<div id='navodila'>
glavno mesto katere države je 
</div>
<font id='mesto'></font>
<button id='zac'>
začni
</button>
<table id='tabela' border='2' bgcolor='#E6E6E6' width='400' height='100'>
<tr >
<td id='a'></td><td id='b'></td><td id='c'></td><td id='d'></td>
</tr>
</table>

<table id='tabela2' border='2' bgcolor='#E6E6E6' width='400' height='100'>
<tr >
<td id='tocke'></td><td id='cas'></td>
</tr>
</table>

</center>


</body>



</html>