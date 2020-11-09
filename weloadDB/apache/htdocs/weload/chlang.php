<?
@session_start();
if ($_SESSION['admin']!="admin") {
echo "<P><FONT FACE=\"Arial,sans-serif\">";
echo "<BODY LANG=\"de-DE\" BGCOLOR=\"#c0c0c0\"><H2>";
echo "Access denied! / Zugriff verweigert!</H2><br>";
}

if ($_SESSION['admin']=="admin") {

$liste ="index.htm";
$array = file($liste);
for($x=0;$x<count($array);$x++){  
$zeile= $array[$x];
$punkt = "<META LANGUAGE=\"deutsch";
$punkteng = "<META LANGUAGE=\"english";

$fragep = strchr ($zeile, $punkt);
$fragepeng = strchr ($zeile, $punkteng);

if ($fragep != FALSE) {
echo "<P><FONT FACE=\"Arial,sans-serif\">";
echo "<BODY LANG=\"de-DE\" BGCOLOR=\"#c0c0c0\">";
echo "<P STYLE=\"margin-top: 0cm\"><IMG SRC=\"../images/flag_german.gif\"NAME=\"deutsch\" ALIGN=LEFT WIDTH=26 HEIGHT=14 BORDER=0>";
echo "Derzeit ist die deutsche Version von WeLOAD aktiv.";
echo "<br>";
echo "<br>";
echo "<hr>";
echo "Sprache w&auml;hlen:";
echo "<br>";
echo "<br>";
echo "<br>";
echo "<a href=\"chlangeng.php\" ><IMG SRC=\"../images/flag_english.gif\" BORDER=0></a>";
echo "&nbsp;&nbsp;Englisch<br>";
}

if ($fragepeng != FALSE) {
echo "<P><FONT FACE=\"Arial,sans-serif\">";
echo "<BODY LANG=\"de-DE\" BGCOLOR=\"#c0c0c0\">";
echo "<P STYLE=\"margin-top: 0cm\"><IMG SRC=\"../images/flag_english.gif\"NAME=\"english\" ALIGN=LEFT WIDTH=26 HEIGHT=14 BORDER=0>";
echo "English Version of WeLOAD is active.";
echo "<br>";
echo "<br>";
echo "<hr>";
echo "Choose language:";
echo "<br>";
echo "<br>";
echo "<br>";
echo "<a href=\"chlangdeu.php\" ><IMG SRC=\"../images/flag_german.gif\" BORDER=0></a>";
echo "&nbsp;&nbsp;German<br>";
}

}
echo "<P><FONT FACE=\"Arial,sans-serif\">";
echo "<BODY LANG=\"de-DE\" BGCOLOR=\"#c0c0c0\">";

}

?>