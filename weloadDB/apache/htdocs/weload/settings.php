<?
@session_start();
if ($_SESSION['admin']=="admin") {
$portaktuell=$HTTP_SERVER_VARS["SERVER_PORT"];
echo "<HTML>";
echo "<HEAD>";
echo "	<META HTTP-EQUIV=\"CONTENT-TYPE\" CONTENT=\"text/html; charset=windows-1252\">";
echo "	<TITLE>Einstellungen</TITLE>";
echo "</HEAD>";
echo "<BODY LANG=\"de-DE\" BGCOLOR=\"#c0c0c0\" DIR=\"LTR\">";
echo "<TABLE WIDTH=600 BORDER=0 CELLPADDING=4 CELLSPACING=3 STYLE=\"page-break-before: always\">";
echo "	<COL WIDTH=200>";
echo "	<COL WIDTH=200>";
echo "	<COL WIDTH=200>";
echo "	<TR VALIGN=TOP>";
		
echo "    <TD WIDTH=200 height=\"106\">";
echo "      <P align=\"center\"><img src=\"../images/schluessel.gif\" width=\"73\" height=\"98\" align=\"absmiddle\"><BR>";
echo "      </P>";
echo "		</TD>";
		
echo "    <TD WIDTH=200> <P align=\"center\"><IMG SRC=\"../images/flag_german.gif\" NAME=\"Graphic2\" ALIGN=absmiddle WIDTH=36 HEIGHT=24 BORDER=0><BR CLEAR=LEFT>";
echo "        <BR>";
echo "        <img src=\"../images/flag_english.gif\" width=\"36\" height=\"24\">";
echo "        <BR>";
echo "      </P>";
echo "      </TD>";
echo "    <TD WIDTH=215> <P align=\"center\"><img src=\"../images/port.gif\" width=\"150\" height=\"50\" align=\"absmiddle\"><BR>";
echo "      </P>";
echo "		</TD>";		
echo "	</TR>";
echo "	<TR VALIGN=TOP>";
		
echo "    <TD WIDTH=200 height=\"26\"> ";
echo "      <P ALIGN=CENTER><FONT FACE=\"Arial, sans-serif\"><A HREF=\"chpw.php\">Passwort";
echo "			&auml;ndern</A></FONT></P>";
echo "		</TD>";
echo "		<TD WIDTH=200>";
echo "			<P ALIGN=CENTER><FONT FACE=\"Arial, sans-serif\"><A HREF=\"chlang.php\">Sprachauswahl</A></FONT></P>";
echo "		</TD>";
echo "		<TD WIDTH=215>";
echo "			<P ALIGN=CENTER><FONT FACE=\"Arial, sans-serif\"><A HREF=\"chport.php\">TCP/IP-Port";
echo "			&auml;ndern</A></FONT></P>";
echo "		</TD>";
echo "	</TR>";
		
echo "    <TD WIDTH=200 height=\"53\" >";
echo "      <P align=\"Center\"><img src=\"../images/phpmyadmin.gif\" width=\"53\" height=\"48\" align=\"absmiddle\"><BR>";
echo "      </P>";
echo "          </TD>";
echo "    <TD WIDTH=200>";
echo "      <P align=\"Center\"><img src=\"../images/update.png\" align=\"absmiddle\"><BR>";
echo "      </P>";
echo "          </TD>";
echo "    <TD WIDTH=215>";
echo "</TD>";
echo "	</TR>";
echo "	<TR VALIGN=TOP>";
echo "    <TD WIDTH=200 height=\"53\"> ";
if ($portaktuell == 80) {
echo "			<P ALIGN=CENTER><FONT FACE=\"Arial, sans-serif\"><A HREF=\"http://localhost/phpMyAdmin\">phpMyAdmin";
}
if ($portaktuell != 80) {
echo "			<P ALIGN=CENTER><FONT FACE=\"Arial, sans-serif\"><A HREF=\"http://localhost:$portaktuell/phpMyAdmin\">phpMyAdmin";
}
echo "			</A></FONT></P>";
echo "		</TD>";
echo "    <TD WIDTH=200 height=\"26\"> ";
echo "			<P ALIGN=CENTER><FONT FACE=\"Arial, sans-serif\"><A HREF=\"update.php\">Update verf&uuml;gbar?";
echo "			</A></FONT></P>";
echo "</TD>";
echo "    <TD WIDTH=215 > ";
echo "			<P ALIGN=CENTER><FONT FACE=\"Arial, sans-serif\">";
echo "			</A></FONT></P>";
echo "</TD>";
echo "	</TR>";
echo "</TABLE>";
echo "<H2><BR><BR>";
echo "</H2>";
echo "</BODY>";
echo "</HTML>";

}
if ($_SESSION['admin']!="admin") {
echo "<P><FONT FACE=\"Arial,sans-serif\">";
echo "<BODY LANG=\"de-DE\" BGCOLOR=\"#c0c0c0\"><H2>";
echo "Du bist nicht berechtigt!</H2>";
}
?>