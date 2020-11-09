<?
@session_start();
if ($_SESSION['admin']!="admin") {
echo "<P><FONT FACE=\"Arial,sans-serif\">";
echo "<BODY LANG=\"de-DE\" BGCOLOR=\"#c0c0c0\"><H2>";
echo "Access denied!</H2>";
exit;
}
echo "<P><FONT FACE=\"Arial,sans-serif\">";
echo "<BODY LANG=\"de-DE\" BGCOLOR=\"#c0c0c0\">";
echo "<BODY>";
echo "<IMG SRC=\"../images/port.gif\" NAME=\"Port\" ALIGN=\"LEFT\" BORDER=\"0\"><br>";
$port=$HTTP_SERVER_VARS["SERVER_PORT"];
echo "<br><br>Standard Port for webservers is Port 80.<br>";
echo "In some cases it could be useful or necessary, to change the port.<br>";
echo "Common other ports for webservers are port 8080, 8081 etc.<br>";
echo "<br>Active Port: ";
echo "<b>$port</b><br>";

if ($port != 80) {
$fpind = fopen ("start.htm","w+");
$headerind = "<!DOCTYPE HTML PUBLIC \"-//W3C//DTD HTML 4.0 Transitional//EN\">
<HTML>
<HEAD>
	<META HTTP-EQUIV=\"CONTENT-TYPE\" CONTENT=\"text/html; charset=windows-1252\">
	<TITLE>Please wait ...</TITLE>
	<META NAME=\"AUTHOR\" CONTENT=\"Hartmut Karrasch\">
<meta http-equiv=\"refresh\" content=\"2; URL=http://localhost:$port/weload/index.htm\">
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
}

if ($port == 80) {
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
}


?>
<HTML>
<HEAD>
<P><FONT FACE="Arial,sans-serif">
<BODY LANG="de-DE" BGCOLOR="#c0c0c0">
</HEAD>
<BODY>

<BR><BR><h2>Change TCP/IP-Port </h2>
<FORM ACTION="chport2.php" METHOD="POST" type="text">
<P><FONT FACE="Arial, sans-serif">New Port:&nbsp;<INPUT TYPE=TEXT NAME="portname" SIZE=3 MAXLENGHT=4>
</P>
<P><INPUT TYPE=SUBMIT VALUE="Change Port"></P>
</FORM>
<br>
</BODY>
</HTML>
