<head>
<meta http-equiv="refresh" content="1; URL=erzeugen.php">
</head>

<?
@session_start();
if ($_SESSION['admin']=="admin") {
echo "<BODY LANG=\"de-DE\" BGCOLOR=\"#c0c0c0\">";
echo "<P><FONT FACE=\"Arial,sans-serif\">";
$dr=$_SERVER['DOCUMENT_ROOT'];
$laenge=strlen($dr);
$dr2 = substr($dr,2,$laenge);
$dr=$dr2;
$uploaddir = "$dr/weload/uploads/";

if ($upfile == "" && $notes=="") {
echo "Weder URL noch Beschreibung vorhanden!!! Wahrscheinlich wollen Sie nur die Kontrollstrukturen testen.";
echo "<form enctype=\"multipart/form-data\" action=\"erzeugen.php\" method=\"post\">";
echo "<P><INPUT type=submit value=Zur&uuml;ck></FORM>";
exit;
}

if ($upfile == "") {
echo "Internet-URL ist leer!";
echo "<form enctype=\"multipart/form-data\" action=\"erzeugen.php\" method=\"post\">";
echo "<P><INPUT type=submit value=Zur&uuml;ck></FORM>";
exit;
}

if ($notes == "") {
echo "Sie müssen das Kommentarfeld ausfüllen!!!";
echo "<form enctype=\"multipart/form-data\" action=\"erzeugen.php\" method=\"post\">";
echo "<P><INPUT type=submit value=Zur&uuml;ck></FORM>";
exit;
}

$punkt = "://";
$fragep = strchr ($upfile, $punkt);
if ($fragep == FALSE) {
echo "Dies ist keine URL!";
echo "<br>";
echo "Eine URL enthält immer ein http:// oder ftp:// am Anfang";
echo "<form enctype=\"multipart/form-data\" action=\"erzeugen.php\" method=\"post\">";
echo "<P><INPUT type=submit value=Zur&uuml;ck></FORM>";
exit;
}

echo "<BODY LANG=\"de-DE\" BGCOLOR=\"#c0c0c0\">";
echo "<P><FONT FACE=\"Arial,sans-serif\">";
echo "<H1>Link wurde eingestellt</H1>";
echo "<br>";
echo "Name:";
echo $upfile;
echo "<br>";
echo "Kommentar: ";
echo $notes;
echo "</FONT></P>";
chdir ($uploaddir);
$fpind = fopen (".desc","a+");
$headerind = "$upfile|$notes
"; 
fputs ($fpind,$headerind);
fclose ($fpind);
echo "<form enctype=\"multipart/form-data\" action=\"erzeugen.php\" method=\"post\">";
echo "<P><INPUT type=submit value=Zurück></FORM>";
}
if ($_SESSION['admin']!="admin") {
echo "<P><FONT FACE=\"Arial,sans-serif\">";
echo "<BODY LANG=\"de-DE\" BGCOLOR=\"#c0c0c0\"><H2>";
echo "Du bist nicht berechtigt!</H2>";
}

?>
