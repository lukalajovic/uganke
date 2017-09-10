
<html>
<head>
<title>hitrost opazovanja</title>
<meta charset="utf-8" />
<link rel="stylesheet" type='text/css' href='hitrost_opazovanja_stil.css'>
</head>

<body bgcolor="#FAFAFA">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
<center>
<h1>HITROST OPAZOVANJA </h1>



<button id="gumb1">začni</button>
<button id="gumb_navodila">navodila</button> 
<button id="sirina"> trenutna širina je 5</button>
<button id="visina"> trenutna visina je 4</button>
<a href='glavna_stran.html'>nazaj na glavno stran<a>
<br>
<div id="navodila"> v tabeli se ti prikažejo števila od 1 do 20 klikni nanje v vrstnem redu od 1 do 20 v čim krajšem času</div>
<table border='1'>
<tr>
<td>
<font id="sds" class='tema4'>0</font>
</td>
<td><font class='tema4'> čas</font></td>
<td>
<font id="ura" class='tema4'>0</font>
</td>
</tr>
</table>
<div id="cestitke"> v tabeli se ti bodo prikazalae  </div>

<table border='1' id='tabela'>

<tr> <td> dfsffds </td>  <td> dfsffds </td> </tr>
<tr> <td> dfsffds </td>  <td> dfsffds </td> </tr>
</table>

<form id='myform' method='post'>
Name:<input type='text' name='name'>
<button id="sub">submit </button>
</form>



</center>





<script src='skupne_funkc.js'></script>



<script>
function notr(value, array) {
  return array.indexOf(value) > -1;
}


function zaporedje(n){
	var g=1;
	var seznam=new Array();
	while(g<n+1){
		var f=Math.floor(Math.random()*n+1);
		if(notr(f,seznam)==false){
			//document.write(f);
			seznam.push(f);
			g+=1;
		}
		}					
	return seznam;	
}
function nakljucna_tabela2(a,b){
	var sez2=zaporedje(a*b);
	
	var sez=new Array();
	var k=0;
	for(var x = 0; x < a; x++){
		var sez1=new Array();
		for(var y = 0; y<b; y++){
			sez1.push(sez2[k]);
			k+=1;
		}
		sez.push(sez1);
	}
	return sez;	
}






//<font size="6">This is some text!</font>

function unici(ime){
	var element = document.getElementById(ime);
	element.parentNode.removeChild(element);
}


//createTable([["row 1, cell 1", "row 1, cell 2"], ["row 2, cell 1", "row 2, cell 2"]]);

var vrstice=4;
var stolpci=5;


function createTable(tableData,ime) {
	
  unici(ime)	
  var table = document.createElement('table');
  //var tableBody = document.createElement('tbody');
  table.id=ime
  table.border=2;
  table.align='center';
  var liho=1;
  
  tableData.forEach(function(rowData) {
    var row = document.createElement('tr');

    rowData.forEach(function(cellData) {
      var cell = document.createElement('td');
	  cell.height=80;
	  cell.width=80;
	  if(liho%2==1){
	  cell.style.backgroundColor = "#2ECCFA";
	  }
	  else{
		  cell.style.backgroundColor = "#81F79F";
	  }
	  //cell.addClass("stevilke1");
	  cell.style.textAlign='center';
	  cell.style.fontSize="25px";
	  liho+=1;
      cell.appendChild(document.createTextNode(cellData));
      row.appendChild(cell);
    });

    table.appendChild(row);
  });

  //table.appendChild(tableBody);
  document.body.appendChild(table);
}







var vrednost=1;
var cas=0;
var zacelo_se_je=false;
function myTimer(){
	if(zacelo_se_je==true){
	cas+=1;
	$("#ura").text(cas);
	}
}
function zacetek(){
	if(zacelo_se_je==false){
		zacelo_se_je=true;
		
		
	}
}

var myVar = setInterval(myTimer,1000);



$('#gumb1').click(function(){
	
	
	if(zacelo_se_je==false){

		$('#vpisi2').hide();		
		$('#vpisi_se').hide();
		$('#myform').hide();
		
		
		$('#gumb1').text("koncaj");
		createTable(nakljucna_tabela2(vrstice,stolpci),"tabela")
		$("#tabela").show();
		zacelo_se_je=true;
		//naklucna=nakljucna_tabela2(vrstice,stoplci);
		//createTable(nakljucna_tabela2(vrstice,stolpci),"tabela","t")
		var q=1;
		vrednost=1;
		cas=0;
		nova=new Array()
		zap=zaporedje(vrstice*stolpci);
		while(q<vrstice*stolpci+1){
			$("#t"+q).text(zap[q-1]);
			q+=1;
		}
		$("#cestitke").hide();
		
		
		
	}
	else{
		$('#gumb1').text("začni");
		zacelo_se_je=false;
		cas=0;
		vrednost=1;
		$("#tabela").hide();

	}

})
$('#sirina').click(function(){

	stolpci+=1;
	if(stolpci>8){
		stolpci=2;
	}
	$('#sirina').text("trenutna st stolpcev je" +stolpci);
})

$('#visina').click(function(){
	vrstice+=1;
	if(vrstice>8){
		vrstice=2;
	}
	$('#visina').text("trenutna st vrstic je" +vrstice);
})

$(document).ready(function(){
	$("tabela td").css("text-align","center");
	//$("#gumb1").hide();
	$("#tabela").hide();
	$("#cestitke").hide();
	
	$('#myform').hide();

	//$('#vpisi2').hide();	
	
	//$('#vpisi_se').hide();
	
})

$(document).on("click", "#tabela td", function() {
				
                var data = $(this).text();
				
				var data2=vrednost;
				//$("#sds").text(data);
				if(data2==data){
					//$("#sds").text("branko zvonko tonko");
					$(this).text("klik");
					$("#sds").text("imate "+vrednost+" točk");
					vrednost+=1;
					if(vrednost==vrstice*stolpci+1){
						zacelo_se_je=false;
						$("#tabela").hide();
						$("#cestitke").show();
						$("#myform").show();
					}
				}

            }); 



//$('#vpisi_se').click(function(){
//	var imme=$('#vpisi2').val();
//	//var imee="hhhhh";
//	//$.get('php/shrani_vsebino.php',{input:imee},function(data));
//	$('#odgovor').text(imee);
//})			
			
			
</script>




</body>

</html>