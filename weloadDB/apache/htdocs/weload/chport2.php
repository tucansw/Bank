<?
@session_start();
if ($_SESSION['admin']!="admin") {
echo "<P><FONT FACE=\"Arial,sans-serif\">";
echo "<BODY LANG=\"de-DE\" BGCOLOR=\"#c0c0c0\"><H2>";
echo "Du bist nicht berechtigt!</H2>";
}
$portaktuell=$HTTP_SERVER_VARS["SERVER_PORT"];
$dr=$_SERVER['DOCUMENT_ROOT'];
$dr2 = substr($dr,2,-7);
$confdir="$dr2/conf";
$weloaddir = "$dr/weload/";
$weloadeng ="$dr/languages/english/";
$weloadger ="$dr/languages/german/";
$phpmyadmin="$dr/phpMyAdmin/";

echo "<P><FONT FACE=\"Arial,sans-serif\">";
echo "<BODY LANG=\"de-DE\" BGCOLOR=\"#c0c0c0\">";
echo "<IMG SRC=\"../images/port.gif\" NAME=\"Port\" ALIGN=\"LEFT\" BORDER=\"0\"><br><br><br><br>";
if ($portaktuell==$portname) {
echo "Port <b>$portaktuell</b> wurde NICHT ge&auml;ndert.<br>";
echo "<form enctype=\"multipart/form-data\" action=\"chport.php\" method=\"get\">";
echo "<P><INPUT type=submit value=Zur&uuml;ck></FORM>";
exit;
}
if ($portname<80) {
echo "Ungew&ouml;hnlicher Port!<br>";
echo "Bitte erneut versuchen. Typische Ports sind zum Beispiel: 80, 8080, 8081 usw.";
echo "<form enctype=\"multipart/form-data\" action=\"chport.php\" method=\"get\">";
echo "<P><INPUT type=submit value=Zur&uuml;ck></FORM>";
exit;
}

if (is_integer((int)$portname)==FALSE) {
echo "Ungew&ouml;hnlicher Port!<br>";
echo "Bitte erneut versuchen. Typische Ports sind zum Beispiel: 80, 8080, 8081 usw.";
echo "<form enctype=\"multipart/form-data\" action=\"chport.php\" method=\"get\">";
echo "<P><INPUT type=submit value=Zur&uuml;ck></FORM>";
exit;
}


//Ports in Configs aendern
if ($portname != 80 AND $portaktuell==80) {


$fpind = fopen ("start.htm","w+");
$headerind = "<!DOCTYPE HTML PUBLIC \"-//W3C//DTD HTML 4.0 Transitional//EN\">
<HTML>
<HEAD>
	<META HTTP-EQUIV=\"CONTENT-TYPE\" CONTENT=\"text/html; charset=windows-1252\">
	<TITLE>Bitte etwas Geduld ...</TITLE>
	<META NAME=\"AUTHOR\" CONTENT=\"Hartmut Karrasch\">
<meta http-equiv=\"refresh\" content=\"2; URL=http://localhost:$portname/weload/index.htm\">
</head>
</HEAD>
<BODY LANG=\"de-DE\" BGCOLOR=\"#c0c0c0\" DIR=\"LTR\">
<H1><FONT FACE=\"Arial, sans-serif\">Bitte etwas Geduld ...</FONT></H1>
<ALIGN=CENTER><IMG SRC=\"../images/sanduhr.gif\" BORDER=\"0\" NAME=\"Grafik\"ALIGN=BOTTOM>
<P><BR>
</BODY>
</HTML>
"; 
fputs ($fpind,$headerind);
fclose ($fpind);

chdir ($weloadger);
$fpind = fopen ("start.htm","w+");
$headerind = "<!DOCTYPE HTML PUBLIC \"-//W3C//DTD HTML 4.0 Transitional//EN\">
<HTML>
<HEAD>
	<META HTTP-EQUIV=\"CONTENT-TYPE\" CONTENT=\"text/html; charset=windows-1252\">
	<TITLE>Bitte etwas Geduld ...</TITLE>
	<META NAME=\"AUTHOR\" CONTENT=\"Hartmut Karrasch\">
<meta http-equiv=\"refresh\" content=\"2; URL=http://localhost:$portname/weload/index.htm\">
</head>
</HEAD>
<BODY LANG=\"de-DE\" BGCOLOR=\"#c0c0c0\" DIR=\"LTR\">
<H1><FONT FACE=\"Arial, sans-serif\">Bitte etwas Geduld ...</FONT></H1>
<ALIGN=CENTER><IMG SRC=\"../images/sanduhr.gif\" BORDER=\"0\" NAME=\"Grafik\"ALIGN=BOTTOM>
<P><BR>
</BODY>
</HTML>
"; 
fputs ($fpind,$headerind);
fclose ($fpind);

chdir ($weloadeng);

$fpind = fopen ("start.htm","w+");
$headerind = "<!DOCTYPE HTML PUBLIC \"-//W3C//DTD HTML 4.0 Transitional//EN\">
<HTML>
<HEAD>
	<META HTTP-EQUIV=\"CONTENT-TYPE\" CONTENT=\"text/html; charset=windows-1252\">
	<TITLE>Please wait ...</TITLE>
	<META NAME=\"AUTHOR\" CONTENT=\"Hartmut Karrasch\">
<meta http-equiv=\"refresh\" content=\"2; URL=http://localhost:$portname/weload/index.htm\">
</head>
</HEAD>
<BODY LANG=\"de-DE\" BGCOLOR=\"#c0c0c0\" DIR=\"LTR\">
<H1><FONT FACE=\"Arial, sans-serif\">Please wait ...</FONT></H1>
<ALIGN=CENTER><IMG SRC=\"../images/sanduhr.gif\" BORDER=\"0\" NAME=\"Grafik\"ALIGN=BOTTOM>
<P><BR>
</BODY>
</HTML>
"; 
fputs ($fpind,$headerind);
fclose ($fpind);

chdir ($confdir);
$zielzeile="Port $portaktuell";
$zielzeile = chop($zielzeile);
$oldfile="httpd.conf.template";
$old = fopen($oldfile, "r");
$new = fopen($oldfile."i", "w");
while($line = fgets($old)):
$fragep = strchr ($line, $zielzeile);
if ($fragep == FALSE) {
fputs($new, $line);
continue;
}
if ($fragep != FALSE) {
$line ="Port $portname
";
fputs($new, $line);
continue;
}
endwhile;
fclose($old); 
unlink($oldfile);
fclose($new);
rename($oldfile."i", $oldfile);
chdir ($weloaddir);


//ANFANG

chdir ($phpmyadmin);
$zielzeile="\$cfg['PmaAbsoluteUri'] = 'http://localhost/phpMyAdmin';";
$zielzeile = chop($zielzeile);
$oldfile="config.inc.php";
$old = fopen($oldfile, "r");
$new = fopen($oldfile."i", "w");
while($line = fgets($old)):
$fragep = strchr ($line, $zielzeile);
if ($fragep == FALSE) {
fputs($new, $line);
continue;
}
if ($fragep != FALSE) {
$line ="\$cfg['PmaAbsoluteUri'] = 'http://localhost:$portname/phpMyAdmin';
";
fputs($new, $line);
continue;
}
endwhile;
fclose($old); 
unlink($oldfile);
fclose($new);
rename($oldfile."i", $oldfile);
chdir ($weloaddir);
}

//ENDE

if ($portname == 80 AND $portaktuell !=80) {

$fpind = fopen ("start.htm","w+");
$headerind = "<!DOCTYPE HTML PUBLIC \"-//W3C//DTD HTML 4.0 Transitional//EN\">
<HTML>
<HEAD>
	<META HTTP-EQUIV=\"CONTENT-TYPE\" CONTENT=\"text/html; charset=windows-1252\">
	<TITLE>Bitte etwas Geduld ...</TITLE>
	<META NAME=\"AUTHOR\" CONTENT=\"Hartmut Karrasch\">
<meta http-equiv=\"refresh\" content=\"2; URL=http://localhost/weload/index.htm\">
</head>
</HEAD>
<BODY LANG=\"de-DE\" BGCOLOR=\"#c0c0c0\" DIR=\"LTR\">
<H1><FONT FACE=\"Arial, sans-serif\">Bitte etwas Geduld ...</FONT></H1>
<ALIGN=CENTER><IMG SRC=\"../images/sanduhr.gif\" BORDER=\"0\" NAME=\"Grafik\"ALIGN=BOTTOM>
<P><BR>
</BODY>
</HTML>
"; 
fputs ($fpind,$headerind);
fclose ($fpind);

chdir ($weloadger);
$fpind = fopen ("start.htm","w+");
$headerind = "<!DOCTYPE HTML PUBLIC \"-//W3C//DTD HTML 4.0 Transitional//EN\">
<HTML>
<HEAD>
	<META HTTP-EQUIV=\"CONTENT-TYPE\" CONTENT=\"text/html; charset=windows-1252\">
	<TITLE>Bitte etwas Geduld ...</TITLE>
	<META NAME=\"AUTHOR\" CONTENT=\"Hartmut Karrasch\">
<meta http-equiv=\"refresh\" content=\"2; URL=http://localhost/weload/index.htm\">
</head>
</HEAD>
<BODY LANG=\"de-DE\" BGCOLOR=\"#c0c0c0\" DIR=\"LTR\">
<H1><FONT FACE=\"Arial, sans-serif\">Bitte etwas Geduld ...</FONT></H1>
<ALIGN=CENTER><IMG SRC=\"../images/sanduhr.gif\" BORDER=\"0\" NAME=\"Grafik\"ALIGN=BOTTOM>
<P><BR>
</BODY>
</HTML>
"; 
fputs ($fpind,$headerind);
fclose ($fpind);

chdir ($weloadeng);

$fpind = fopen ("start.htm","w+");
$headerind = "<!DOCTYPE HTML PUBLIC \"-//W3C//DTD HTML 4.0 Transitional//EN\">
<HTML>
<HEAD>
	<META HTTP-EQUIV=\"CONTENT-TYPE\" CONTENT=\"text/html; charset=windows-1252\">
	<TITLE>Please wait ...</TITLE>
	<META NAME=\"AUTHOR\" CONTENT=\"Hartmut Karrasch\">
<meta http-equiv=\"refresh\" content=\"2; URL=http://localhost/weload/index.htm\">
</head>
</HEAD>
<BODY LANG=\"de-DE\" BGCOLOR=\"#c0c0c0\" DIR=\"LTR\">
<H1><FONT FACE=\"Arial, sans-serif\">Please wait ...</FONT></H1>
<ALIGN=CENTER><IMG SRC=\"../images/sanduhr.gif\" BORDER=\"0\" NAME=\"Grafik\"ALIGN=BOTTOM>
<P><BR>
</BODY>
</HTML>
"; 
fputs ($fpind,$headerind);
fclose ($fpind);

chdir ($confdir);
$zielzeile="Port $portaktuell";
$zielzeile = chop($zielzeile);
$oldfile="httpd.conf.template";
$old = fopen($oldfile, "r");
$new = fopen($oldfile."i", "w");
while($line = fgets($old)):
$fragep = strchr ($line, $zielzeile);
if ($fragep == FALSE) {
fputs($new, $line);
continue;
}
if ($fragep != FALSE) {
$line ="Port $portname
";
fputs($new, $line);
continue;
}
endwhile;
fclose($old); 
unlink($oldfile);
fclose($new);
rename($oldfile."i", $oldfile);
chdir ($weloaddir);


chdir ($phpmyadmin);
$zielzeile="\$cfg['PmaAbsoluteUri'] = 'http://localhost:$portaktuell/phpMyAdmin';";
$zielzeile = chop($zielzeile);
$oldfile="config.inc.php";
$old = fopen($oldfile, "r");
$new = fopen($oldfile."i", "w");
while($line = fgets($old)):
$fragep = strchr ($line, $zielzeile);
if ($fragep == FALSE) {
fputs($new, $line);
continue;
}
if ($fragep != FALSE) {
$line ="\$cfg['PmaAbsoluteUri'] = 'http://localhost/phpMyAdmin';
";
fputs($new, $line);
continue;
}
endwhile;
fclose($old); 
unlink($oldfile);
fclose($new);
rename($oldfile."i", $oldfile);
chdir ($weloaddir);
}


if ($portname != 80 AND $portaktuell !=80) {

$fpind = fopen ("start.htm","w+");
$headerind = "<!DOCTYPE HTML PUBLIC \"-//W3C//DTD HTML 4.0 Transitional//EN\">
<HTML>
<HEAD>
	<META HTTP-EQUIV=\"CONTENT-TYPE\" CONTENT=\"text/html; charset=windows-1252\">
	<TITLE>Bitte etwas Geduld ...</TITLE>
	<META NAME=\"AUTHOR\" CONTENT=\"Hartmut Karrasch\">
<meta http-equiv=\"refresh\" content=\"2; URL=http://localhost:$portname/weload/index.htm\">
</head>
</HEAD>
<BODY LANG=\"de-DE\" BGCOLOR=\"#c0c0c0\" DIR=\"LTR\">
<H1><FONT FACE=\"Arial, sans-serif\">Bitte etwas Geduld ...</FONT></H1>
<ALIGN=CENTER><IMG SRC=\"../images/sanduhr.gif\" BORDER=\"0\" NAME=\"Grafik\"ALIGN=BOTTOM>
<P><BR>
</BODY>
</HTML>
"; 
fputs ($fpind,$headerind);
fclose ($fpind);

chdir ($weloadger);
$fpind = fopen ("start.htm","w+");
$headerind = "<!DOCTYPE HTML PUBLIC \"-//W3C//DTD HTML 4.0 Transitional//EN\">
<HTML>
<HEAD>
	<META HTTP-EQUIV=\"CONTENT-TYPE\" CONTENT=\"text/html; charset=windows-1252\">
	<TITLE>Bitte etwas Geduld ...</TITLE>
	<META NAME=\"AUTHOR\" CONTENT=\"Hartmut Karrasch\">
<meta http-equiv=\"refresh\" content=\"2; URL=http://localhost:$portname/weload/index.htm\">
</head>
</HEAD>
<BODY LANG=\"de-DE\" BGCOLOR=\"#c0c0c0\" DIR=\"LTR\">
<H1><FONT FACE=\"Arial, sans-serif\">Bitte etwas Geduld ...</FONT></H1>
<ALIGN=CENTER><IMG SRC=\"../images/sanduhr.gif\" BORDER=\"0\" NAME=\"Grafik\"ALIGN=BOTTOM>
<P><BR>
</BODY>
</HTML>
"; 
fputs ($fpind,$headerind);
fclose ($fpind);

chdir ($weloadeng);

$fpind = fopen ("start.htm","w+");
$headerind = "<!DOCTYPE HTML PUBLIC \"-//W3C//DTD HTML 4.0 Transitional//EN\">
<HTML>
<HEAD>
	<META HTTP-EQUIV=\"CONTENT-TYPE\" CONTENT=\"text/html; charset=windows-1252\">
	<TITLE>Please wait ...</TITLE>
	<META NAME=\"AUTHOR\" CONTENT=\"Hartmut Karrasch\">
<meta http-equiv=\"refresh\" content=\"2; URL=http://localhost:$portname/weload/index.htm\">
</head>
</HEAD>
<BODY LANG=\"de-DE\" BGCOLOR=\"#c0c0c0\" DIR=\"LTR\">
<H1><FONT FACE=\"Arial, sans-serif\">Please wait ...</FONT></H1>
<ALIGN=CENTER><IMG SRC=\"../images/sanduhr.gif\" BORDER=\"0\" NAME=\"Grafik\"ALIGN=BOTTOM>
<P><BR>
</BODY>
</HTML>
"; 
fputs ($fpind,$headerind);
fclose ($fpind);

chdir ($confdir);
$zielzeile="Port $portaktuell";
$zielzeile = chop($zielzeile);
$oldfile="httpd.conf.template";
$old = fopen($oldfile, "r");
$new = fopen($oldfile."i", "w");
while($line = fgets($old)):
$fragep = strchr ($line, $zielzeile);
if ($fragep == FALSE) {
fputs($new, $line);
continue;
}
if ($fragep != FALSE) {
$line ="Port $portname
";
fputs($new, $line);
continue;
}
endwhile;
fclose($old); 
unlink($oldfile);
fclose($new);
rename($oldfile."i", $oldfile);
chdir ($weloaddir);


chdir ($phpmyadmin);
$zielzeile="\$cfg['PmaAbsoluteUri'] = 'http://localhost:$portaktuell/phpMyAdmin';";
$zielzeile = chop($zielzeile);
$oldfile="config.inc.php";
$old = fopen($oldfile, "r");
$new = fopen($oldfile."i", "w");
while($line = fgets($old)):
$fragep = strchr ($line, $zielzeile);
if ($fragep == FALSE) {
fputs($new, $line);
continue;
}
if ($fragep != FALSE) {
$line ="\$cfg['PmaAbsoluteUri'] = 'http://localhost:$portname/phpMyAdmin';
";
fputs($new, $line);
continue;
}
endwhile;
fclose($old); 
unlink($oldfile);
fclose($new);
rename($oldfile."i", $oldfile);
chdir ($weloaddir);
}

//ENDE
echo "Port wurde ge&auml;ndert von Port $portaktuell auf: <br> <b> Port $portname </b><br><br><br><br>";
echo "Bitte WeLOAD in der Taskleiste beenden und WeLOAD neu starten.<br>";
echo "Am einfachsten geht dies mit einem Doppelklick auf die Datei \"StartAll_automatic.bat\" im Verzeichnis:<br>";
$dr=$_SERVER['DOCUMENT_ROOT'];
$dr2 = substr($dr,0,-14);
echo "<b>$dr2</b><br>";
echo "Bitte auch dieses Browser-Fenster schließen.";
?>
