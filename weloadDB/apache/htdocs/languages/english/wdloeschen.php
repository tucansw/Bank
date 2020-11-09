<head>
<meta http-equiv="refresh" content="3; URL=webedit.php?y=$y">
</head>


<?
echo "<BODY LANG=\"de-DE\" BGCOLOR=\"#c0c0c0\">";
echo "<P><FONT FACE=\"Arial,sans-serif\">";
$dir = "$y";
$dr=$_SERVER['DOCUMENT_ROOT'];
$webroot = "$dr/weload/";
chdir ($dir);
$oldfile="imsmanifest.xml";
$old = fopen($oldfile, "r");
$new = fopen($oldfile."i", "w");

$zielzeile = $y;
$lineno = 0;

while($line = fgets($old, 1024)):
  if (++$lineno == $zielzeile){

$punkt = "://";
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

?>