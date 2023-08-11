<!DOCTYPE html>
<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
<meta name="viewport" content="width=devise-width, initial-scale=1">
<meta charset="UTF-8">
<title>BYSSAN - PUBBEN</title>
<style>
body{
display: grid;
grid-template-columns: 40% 50%;
font-size:30px;
}
#antal{
font-size: 50px;
margin: auto;
width: 100%;
text-align: center;
}

input {
	width: 100%;
	font-size: 50px;
	padding: 10px;
	margin: 5px;
}

#vad,.gnall  {
  display: flex;
  flex-wrap:wrap;
}
#vad div,.gnall div {
  border: dotted;
  display: block;
  margin: auto;
  text-align: center;
  min-width: 4em;
}
br{
display:block;
width: 100vw;
height:0px;
}
</style>
</head>

<body>

<div id="senaste">
<h1>Senaste bästelning</h1>
<?php
$lista=json_decode(file_get_contents("order.json"));
echo "<h3>BÄSTELLNING ".sizeof($lista)."</h3><p>".$_POST["antal"]." x ".$_POST["vad"]."</p><p>".$_POST["matgnall"]."</p><br><p>";

if (!is_null($_POST["vad"])) {
$order=array($_POST["antal"], $_POST["vad"], $_POST["matgnall"],false);
array_push($lista, $order);
file_put_contents("./order.json", json_encode($lista));
}

?>
</div>


<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
<h1>Ta Bestälning</h1>
<input id="antal" type="number" name="antal" min="1" max="20" step="1" value="1">
<br>
<div id="vad">
<div><p>BÖRGER</p><input type="radio" name="vad" value="enkel burgare"></div>
<div><p>BACON BÖRGER</p> <input type="radio" name="vad" value="bacon burgare"></div>
<div><p>BYSSAN SPECIAL</p><input type="radio" name="vad" value="Byssan Special"></div>
</div>
<br>
<div class="gnall">
<div><p>vegetarisk</p><input type="checkbox" name="gnall" value="vegetarisk"></div>
<div><p>glutenfri</p><input type="checkbox" name="gnall" value="gluten"></div>
</div>
<br>
<div class="gnall">
<div><p>ingen ost</p><input type="checkbox" name="gnall" value="ingen ost"></div>
<div><p>ingen tomat</p><input type="checkbox" name="gnall" value="ingen tomat"></div>
<div><p>ingen salad</p><input type="checkbox" name="gnall" value="ingen salad"></div>
<div><p>ingen lök</p><input type="checkbox" name="gnall" value="ingen lök"></div>
</div>
<br>
<div class="gnall">
<div><p>ingen ketchup</p><input type="checkbox" name="gnall" value="ingen ketchup"></div>
<div><p>ingen dressing</p><input type="checkbox" name="gnall" value="ingen dressing"></div>
<br>
<input id="ovrigt" type="text" name="ovrigt">
</div>
<br>
<input type="hidden" name="matgnall" >
<input id="klar" type="submit" value="skicka">
</div>
<script>
var check=document.getElementsByName("gnall");
function gnall(){
var list ="";
console.log(check.length);
for (let i = 0; i <check.length ; i++) {
if( check[i].checked == true){
list+=check[i].value+", ";
}
}
list += document.getElementById("ovrigt").value+", ";
document.getElementsByName("matgnall")[0].value=list;
}

for (let i = 0; i <check.length ; i++) {
check[i].addEventListener("click", gnall);
}
document.getElementById("ovrigt").addEventListener("keyup", gnall);

function stor(){
for (let i = 0; i <document.getElementById('vad').getElementsByTagName('div').length ; i++){
document.getElementById('vad').getElementsByTagName('div')[i].addEventListener("click", function(){document.getElementById('vad').getElementsByTagName('div')[i].getElementsByTagName('input')[0].checked=true;});
}
for (let j = 0; j <document.getElementsByClassName('gnall').length ; j++){
for (let i = 0; i <document.getElementsByClassName('gnall')[j].getElementsByTagName('div').length ; i++){
document.getElementsByClassName('gnall')[j].getElementsByTagName('div')[i].addEventListener("click", function(){
if(document.getElementsByClassName('gnall')[j].getElementsByTagName('div')[i].getElementsByTagName('input')[0].checked){
document.getElementsByClassName('gnall')[j].getElementsByTagName('div')[i].getElementsByTagName('input')[0].checked=false;
}else{
document.getElementsByClassName('gnall')[j].getElementsByTagName('div')[i].getElementsByTagName('input')[0].checked=true;
}});
}}
}

stor();

</script>


</body>
</html>
