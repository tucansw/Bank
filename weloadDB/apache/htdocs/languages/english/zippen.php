<?php
echo "<BODY LANG=\"de-DE\" BGCOLOR=\"#c0c0c0\">";
echo "<P><FONT FACE=\"Arial,sans-serif\">";
include_once('pclzip.lib.php');
$dr=$_SERVER['DOCUMENT_ROOT'];
$pp="$dr/weload/$y";
chdir ($pp);
$packpath = "$dr/weload/zipped/";
$archive = new PclZip('archiv.zip');

  $v_list = $archive->create("$pp",
PCLZIP_OPT_REMOVE_PATH, "$pp");


  if ($v_list == 0) {
    die("Error : ".$archive->errorInfo(true));
  }
chdir ($pp);

$copy1="archiv.zip";
$ziel1 =$packpath;
copy ($copy1,"$ziel1$copy1");
$archiv="archiv.zip";
unlink ("archiv.zip");
chdir ($packpath);

require_once('pclzip.lib.php');
  $archive = new PclZip('archiv.zip');
  $v_list = $archive->delete(PCLZIP_OPT_BY_EREG, 'archiv.zip');
  if ($v_list == 0) {
    die("Error : ".$archive->errorInfo(true));
  }
$zipname="$y.zip";
if(is_file($zipname)){
echo "File rewrited!";
unlink ($zipname);
}
rename ($copy1,$zipname);
echo "<BODY LANG=\"de-DE\" BGCOLOR=\"#c0c0c0\">";
echo "<P><FONT FACE=\"Arial,sans-serif\">";
echo "<H1>Zipping was successful</H1>";

echo "<H2><A HREF=\"/weload/zipped/$zipname\" target=\"_blank\">downloading $zipname</H2></A>";
echo "<form enctype=\"multipart/form-data\" action=\"webverwaltung.php\" method=\"post\">";
echo "<P><INPUT type=submit value=back></FORM></P>";
echo "<HR>";
echo "<H3>Zipped files in WeLOAD</H3>";

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

$filename = "$packpath$zipname";
if (file_exists($filename)) {
echo "<img src=\"../images/zip.gif\" border=0\" alt=\"\"><A HREF=\"$pathzeile\"target=\"_blank\">$zeile";
echo "<br>";
}
continue;
endif;
}
unlink ($liste);
echo "<HR>";

?> 
