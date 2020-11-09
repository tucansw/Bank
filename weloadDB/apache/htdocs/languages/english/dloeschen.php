<head>
<meta http-equiv="refresh" content="0; URL=erzeugen.php">
</head>


<?
@session_start();
if ($_SESSION['admin']!="admin") {
echo "<P><FONT FACE=\"Arial,sans-serif\">";
echo "<BODY LANG=\"de-DE\" BGCOLOR=\"#c0c0c0\"><H2>";
echo "Access denied!</H2>";
exit;
}
echo "<BODY LANG=\"de-DE\" BGCOLOR=\"#c0c0c0\">";
echo "<P><FONT FACE=\"Arial,sans-serif\"><H4>";
$dir = "uploads";
$dr=$_SERVER['DOCUMENT_ROOT'];
$webroot = "$dr/weload/";
chdir ($dir);
$oldfile=".desc";
$old = fopen($oldfile, "r");
$new = fopen($oldfile."i", "w");

$zielzeile = $y;
$lineno = 0;

while($line = fgets($old, 1024)):
  if (++$lineno == $zielzeile){
$punktii="||";
$punkt = "://";
$frageii= strchr ($line, $punktii);
$fragep = strchr ($line, $punkt);

if ($frageii == FALSE) {
if ($fragep != FALSE) {
$vorne = strpos($line,"|");
$name = substr($line,0,$vorne);
echo "Link $name deleted";

}
if ($fragep == FALSE) {
$vorne = strpos($line,"|");
$name = substr($line,0,$vorne);
unlink ($name);
echo "File $name deleted";
}
}


if ($frageii != FALSE) {
if ($fragep != FALSE) {
$hinten = strpos($line,"||");
$wname = substr($line,$hinten+2);
$wname =chop($wname);
unlink ($wname);

$vorne = strpos($line,"|");
$name = substr($line,0,$vorne);
echo "Link $name deleted";
}
if ($fragep == FALSE) {
$vorne = strpos($line,"|");
$name = substr($line,0,$vorne);
unlink ($name);
$hinten = strpos($line,"||");
$wname = substr($line,$hinten+2);
$wname =chop($wname);
unlink ($wname);
echo "File $name deleted";
}
}

continue;  # Zeile auslassen
}
  fputs($new, $line);
endwhile;
echo "</FONT>";
fclose($old); 
unlink($oldfile);
fclose($new);
rename($oldfile."i", $oldfile); 

chdir ($webroot);

?>