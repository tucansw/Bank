<?
@session_start();
if ($_SESSION['admin']=="admin") {

echo "<P><FONT FACE=\"Arial,sans-serif\">";
$web="weload";
echo "<BODY LANG=\"de-DE\" BGCOLOR=\"#c0c0c0\">";
echo "<H2>Content Packages verwalten</H2>";
$dr=$_SERVER['DOCUMENT_ROOT'];
$path = "$dr/weload";
$var = diskfreespace("$path");
$laenge=strlen($var);
$var1 = substr($var,0,$laenge-6);
echo "Freier Speicher auf WeLOAD-Datentr&auml;ger: " . $var1 . " Megabyte";
echo "<br>";

//Verzeichnisse mit Webs suchen

echo "<br>";
echo "<br>";
echo "<TABLE WIDTH=100% BORDER=0 CELLPADDING=1 CELLSPACING=1 STYLE=\"page-break-before: always\">";
echo "	<COL WIDTH=128*>";
echo "	<COL WIDTH=128*>";
echo "<THEAD>";
echo "		<TR ALIGN=LEFT VALIGN=TOP>";
echo "			<TH WIDTH=20%>";
echo "				<P><FONT FACE=\"Arial,sans-serif\">Content Packages</FONT></P>";
echo "			</TH>";
echo "			<TH WIDTH=20%>";
echo "				<P><FONT FACE=\"Arial,sans-serif\">Editieren</FONT></P>";
echo "			</TH>";
echo "			<TH WIDTH=20%>";
echo "				<P><FONT FACE=\"Arial,sans-serif\">Zippen</FONT></P>";
echo "			</TH>";
echo "			<TH WIDTH=40%>";
echo "				<P><FONT FACE=\"Arial,sans-serif\">Löschen</FONT></P>";
echo "			</TH>";
echo "		</TR>";
echo "	</THEAD>";
echo "  <TBODY>";

$verz=opendir ('.');
while (false !== ($file = readdir ($verz))) {
//while ($file = readdir ($verz)) {
if($file != "." && $file != "..");
$fpliste = fopen ("verzeichnisse.txt","a+");
$headerliste = "$file";
$headerliste ="$headerliste\n";
fputs ($fpliste,$headerliste);
fclose ($fpliste);
}
closedir($verz); 

$liste ="verzeichnisse.txt";
$array = file($liste);
for($x=0;$x<count($array);$x++){  
$zeile= $array[$x];
$zeile = chop ($zeile);
$punkt = ".";
$fragep = strchr ($zeile, $punkt);
$uploads="uploads";
$upload="upload";

$frager =strchr ($zeile, $upload);
$frageq =strchr ($zeile, $uploads);
if ($fragep == FALSE and $frageq==FALSE and $frager==FALSE) :
$path2 = "$dr/weload/";
$pathzeile ="$path2$zeile";
$weblink ="weload/$zeile/";
chdir ($pathzeile);
$reload="ReloadContentPreview.htm";
$index ="index.htm";
$index2 ="index.html";
$filename = "$pathzeile/ReloadContentPreview.htm";

$filename = "$pathzeile/index.htm";
$reload="index.htm";
if (file_exists($filename)) :
$reloadkram ="$dr/cp/";
chdir ($reloadkram);
$copy1="index.html";
$ziel1 =("$pathzeile/$copy1");
copy ($copy1,$ziel1);
chdir ($pathzeile);
unlink ($index);
$reload="index.html";

echo "			<TD WIDTH=20%>";
echo "<A HREF=\"/weload/$zeile/\"target=\"_blank\">$zeile <P>";
echo "			</TD>";
echo "			<TD WIDTH=20%>";
echo "<form action=\"wwebedit.php?y=$zeile\">";
echo "<div>";
echo "&nbsp;&nbsp;&nbsp;&nbsp;";
echo "<button name=\"Edit\" type=\"button\" value=\"$y\" onClick=\"self.location.href='wwebedit.php?y=$zeile'\">";
echo "<img src=\"../images/editweb.gif\" border=0\" alt=\"Content Package editieren\">";
echo "</button>";
echo "</div>";
echo "</form>";
echo "			</TD>";

echo "<TD WIDTH=20%>";
echo "<form action=\"zippen.php?y=$zeile\">";
echo "<div>";
echo "&nbsp;&nbsp;&nbsp;";
echo "<button name=\"Zippen\" type=\"button\" value=\"$y\" onClick=\"self.location.href='zippen.php?y=$zeile'\">";
echo "<img src=\"../images/zip.gif\" border=0\" alt=\"Content Package zippen\">";
echo "</button>";
echo "</div>";
echo "</form>";
echo "			</TD>";
echo "<TD WIDTH=40%>";
echo "</P>";
echo "<form action=\"dirweg.php?pfad=$zeile method=post\">";
echo "<div>";
echo "&nbsp;&nbsp;&nbsp;";
echo "<button name=\"Löschen\" type=\"button\" value=\"$zeile\" onClick=\"self.location.href='dirweg.php?pfad=$zeile'\">";
echo "<img src=\"../images/deldir.gif\" border=0\" alt=\"Content Package löschen\">";
echo "</button>";
echo "</div>";
echo "</form>";
echo "			</TD>";
echo "		</TR>";
chdir ($path);

continue;
endif;

$filename = "$pathzeile/index.html";
if (file_exists($filename)) :
$reload="index.html";
echo "			<TD WIDTH=20%>";
echo "<A HREF=\"/weload/$zeile/\"target=\"_blank\">$zeile <P>";
echo "			</TD>";
echo "			<TD WIDTH=20%>";
echo "<form action=\"wwebedit.php?y=$zeile\">";
echo "<div>";
echo "&nbsp;&nbsp;&nbsp;&nbsp;";
echo "<button name=\"Edit\" type=\"button\" value=\"$y\" onClick=\"self.location.href='wwebedit.php?y=$zeile'\">";
echo "<img src=\"../images/editweb.gif\" border=0\" alt=\"Content Package editieren\">";
echo "</button>";
echo "</div>";
echo "</form>";
echo "			</TD>";
echo "<TD WIDTH=20%>";
echo "<form action=\"zippen.php?y=$zeile\">";
echo "<div>";
echo "&nbsp;&nbsp;&nbsp;";
echo "<button name=\"Zippen\" type=\"button\" value=\"$y\" onClick=\"self.location.href='zippen.php?y=$zeile'\">";
echo "<img src=\"../images/zip.gif\" border=0\" alt=\"Content Package zippen\">";
echo "</button>";
echo "</div>";
echo "</form>";
echo "			</TD>";
echo "<TD WIDTH=40%>";
echo "</P>";
echo "<form action=\"dirweg.php?pfad=$zeile method=post\">";
echo "<div>";
echo "&nbsp;&nbsp;&nbsp;";
echo "<button name=\"Löschen\" type=\"button\" value=\"$zeile\" onClick=\"self.location.href='dirweg.php?pfad=$zeile'\">";
echo "<img src=\"../images/deldir.gif\" border=0\" alt=\"Content Package löschen\">";
echo "</button>";
echo "</div>";
echo "</form>";
echo "			</TD>";
echo "		</TR>";
chdir ($path);
continue;
endif;

$filename = "$pathzeile/ReloadContentPreview.htm";

if (file_exists($filename)) :
$reloadkram ="$dr/cp/";
chdir ($reloadkram);
$copy1="index.html";
$ziel1 =("$pathzeile/$copy1");
copy ($copy1,$ziel1);
$reload="index.html";
echo "			<TD WIDTH=20%>";
echo "<A HREF=\"/weload/$zeile/\"target=\"_blank\">$zeile <P>";
echo "			</TD>";
echo "			<TD WIDTH=20%>";
echo "<form action=\"wwebedit.php?y=$zeile\">";
echo "<div>";
echo "&nbsp;&nbsp;&nbsp;&nbsp;";
echo "<button name=\"Edit\" type=\"button\" value=\"$y\" onClick=\"self.location.href='wwebedit.php?y=$zeile'\">";
echo "<img src=\"../images/editweb.gif\" border=0\" alt=\"Content Package editieren\">";
echo "</button>";
echo "</div>";
echo "</form>";
echo "			</TD>";

echo "<TD WIDTH=20%>";
echo "<form action=\"zippen.php?y=$zeile\">";
echo "<div>";
echo "&nbsp;&nbsp;&nbsp;";
echo "<button name=\"Zippen\" type=\"button\" value=\"$y\" onClick=\"self.location.href='zippen.php?y=$zeile'\">";
echo "<img src=\"../images/zip.gif\" border=0\" alt=\"Content Package zippen\">";
echo "</button>";
echo "</div>";
echo "</form>";
echo "			</TD>";

echo "<TD WIDTH=40%>";
echo "</P>";
echo "<form action=\"dirweg.php?pfad=$zeile method=post\">";
echo "<div>";
echo "&nbsp;&nbsp;&nbsp;";
echo "<button name=\"Löschen\" type=\"button\" value=\"$zeile\" onClick=\"self.location.href='dirweg.php?pfad=$zeile'\">";
echo "<img src=\"../images/deldir.gif\" border=0\" alt=\"Content Package löschen\">";
echo "</button>";
echo "</div>";
echo "</form>";
echo "			</TD>";
echo "		</TR>";
chdir ($path);
continue;
endif;


$filename = "$pathzeile/imsmanifest.xml";
$reload="index.htm";
if (file_exists($filename)) :
echo "			<TD WIDTH=20%>";
echo "<A HREF=\"/weload/$zeile/$reload\"target=\"_blank\">$zeile <P>";
echo "			</TD>";
echo "			<TD WIDTH=20%>";
echo "<form action=\"wwebedit.php?y=$zeile\">";
echo "<div>";
echo "&nbsp;&nbsp;&nbsp;&nbsp;";
echo "<button name=\"Edit\" type=\"button\" value=\"$y\" onClick=\"self.location.href='wwebedit.php?y=$zeile'\">";
echo "<img src=\"../images/editweb.gif\" border=0\" alt=\"Content Package editieren\">";
echo "</button>";
echo "</div>";
echo "</form>";
echo "			</TD>";
echo "<TD WIDTH=20%>";
echo "<form action=\"zippen.php?y=$zeile\">";
echo "<div>";
echo "&nbsp;&nbsp;&nbsp;";
echo "<button name=\"Zippen\" type=\"button\" value=\"$y\" onClick=\"self.location.href='zippen.php?y=$zeile'\">";
echo "<img src=\"../images/zip.gif\" border=0\" alt=\"Content Package zippen\">";
echo "</button>";
echo "</div>";
echo "</form>";
echo "			</TD>";
echo "<TD WIDTH=40%>";
echo "</P>";
echo "<form action=\"dirweg.php?pfad=$zeile method=post\">";
echo "<div>";
echo "&nbsp;&nbsp;&nbsp;";
echo "<button name=\"Löschen\" type=\"button\" value=\"$zeile\" onClick=\"self.location.href='dirweg.php?pfad=$zeile'\">";
echo "<img src=\"../images/deldir.gif\" border=0\" alt=\"Content Package löschen\">";
echo "</button>";
echo "</div>";
echo "</form>";
echo "			</TD>";
echo "		</TR>";

chdir ($path);
continue;
endif;
chdir ($path);
continue;
endif;
}
echo "	</TBODY>";
echo "</TABLE>";
unlink ($liste);



$path3="$path/zipped";
echo "<HR>";
echo "<H3>Gezippte Dateien in WeLOAD</H3>";
chdir ($path3);
$b= getcwd();
echo "<br>";
$verz=opendir ($b);
while (false !== ($file = readdir ($verz))) {
$fpliste = fopen ("verzeichnisse.txt","a+");
$headerliste = "$file";
$headerliste ="$headerliste\n";
fputs ($fpliste,$headerliste);
fclose ($fpliste);
}
closedir($verz); 
$liste ="verzeichnisse.txt";
$array = file($liste);
for($x=0;$x<count($array);$x++){  
$zeile= $array[$x];
$zeile = chop ($zeile);
$punkt = ".zip";
$fragep = strchr ($zeile, $punkt);

if ($fragep == TRUE) :

$pathzeile ="/weload/zipped/$zeile";

$filename = "$path3/$zeile";
if (file_exists($filename)) {



echo "<TABLE WIDTH=100% BORDER=0 CELLPADDING=1 CELLSPACING=1 STYLE=\"page-break-before: always\">";
echo "	<COL WIDTH=128*>";
echo "	<COL WIDTH=128*>";
echo "<THEAD>";
echo "		<TR ALIGN=LEFT VALIGN=TOP>";
echo "			<TH WIDTH=50%>";
echo "<img src=\"../images/zip.gif\" border=0\" alt=\"\"><A HREF=\"$pathzeile\"target=\"_blank\">$zeile</A>";
echo "</TH>";
echo "<TH WIDTH=50%>";
echo "<form action=\"dloeschen2.php?y=$y\">";
echo "<div>";
echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp";
echo "<button name=\"Löschen\" type=\"button\" value=\"$y\" onClick=\"self.location.href='dloeschen2.php?y=$zeile'\">";
echo "<img src=\"../images/delete.gif\" border=0\" alt=\"Löschen\">";
echo "</button>";
echo "</div>";
echo "</form>";
echo "</TH>";
echo "</TR>";
echo "</THEAD>";
echo "<TBODY>";
echo "</TBODY>";
echo "</TABLE>";
}
continue;
endif;
}
unlink ($liste);
echo "<br>";
echo "<FONT FACE=\"Arial, sans-serif\"><FONT SIZE=4>Gezipptes Content Package aus RELOAD hinzuf&uuml;gen</FONT></FONT>";
echo "<FORM ACTION=\"unzip.php\" METHOD=\"POST\" ENCTYPE=\"multipart/form-data\">";
echo "<P><INPUT TYPE=FILE NAME=\"userfile\" SIZE=16>";
echo "</P>";
echo "<P><INPUT TYPE=SUBMIT VALUE=\"Senden\"></P>";
echo "<hr>";
echo "<a href=\"http://www.contake.at\" target=\"new\"> <IMG SRC=\"../images/contake_logo.jpg\" NAME=\"Contake Logo\" ALIGN=MIDDLE BORDER=0></a>&nbsp;&nbsp;&nbsp;Con&#8226;take: Materialsuche f&uuml;r Lehrkr&auml;fte, Tiroler Bildungsservice";
}
if ($_SESSION['admin']!="admin") {
echo "<P><FONT FACE=\"Arial,sans-serif\">";
echo "<BODY LANG=\"de-DE\" BGCOLOR=\"#c0c0c0\"><H2>";
echo "Du bist nicht berechtigt!</H2>";
}
?>