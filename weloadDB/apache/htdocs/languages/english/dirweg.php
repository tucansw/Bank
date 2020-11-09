<head>
<meta http-equiv="refresh" content="2; URL=webverwaltung.php">
</head>
<?php
@session_start();
if ($_SESSION['admin']=="admin") {
    // importiere die Datei mit der Funktion
    require 'rmdir.php';

echo "<P><FONT FACE=\"Arial,sans-serif\">";
echo "<BODY LANG=\"de-DE\" BGCOLOR=\"#c0c0c0\">";
$dr=$_SERVER['DOCUMENT_ROOT'];
$a= "$dr/weload/$pfad";

    // loesche das Verzeichnis /tmp/test_verzeichnis
$res=rec_rmdir($a);
    // wurde das Verzeichnis korrekt gelöscht
    switch ($res) {
      case 0:
        // das Verzeichnis wurde korrekt gelöscht
echo "<H3>Content Package $pfad successfully deleted!</H3>";
        break;
      case -1:
        // das war kein Verzeichnis
        break;
      case -2:
        // ein Fehler ist aufgetreten
        break;
      case -3:
        // die Funktion ist über einen Dateityp gestolpert, den sie nicht kennt
        break;
      default:
        // die Funktion hat irgend etwas zurückgegeben, was sie eigentlich nicht sollte
        break;
    }
}
if ($_SESSION['admin']!="admin") {
echo "<P><FONT FACE=\"Arial,sans-serif\">";
echo "<BODY LANG=\"de-DE\" BGCOLOR=\"#c0c0c0\"><H2>";
echo "Access denied!</H2>";
}
?>

