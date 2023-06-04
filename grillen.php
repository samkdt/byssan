<!DOCTYPE html>
<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
<meta name="viewport" content="width=devise-width, initial-scale=1">
<meta charset="UTF-8">
<title>BYSSAN - GRILLEN</title>
<style>
table {
  border-collapse: collapse;
  width: 100%;
  font-size:25px;
}

td, th {
  border: 2px solid #dddddd;
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #dddddd;
}
</style>
</head>

<?PHP
$klar = (int)$_GET['klar'];
$lista=json_decode(file_get_contents("order.json"));
if ( $lista[$klar][3] == false){
$lista[$klar][3] = true;
}
file_put_contents("./order.json", json_encode($lista));
?>

<table>
<thead>
    <tr>
	<th>id</th>
	<th>antal</th>
	<th>vad</th>
	<th>gnäll</th>
	<th>klar</th>
    </tr>
  </thead>
<tbody id=lista>
</tbody>
</table>

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
	lista=document.getElementById("lista");
	lista.innerHTML="";
	for(let i = 0; i < ordrar.length; i++){
	if(ordrar[i][3]){continue;}
	var rad = lista.appendChild(document.createElement('tr'));
	var col = rad.appendChild(document.createElement('td'));
	col.innerHTML = i;
		for(let j = 0; j < ordrar[i].length-1; j++){
			var col = rad.appendChild(document.createElement('td'));
			col.innerHTML = ordrar[i][j];
		}
			var col = rad.appendChild(document.createElement('td'));
			col.innerHTML = '<a href="?klar='+i+'">[KLAR]</a>';
	}	
}
setInterval(function () {display();}, 500);

</script>

</html>
