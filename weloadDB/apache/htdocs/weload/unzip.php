<?
include('pclzip.lib.php');
echo "<BODY LANG=\"de-DE\" BGCOLOR=\"#c0c0c0\">";
echo "<P><FONT FACE=\"Arial,sans-serif\">";
$dr=$_SERVER['DOCUMENT_ROOT'];
$laenge=strlen($dr);
$dr2 = substr($dr,2,$laenge);
$dr=$dr2;
$uploaddir = "$dr/weload/zipped/";
$home = "$dr/weload/";


if ($userfile == "") {
echo "Keine Datei gewählt!";
echo "<form enctype=\"multipart/form-data\" action=\"webverwaltung.php\" method=\"post\">";
echo "<P><INPUT type=submit value=Zur&uuml;ck></FORM>";
exit;
}
chdir ($uploaddir);
$upfile=$_FILES['userfile']['name'];

$punkt = ".zip";
$fragep = strchr ($upfile, $punkt);
if ($fragep == FALSE) {
echo "Dies ist leider kein Zipfile";
echo "<br>";
echo "<form enctype=\"multipart/form-data\" action=\"webverwaltung.php\" method=\"post\">";
echo "<P><INPUT type=submit value=Zur&uuml;ck></FORM>";
exit;
}

if(is_file($upfile)){
$upfile=$_FILES['userfile']['name'];
print "<pre>";
if (move_uploaded_file($_FILES['userfile']['tmp_name'], $uploaddir . $_FILES['userfile']['name'])) {
    print "\n";
} else {
    print "Operation abgebrochen. Hier stimmt etwas nicht.\n";
    print_r($_FILES);
    exit;
}

echo "<BODY LANG=\"de-DE\" BGCOLOR=\"#c0c0c0\">";
echo "<P><FONT FACE=\"Arial,sans-serif\">";
echo "<H1>Datei wurde erfolgreich &uuml;berschrieben</H1>";
echo "Name:";
echo $upfile;
echo "<br>";
chdir ($uploaddir);
echo "<BODY LANG=\"de-DE\" BGCOLOR=\"#c0c0c0\">";
echo "<P><FONT FACE=\"Arial,sans-serif\">";
$zipname=$upfile;
  $zip = new PclZip("$zipname");
$reload="[filename] = ReloadContentPreviewFiles/";
$im="[filename] = imsmanifest.xml";  
  if (($list = $zip->listContent()) == 0) {
    die("Error : ".$zip->errorInfo(true));
  }
  
  for ($i=0; $i<sizeof($list); $i++) {
    for(reset($list[$i]); $key = key($list[$i]); next($list[$i])) {
ob_start();
      echo "File $i / [$key] = ".$list[$i][$key]."";
$image_data = ob_get_contents();
$fragep = strchr ($image_data, $reload);
ob_end_clean();
if ($fragep != FALSE) {
//echo "ReloadContentPreview gefunden.";
$CPreview="1";
}

$frageq = strchr ($image_data, $im);
if ($frageq != FALSE) {
$IM="1";
//echo "imsmanifest gefunden.";

}
}
//echo "<br>";
}

if ($CPreview != 1 && $IM != 1) {
echo "Diese Datei enthält weder eine HTML-Vorschau noch eine imsmanifest.xml";
chdir ($uploaddir);
unlink($upfile);
echo "<br>";
echo "<form enctype=\"multipart/form-data\" action=\"webverwaltung.php\" method=\"post\">";
echo "<P><INPUT type=submit value=Zur&uuml;ck></FORM>";
exit;
}

if ($CPreview != 1) {
echo "->Keine RELOAD-Vorschau enthalten. Erst ab Version 1.0 kann WeLOAD die Vorschau selbst generieren.";
chdir ($uploaddir);
unlink($upfile);
echo "<br>";
echo "<form enctype=\"multipart/form-data\" action=\"webverwaltung.php\" method=\"post\">";
echo "<P><INPUT type=submit value=Zur&uuml;ck></FORM>";
exit;

}


if ($IM != 1) {
echo "->Keine imsmanifest.xml enthalten. Kann daher nichts mit der ZIP-Datei anfangen";
chdir ($uploaddir);
unlink($upfile);
echo "<br>";
echo "<form enctype=\"multipart/form-data\" action=\"webverwaltung.php\" method=\"post\">";
echo "<P><INPUT type=submit value=Zur&uuml;ck></FORM>";
exit;
}


if ($CPreview == 1 && $IM==1) {
echo "Generiere das Content Package...";
//HEUTE
chdir ($uploaddir);
$archive = new PclZip("$zipname");
  if ($archive->extract(PCLZIP_OPT_PATH, 'temp') == 0) {
    die("Error : ".$archive->errorInfo(true));
  }
chdir ($home);
chdir ($uploaddir);
echo "<br>";
$laenge=strlen($zipname);
$vname = substr($zipname,0,$laenge-4);
chdir ($home);
if(is_dir($vname)){
echo "Verzeichnis existierte bereits.";
$pfad=$vname;
//Verzeichnis loeschen
require 'rmdir.php';
$dr=$_SERVER['DOCUMENT_ROOT'];
$a= "$dr/weload/$pfad";
    // loesche das Verzeichnis 
$res=rec_rmdir($a);
    // wurde das Verzeichnis korrekt gelöscht
    switch ($res) {
      case 0:
        // das Verzeichnis wurde korrekt gelöscht
echo "Verzeichnis wurde neu erstellt.";
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

//Verzeichnis loeschen ENDE
}
mkdir ($vname);
$TargetDirectory="$dr/weload/$vname/";
chdir ($uploaddir);
$tempv="$uploaddir/temp";
chdir ($tempv);
chdir ($uploaddir);
$SourceDirectory=$tempv;
chdir ($home);
require 'xcopy.php';
$mach=CopyDirectory($SourceDirectory, $TargetDirectory);
chdir ($uploaddir);
//Temp-Verzeichnis loeschen
require 'rmdir2.php';
$dr=$_SERVER['DOCUMENT_ROOT'];
$a= "$dr/weload/zipped/temp/";
$path="temp";
    // loesche das Verzeichnis 
$res=rec_rmdir2($a);
    // wurde das Verzeichnis korrekt gelöscht
    switch ($res) {
      case 0:
        // das Verzeichnis wurde korrekt gelöscht
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

//Verzeichnis loeschen ENDE
chdir ($uploaddir);
$ttemp="temp";
mkdir ($ttemp);
echo "<form enctype=\"multipart/form-data\" action=\"webverwaltung.php\" method=\"post\">";
echo "<P><INPUT type=submit value=Zur&uuml;ck></FORM>";
}
exit;
//HEUTE ENDE
}

$upfile=$_FILES['userfile']['name'];
print "<pre>";
if (move_uploaded_file($_FILES['userfile']['tmp_name'], $uploaddir . $_FILES['userfile']['name'])) {
    print "\n";
} else {
    print "Operation abgebrochen. Hier stimmt etwas nicht.\n";
    print_r($_FILES);
    exit;
}

echo "<BODY LANG=\"de-DE\" BGCOLOR=\"#c0c0c0\">";
echo "<P><FONT FACE=\"Arial,sans-serif\">";
echo "<H1>Datei wurde erfolgreich hochgeladen</H1>";
echo "<br>";
echo "Name:";
echo $upfile;
echo "<br>";

chdir ($uploaddir);
echo "<BODY LANG=\"de-DE\" BGCOLOR=\"#c0c0c0\">";
echo "<P><FONT FACE=\"Arial,sans-serif\">";
$zipname=$upfile;
  $zip = new PclZip("$zipname");
$reload="[filename] = ReloadContentPreviewFiles/";
$im="[filename] = imsmanifest.xml";  
  if (($list = $zip->listContent()) == 0) {
    die("Error : ".$zip->errorInfo(true));
  }
  
  for ($i=0; $i<sizeof($list); $i++) {
    for(reset($list[$i]); $key = key($list[$i]); next($list[$i])) {
ob_start();
      echo "File $i / [$key] = ".$list[$i][$key]."";
$image_data = ob_get_contents();
$fragep = strchr ($image_data, $reload);
ob_end_clean();
if ($fragep != FALSE) {
//echo "ReloadContentPreview gefunden.";
$CPreview="1";
}

$frageq = strchr ($image_data, $im);
if ($frageq != FALSE) {
$IM="1";
//echo "imsmanifest gefunden.";

}
}

}

if ($CPreview != 1 && $IM != 1) {
echo "Diese Datei enthält weder eine HTML-Vorschau noch eine imsmanifest.xml";
chdir ($uploaddir);
unlink($upfile);
exit;
}

if ($CPreview != 1) {
echo "->Keine RELOAD-Vorschau enthalten. Erst ab Version 1.0 kann WeLOAD die Vorschau selbst generieren.";
chdir ($uploaddir);
unlink($upfile);
exit;

}


if ($IM != 1) {
echo "->Keine imsmanifest.xml enthalten. Kann daher nichts mit der ZIP-Datei anfangen";
chdir ($uploaddir);
unlink($upfile);
exit;
}


if ($CPreview == 1 && $IM==1) {
echo "Generiere das Content Package...";

//HEUTE
chdir ($uploaddir);
$archive = new PclZip("$zipname");
  if ($archive->extract(PCLZIP_OPT_PATH, 'temp') == 0) {
    die("Error : ".$archive->errorInfo(true));
  }
chdir ($home);
chdir ($uploaddir);
echo "<br>";
$laenge=strlen($zipname);
$vname = substr($zipname,0,$laenge-4);
chdir ($home);
if(is_dir($vname)){
echo "Verzeichnis existierte bereits.";
$pfad=$vname;
//Verzeichnis loeschen
require 'rmdir.php';
$dr=$_SERVER['DOCUMENT_ROOT'];
$a= "$dr/weload/$pfad";
    // loesche das Verzeichnis 
$res=rec_rmdir($a);
    // wurde das Verzeichnis korrekt gelöscht
    switch ($res) {
      case 0:
        // das Verzeichnis wurde korrekt gelöscht
echo "Verzeichnis wurde neu erstellt.";
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

//Verzeichnis loeschen ENDE
}
mkdir ($vname);
$TargetDirectory="$dr/weload/$vname/";
chdir ($uploaddir);
$tempv="$uploaddir/temp";
chdir ($tempv);
chdir ($uploaddir);
$SourceDirectory=$tempv;
chdir ($home);
require 'xcopy.php';
$mach=CopyDirectory($SourceDirectory, $TargetDirectory);
chdir ($uploaddir);
//Temp-Verzeichnis loeschen
require 'rmdir2.php';
$dr=$_SERVER['DOCUMENT_ROOT'];
$a= "$dr/weload/zipped/temp/";
$path="temp";
    // loesche das Verzeichnis 
$res=rec_rmdir2($a);
    // wurde das Verzeichnis korrekt gelöscht
    switch ($res) {
      case 0:
        // das Verzeichnis wurde korrekt gelöscht
echo "Das Content Package $vname wurde in WeLOAD eingestellt";
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

//Verzeichnis loeschen ENDE
chdir ($uploaddir);
$ttemp="temp";
mkdir ($ttemp);
echo "<form enctype=\"multipart/form-data\" action=\"webverwaltung.php\" method=\"post\">";
echo "<P><INPUT type=submit value=Zur&uuml;ck></FORM>";

//HEUTE ENDE
}
?> 