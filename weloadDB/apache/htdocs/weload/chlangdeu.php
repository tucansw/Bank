<?php
@session_start();
if ($_SESSION['admin']=="admin") {
echo "<P><FONT FACE=\"Arial,sans-serif\">";
echo "<BODY LANG=\"de-DE\" BGCOLOR=\"#c0c0c0\"><H2>";
echo "German Version of WeLOAD will be loaded!</H2><br>";
echo "Copying neccessary files...";
$dr=$_SERVER['DOCUMENT_ROOT'];
$weloadeng ="$dr/languages/german/";
$reloadkram="$dr/cp/";
$weloadengpreview ="$dr/languages/german/ContentPreview/";
$cp="$dr/cp/";
$cppreview="$dr/cp/ReloadContentPreviewFiles/menu-images/";
$weloaddir = "$dr/weload/";
chdir ($weloadeng);

$copy1="chport.php";
$ziel1 =("$weloaddir$copy1");
copy ($copy1,$ziel1);

$copy1="chport2.php";
$ziel1 =("$weloaddir$copy1");
copy ($copy1,$ziel1);


$copy1="chpw.php";
$ziel1 =("$weloaddir$copy1");
copy ($copy1,$ziel1);

$copy1="chpw1.php";
$ziel1 =("$weloaddir$copy1");
copy ($copy1,$ziel1);

$copy1="chpw2.php";
$ziel1 =("$weloaddir$copy1");
copy ($copy1,$ziel1);

$copy1="dirtest4.php";
$ziel1 =("$weloaddir$copy1");
copy ($copy1,$ziel1);

$copy1="dirweg.php";
$ziel1 =("$weloaddir$copy1");
copy ($copy1,$ziel1);

$copy1="dloeschen.php";
$ziel1 =("$weloaddir$copy1");
copy ($copy1,$ziel1);

$copy1="dloeschen2.php";
$ziel1 =("$weloaddir$copy1");
copy ($copy1,$ziel1);

$copy1="dverschiebeno.php";
$ziel1 =("$weloaddir$copy1");
copy ($copy1,$ziel1);

$copy1="dverschiebenu.php";
$ziel1 =("$weloaddir$copy1");
copy ($copy1,$ziel1);

$copy1="erzeugen.php";
$ziel1 =("$weloaddir$copy1");
copy ($copy1,$ziel1);

$copy1="hintergrund.html";
$ziel1 =("$weloaddir$copy1");
copy ($copy1,$ziel1);

$copy1="index.htm";
$ziel1 =("$weloaddir$copy1");
copy ($copy1,$ziel1);

$copy1="index.html";
$ziel1 =("$weloaddir$copy1");
copy ($copy1,$ziel1);

$copy1="index.php";
$ziel1 =("$weloaddir$copy1");
copy ($copy1,$ziel1);

$copy1="input_text.php";
$ziel1 =("$weloaddir$copy1");
copy ($copy1,$ziel1);

$copy1="ipnummer.php";
$ziel1 =("$weloaddir$copy1");
copy ($copy1,$ziel1);

$copy1="optionshtml.php";
$ziel1 =("$weloaddir$copy1");
copy ($copy1,$ziel1);

$copy1="optionsfile.php";
$ziel1 =("$weloaddir$copy1");
copy ($copy1,$ziel1);

$copy1="overwrite.php";
$ziel1 =("$weloaddir$copy1");
copy ($copy1,$ziel1);

$copy1="readme.html";
$ziel1 =("$weloaddir$copy1");
copy ($copy1,$ziel1);

$copy1="rmdir.php";
$ziel1 =("$weloaddir$copy1");
copy ($copy1,$ziel1);

$copy1="rmdir2.php";
$ziel1 =("$weloaddir$copy1");
copy ($copy1,$ziel1);

$copy1="settings.php";
$ziel1 =("$weloaddir$copy1");
copy ($copy1,$ziel1);

$copy1="start.htm";
$ziel1 =("$weloaddir$copy1");
copy ($copy1,$ziel1);

$copy1="steuerung.htm";
$ziel1 =("$weloaddir$copy1");
copy ($copy1,$ziel1);

$copy1="textaender.php";
$ziel1 =("$weloaddir$copy1");
copy ($copy1,$ziel1);

$copy1="unzip.php";
$ziel1 =("$weloaddir$copy1");
copy ($copy1,$ziel1);

$copy1="update.php";
$ziel1 =("$weloaddir$copy1");
copy ($copy1,$ziel1);

$copy1="upload.htm";
$ziel1 =("$weloaddir$copy1");
copy ($copy1,$ziel1);

$copy1="upload.php";
$ziel1 =("$weloaddir$copy1");
copy ($copy1,$ziel1);

$copy1="upload2.php";
$ziel1 =("$weloaddir$copy1");
copy ($copy1,$ziel1);

$copy1="uploadE.php";
$ziel1 =("$weloaddir$copy1");
copy ($copy1,$ziel1);

$copy1="uploadE2.php";
$ziel1 =("$weloaddir$copy1");
copy ($copy1,$ziel1);

$copy1="vloeschen.php";
$ziel1 =("$weloaddir$copy1");
copy ($copy1,$ziel1);

$copy1="warten1.htm";
$ziel1 =("$weloaddir$copy1");
copy ($copy1,$ziel1);

$copy1="warten2.htm";
$ziel1 =("$weloaddir$copy1");
copy ($copy1,$ziel1);

$copy1="warten3.htm";
$ziel1 =("$weloaddir$copy1");
copy ($copy1,$ziel1);

$copy1="wdloeschen.php";
$ziel1 =("$weloaddir$copy1");
copy ($copy1,$ziel1);

$copy1="webedit.php";
$ziel1 =("$weloaddir$copy1");
copy ($copy1,$ziel1);

$copy1="webverwaltung.php";
$ziel1 =("$weloaddir$copy1");
copy ($copy1,$ziel1);

$copy1="weload.html";
$ziel1 =("$weloaddir$copy1");
copy ($copy1,$ziel1);

$copy1="weloadhistory.html";
$ziel1 =("$weloaddir$copy1");
copy ($copy1,$ziel1);

$copy1="wwebedit.php";
$ziel1 =("$weloaddir$copy1");
copy ($copy1,$ziel1);

$copy1="xcopy.php";
$ziel1 =("$weloaddir$copy1");
copy ($copy1,$ziel1);

$copy1="zippen.php";
$ziel1 =("$weloaddir$copy1");
copy ($copy1,$ziel1);

chdir ($weloadengpreview);

$copy1="next.gif";
$ziel1 =("$cppreview$copy1");
copy ($copy1,$ziel1);

$copy1="next_disabled.gif";
$ziel1 =("$cppreview$copy1");
copy ($copy1,$ziel1);

$copy1="prev.gif";
$ziel1 =("$cppreview$copy1");
copy ($copy1,$ziel1);

$copy1="prev_disabled.gif";
$ziel1 =("$cppreview$copy1");
copy ($copy1,$ziel1);


chdir ($weloaddir);
$liste =".pw";
$array = file($liste);
for($x=0;$x<count($array);$x++){  
$zeile= $array[$x];
$zeile=chop($zeile);
$punkt = "admin";
$fragep = strchr ($zeile, $punkt);
chdir ($weloadeng);
if ($fragep != FALSE) {
$copy1="indexadmin.htm";
$copy2="index.htm";
$ziel1 =("$weloaddir$copy2");
copy ($copy1,$ziel1);
$zielcp=("$reloadkram$copy1");
copy ($copy1,$zielcp);

$copy1="indexadmin.html";
$copy2="index.html";
$ziel1 =("$weloaddir$copy2");
copy ($copy1,$ziel1);
$zielcp=("$reloadkram$copy1");
copy ($copy1,$zielcp);
echo "...ok!<br>";
}
if ($fragep == FALSE) {
$copy1="indexadminlos.htm";
$copy2="index.htm";
$ziel1 =("$weloaddir$copy2");
copy ($copy1,$ziel1);
$zielcp=("$reloadkram$copy1");
copy ($copy1,$zielcp);

$copy1="indexadminlos.html";
$copy2="index.html";
$ziel1 =("$weloaddir$copy2");
copy ($copy1,$ziel1);
$zielcp=("$reloadkram$copy1");
copy ($copy1,$zielcp);
echo "...ok!<br>";
}
echo "<br>";
echo "<hr>";
echo "<br><br><br>";
$port=$HTTP_SERVER_VARS["SERVER_PORT"];
if ($port==80) {
$ipnummer2="localhost/";
$http="http://";
$web="weload/";
$stick="$http$ipnummer2$web";
}
if ($port!=80) {
$ipnummer2="localhost:$port/";
}
$http="http://";
$web="weload/";
$stick="$http$ipnummer2$web";
echo "<b><A HREF=\"$stick\"target=\"_blank\" >Deutsche Version von WeLOAD (neues Fenster)</b></A>";

}
}
if ($_SESSION['admin']!="admin") {
echo "<P><FONT FACE=\"Arial,sans-serif\">";
echo "<BODY LANG=\"de-DE\" BGCOLOR=\"#c0c0c0\"><H2>";
echo "Access denied!</H2>";
}
?>
