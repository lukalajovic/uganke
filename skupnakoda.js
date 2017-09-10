

//vrne absolutno vrednost števila
function abs(x){
	if(x<0){
		return -x;
	}
	else{
		return x;
	}
}
function ustvari_platno(v,s){
	platno=document.createElement("canvas");
	platno.align='center';
	document.body.appendChild(platno);
	platno.width=s;
	platno.height=v;
}
//naredi kvadrat ki ga pogosto uporabljam



function stevilo(x,y,velikost,barva,napis){
	this.x=x;
	this.y=y;
	this.velikost=velikost;
	this.barva=barva;
	this.napis=napis;
	this.pravokotnik=platno.getContext("2d");
	this.pravokotnik.fillStyle = barva;
	this.pravokotnik.fillRect(this.x-this.velikost/2,this.y-this.velikost/2, this.velikost,this.velikost);

	this.pravokotnik.font = "30px Arial";
	this.pravokotnik.strokeText(this.napis,this.x,this.y);
	this.brisi=function(){
		this.pravokotnik.clearRect(this.x-this.velikost/2,this.y-this.velikost/2, this.velikost,this.velikost);
	}
	this.dotik=function(xx,yy,vv){
		if((abs(xx-this.x)<=velikost/2+vv/2)&&(abs(yy-this.y)<=velikost/2+vv/2)){
			return true;
		}
		else{
			return false;
		}
	}
	this.brisi_napis=function(){
		//this.brisi();
		this.pravokotnik.fillStyle =this.barva;
		this.pravokotnik.fillRect(this.x-this.velikost/2,this.y-this.velikost/2, this.velikost,this.velikost);
		this.pravokotnik.font = "30px Arial";
		this.pravokotnik.strokeText(this.napis,this.x,this.y);				
	}
	this.premakni_na=function(a,b){
		this.pravokotnik.clearRect(this.x-this.velikost/2,this.y-this.velikost/2, this.velikost,this.velikost);
		this.x=a;
		this.y=b;
		this.pravokotnik.fillStyle = barva;
		this.pravokotnik.fillRect(this.x-this.velikost/2,this.y-this.velikost/2, this.velikost,this.velikost);		
	}
}
function zbrisi_vse(S,V){
	platno.getContext("2d").clearRect(0,0,S,V);
}
// naredi seznam z n ciframi od 0 do n-1 v naključnem vrstnem redu ponavljanje  JE DOVOLJENO
function naredin(n){	
	var g=0;
	var seznam= new Array();
	while(g<n){
		var f=Math.floor(Math.random()*10);
		//var f=7;
		seznam.push(f);
		g+=1;		
	}
	return seznam;
}
//pomožna funkcija za naslednjo funkcijo
function notr(value, array) {
  return array.indexOf(value) > -1;
}

//ta tudi naredi seznam z naključnimi ciframi a tokrat NI PONAVLJANJA
function zaporedje(n){
	var g=0;
	var seznam=new Array();
	while(g<n){
		var f=Math.floor(Math.random()*n);
		if(notr(f,seznam)==false){
			//document.write(f);
			seznam.push(f);
			g+=1;
		}
		}					
	return seznam;	
}
