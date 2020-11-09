<head>
<meta http-equiv="refresh" content="0; URL=erzeugen.php">
</head>
<?
@session_start();
if ($_SESSION['admin']!="admin") {
echo "<P><FONT FACE=\"Arial,sans-serif\">";
echo "<BODY LANG=\"de-DE\" BGCOLOR=\"#c0c0c0\"><H2>";
echo "Du bist nicht berechtigt!</H2>";
exit;
}
echo "<BODY LANG=\"de-DE\" BGCOLOR=\"#c0c0c0\">";
echo "<P><FONT FACE=\"Arial,sans-serif\">";
$z=($y-1);

$dir = "uploads";
$dr=$_SERVER['DOCUMENT_ROOT'];
$webroot = "$dr/weload/";
chdir ($dir);
$zielzeile = $z;
$lineno = 0;
$oldfile=".desc";
$old = fopen($oldfile, "r");
$new = fopen($oldfile."i", "w");

while($line = fgets($old)):
  if ($lineno != $zielzeile){
  fputs($new, $line);
$lineno=($lineno+1);
continue;
}

  if ($lineno == $zielzeile){
$punkt = "|";
$punktii="||";
$frageii = strchr ($line,"||");
$vorne = strpos($line,"|");


$filenamen = substr($line,0,$vorne);
if ($frageii == FALSE) {
$linie = "$filenamen|$hans
";
}

if ($frageii != FALSE) {
$hinten = strpos($line,$punktii);
$b = substr($line,$hinten);
$linie = "$filenamen|$hans$b";
}
echo "Beschreibung geändert in:<br> <H2>$hans </H2><br>";
  fputs($new, $linie);
$lineno=($lineno+1);

continue;


}

endwhile;

fclose($old); 
unlink($oldfile);
fclose($new);
rename($oldfile."i", $oldfile); 

chdir ($webroot);
?>