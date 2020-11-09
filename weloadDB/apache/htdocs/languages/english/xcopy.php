<?
function CopyDirectory($SourceDirectory, $TargetDirectory)
{

    // add trailing slashes
    if (substr($SourceDirectory,-1)!='/'){
        $SourceDirectory .= '/';
    }
    if (substr($TargetDirectory,-1)!='/'){
        $TargetDirectory .= '/';
    }



    $handle = @opendir($SourceDirectory);
    if (!$handle) {
        die("Das Verzeichnis $SourceDirectory konnte nicht geöffnet werden.");
    }


    if (!is_dir($TargetDirectory)) {
        mkdir($TargetDirectory);
        chmod($TargetDirectory, 0777); 
    }


    while ($entry = readdir($handle) ){
        if ($entry[0] == '.'){
            continue;
        }

        if (is_dir($SourceDirectory.$entry)) {
            // Unterverzeichnis
            $success = CopyDirectory($SourceDirectory.$entry, $TargetDirectory.$entry);

        }else{
                $target = $TargetDirectory.$entry;
            copy($SourceDirectory.$entry, $target);
            chmod($target, 0777); 
        }
    }
    return true;
}
?>