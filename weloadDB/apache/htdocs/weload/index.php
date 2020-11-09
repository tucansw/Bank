<?php
@session_start();

$liste =".pw";
$array = file($liste);
for($x=0;$x<count($array);$x++){  
$zeile= $array[$x];
$zeile=chop($zeile);
$punkt = "admin";
$fragep = strchr ($zeile, $punkt);
if ($fragep != FALSE) {
}
}

if($HTTP_POST_VARS[pw] == $zeile) {
session_name("admin");
$_SESSION['userName']        =   "admin";
$_SESSION['admin'] = "admin";

echo "<html>";
echo "<head>";
echo "<title>WeLOAD</title>";
echo "</head>";
echo "<html>";
echo "<frameset rows=\"20,*\">";
echo "<frame src=\"hintergrund.html\" name=\"hintergrund\" scrolling=\"no\" frameborder=\"no\">";
echo "<frameset cols=\"194,*\">";
echo "  <frame src=\"steuerung.htm\" name=\"Navigation\">";
echo "  <frame src=\"weload.html\" name=\"rechts\">";
echo "  <noframes>";
echo "    <h1>WeLOAD</h1>";
echo "    <p>Diese Seite verwendet Frames. Bei Ihnen werden keine Frames angezeigt.</p>";
echo "    <p>W&auml;hlen Sie einen der Verweise aus:<br>";
echo "    <a href=\"startseite.htm\"><b>Startseite</b></a><br>";
echo "  </noframes>";
echo "</frameset>";
echo "</frameset>";
echo "</html>";

} else {
echo "<P><FONT FACE=\"Arial,sans-serif\">";
echo "<BODY LANG=\"de-DE\" BGCOLOR=\"#c0c0c0\"><H2>";
  die("Falsches Passwort!");
}
?>

