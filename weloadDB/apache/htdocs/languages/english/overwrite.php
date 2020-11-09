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
echo "<H3>Content Package $pfad successfully updated.</H3>";
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
$verz = $pfad;
$verzo = $verz;


$copy1="$verz";
$copy2="$verz";
$array_1 = array("ä","ö","ü","ß","Ä","Ö","Ü","_","„","“"," ");
$array_2 = array("ae","oe","ue","ss","Ae","Oe","Ue","_","","","_");
for($h=0;$h<11;$h++){  
$copy2 = str_replace($array_1[$h],$array_2[$h],$copy2);
$verz=$copy2;
}



$dateien ="Dateien";
$rload ="ReloadContentPreviewFiles";
$mimages ="menu-images";
$dr=$_SERVER['DOCUMENT_ROOT'];
$reloadkram ="$dr/cp/";
$webroot = "$dr/weload/";
$uploaddir ="$dr/weload/uploads/";

chdir ($uploaddir);
$liste =".desc";
$array = file($liste);
if (count($array)<1){
echo "<BODY LANG=\"de-DE\" BGCOLOR=\"#c0c0c0\">";
echo "<P><FONT FACE=\"Arial,sans-serif\">";
echo "Content Package is empty.<br>";
echo "You have to upload/create links and files first.<br>";
echo "<form enctype=\"multipart/form-data\" action=\"erzeugen.php\" method=\"post\">";
echo "<P><INPUT type=submit value=back></FORM>";
exit;
}
chdir ($webroot);


mkdir ($verz);
chdir ($verz);
mkdir ($dateien);
mkdir ($rload);
chdir ($rload);
mkdir ($mimages);
chdir ($webroot);
$verzs = "$verz/";
$verzei =("$webroot$verzs");

// Reload-Dateien

chdir ($reloadkram);
$copy1="ReloadContentPreview.htm";
$ziel1 =("$verzei$copy1");
copy ($copy1,$ziel1);
$copy1="index.html";
$ziel1 =("$verzei$copy1");
copy ($copy1,$ziel1);

$copy1="ims_xml.xsd";
$ziel1 =("$verzei$copy1");
copy ($copy1,$ziel1);
$copy1="imscp_v1p1.xsd";
$ziel1 =("$verzei$copy1");
copy ($copy1,$ziel1);
$copy1="imsmd_v1p2p2.xsd";
$ziel1 =("$verzei$copy1");
copy ($copy1,$ziel1);

//ReloadContentPreview-Files

chdir ($rload);
$rloads="$rload/";
$verzei2 =("$webroot$verzs$rloads");
$copy1="reload.css";
$ziel1 =("$verzei2$copy1");
copy ($copy1,$ziel1);
$copy1="code.htm";
$ziel1 =("$verzei2$copy1");
copy ($copy1,$ziel1);
$copy1="CPFrame.htm";
$ziel1 =("$verzei2$copy1");
copy ($copy1,$ziel1);
$copy1="CPStart.htm";
$ziel1 =("$verzei2$copy1");
copy ($copy1,$ziel1);
$copy1="menu_empty.htm";
$ziel1 =("$verzei2$copy1");
copy ($copy1,$ziel1);
$copy1="search.htm";
$ziel1 =("$verzei2$copy1");
copy ($copy1,$ziel1);
$copy1="wait.htm";
$ziel1 =("$verzei2$copy1");
copy ($copy1,$ziel1);
$copy1="CPModel.js";
$ziel1 =("$verzei2$copy1");
copy ($copy1,$ziel1);
$copy1="mtmcode.js";
$ziel1 =("$verzei2$copy1");
copy ($copy1,$ziel1);

//menu-images

chdir ($mimages);
$mimagess="$mimages/";
$verzei3 =("$webroot$verzs$rloads$mimagess");
$copy1="blank16.gif";
$ziel1 =("$verzei3$copy1");
copy ($copy1,$ziel1);
$copy1="book-open.gif";
$ziel1 =("$verzei3$copy1");
copy ($copy1,$ziel1);
$copy1="cp_scorm.gif";
$ziel1 =("$verzei3$copy1");
copy ($copy1,$ziel1);
$copy1="file.gif";
$ziel1 =("$verzei3$copy1");
copy ($copy1,$ziel1);
$copy1="hiddenitemclosed.gif";
$ziel1 =("$verzei3$copy1");
copy ($copy1,$ziel1);
$copy1="hiddenitemleaf.gif";
$ziel1 =("$verzei3$copy1");
copy ($copy1,$ziel1);
$copy1="hide.gif";
$ziel1 =("$verzei3$copy1");
copy ($copy1,$ziel1);
$copy1="menu_bar.gif";
$ziel1 =("$verzei3$copy1");
copy ($copy1,$ziel1);
$copy1="menu_corner.gif";
$ziel1 =("$verzei3$copy1");
copy ($copy1,$ziel1);
$copy1="menu_corner_minus.gif";
$ziel1 =("$verzei3$copy1");
copy ($copy1,$ziel1);
$copy1="menu_corner_plus.gif";
$ziel1 =("$verzei3$copy1");
copy ($copy1,$ziel1);
$copy1="menu_folder_closed.gif";
$ziel1 =("$verzei3$copy1");
copy ($copy1,$ziel1);
$copy1="menu_folder_open.gif";
$ziel1 =("$verzei3$copy1");
copy ($copy1,$ziel1);
$copy1="menu_link_default.gif";
$ziel1 =("$verzei3$copy1");
copy ($copy1,$ziel1);
$copy1="menu_pixel.gif";
$ziel1 =("$verzei3$copy1");
copy ($copy1,$ziel1);
$copy1="menu_tee.gif";
$ziel1 =("$verzei3$copy1");
copy ($copy1,$ziel1);
$copy1="menu_tee_minus.gif";
$ziel1 =("$verzei3$copy1");
copy ($copy1,$ziel1);
$copy1="menu_tee_plus.gif";
$ziel1 =("$verzei3$copy1");
copy ($copy1,$ziel1);
$copy1="next.gif";
$ziel1 =("$verzei3$copy1");
copy ($copy1,$ziel1);
$copy1="next_disabled.gif";
$ziel1 =("$verzei3$copy1");
copy ($copy1,$ziel1);
$copy1="orgs.gif";
$ziel1 =("$verzei3$copy1");
copy ($copy1,$ziel1);
$copy1="prev.gif";
$ziel1 =("$verzei3$copy1");
copy ($copy1,$ziel1);
$copy1="prev_disabled.gif";
$ziel1 =("$verzei3$copy1");
copy ($copy1,$ziel1);
$copy1="show.gif";
$ziel1 =("$verzei3$copy1");
copy ($copy1,$ziel1);
$copy1="webtitle.gif";
$ziel1 =("$verzei3$copy1");
copy ($copy1,$ziel1);



// Dateien orten und kopieren
$uploaddir = "$dr/weload/uploads/";
chdir ($uploaddir);
$liste =".desc";
$array = file($liste);
for($x=0;$x<count($array);$x++){  
$anzahl=($anzahl+1);
$zeile= $array[$x];
$punkt = "|";
$punktii = "||";
$frageii = strchr ($zeile, $punktii);
$fragep = strchr ($zeile, $punkt);

if ($fragep != FALSE) :

$vorne = strpos($zeile,"|");

if ($frageii != FALSE) {
$vorne = strpos($zeile,"|");
$hinten = strpos ($zeile,"||");
$beschreibungen = substr($zeile,$vorne+1,$vorne-$hinten);
$loeschenstr = strpos($beschreibungen,"||");
$loeschen = substr($beschreibungen,0,$loeschenstr);
$beschreibungen=$loeschen;
$beschreibungen = chop($beschreibungen);
$filenamen = substr($zeile,$hinten+2);
$filenamen = chop($filenamen);
}

if ($frageii == FALSE) {
$filenamen = substr($zeile,0,$vorne);
$beschreibungen = substr($zeile,$vorne+1);
$beschreibungen = chop($beschreibungen);
}

if ($frageii == FALSE) {
$dateiens="Dateien/";
$verzei4 =("$webroot$verzs$dateiens");
$copy1="$filenamen";
$copy2="$filenamen";
$array_1 = array("ä","ö","ü","ß","Ä","Ö","Ü","_","„","“"," ");
$array_2 = array("ae","oe","ue","ss","Ae","Oe","Ue","_","","","_");
for($h=0;$h<11;$h++){  
$copy2 = str_replace($array_1[$h],$array_2[$h],$copy2);
}
}
if ($frageii != FALSE) {
$dateiens="Dateien/";
$verzei4 =("$webroot$verzs$dateiens");
$copy1="$filenamen";
$copy2="$filenamen";
}

//
if ($frageii == FALSE) {
$dateiens="Dateien/";
$verzei4 =("$webroot$verzs$dateiens");
$punkt = "://";
$fragep = strchr ($filenamen, $punkt);
if ($fragep != FALSE) {
$add = "$filenamen";
}
$punkt = "://";
$fragep = strchr ($filenamen, $punkt);
if ($fragep == FALSE) {
$ziel1 =("$verzei4$copy2");
copy ($copy1,$ziel1);
$filenamen = $copy2;
$add = "../Dateien/$filenamen";
}
}
//
if ($frageii != FALSE) {
$dateiens="Dateien/";
$verzei4 =("$webroot$verzs$dateiens");
$punkt = "://";
$fragep = strchr ($filenamen, $punkt);
if ($fragep != FALSE) {
$add = "$filenamen";
$ziel1 =("$verzei4$copy2");
copy ($copy1,$ziel1);
$add = "../Dateien/$filenamen";
}
$punkt = "://";
$fragep = strchr ($filenamen, $punkt);
if ($fragep == FALSE) {
$copy2="$copy2";
$ziel1 =("$verzei4$copy2");
copy ($copy1,$ziel1);
$filenamen = $copy2;
$origfile = substr($zeile,0,$vorne);
$frageo = strchr ($origfile, $punkt);
if ($frageo == FALSE) {
$origfile="$origfile";
$ziel2 =("$verzei4$origfile");
copy ($origfile,$ziel2);
$add = "../Dateien/$filenamen";
}
if ($frageo != FALSE) {
$hinten = strpos ($zeile,"||");
$filenamenh = substr($zeile,$hinten+2);
$filenamenh = chop($filenamenh);
$filenamenh="$filenamenh";
$ziel3 =("$verzei4$filenamenh");
copy ($filenamenh,$ziel3);
$add = "../Dateien/$filenamen";
}

}
}

chdir ($verzei);

$punkt = "://";
$fragep = strchr ($filenamen, $punkt);
if ($fragep == FALSE) {
$fpind = fopen ("items.txt","a+");
$headerind = "<item identifier=\"ITEM-$anzahl\" isvisible=\"true\" identifierref=\"RES-$anzahl\">
<title>$beschreibungen</title>
</item>
"; 
fputs ($fpind,$headerind);
fclose ($fpind);
}
if ($fragep != FALSE) {
$fpind = fopen ("items.txt","a+");
$headerind = "<item identifier=\"ITEM-$anzahl\" identifierref=\"RES-$anzahl\" isvisible=\"true\">
<title>$beschreibungen</title>
</item>
"; 
fputs ($fpind,$headerind);
fclose ($fpind);
}

if ($frageii == FALSE) {
$punkt = "://";
$fragep = strchr ($filenamen, $punkt);
if ($fragep != FALSE) {
$fpind = fopen ("ressource.txt","a+");
$headerind = "<resource identifier=\"RES-$anzahl\" type=\"text/html\" href=\"$filenamen\" />
";
fputs ($fpind,$headerind);
fclose ($fpind);
}
$punkt = "://";
$fragep = strchr ($filenamen, $punkt);
if ($fragep == FALSE) {
$fpind = fopen ("ressource.txt","a+");
$headerind = "<resource identifier=\"RES-$anzahl\" type=\"webcontent\" href=\"Dateien/$filenamen\">
      <file href=\"Dateien/$filenamen\" />
    </resource>
";
fputs ($fpind,$headerind);
fclose ($fpind);
}
}
if ($frageii != FALSE) {
$punkt = "://";
$fragep = strchr ($filenamen, $punkt);
if ($fragep != FALSE) {
$fpind = fopen ("ressource.txt","a+");
$headerind = "<resource identifier=\"RES-$anzahl\" type=\"text/html\" href=\"$filenamen\" />
";
fputs ($fpind,$headerind);
fclose ($fpind);
}
$punkt = "://";
$fragep = strchr ($filenamen, $punkt);
if ($fragep == FALSE) {
$orig = substr($zeile,0,$vorne);
$orign = substr($zeile,0,$vorne);
$frageq = strchr ($orign, $punkt);
if ($frageq == FALSE) {
$fpind = fopen ("ressource.txt","a+");
$headerind = "<resource identifier=\"RES-$anzahl\" type=\"webcontent\" href=\"Dateien/$filenamen\">
      <file href=\"Dateien/$filenamen\" />
      <file href=\"Dateien/$orig\" />
    </resource>
";
fputs ($fpind,$headerind);
fclose ($fpind);
}
if ($frageq != FALSE) {
$fpind = fopen ("ressource.txt","a+");
$headerind = "<resource identifier=\"RES-$anzahl\" type=\"webcontent\" href=\"Dateien/$filenamen\">
      <file href=\"Dateien/$filenamen\" />
    </resource>
";
fputs ($fpind,$headerind);
fclose ($fpind);
}
}
}

$banzahl = ($anzahl-1);
//CPOrgs Mittelteil
$fpind = fopen ("cporgs.txt","a+");
$headerind = "CPAPI.orgArray(0).itemArray($banzahl).itemTitle = \"$beschreibungen\";
CPAPI.orgArray(0).itemArray($banzahl).itemIdentifier = \"ITEM-$anzahl\";
CPAPI.orgArray(0).itemArray($banzahl).itemParent = \"menu\";
CPAPI.orgArray(0).itemArray($banzahl).itemHyper = \"$add\";
";
fputs ($fpind,$headerind);
fclose ($fpind);
//CPOrgs Ende


chdir ($uploaddir);
continue;
endif;
}

//Imsmanifest zusammenbasteln
chdir ($verzei);

$fpind = fopen ("imsmanifest.xml","a+");
$headerind = "<?xml version=\"1.0\" encoding=\"ISO-8859-1\"?>
<manifest xmlns=\"http://www.imsproject.org/xsd/imscp_rootv1p1p2\" xmlns:xsi=\"http://www.w3.org/2001/XMLSchema-instance\" identifier=\"$verzo\" version=\"1.1.3\">
    <organizations default=\"$verzo\">
    <organization identifier=\"$verzo\" structure=\"hierarchical\">
 <title>$verzo</title>

"; 
fputs ($fpind,$headerind);
fclose ($fpind);
//Items schreiben
$orgi=("items.txt");
$array2 = file($orgi);
for($y=0;$y<count($array2);$y++){  
$orgerg= $array2[$y];
$fpims = fopen ("imsmanifest.xml","a+");
$headerims = $orgerg;
fputs ($fpims,$headerims);
fclose ($fpims);
}
$fpind = fopen ("imsmanifest.xml","a+");
$headerind = "   </organization>
  </organizations>
  <resources>
"; 
fputs ($fpind,$headerind);
fclose ($fpind);

//Resources schreiben

$orgi=("ressource.txt");
$array2 = file($orgi);
for($y=0;$y<count($array2);$y++){  
$orgerg= $array2[$y];
$fpims = fopen ("imsmanifest.xml","a+");
$headerims = $orgerg;
fputs ($fpims,$headerims);
fclose ($fpims);
}
$fpind = fopen ("imsmanifest.xml","a+");
$headerind = "   </resources>
</manifest>
"; 
fputs ($fpind,$headerind);
fclose ($fpind);
$iteme ="items.txt";
$resi = "ressource.txt";
unlink ($iteme);
unlink ($resi);
$fpind = fopen ("CPOrgs.js","a+");
$headerind = "CPAPI.packageName = \"$verzo\";
CPAPI._defaultOrg = 0;
CPAPI.orgArray(0).organizationName = \"$verzo\";
CPAPI.orgArray(0).organizationIdentifier = \"$verzo\";
"; 
fputs ($fpind,$headerind);
fclose ($fpind);
$orgi=("cporgs.txt");
$array2 = file($orgi);
for($y=0;$y<count($array2);$y++){  
$orgerg= $array2[$y];
$fpims = fopen ("CPOrgs.js","a+");
$headerims = $orgerg;
fputs ($fpims,$headerims);
fclose ($fpims);
}
unlink ($orgi);
$verzei2 =("$webroot$verzs$rloads");
$copy1="CPOrgs.js";
$ziel1 =("$verzei2$copy1");
copy ($copy1,$ziel1);
$cpo = "CPOrgs.js";
unlink ($cpo);
$pfad = "/weload/$verz/";
echo "<BODY LANG=\"de-DE\" BGCOLOR=\"#c0c0c0\">";
echo "<P><FONT FACE=\"Arial,sans-serif\">";
echo "<HR>";
echo "<H2><A HREF=\"$pfad\" target=\"_blank\">Content Package Preview</A><br>";
echo "</H2>";
echo "<form enctype=\"multipart/form-data\" action=\"erzeugen.php\" method=\"post\">";
echo "<P><INPUT type=submit value=back></FORM>";
}
if ($_SESSION['admin']!="admin") {
echo "<P><FONT FACE=\"Arial,sans-serif\">";
echo "<BODY LANG=\"de-DE\" BGCOLOR=\"#c0c0c0\"><H2>";
echo "Access denied!</H2>";
}
?>


