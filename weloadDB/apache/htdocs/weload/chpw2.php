<?
@session_start();
if ($_SESSION['admin']!="admin") {
echo "<P><FONT FACE=\"Arial,sans-serif\">";
echo "<BODY LANG=\"de-DE\" BGCOLOR=\"#c0c0c0\"><H2>";
echo "Du bist nicht berechtigt!</H2>";
}

if ($_SESSION['admin']=="admin") {

$liste =".pw2";
$array = file($liste);
for($x=0;$x<count($array);$x++){  
$zeile= $array[$x];
$zeile=chop($zeile);
}

if ($zeile==$pw) {
$fpliste = fopen (".pw","w");
$headerliste = $zeile;
$headerliste ="$headerliste\n";
fputs ($fpliste,$headerliste);
fclose ($fpliste);
$liste =".pw";
$array = file($liste);
for($x=0;$x<count($array);$x++){  
$zeile= $array[$x];
$zeile=chop($zeile);
$punkt = "admin";
$fragep = strchr ($zeile, $punkt);
if ($fragep != FALSE) {
$dr=$_SERVER['DOCUMENT_ROOT'];
$reloadkram ="$dr/cp/";
$verzei = "$dr/weload/";
unlink ("index.htm");
unlink ("index.html");
chdir ($reloadkram);
$copy1="indexadmin.htm";
$ziel1 =("$verzei$copy1");
copy ($copy1,$ziel1);
$copy1="indexadmin.html";
$ziel1 =("$verzei$copy1");
copy ($copy1,$ziel1);
chdir ($verzei);
rename("indexadmin.htm","index.htm");
rename("indexadmin.html","index.html");
}
//////////////////
if ($fragep == FALSE) {
$dr=$_SERVER['DOCUMENT_ROOT'];
$reloadkram ="$dr/cp/";
$verzei = "$dr/weload/";
unlink ("index.htm");
unlink ("index.html");
chdir ($reloadkram);
$copy1="indexadminlos.htm";
$ziel1 =("$verzei$copy1");
copy ($copy1,$ziel1);
$copy1="indexadminlos.html";
$ziel1 =("$verzei$copy1");
copy ($copy1,$ziel1);
chdir ($verzei);
rename("indexadminlos.htm","index.htm");
rename("indexadminlos.html","index.html");
}
}
echo "<P><FONT FACE=\"Arial,sans-serif\">";
echo "<BODY LANG=\"de-DE\" BGCOLOR=\"#c0c0c0\">";
echo "<H2>Passwort erfolgreich ge&auml;ndert!</H2>";
echo "<P STYLE=\"margin-top: 0cm\"><IMG SRC=\"../images/schluessel2.gif\" NAME=\"Schl&uuml;ssel\" ALIGN=LEFT WIDTH=268 HEIGHT=298 BORDER=0>";
echo "<br>";
echo "Die &Auml;nderungen treten beim n&auml;chsten Start von WeLOAD in Kraft.";
}

if ($zeile!=$pw) {
echo "<P><FONT FACE=\"Arial,sans-serif\">";
echo "Die beiden Eingaben stimmten nicht &uuml;berein!";
echo "<P><FONT FACE=\"Arial,sans-serif\">";
echo "<BODY LANG=\"de-DE\" BGCOLOR=\"#c0c0c0\">";
echo "<H2>Passwort wurde NICHT ge&auml;ndert.</H2>";
echo "<P STYLE=\"margin-top: 0cm\"><IMG SRC=\"../images/schluessel.gif\" NAME=\"Schl&uuml;ssel\" ALIGN=LEFT WIDTH=78 HEIGHT=128 BORDER=0>";
echo "<form enctype=\"multipart/form-data\" action=\"chpw.php\" method=\"get\">";
echo "<P><INPUT type=submit value=Nochmal versuchen></FORM>";
}

}

?>