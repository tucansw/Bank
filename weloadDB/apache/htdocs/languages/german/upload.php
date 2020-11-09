<?
echo "<BODY LANG=\"de-DE\" BGCOLOR=\"#c0c0c0\">";
echo "<P><FONT FACE=\"Arial,sans-serif\">";
$dr=$_SERVER['DOCUMENT_ROOT'];
$laenge=strlen($dr);
$dr2 = substr($dr,2,$laenge);
$dr=$dr2;
$uploaddir = "$dr/weload/uploads/";
$home = "$dr/weload/";
if ($userfile == "" && $notes=="") {
echo "Weder Datei noch Beschreibung vorhanden!!! Wahrscheinlich wollen Sie nur die Kontrollstrukturen testen.";
echo "<form enctype=\"multipart/form-data\" action=\"upload.htm\" method=\"get\">";
echo "<P><INPUT type=submit value=Zur&uuml;ck></FORM>";
exit;
}

if ($notes == "") {
echo "Bitte Kommentarfeld ausfüllen!";
echo "<form enctype=\"multipart/form-data\" action=\"upload.htm\" method=\"get\">";
echo "<P><INPUT type=submit value=Zur&uuml;ck></FORM>";
exit;
}

if ($userfile == "") {
echo "Keine Datei gewählt!";
echo "<form enctype=\"multipart/form-data\" action=\"upload.htm\" method=\"get\">";
echo "<P><INPUT type=submit value=Zur&uuml;ck></FORM>";
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
    print "Operation abgebrochen. Hier stimmt etwas nicht.\n";
    print_r($_FILES);
    exit;
}

echo "<BODY LANG=\"de-DE\" BGCOLOR=\"#c0c0c0\">";
echo "<P><FONT FACE=\"Arial,sans-serif\">";
echo "<H1>Datei wurde erfolgreich &uuml;berschrieben</H1>";
echo "<form enctype=\"multipart/form-data\" action=\"upload.htm\" method=\"get\">";
echo "<P><INPUT type=submit value=Zur&uuml;ck></FORM>";
chdir ($home);
exit;
}

$upfile=$_FILES['userfile']['name'];
print "<pre>";
if (move_uploaded_file($_FILES['userfile']['tmp_name'], $uploaddir . $_FILES['userfile']['name'])) {
    print "\n";
} else {
    print "Operation abgebrochen. Hier stimmt etwas nicht.\n";
    print_r($_FILES);
    exit;
}

echo "<BODY LANG=\"de-DE\" BGCOLOR=\"#c0c0c0\">";
echo "<P><FONT FACE=\"Arial,sans-serif\">";
echo "<H1>Datei wurde erfolgreich hochgeladen</H1>";
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

echo "<form enctype=\"multipart/form-data\" action=\"upload.htm\" method=\"get\">";
echo "<P><INPUT type=submit value=Zur&uuml;ck></FORM>";
?>
