<html>
<head>
<title>uganka</title>
<meta charset="utf-8" />
<link rel="stylesheet" type='text/css' href='hitrost_opazovanja_stil.css'>
</head>

<body bgcolor="#DF7401">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
<h1 align='center'> UGANKA </h1>
<button id='gumb_navodila'>navodila</button>
<button id='gumb_zacni'>začni</button>
<a href='glavna_stran.html'>nazaj na glavno stran<a>
<a href='otok.html'>naslednja uganka<a>
<br>
<font id='navodila' class='tema3'> imaš 3 sode prvi je poln in sprejme 8 litrov vina, <br>
drugi je prazen in sprejme 5 litrov in tretji je tudi prazen in sprejme 3 litre. <br>
Vaša naloga je, da z prelivanjem dosežete, da bo vso vino v dveh sodih v vsakem po 4. <br>
Ko prelivate lahko prelijete samo tako, da vedno izpraznete oziroma napolnete do konca sod. <br>
To počnete z klikanjem na stolpce če so rdeči so polni, če so modri so prazni. <br>
Če je najvišja celica obarvana zeleno pomeni, da je ta stolpec izbran, da bo prelit. <br>
 </font>
 <center>
<table border='3' id='tabela'>
<tr><td height='60' width='60' bgcolor = "#088A85" id='a0'></td> <td height='60' width='60' bgcolor = "#088A85" id='b0'></td> <td height='60' width='60' bgcolor = "#088A85" id='c0'></td></tr>
<tr><td height='60' width='60' bgcolor = "FF4000" id='a8'></td></tr>

<tr><td height='60' width='60' bgcolor = "FF4000" id='a7'></td></tr>

<tr><td height='60' width='60' bgcolor = "FF4000" id='a6'></td></tr>

<tr><td height='60' width='60' bgcolor = "FF4000" id='a5'></td><td height='60' width='60' bgcolor = "#0404B4" id='b5'></td></tr>

<tr><td height='60' width='60' bgcolor = "FF4000" id='a4'></td><td height='60' width='60' bgcolor = "#0404B4" id='b4'></td></tr>

<tr><td height='60' width='60' bgcolor = "FF4000" id='a3'></td><td height='60' width='60' bgcolor = "#0404B4" id='b3'></td><td height='60' width='60' bgcolor = "#0404B4" id='c3'></td></tr>

<tr><td height='60' width='60' bgcolor = "FF4000" id='a2'></td><td height='60' width='60' bgcolor = "#0404B4" id='b2'></td><td height='60' width='60' bgcolor = "#0404B4" id='c2'></td></tr>

<tr><td height='60' width='60' bgcolor = "FF4000" id='a1'></td><td height='60' width='60' bgcolor = "#0404B4" id='b1'></td><td height='60' width='60' bgcolor = "#0404B4" id='c1'></td></tr>

</table>
</center>
<font id='cestitke' class='tema3'> čestitam zmagali ste, ste prvi, ki je rešil to uganko v zadnjih dvajsetih letih, <br>
lahko ste ponosni na svoj dosežek. <br>
Prosimo, vpišete svoje ime. <br>  </font>
<form id='vpisi_se' method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>
ime:<input type="text" name="zmagovalec"></input> <br>
<input type="submit">
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // collect value of input field
    $zm = $_POST['']; 

    if (empty($zm)) {
        echo "nic ni napisano";
    } 
	else {
                echo $zm;
  
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

       
		$sql = "INSERT INTO uganka (ime,datum) VALUES (\"$zm\",'2017-06-13')";
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

<script>
var maks1=8;
var maks2=5;
var maks3=3;

var prva=8;
var druga=0;
var tretja=0;

var navodila=false;

var tabela=false;

$(document).ready(function(){
	$("#navodila").hide();
	$("#vpisi_se").hide();	
	$("#tabela").hide();
	$("#cestitke").hide();
	
})

$("#gumb_navodila").click(function(){
	if(navodila==true){
		$("#navodila").hide();
		
		navodila=false;
	}
	else{
		$("#navodila").show();
		$("#cestitke").hide();
		$("#vpisi_se").hide();
		navodila=true;
	}
})
var zacelo=false;
$("#gumb_zacni").click(function(){
	if(zacelo==false){
	prva=8;
	druga=0;
	tretja=0;
	zacelo=true;
	napolni();
	$("#tabela").show();
	}
	else{
		zacelo=false;
		$("#tabela").hide();
		
	}
	$("#cestitke").hide();
})

//"#FF4000"
//#0404B4
function zmaga(){
	if((prva==4)&&(druga==4)){
		$("#cestitke").show();
		$("#tabela").hide();
		$("#vpisi_se").show();
	}
}
function napolni(){
	var i=1;
	while(i<=maks1){
		if(i<=prva){
			$("#a"+i).css('background-color','#FF4000');
		}
		else{
			$("#a"+i).css('background-color','#0404B4');
		}
		i+=1;
		
	}
	i=1;
	while(i<=maks2){
		if(i<=druga){
			$("#b"+i).css('background-color','#FF4000');
		}
		else{
			$("#b"+i).css('background-color','#0404B4');
		}
		i+=1;		
	}
	i=1;
	while(i<=maks3){
		if(i<=tretja){
			$("#c"+i).css('background-color','#FF4000');
		}
		else{
			$("#c"+i).css('background-color','#0404B4');
		}
		i+=1;		
	}	
}



var izbran="ne";
$("#a1, #a2, #a3, #a4, #a5, #a6, #a7, #a8").click(function(){
	if(izbran=="ne"){
		izbran="a"
		//$("#a0").style.backgroundColor = "#088A08";
		$("#a0").css('background-color','#088A08');
		$("#b0").css('background-color',"#088A85");
		$("#c0").css('background-color',"#088A85");

		$("#a0").text("izbran");
		$("#b0").text("");
		$("#c0").text("");
	}
	else{
		if(izbran=="b"){
			if((maks1-prva)<=druga){
				druga=druga-(maks1-prva);
				prva=maks1;
			}
			else{
				prva=prva+druga;
				druga=0;
				
			}
			napolni();
		}
		if(izbran=="c"){
			if((maks1-prva)<=tretja){
				tretja=tretja-(maks1-prva);
				prva=maks1;
			}
			else{
				prva=prva+tretja;
				tretja=0;
				
			}
			napolni();
			zmaga();
			
		}		
		izbran="ne";
		$("#c0").css('background-color','#088A85');
		$("#b0").css('background-color',"#088A85");
		$("#a0").css('background-color',"#088A85");
		$("#a0").text("");
		$("#b0").text("");
		$("#c0").text("");
		
	}
})

$("#b1, #b2, #b3, #b4, #b5").click(function(){
	if(izbran=="ne"){
		//$("#b0").style.backgroundColor = "#088A08";
		$("#b0").css('background-color','#088A08');
		$("#a0").css('background-color',"#088A85");
		$("#c0").css('background-color',"#088A85");
		$("#b0").text("izbran");	
		izbran="b"
		$("#a0").text("");
		$("#c0").text("");		
	}
	else{
		if(izbran=="a"){
			if((maks2-druga)<=prva){
				prva=prva-(maks2-druga);
				druga=maks2;
			}
			else{
				druga=prva+druga;
				prva=0;
				
			}
			napolni();
			
		}
		if(izbran=="c"){
			if((maks2-druga)<=tretja){
				tretja=tretja-(maks2-druga);
				druga=maks2;
			}
			else{
				druga=druga+tretja;
				tretja=0;
				
			}
			napolni();
			zmaga();
		}			
		
		izbran="ne";
		$("#c0").css('background-color','#088A85');
		$("#b0").css('background-color',"#088A85");
		$("#a0").css('background-color',"#088A85");
		$("#a0").text("");
		$("#b0").text("");
		$("#c0").text("");		
	}
})

$("#c3, #c2, #c3").click(function(){
	if(izbran=="ne"){
		izbran="c";
		//$("#c0").style.backgroundColor = "#088A08";
		//"#088A85"
		$("#c0").css('background-color','#088A08');
		$("#b0").css('background-color',"#088A85");
		$("#a0").css('background-color',"#088A85");

		$("#c0").text("izbran");
		$("#a0").text("");
		$("#b0").text("");		
	}
	else{
		if(izbran=="a"){
			if((maks3-tretja)<=prva){
				prva=prva-(maks3-tretja);
				tretja=maks3;
			}
			else{
				tretja=prva+tretja;
				prva=0;
				
			}
			napolni();
			zmaga();
			
		}
		if(izbran=="b"){
			if((maks3-tretja)<=druga){
				druga=druga-(maks3-tretja);
				tretja=maks3;
			}
			else{
				tretja=tretja+druga;
				druga=0;
				
			}
			napolni();
		}
		izbran="ne";
		$("#c0").css('background-color','#088A85');
		$("#b0").css('background-color',"#088A85");
		$("#a0").css('background-color',"#088A85");
		$("#a0").text("");
		$("#b0").text("");
		$("#c0").text("");		
	}
})

</script>

</body>

</html>