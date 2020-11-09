<?
echo "<BODY LANG=\"de-DE\" BGCOLOR=\"#c0c0c0\">";
echo "<P><FONT FACE=\"Arial,sans-serif\">";
$x=$z;
$x=($x-1);
echo $z;
echo "<br>";
$dr=$_SERVER['DOCUMENT_ROOT'];
$uploads = "$dr/weload/uploads";
chdir ($uploads);
$liste =".desc";
$array = file($liste);
$zeile= $array[$x];
$punkt = "|";
$vorne = strpos($zeile,"|");
$b = substr($zeile,$vorne+1);
echo $b;
echo "<form action=textaender.php method=post>";
echo "<INPUT type=text name=hans value=\"$b\"></form>";
exit;

$dir = "uploads";
$webroot = "$dr/weload/";
chdir ($dir);
$oldfile=".desc";
$old = fopen($oldfile, "r");
$new = fopen($oldfile."i", "w");

$zielzeile = $z;
$lineno = 0;

while($line = fgets($old, 1024)):
  if (++$lineno == $zielzeile){

$punkt = "";
$fragep = strchr ($line, $punkt);
if ($fragep != FALSE) {
echo "Link $line deleted";
}
if ($fragep == FALSE) {
$vorne = strpos($line,"|");
$name = substr($line,0,$vorne);
unlink ($name);
echo "File $name deleted";
}
//echo "Durchlauf: ";
//$z=$z+1;
//echo $z;
//echo "<br>";

continue;  # Zeile auslassen
}
  fputs($new, $line);
endwhile;

fclose($old); 
unlink($oldfile);
fclose($new);
rename($oldfile."i", $oldfile); 

chdir ($webroot);
echo "</body>";
echo "</HTML>";
?>