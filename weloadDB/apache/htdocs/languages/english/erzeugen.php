<?
@session_start();
if ($_SESSION['admin']!="admin") {
echo "<P><FONT FACE=\"Arial,sans-serif\">";
echo "<BODY LANG=\"de-DE\" BGCOLOR=\"#c0c0c0\"><H2>";
echo "Access denied!</H2>";
exit;
}
?>
<HTML>
<HEAD>
   <META HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=iso-8859-1">
   <META NAME="Author" CONTENT="Hartmut Karrasch">
   <TITLE>Create Content Package</TITLE>
</HEAD>
<BODY LANG="de-DE" BGCOLOR="#c0c0c0">
<P><FONT FACE="Arial,sans-serif">
   <H1>Create Content Package</H1>
<TABLE WIDTH=100% BORDER=1 CELLPADDING=4 CELLSPACING=3>
	<COL WIDTH=128*>
	<COL WIDTH=128*>
	<THEAD>
		<TR VALIGN=TOP>



			<TD WIDTH=30%>
				<img src="../images/file.gif" border=0>
<FONT FACE="Arial, sans-serif"><FONT SIZE=1 STYLE="font-size: 8pt">Add file
				<FORM ACTION="uploadE.php" METHOD="POST" ENCTYPE="multipart/form-data">

					<P><INPUT TYPE=FILE NAME="userfile" SIZE=16> 
					</P>
					<P><FONT FACE="Arial, sans-serif" <FONT SIZE=1 STYLE="font-size: 8pt">Description: &nbsp;<INPUT TYPE=TEXT NAME="notes" SIZE=20>
					</FONT>
					</P>
					<P><INPUT TYPE=SUBMIT VALUE="send"></P>
				</FORM>
				<P>
Options: <br>
<IMG SRC="../images/frame.gif">&nbsp;Normal&nbsp; &nbsp;
<IMG SRC="../images/download.gif">&nbsp;Downloadable file
				</P>
			</TD>
			<TD WIDTH=30%>
				<img src="../images/link.gif" border=0>
<FONT FACE="Arial, sans-serif"><FONT SIZE=1 STYLE="font-size: 8pt">Add link
				<FORM ACTION="uploadE2.php" METHOD="POST" ENCTYPE="multipart/form-data">
					<P><FONT FACE="Arial, sans-serif"<FONT SIZE=1 STYLE="font-size: 8pt">Internet-URL:<INPUT TYPE=TEXT NAME="upfile" SIZE=20>
					</FONT>
					</P>
					<P><FONT FACE="Arial, sans-serif"<FONT SIZE=1 STYLE="font-size: 8pt">Description:&nbsp;&nbsp;<INPUT TYPE=TEXT NAME="notes" SIZE=20>
					
					</P>
					<P><INPUT TYPE=SUBMIT VALUE="send"></P>
				</FORM>
Options: <br>
<IMG SRC="../images/frame.gif">&nbsp;Normal &nbsp; &nbsp;
<IMG SRC="../images/new_window.gif">&nbsp;New window
			</TD>
<TD WIDTH=40%>
<FONT FACE="Arial, sans-serif" FONT SIZE=1 STYLE="font-size: 8pt">Step 1: Create/upload files and links FIRST!
<br><br>Step 2: When finished enter a name for the Content Package HERE.<br>
<br>Name of Content Package: 
   <FORM enctype="multipart/form-data" method="POST" action="dirtest4.php">
   <INPUT type=text method=POST name=verz>
<INPUT type=submit value=create>
</FONT>
</FORM>

</TD>
		</TR>
	</THEAD>
</TABLE>
</BODY>
</HTML>
<?
@session_start();
if ($_SESSION['admin']=="admin") {

$uploads = "uploads";
chdir ($uploads);
echo "<TABLE WIDTH=100% BORDER=0 CELLPADDING=4 CELLSPACING=1 STYLE=\"page-break-before: always\">";
echo "	<COL WIDTH=128*>";
echo "	<COL WIDTH=128*>";
echo "<br>";
echo "<THEAD>";
echo "		<TR ALIGN=LEFT VALIGN=TOP>";
echo "			<TH WIDTH=15%>";
echo "				<P><FONT FACE=\"Arial,sans-serif\"FONT SIZE=2>Description</FONT></P>";
echo "			</TH>";
echo "			<TH WIDTH=10%>";
echo "				<P><FONT FACE=\"Arial, sans-serif\"FONT SIZE=2>&nbsp;&nbsp;&nbsp;Options</FONT></P>";
echo "			<TH WIDTH=15%>";
echo "				<P><FONT FACE=\"Arial,sans-serif\"FONT SIZE=2>File/Link</FONT></P>";
echo "			</TH>";
echo "			<TH WIDTH=10%>";
echo "				<P><FONT FACE=\"Arial,sans-serif\"FONT SIZE=2>&nbsp;&nbsp;&nbsp;Delete</FONT></P>";
echo "			</TH>";
echo "			</TH>";
echo "			<TH WIDTH=5%>";
echo "				<P><FONT FACE=\"Arial, sans-serif\"FONT SIZE=2></FONT></P>";
echo "			</TH>";
echo "			<TH WIDTH=5%>";
echo "				<P><FONT FACE=\"Arial, sans-serif\"FONT SIZE=2></FONT></P>";
echo "			</TH>";
echo "			<TH WIDTH=40%>";
echo "				<P><FONT FACE=\"Arial, sans-serif\"FONT SIZE=2></FONT></P>";
echo "			</TH>";
echo "		</TR>";
echo "	</THEAD>";
echo "  <TBODY>";
$dr=$_SERVER['DOCUMENT_ROOT'];
$docs = "$dr/weload/uploads/";
$liste =".desc";
$array = file($liste);
$r=count($array);
for($x=0;$x<count($array);$x++){  
$zeile= $array[$x];
$y = ($y+1);
$z=($z+0);
$punkt = "|";
$punktii="||";
$http ="://";
$fragel = strchr ($zeile, "://");
$fragep = strchr ($zeile, $punkt);
$frageii = strchr ($zeile, $punktii);
$lokal = "/weload/uploads/";

if ($fragep != FALSE) :
$vorne = strpos($zeile,"|");
$filenamen = substr($zeile,0,$vorne);

if ($frageii != FALSE) {
$hinten =strpos ($zeile,"||");
$beschreibungen = substr($zeile,$vorne+1,$hinten+2-$vorne-3);
}
if ($frageii == FALSE) {
$beschreibungen = substr($zeile,$vorne+1);
}


echo "		<TR VALIGN=TOP>";

echo "			<TD nowrap WIDTH=15%>";
echo "<form action=textaender.php?y=$y method=post>";
echo "<INPUT type=text name=hans size =\"30\"  value=\"$beschreibungen\">";
echo "<IMG SRC=\"../images/return.gif\" align=\"middle\" NAME=\"Edit\" BORDER=0>";
echo "</form>";
echo "			</TD>";


echo "<TD nowrap WIDTH=10%>";

if ($fragel != FALSE) {

if ($frageii != FALSE) {
echo "<form method=\"post\" action=\"optionshtml.php?y=$y & o=html\">";
echo "<input type=\"radio\" name=\"html\" value=1 onclick=\"this.form.submit()\"><IMG SRC=\"../images/frame.gif\" align=\"middle\">";
echo "<input type=\"radio\" name=\"html\" value=2 checked><IMG SRC=\"../images/new_window.gif\" align=\"middle\">";
echo "</form>";
echo "</TD>";

}
if ($frageii == FALSE) {

echo "<form method=\"post\" action=\"optionshtml.php?y=$y & o=html\">";
echo "<input type=\"radio\" name=\"html\" value=1 checked><IMG SRC=\"../images/frame.gif\">";
echo "<input type=\"radio\" name=\"html\" value=2 onclick=\"this.form.submit()\"><IMG SRC=\"../images/new_window.gif\">";
echo "</form>";
echo "</TD>";
}
}
if ($fragel == FALSE) {

if ($frageii != FALSE) {
echo "<form method=\"post\" action=\"optionsfile.php?y=$y & o=html\">";
echo "<input type=\"radio\" name=\"html\" value=1 onclick=\"this.form.submit()\"><IMG SRC=\"../images/frame.gif\">";
echo "<input type=\"radio\" name=\"html\" value=2 checked><IMG SRC=\"../images/download.gif\">";
echo "</form>";
echo "</TD>";

}
if ($frageii == FALSE) {

echo "<form method=\"post\" action=\"optionsfile.php?y=$y & o=html\">";
echo "<input type=\"radio\" name=\"html\" value=1 checked><IMG SRC=\"../images/frame.gif\">";
echo "<input type=\"radio\" name=\"html\" value=2 onclick=\"this.form.submit()\"><IMG SRC=\"../images/download.gif\">";
echo "</form>";
echo "</TD>";
}
}

echo "			<TD WIDTH=15%>";


if ($fragel != FALSE) {
$lokal = "";
}
echo "<A HREF=\"$lokal$filenamen\" target=\"_blank\"><FONT FACE=\"Arial, sans-serif\" FONT SIZE=1 STYLE=\"font-size: 10pt\" align=\"middle\">$filenamen</FONT>";
echo "</TD>";



echo "<TD nowrap WIDTH=10%>";
echo "<form action=\"dloeschen.php?y=$y\">";
echo "<div>";
echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp";
echo "<button name=\"Loeschen\" type=\"button\" value=\"$y\" onClick=\"self.location.href='dloeschen.php?y=$y'\">";
echo "<img src=\"../images/delete.gif\" border=0 alt=\"Delete\">";
echo "</button>";
echo "</div>";
echo "</form>";
echo "			</TD>";

if ($r==1 && $y==1){
echo "			<TD WIDTH=5%>";
echo " ";
echo "			</TD>";
echo "		</TR>";

echo "			<TD WIDTH=5%>";
echo " ";
echo "			</TD>";
echo "		</TR>";
}

if ($y==1 && $r!=1){
echo "			<TD WIDTH=5%>";
echo "<form action=\"dverschiebenu.php?y=$y\">";
echo "<div>";
echo "<button name=\"Loeschen\" type=\"button\" value=\"$y\" onClick=\"self.location.href='dverschiebenu.php?y=$y'\">";
echo "<img src=\"../images/down.gif\" border=0 alt=\"Down\">";
echo "</button>";
echo "</div>";
echo "</form>";
echo "			</TD>";
echo "			<TD WIDTH=5%>";
echo " ";
echo "			</TD>";
echo "</TR>";

}
if ($y==$r && $y!=1){
echo "			<TD WIDTH=5%>";
echo "<form action=\"dverschiebeno.php?y=$y\">";
echo "<div>";
echo "<button name=\"Loeschen\" type=\"button\" value=\"$y\" onClick=\"self.location.href='dverschiebeno.php?y=$y'\">";
echo "<img src=\"../images/up.gif\" border=0 alt=\"Up\">";
echo "</button>";
echo "</div></form>";
echo "			</TD>";
echo "			<TD WIDTH=5%>";
echo " ";
echo "			</TD>";
echo "		</TR>";
}

if ($y!=1 && $y!=$r){
echo "			<TD WIDTH=5%>";
echo "<form action=\"dverschiebenu.php?y=$y\">";
echo "<div>";
echo "<button name=\"Loeschen\" type=\"button\" value=\"$y\" onClick=\"self.location.href='dverschiebenu.php?y=$y'\">";
echo "<img src=\"../images/down.gif\" border=0 alt=\"Down\">";
echo "</button>";
echo "</div></form>";
echo "			</TD>";
echo "			<TD WIDTH=5%>";
echo "<form action=\"dverschiebeno.php?y=$y\">";
echo "<div>";
echo "<button name=\"Loeschen\" type=\"button\" value=\"$y\" onClick=\"self.location.href='dverschiebeno.php?y=$y'\">";
echo "<img src=\"../images/up.gif\" border=0 alt=\"Up\">";
echo "</button>";
echo "</div></form>";
echo "			</TD>";
echo "		</TR>";
}

continue;
endif;
}


echo "	</TBODY>";
echo "</TABLE>";
echo "<P>";
echo "</P>";
$liste =".desc";
$array = file($liste);
$r=count($array);
if ($r!=0) {
echo "<form action=\"vloeschen.php\">";
echo "<div>";
echo "Clearing upload area &nbsp;&nbsp;&nbsp;&nbsp;&nbsp";
echo "<button name=\"Loeschen\" type=\"button\" value=\"$y\" onClick=\"self.location.href='vloeschen.php'\">";
echo "<img src=\"../images/deldir.gif\" border=0 alt=\"Clearing upload area\">";
echo "</button>";
echo "</div>";
echo "</form>";
}
echo "</BODY>";
echo "</HTML>";
}
if ($_SESSION['admin']!="admin") {
echo "<P><FONT FACE=\"Arial,sans-serif\">";
echo "<BODY LANG=\"de-DE\" BGCOLOR=\"#c0c0c0\"><H2>";
echo "Access denied!</H2>";
}
?>
