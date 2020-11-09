<?
@session_start();
if ($_SESSION['admin']!="admin") {
echo "<P><FONT FACE=\"Arial,sans-serif\">";
echo "<BODY LANG=\"de-DE\" BGCOLOR=\"#c0c0c0\"><H2>";
echo "Du bist nicht berechtigt!</H2>";
}
if ($_SESSION['admin']=="admin") {

echo "<P><FONT FACE=\"Arial,sans-serif\">";
exec("ipconfig > liste.txt");
$liste ="liste.txt";
$array = file($liste);
for($x=0;$x<count($array);$x++){  
$zeile= $array[$x];
$punkt = "IP";
$punkt2 =". . .";
$fragep = strchr ($zeile, $punkt);
$fragep2 = strchr ($zeile, $punkt2);

if ($fragep != FALSE && $fragep2 != FALSE) {
$vorne = strpos($zeile,":");
$egal = substr($zeile,0,$vorne);
$ipnummer = substr($zeile, $vorne+2);
$ipnummer = chop($ipnummer);


$port=$HTTP_SERVER_VARS["SERVER_PORT"];
if ($port==80) {
$ipnummer2="$ipnummer/";
}
if ($port!=80) {
$ipnummer2="$ipnummer:$port/";
}

$http="http://";
$web="weload/";
$stick="$http$ipnummer2$web";
echo "<BODY LANG=\"de-DE\" BGCOLOR=\"#c0c0c0\">";
echo "<b>WeLOAD</b> ist unter folgender URL im lokalen Netz erreichbar:";
echo "<br><H2>$stick</H2>";
unlink ($liste);

$path = "/weload";
$dr=$_SERVER['DOCUMENT_ROOT'];
$laenge=strlen($dr);
$dr2 = substr($dr,2,$laenge);
$dr=$dr2;
$dp="$dr$path";
$path=$dp;
$web2="weload/upload.htm";
$stick2="$http$ipnummer2$web2";
echo "Uploadbereich-Sch&uuml;ler: ";
echo "<b><A HREF=\"$stick2\"target=\"_blank\" >$stick2</b></A>";
echo "<br>";
echo "<br>";

$var = diskfreespace("$path");
$laenge=strlen($var);
$var1 = substr($var,0,$laenge-6);
echo "Freier Speicher: " . $var1 . " Megabyte";
echo "<br>";
//Verzeichnisse mit Webs suchen
echo "Verf&uuml;gbare Content Packages:";
echo "<br>";

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
$punkt = ".";
$fragep = strchr ($zeile, $punkt);
$uploads="uploads";
$upload="upload";
$frager =strchr ($zeile, $upload);
$frageq =strchr ($zeile, $uploads);
if ($fragep == FALSE and $frageq==FALSE and $frager==FALSE) :
$path2 = "$dp/";

$pathzeile ="$path2$zeile";
$weblink ="unterichtswebs/$zeile/";
chdir ($pathzeile);
$reload="ReloadContentPreview.htm";
$index ="index.html";
$index2 ="index.html";


$filename = "$pathzeile/index.html";
if (file_exists($filename)) :
   echo "<A HREF=\"/weload/$zeile/\"target=\"_blank\">$zeile";
echo "<br>";
chdir ($path);
continue;
endif;

$filename = "$pathzeile/index.html";
if (file_exists($filename)) :
   echo "<A HREF=\"/weload/$zeile/\" target=\"_blank\">$zeile";
echo "<br>";
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

   echo "<A HREF=\"/weload/$zeile/\"target=\"_blank\">$zeile";
echo "<br>";
chdir ($path);
continue;
endif;
//
chdir ($path);
continue;
endif;
}
unlink ($liste);
exit;
continue;
}

}

////////////////////////////////////////////////////////////////////////////////////////
$liste ="liste.txt";
$array = file($liste);
for($x=0;$x<count($array);$x++){  
$zeile= $array[$x];
$punkt = "IP-Adresse. . . . . . . . . . . . :";
$fragep = strchr ($zeile, $punkt);

if ($fragep != TRUE) {
$ipnummer = "127.0.0.1";


$port=$HTTP_SERVER_VARS["SERVER_PORT"];
if ($port==80) {
$ipnummer2="$ipnummer/";
}
if ($port!=80) {
$ipnummer2="$ipnummer:$port/";
}
}
$http="http://";
$web="weload/";
$stick="$http$ipnummer2$web";
echo "<BODY LANG=\"de-DE\" BGCOLOR=\"#c0c0c0\">";
echo "<b>WeLOAD</b> ist nur lokal auf diesem Rechner verf&uuml;gbar.";
echo "<br>";
echo "Entweder ist das Netzwerk nicht konfiguriert oder";
echo "<br>";
echo "es besteht keine Verbindung zum Netzwerk.";
echo "<br>";
echo "Sie k&ouml;nnen aber dennoch WeLOAD auf diesem Rechner nutzen.";
echo "<br>";
echo "<br><H2>$stick</H2>";
unlink ($liste);

$path = "/weload";
$dr=$_SERVER['DOCUMENT_ROOT'];
$laenge=strlen($dr);
$dr2 = substr($dr,2,$laenge);
$dr=$dr2;
$dp="$dr$path";
$path=$dp;
$web2="weload/upload.htm";
$stick2="$http$ipnummer2$web2";
echo "Uploadbereich-Sch&uuml;ler: ";
echo "<b><A HREF=\"$stick2\"target=\"_blank\" >$stick2</b></A>";
echo "<br>";
echo "<br>";

$var = diskfreespace("$path");
$laenge=strlen($var);
$var1 = substr($var,0,$laenge-6);
echo "Freier Speicher: " . $var1 . " Megabyte";
echo "<br>";
//Verzeichnisse mit Webs suchen
echo "Verf&uuml;gbare Content Packages:";
echo "<br>";

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
$punkt = ".";
$fragep = strchr ($zeile, $punkt);
$uploads="uploads";
$frageq =strchr ($zeile, $uploads);
if ($fragep == FALSE and $frageq==FALSE) :
$path2 = "$dp/";

$pathzeile ="$path2$zeile";
$weblink ="unterichtswebs/$zeile/";
chdir ($pathzeile);
$reload="ReloadContentPreview.htm";
$index ="index.html";
$index2 ="index.html";


$filename = "$pathzeile/index.html";
if (file_exists($filename)) :
   echo "<A HREF=\"/weload/$zeile/\"target=\"_blank\">$zeile";
echo "<br>";
chdir ($path);
continue;
endif;

$filename = "$pathzeile/index.html";
if (file_exists($filename)) :
   echo "<A HREF=\"/weload/$zeile/\" target=\"_blank\">$zeile";
echo "<br>";
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

   echo "<A HREF=\"/weload/$zeile/\"target=\"_blank\">$zeile";
echo "<br>";
chdir ($path);
continue;
endif;
//
chdir ($path);
continue;
endif;
}
unlink ($liste);
continue;
///////////////////////////////////////////////////////////////////////////////////////
}
}
exit;


?>