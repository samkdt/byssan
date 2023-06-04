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
grid-template-columns: 25% 50%;
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
echo "<p>".$_POST["antal"]."</p><br><p>".$_POST["vad"]."</p><br><p>".$_POST["matgnall"]."</p><br><p>";

$db = new SQLite3('ordrar.db');

$sok = $db->query('SELECT * FROM ordrar');
$lista = $sok->fetchArray();
var_dump($lista);

$db->close();

?>
</div>


<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
<h1>Ta Bestälning</h1>
<input type="number" name="antal" min="1" max="20" step="1" value="1">
<br>
<div id="vad">
<div><p>BÖRGER</p><input type="radio" name="vad" value="enkel burgare"></div>
<div><p>BACON BÖRGER</p> <input type="radio" name="vad" value="bacon burgare"></div>
<div><p>BYSSAN SPECIAL</p><input type="radio" name="vad" value="Byssan Special"></div>
</div>
<br>
<div class="gnall">
<div><p>vegetarisk</p><input type="checkbox" name="gnall" value="vegetarisk"></div>
<div><p>gluten</p><input type="checkbox" name="gnall" value="gluten"></div>
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
</div>
<br>
<input type="hidden" name="matgnall" >
<input type="submit" value="skicka">
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
document.getElementsByName("matgnall")[0].value=list;
}
for (let i = 0; i <check.length ; i++) {
check[i].addEventListener("click", gnall);
}
</script


</body>
</html>
