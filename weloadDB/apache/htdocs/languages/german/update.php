<?
@session_start();
if ($_SESSION['admin']!="admin") {
echo "<P><FONT FACE=\"Arial,sans-serif\">";
echo "<BODY LANG=\"de-DE\" BGCOLOR=\"#c0c0c0\"><H2>";
echo "Du bist nicht berechtigt!</H2>";
}

if ($_SESSION['admin']=="admin") {

$versionlocal ="0.92";
$versionlocalm = bcmul($versionlocal,100,0); 

echo "<P><FONT FACE=\"Arial,sans-serif\">";
echo "<BODY LANG=\"de-DE\" BGCOLOR=\"#c0c0c0\">";
echo "Lokale WeLOAD-Version: <b>$versionlocal</b><br>";
echo "F&uuml;r diese Funktion wird eine Internetverbindung ben&ouml;tigt.<br>";
echo "Baue Verbindung zum WeLOAD-Server auf...<br><hr><br>";

//
function string_zerlegen ($gesamt, $startstring, $endstring)
{
$zwischen=explode ($startstring, $gesamt);
$ergebnis=explode ($endstring, $zwischen[1]);
return $ergebnis[0];
}

$url="http://weload.lernnetz.de/version.htm";
$starttext="<title>";
$endtext="</title>";
$seite= implode ('', file ($url));
$versionserver= string_zerlegen ($seite, $starttext, $endtext);
echo "Aktuelle Version auf dem Server: <b>$versionserver</b><br><br>";
$versionserverm=bcmul($versionserver,100,0);
if ($versionlocalm<$versionserverm) {
echo "Eine neue Version steht zum Download bereit.<br>";
echo "<P><a href=\"http://weload.lernnetz.de/Dateien/weload.exe\"align=\"Center\"><img src=\"../images/update.gif\" align=\"absmiddle\" BORDER =0 vspace=\"10\" hspace=\"10\">Neue Version downloaden</a></P>";
}
if ($versionlocalm==$versionserverm) {
echo "Sie arbeiten bereits mit der aktuellen Version. Update unn&ouml;tig<br>";
}
if ($versionlocalm>$versionserverm) {
echo "Huch??? Setzen Sie sich bitte mit dem Programmierer in Verbindung!<br>";
}
}
?>