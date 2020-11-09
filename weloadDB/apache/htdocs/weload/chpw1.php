<?
@session_start();
if ($_SESSION['admin']!="admin") {
echo "<P><FONT FACE=\"Arial,sans-serif\">";
echo "<BODY LANG=\"de-DE\" BGCOLOR=\"#c0c0c0\"><H2>";
echo "Du bist nicht berechtigt!</H2>";
}

if ($_SESSION['admin']=="admin") {
$pw1=trim($pw);

$pw = $pw1;

$fpliste = fopen (".pw2","w");
$headerliste = $pw;
$headerliste ="$headerliste\n";
fputs ($fpliste,$headerliste);
fclose ($fpliste);

$liste =".pw";
$array = file($liste);
for($x=0;$x<count($array);$x++){  
$zeile= $array[$x];
$punkt = "admin";
$fragep = strchr ($zeile, $punkt);
if ($fragep != FALSE) {
}
}
echo "<P><FONT FACE=\"Arial,sans-serif\">";
echo "<BODY LANG=\"de-DE\" BGCOLOR=\"#c0c0c0\">";
echo "<H2>Kontrolle des Passwortes</H2>";
echo "Passwort wiederholen:";
echo "<P STYLE=\"margin-top: 0cm\"><IMG SRC=\"../images/schluessel.gif\" NAME=\"Schl&uuml;ssel\" ALIGN=LEFT WIDTH=78 HEIGHT=128 BORDER=0>";
echo "<form action=\"chpw2.php\" method=\"post\">";
echo "<input type=\"password\" name=\"pw\">";
echo "<input type=\"submit\" value=\"Passworteingabe Schritt 2\">";
}

?>