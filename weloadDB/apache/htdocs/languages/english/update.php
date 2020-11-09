<?
@session_start();
if ($_SESSION['admin']!="admin") {
echo "<P><FONT FACE=\"Arial,sans-serif\">";
echo "<BODY LANG=\"de-DE\" BGCOLOR=\"#c0c0c0\"><H2>";
echo "Access denied!</H2>";
}

if ($_SESSION['admin']=="admin") {

$versionlocal ="0.92";
$versionlocalm = bcmul($versionlocal,100,0); 

echo "<P><FONT FACE=\"Arial,sans-serif\">";
echo "<BODY LANG=\"de-DE\" BGCOLOR=\"#c0c0c0\">";
echo "Local version of WeLOAD: <b>$versionlocal</b><br>";
echo "You need an intenet connection to perform this action.<br>";
echo "Connecting to WeLOAD Server...<br><hr><br>";

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
echo "Version on server: <b>$versionserver</b><br><br>";
$versionserverm=bcmul($versionserver,100,0);
if ($versionlocalm<$versionserverm) {
echo "A new version is available.<br>";
echo "<P><a href=\"http://weload.lernnetz.de/Dateien/weload_eng.exe\"align=\"Center\"><img src=\"../images/update.gif\" align=\"absmiddle\" BORDER =0 vspace=\"10\" hspace=\"10\">Download new version</a></P>";
}
if ($versionlocalm==$versionserverm) {
echo "You are working with the latest release. Update unneccessary<br>";
}
if ($versionlocalm>$versionserverm) {
echo "Ups??? Please get in contact with the programmer!<br>";
}
}
?>