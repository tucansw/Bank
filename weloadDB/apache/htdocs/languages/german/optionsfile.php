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
echo "<BODY LANG=\"de-DE\" BGCOLOR=\"#c0c0c0\" DIR=\"LTR\">";
echo "<H1><FONT FACE=\"Arial, sans-serif\">&Auml;ndere Datei-Option</H1>";
echo "<P><BR>";
if ($html!=2) {
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
$vorne = strpos($line,"|");
$hinten = strpos($line,"||");

$beschreibung = substr($line,$vorne+1,$vorne-$hinten);
$loeschenstr = strpos($beschreibung,"||");
$loeschen = substr($beschreibung,0,$loeschenstr);
$filenamen = substr($line,0,$vorne);
$kopief=$filenamen;
$filenamen = substr($line,$hinten+2);
$filenamen = chop($filenamen);
unlink ($filenamen);
$line= chop($line);
$linie = "$kopief|$loeschen
";
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
echo "<br>Fertig !</font></html>";
}
///NORMAL ENDE//////////////////////////////////////////////////////////
if ($html==2) {
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
$vorne = strpos($line,"|");
$hinten = strpos($line,"||");
$beschreibung = substr($line,$vorne+1);
$filenamen = substr($line,0,$vorne);

$kopief=$filenamen;
$copy1="$filenamen";
$copy2="$filenamen";
$array_1 = array("http://",",",".","=","?","&","/"," ");
$array_2 = array("w_","","","","","","","_");
for($h=0;$h<9;$h++){  
$copy2 = str_replace($array_1[$h],$array_2[$h],$copy2);
$filenamen=$copy2;
}
$strlaenge= strlen($filenamen);
if ($strlaenge>27) {
$filenamen= substr ($filenamen,0,27);
}
$ext=".html";
$ey=chop($y);
$filenamen="$filenamen$ey$ext";
//
$fpind = fopen ("$filenamen","w");


$headerind = "<html>
<HEAD>
	<META HTTP-EQUIV=\"CONTENT-TYPE\" CONTENT=\"text/html; charset=windows-1252\">
	<TITLE>$beschreibung</TITLE>
	<META NAME=\"AUTHOR\" CONTENT=\"Hartmut Karrasch\">
        <META LANGUAGE=\"deutsch\">
</HEAD>
<BODY LANG=\"de-DE\"  DIR=\"LTR\">
<P><FONT FACE=\"Arial, sans-serif\"><A HREF =\"$kopief\" target=\"_blank\"<H2>$beschreibung</A><br>
<FONT SIZE=1 STYLE=\"font-size: 8pt\">(Datei: $kopief downloaden)</H2></FONT>
</body></html>
"; 
fputs ($fpind,$headerind);
fclose ($fpind);



$line= chop($line);
$linie = "$line||$filenamen
";
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

echo "<br>Fertig !</font></html>";

}

?>