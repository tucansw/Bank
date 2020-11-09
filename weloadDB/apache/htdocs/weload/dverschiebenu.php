<head>
<meta http-equiv="refresh" content="0; URL=erzeugen.php">
</head>


<?
echo "<BODY LANG=\"de-DE\" BGCOLOR=\"#c0c0c0\">";
echo "<P><FONT FACE=\"Arial,sans-serif\">";
echo "<H2>Verschiebe gerade</H2>";

$dir = "uploads";
$dr=$_SERVER['DOCUMENT_ROOT'];
$webroot = "$dr/weload/";
chdir ($dir);
$oldfile=".desc";
$old = fopen($oldfile, "r");
$new = fopen($oldfile."i", "w");

$zielzeile = $y;
$zielzeile2=($y+1);
$lineno = 0;

while($line = fgets($old, 1024)):
  if (++$lineno == $zielzeile){

$zwi = ".zwi";
$newzwi = fopen($zwi, "w");
  fputs($newzwi, $line);
fclose($newzwi);
continue;
}

if ($lineno == $zielzeile2) {

$b=fopen($zwi, "r");
$er=fgets($b,1024);
fclose($b);
  fputs($new, $line);
  fputs($new, $er);
continue;
}

if ($lineno != $zielzeile && $lineno != $zielzeile2) {
  fputs($new, $line);
continue;
}

endwhile;

fclose($old); 
unlink($oldfile);
fclose($new);
rename($oldfile."i", $oldfile); 
unlink($zwi);
chdir ($webroot);

?>