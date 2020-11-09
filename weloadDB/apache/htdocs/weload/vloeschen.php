<head>
<meta http-equiv="refresh" content="1; URL=erzeugen.php">
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
$dir = "uploads";
$dr=$_SERVER['DOCUMENT_ROOT'];
$uploads = "$dr/weload/uploads/";
$webroot = "$dr/weload/";
echo "Mache Upload-Bereich frei...fertig!<br>";
$verz=opendir ($dir);

while (false !== ($file = readdir ($verz))) {

if($file != "." && $file != "..") {
$fpliste = fopen ("verzeichnisse.txt","a+");
$headerliste = "$file";

$headerliste ="$headerliste\n";
fputs ($fpliste,$headerliste);
fclose ($fpliste);
}
}
closedir($verz);

$liste ="verzeichnisse.txt";
$array = file($liste);
$r=count($array);
for($x=0;$x<count($array);$x++){ 
$zeile= $array[$x];
$zeile= chop($zeile);
chdir ($uploads);
unlink ($zeile);
chdir ($webroot);
}
chdir ($webroot);
unlink ($liste);
$reloadkram ="$dr/cp/";
chdir ($reloadkram);
$copy1=".desc";
$ziel1 =("$uploads$copy1");
copy ($copy1,$ziel1);
chdir ($webroot);
?> 