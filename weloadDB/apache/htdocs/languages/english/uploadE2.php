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
echo "No URL and description detected!!! Maybe you want to check the control structures.";
echo "<form enctype=\"multipart/form-data\" action=\"erzeugen.php\" method=\"post\">";
echo "<P><INPUT type=submit value=back></FORM>";
exit;
}

if ($upfile == "") {
echo "Internet-URL is empty!";
echo "<form enctype=\"multipart/form-data\" action=\"erzeugen.php\" method=\"post\">";
echo "<P><INPUT type=submit value=back></FORM>";
exit;
}

if ($notes == "") {
echo "Missing note!!!";
echo "<form enctype=\"multipart/form-data\" action=\"erzeugen.php\" method=\"post\">";
echo "<P><INPUT type=submit value=back></FORM>";
exit;
}

$punkt = "://";
$fragep = strchr ($upfile, $punkt);
if ($fragep == FALSE) {
echo "This is no URL!";
echo "<br>";
echo "At the beginning of the URL you have to type http:// or ftp://";
echo "<form enctype=\"multipart/form-data\" action=\"erzeugen.php\" method=\"post\">";
echo "<P><INPUT type=submit value=back></FORM>";
exit;
}

echo "<BODY LANG=\"de-DE\" BGCOLOR=\"#c0c0c0\">";
echo "<P><FONT FACE=\"Arial,sans-serif\">";
echo "<H1>Link created successfully</H1>";
echo "<br>";
echo "Name:";
echo $upfile;
echo "<br>";
echo "Note: ";
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
echo "Access denied!</H2>";
}

?>
