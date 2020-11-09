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
$home = "$dr/weload/";
if ($userfile == "" && $notes=="") {
echo "No file and description detected!!! Maybe you want to check the control structures.";
echo "<form enctype=\"multipart/form-data\" action=\"erzeugen.php\" method=\"post\">";
echo "<P><INPUT type=submit value=back></FORM>";
exit;
}

if ($notes == "") {
echo "Missing note!";
echo "<form enctype=\"multipart/form-data\" action=\"erzeugen.php\" method=\"post\">";
echo "<P><INPUT type=submit value=back></FORM>";
exit;
}

if ($userfile == "") {
echo "Please choose a file!";
echo "<form enctype=\"multipart/form-data\" action=\"erzeugen.php\" method=\"post\">";
echo "<P><INPUT type=submit value=back></FORM>";
exit;
}
chdir ($uploaddir);
$upfile=$_FILES['userfile']['name'];
if(is_file($upfile)){
$upfile=$_FILES['userfile']['name'];
print "<pre>";
if (move_uploaded_file($_FILES['userfile']['tmp_name'], $uploaddir . $_FILES['userfile']['name'])) {
    print "\n";
} else {
    print "Operation failed. Something was wrong.\n";
    print_r($_FILES);
    exit;
}

echo "<BODY LANG=\"de-DE\" BGCOLOR=\"#c0c0c0\">";
echo "<P><FONT FACE=\"Arial,sans-serif\">";
echo "<H1>File successfully rewrited</H1>";
echo "<form enctype=\"multipart/form-data\" action=\"erzeugen.php\" method=\"post\">";
echo "<P><INPUT type=submit value=back></FORM>";
chdir ($home);
exit;
}

$upfile=$_FILES['userfile']['name'];
print "<pre>";
if (move_uploaded_file($_FILES['userfile']['tmp_name'], $uploaddir . $_FILES['userfile']['name'])) {
    print "\n";
} else {
    print "Operation failed. Something was wrong.\n";
    print_r($_FILES);
    exit;
}

echo "<BODY LANG=\"de-DE\" BGCOLOR=\"#c0c0c0\">";
echo "<P><FONT FACE=\"Arial,sans-serif\">";
echo "<H1>File uploaded successfully</H1>";
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
echo "<P><INPUT type=submit value=back></FORM>";
}
if ($_SESSION['admin']!="admin") {
echo "<P><FONT FACE=\"Arial,sans-serif\">";
echo "<BODY LANG=\"de-DE\" BGCOLOR=\"#c0c0c0\"><H2>";
echo "Access denied!</H2>";
}
?>
