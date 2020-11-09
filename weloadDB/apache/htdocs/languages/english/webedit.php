<?
@session_start();
if ($_SESSION['admin']=="admin") {
echo "<P><FONT FACE=\"Arial,sans-serif\">";
echo "<BODY LANG=\"de-DE\" BGCOLOR=\"#c0c0c0\">";
$web="weload";
echo "<b>In WeLOAD 0.92 you can only view the structure of the imsmanifest.xml.</b><br><br>";
echo "For further editing use RELOAD.<br>";
echo "In the next versions more features are planned.<br><br>";

echo "<form enctype=\"multipart/form-data\" action=\"webverwaltung.php\" method=\"post\">";
echo "<P><INPUT type=submit value=back></FORM>";

$liste ="imsmanifest.xml";
chdir ($y);
if (file_exists($liste)) {
$t = "&nbsp;";
$o = 4;
$auf=".auf";
if(is_file($auf)){
unlink ($auf);
}
$aug=".aug";
if(is_file($aug)){
unlink ($aug);
}

$parentsn="parents";
if(is_file($parentsn)){
unlink ($parentsn);
}

$array = file($liste);
$r=count($array);
$maniname="";

$parent="menu";
$fparents = fopen ("parents","a+");
$headerind ="menu
";  
fputs ($fparents,$headerind);
fclose ($fparents);

for($x=0;$x<count($array);$x++){ 
$g=0;
$j=0;
$zeile= $array[$x];
$copy1=($zeile);
$copy2=($zeile);
$array_1 = array("Ä","ä","Ö","ö","Ü","ü","ß");
$array_2 = array("&Auml;","&auml;","&Ouml;","&ouml;","&Uuml;","&uuml;","&szlig;");
for($h=0;$h<6;$h++){  
$copy2 = str_replace($array_1[$h],$array_2[$h],$copy2);
$zeile=$copy2;
}
//$maniname="1"; identifier=
$manifeste= "xml:base=\"";
//Content Package Name
$frageX= strchr ($zeile,"xmlns:xsi");
if ($frageX != FALSE) {
$cpn="identifier=";
$frageC = strchr ($zeile, $cpn);
if ($frageC != FALSE) {
$vornem = strpos($zeile,"identifier=\"");
$zeile = substr($zeile,$vornem+12);
$structurem= "\"";
$hintenm = strpos($zeile,$structurem);
//$cpname = substr($zeile,$vornem+12,$hintenm-$vornem-14);
$cpname = substr($zeile,0,$hintenm);
$fpauf = fopen (".auf","a+");
$headerind = "$x,$x:MN/$cpname
"; 
fputs ($fpauf,$headerind);
fclose ($fpauf);
}
}
//Ende Content Package Name

$punkt = "<organization identifier=\"";
$fragep = strchr ($zeile, $punkt);
$fragem = strchr ($zeile, $manifeste);
if ($fragem != FALSE) {
$vornem = strpos($zeile,"xml:base=\"");
$structurem= ">";
$hintenm = strrpos($zeile,$structurem);
$maniname = substr($zeile,$vornem+10,$hintenm-$vornem-11);
//echo $maniname;
}
//
if ($fragep != FALSE) {
$vorne = strpos($zeile,"<organization identifier=\"");
$structure= "structure=\"";
$hinten = strpos($zeile,$structure);
$iorgname = substr($zeile,$vorne+26,$hinten-$vorne-28);
$iorgzaehler=$iorgzaehler+1;
$itemzaehler=0;
$ioorgzaehler=$iorgzaehler-1;
$fpauf = fopen (".auf","a+");
$headerind = "$x,$x:OI/$iorgname//($ioorgzaehler)
"; 
fputs ($fpauf,$headerind);
fclose ($fpauf);

$zz=($x+2);
for($z=$x;$z<$zz;$z++){  
$zeile= $array[$z];
$punkt = "<title>";
$fragep = strchr ($zeile, $punkt);
if ($fragep != FALSE) {
$vorne = strpos($zeile,"<title>");
$structure= "</title>";
$hinten = strpos($zeile,$structure);
$orgname = substr($zeile,$vorne+7,$hinten-$vorne-7);
echo "<b>";
echo $orgname;
echo "</b><br>";
$orgzaehler=$orgzaehler+1;
$oorgzaehler=$orgzaehler-1;

$fpauf = fopen (".auf","a+");
$headerind = "$z,$z:ON/$orgname//($oorgzaehler)
"; 
fputs ($fpauf,$headerind);
fclose ($fpauf);

}
}
}

//Items isolieren


$tt = str_repeat($t,$o);
$punkt = "<item identifier=\"";
//Item Identifier

$weile=$zeile;
$spweile=strpos($weile,$punkt);
$weile= substr($weile,$spweile+18);
$structurem= "\"";
$hinteni = strpos($weile,$structurem);
$itemident = substr($weile,0,$hinteni);

//Item Identifier Ende
$punkti = "identifierref=";
$itemend ="</item>";
$fragep = strchr ($zeile, $punkt);
if ($fragep != FALSE) {
$itemzaehler=($itemzaehler+1);
$itemzahl=($itemzaehler-1);
}
$frager = strchr ($zeile, $punkti);
$frageit = strchr ($zeile, $itemend);
if ($fragep != FALSE && $frager != FALSE) {
$structure2= "\">";
$vorne2 = strpos($zeile,"identifierref=\"");
$hinten2 = strrpos($zeile,$structure2);
$itemzwi = substr($zeile,$vorne2+15,$hinten2-$vorne2-14);
$hinten3 = strpos($itemzwi,"\"");
$itemname2 = substr($itemzwi,0,$hinten3);
$weile=$zeile;
$spweile=strpos($weile,$punkt);
$weile= substr($weile,$spweile+18);

$structurem= "\"";
$hinteni = strpos($weile,$structurem);
$itemident = substr($weile,0,$hinteni);
//echo $itemident;
//Ressourcenzeilen finden
$array_3 = file($liste);
for($c=0;$c<count($array_3);$c++){ 
$ceile= $array_3[$c];
$cunkt = "<resource identifier=\"$itemname2\"";
$citemend ="</resource>";
$fragec = strchr ($ceile, $cunkt);
//$fragec2 = strchr ($ceile, $citemend);
if ($fragec != FALSE) {
$c1=$c;
$cc=($c+1);
for($d=$cc;$d<count($array_3);$d++){
$deile= $array_3[$d];
$fragec2 = strchr ($deile, $citemend);
if ($fragec2 != FALSE) {
$c2=$d;
break;
}
if ($c2<$c1) {
$c2=$c1;
}
}
}
}
//Ressourcenzeilen finden: Ende

$zz=($x+2);
for($z=$x;$z<$zz;$z++){  
$zeile= $array[$z];
$punkt = "<title>";
$fragep = strchr ($zeile, $punkt);
if ($fragep != FALSE) {
$vorne = strpos($zeile,"<title>");
$structure= "</title>";
$hinten = strpos($zeile,$structure);
$itemname = substr($zeile,$vorne+7,$hinten-$vorne-7);

$copy1=($itemname);
$copy2=($itemname);
$array_1 = array("Ä","ä","Ö","ö","Ü","ü","ß");
$array_2 = array("&Auml;","&auml;","&Ouml;","&ouml;","&Uuml;","&uuml;","&szlig;");
for($h=0;$h<7;$h++){  
$copy2 = str_replace($array_1[$h],$array_2[$h],$copy2);
$itemname=$copy2;
}

$zy=($zz+1);
$a=($zz);
for($b=$a;$b<$zy;$b++){  
$zeile= $array[$b];
$punkt = "<item";
$frageit = strchr ($zeile, $itemend);
$fragep = strchr ($zeile, $punkt);
if ($fragep == TRUE) {
$tt = str_repeat($t,$o);

echo $tt;
//echo "Item+Verzeichnis: ";
//echo $itemname;
//echo $itemname2;

for($i=0;$i<count($array);$i++){ 
$teile= $array[$i];
$punkt = "<resource identifier=\"$itemname2\"";
$frager = strchr ($teile, $punkt);
if ($frager != FALSE) {
$vorn = strpos($teile, "href=\"");
$hint = strrpos($teile,"\"");
$resname = substr($teile,$vorn+6,$hint-$vorn-6);
//echo $resname;
  $httppunkt = "://";
$httpfrager = strchr ($teile, $httppunkt);
if ($httpfrager != FALSE) {
   echo "<A HREF=\"$resname\"target=\"_blank\">$itemname";

$fpauf = fopen (".auf","a+");
$xz=($x+1);
$headerind = "$x,$xz:$c1,$c2|$ioorgzaehler||$itemzahl|||$itemname||||$itemident|||||$resname||||||$parent
"; 
fputs ($fpauf,$headerind);
fclose ($fpauf);


}
if ($httpfrager == FALSE) {
   echo "<A HREF=\"/weload/$y/$maniname$resname\"target=\"_blank\">$itemname";



$fpauf = fopen (".auf","a+");
$xz=($x+1);
$headerind = "$x,$xz:$c1,$c2|$ioorgzaehler||$itemzahl|||$itemname||||$itemident|||||$maniname$resname||||||$parent
"; 
fputs ($fpauf,$headerind);
fclose ($fpauf);

}

}
}
echo "<br></A>";
$o =($o+4);
$tt = str_repeat($t,$o);
$g=1;
$fparents = fopen ("parents","a+");
$headerind ="$itemident
";  
fputs ($fparents,$headerind);
fclose ($fparents);
$pzaehler=$pzaehler+1;
$listeparents="parents";
$arrayp = file($listeparents);
$parent= $arrayp[$pzaehler];
$parent=trim ($parent);

}

if ($fragep == FALSE) {
$tt = str_repeat($t,$o);

echo $tt;
//echo "Item: ";
//echo $itemname;
//echo $itemname2;

for($i=0;$i<count($array);$i++){ 
$teile= $array[$i];
$punkt = "<resource identifier=\"$itemname2\"";
$frager = strchr ($teile, $punkt);
if ($frager != FALSE) {
$vorn = strpos($teile, "href=\"");
$hint = strrpos($teile,"\"");
$resname = substr($teile,$vorn+6,$hint-$vorn-6);
//echo $resname;

$httppunkt = "://";
$httpfrager = strchr ($teile, $httppunkt);
if ($httpfrager != FALSE) {
   echo "<A HREF=\"$resname\"target=\"_blank\">$itemname";

$fpauf = fopen (".auf","a+");
$xd=($x+2);
$headerind = "$x,$xd:$c1,$c2|$ioorgzaehler||$itemzahl|||$itemname||||$itemident|||||$resname||||||$parent
"; 
fputs ($fpauf,$headerind);
fclose ($fpauf);
}
if ($httpfrager == FALSE) {
echo "<A HREF=\"/weload/$y/$maniname$resname\"target=\"_blank\">$itemname";

$fpauf = fopen (".auf","a+");
$xd=($x+2);
$headerind = "$x,$xd:$c1,$c2|$ioorgzaehler||$itemzahl|||$itemname||||$itemident|||||$maniname$resname||||||$parent
"; 
fputs ($fpauf,$headerind);
fclose ($fpauf);
}

}
}
echo "<br></A>";
}
}

}
}
}

if ($frageit != FALSE) {
$zz=($x+2);
$a =($x+1);
for($z=$a;$z<$zz;$z++){  
$zeile= $array[$z];
$punkt = "</item>";
$fragep = strchr ($zeile, $punkt);
if ($fragep != FALSE) {
//$tt = str_repeat($t,$o);
//echo $tt;
//echo "Verzeichnis ist hier zu Ende ";
//echo "<br>";
$fpauf = fopen (".auf","a+");
$xe=($x+1);
$headerind = "$xe,$xe: ||||VE\n";  
fputs ($fpauf,$headerind);
fclose ($fpauf);
$pzaehler=$pzaehler-1;
$listeparents="parents";
$arrayl = file($listeparents);
$rl=count($arrayl);
$rl=$rl-1;
for($xl=0;$xl<$rl;$xl++){ 
$zeilel= $arrayl[$xl];
$fparentss = fopen ("parentss","a+");
$headerind ="$zeilel";
fputs ($fparentss,$headerind);
fclose ($fparentss);
}
$unlinkpa="parents";
$unlinkpm="parentss";
unlink ($unlinkpa);
rename ($unlinkpm,$unlinkpa);
$listeparents="parents";
$arrayp = file($listeparents);
$parent= $arrayp[$pzaehler];
$parent=trim ($parent);

//if ($k == 1) {
//$o =($o-4);
$k=1;
//}
$o =($o-4);
$tt = str_repeat($t,$o);



}
}
}

if ($frager == FALSE && $fragep != FALSE) {
$zz=($x+2);
for($z=$x;$z<$zz;$z++){  
$zeile= $array[$z];
$punkt = "<title>";
$fragep = strchr ($zeile, $punkt);
if ($fragep != FALSE) {
$vorne = strpos($zeile,"<title>");
$structure= "</title>";
$hinten = strpos($zeile,$structure);
$itemname = substr($zeile,$vorne+7,$hinten-$vorne-7);
$copy1=($itemname);
$copy2=($itemname);
$array_1 = array("Ä","ä","Ö","ö","Ü","ü","ß");
$array_2 = array("&Auml;","&auml;","&Ouml;","&ouml;","&Uuml;","&uuml;","&szlig;");
for($h=0;$h<7;$h++){  
$copy2 = str_replace($array_1[$h],$array_2[$h],$copy2);
$itemname=$copy2;
}


//echo $tt;
//echo "Verzeichnis: ";
if ($g == 0) {
echo $tt;
echo "<i>";
echo $itemname;
echo "</i><br>";



$fpauf = fopen (".auf","a+");
$xz=($x+1);
$headerind = "$x,$xz:$c1,$c2|$ioorgzaehler||$itemzahl|||$itemname||||$itemident|||||javascript:void(0)||||||$parent
";  
fputs ($fpauf,$headerind);
fclose ($fpauf);

$fparents = fopen ("parents","a+");
$headerind ="$itemident
";  
fputs ($fparents,$headerind);
fclose ($fparents);
$pzaehler=$pzaehler+1;
$listeparents="parents";
$arrayp = file($listeparents);
$parent= $arrayp[$pzaehler];
$parent=trim ($parent);
//EINFUEGUG
$zz=($x+3);
$a =($x+2);
for($z=$a;$z<$zz;$z++){  
$zeile= $array[$z];
$punkt = "</item>";
$fragep = strchr ($zeile, $punkt);
if ($fragep == TRUE) {
$o = $o;
$tt = str_repeat($t,$o);
}
if ($fragep == FALSE) {
$o =($o+4);
$tt = str_repeat($t,$o);
}
}
//EINFUEGUNG ENDE


//$o =($o+4);
//$tt = str_repeat($t,$o);


}

}

}
}

//ITEMS isolieren

}
//unlink ($auf);
//.auf auf Zeilenkonsistenz checken
$array = file($auf);
$r=count($array);
if ($r==1) {
exit;
}
for($x=0;$x<count($array);$x++){
$zeile= $array[$x];
$komma=",";
$doppelp=":";
$vorg1=strpos ($zeile,",");
$vorg2=strpos ($zeile,":");
$vorg=substr ($zeile,$vorg1+1,$vorg2-$vorg1-1);
//echo $vorg;
$nz= ($x+1);
$nzeile = $array[$nz];
$nachf1=strpos ($nzeile,",");
$nachf2=substr ($nzeile,0,$nachf1);
//echo "bis";
//echo $nachf2;
$frageg=($nachf2-$vorg);

if ($frageg==1) {
//echo "  OK";
$fpaug = fopen (".aug","a+");
$header = "$zeile";  
fputs ($fpaug,$header);
fclose ($fpaug);
}
if ($frageg>1) {
//echo "Nicht  OK";
$zeile=str_replace($vorg,$nachf2-1,$zeile);
$fpaug = fopen (".aug","a+");
$header = "$zeile";  
fputs ($fpaug,$header);
fclose ($fpaug);
}

if ($frageg<1) {
//echo "Letzte Zeile";
$fpaug = fopen (".aug","a+");
$header = "$zeile";  
fputs ($fpaug,$header);
fclose ($fpaug);
}
//echo "<br>";
}
//unlink ($aug);
//$copy1 = ".aug";
//$ziel1 = ".auf";
//rename ($copy1,$ziel1);
$dparent="parents";
unlink ($dparent);
unlink ($aug);
unlink ($auf);
exit;
}
echo "No imsmanifest.xml found!";
}
if ($_SESSION['admin']!="admin") {
echo "<P><FONT FACE=\"Arial,sans-serif\">";
echo "<BODY LANG=\"de-DE\" BGCOLOR=\"#c0c0c0\"><H2>";
echo "Du bist nicht berechtigt!</H2>";
}
?>