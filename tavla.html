<!DOCTYPE html>
<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
<meta name="viewport" content="width=devise-width, initial-scale=1">
<meta charset="UTF-8">
<title>BYSSAN - TAVLA</title>
<style>
body{
display: grid;
grid-template-columns: 50% 50%;
}

#lagas, #klar{
text-align:center;
border: 2px solid;
display: grid;
grid-template-columns: 1fr 1fr 1fr 1fr;
}

#lagas> h1, #klar > h1{
width:100%;
grid-column:1/4;
}

#lagas> p, #klar > p{
border: 1px solid;
font-size:50px;
margin: auto;
padding:1em;
width:1em;
text-align:center;
word-break:break-all;
}
#klar > p{ background-color:#00ff00;}

</style>
</head>

<div id="lagas"><h1>Lagas</h1></div>
<div id="klar"><h1>Klar</h1></div>


<script>

async function fetchData() {
        try {
          const response = await fetch('./order.json');
          const data = await response.json();
          return data;
        } catch (error) {
          console.log('Error:', error);
          return null; // Return null in case of an error
        }
      }

async function display() {
        const ordrar = await fetchData(); // Get the array from the order.json file
	lagas = document.getElementById("lagas");
	klar = document.getElementById("klar");
	
	lagas.innerHTML = "<h1>Lagas</h1><br>"
	klar.innerHTML	= "<h1>Klar</h1><br>"

	for (var i = 0; i < ordrar.length; i++){
		if(ordrar[i][3] == true){ 
			var tick = klar.appendChild(document.createElement('p'));
			tick.innerHTML = i;
		}else{
			var tick = lagas.appendChild(document.createElement('p'));
			tick.innerHTML = i;
		}
	}

}
setInterval(function () {display();}, 500);

</script>

</html>
