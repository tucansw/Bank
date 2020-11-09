<?php

// rec_rmdir - loesche ein Verzeichnis rekursiv
// Rueckgabewerte:
//   0  - alles ok
//   -1 - kein Verzeichnis
//   -2 - Fehler beim Loeschen
//   -3 - Ein Eintrag eines Verzeichnisses war keine Datei und kein Verzeichnis und
//        kein Link
function rec_rmdir2 ($pfad) {
    // schau' nach, ob das ueberhaupt ein Verzeichnis ist
    if (!is_dir ($pfad)) {
        return -1;
    }
    // oeffne das Verzeichnis
    $dir = @opendir ($pfad);
    
    // Fehler?
    if (!$dir) {
        return -2;
    }
    
    // gehe durch das Verzeichnis
    while ($entry = @readdir($dir)) {
        // wenn der Eintrag das aktuelle Verzeichnis oder das Elternverzeichnis
        // ist, ignoriere es
        if ($entry == '.' || $entry == '..') continue;
        // wenn der Eintrag ein Verzeichnis ist, dann 
        if (is_dir ($pfad.'/'.$entry)) {
            // rufe mich selbst auf
            $res = rec_rmdir2 ($pfad.'/'.$entry);
            // wenn ein Fehler aufgetreten ist
            if ($res == -1) { // dies duerfte gar nicht passieren
                @closedir ($dir); // Verzeichnis schliessen
                return -2; // normalen Fehler melden
            } else if ($res == -2) { // Fehler?
                @closedir ($dir); // Verzeichnis schliessen
                return -2; // Fehler weitergeben
            } else if ($res == -3) { // nicht unterstuetzer Dateityp?
                @closedir ($dir); // Verzeichnis schliessen
                return -3; // Fehler weitergeben
            } else if ($res != 0) { // das duerfe auch nicht passieren...
                @closedir ($dir); // Verzeichnis schliessen
                return -2; // Fehler zurueck
            }
        } else if (is_file ($pfad.'/'.$entry) || is_link ($pfad.'/'.$entry)) {
            // ansonsten loesche diese Datei / diesen Link
            $res = @unlink ($pfad.'/'.$entry);
            // Fehler?
            if (!$res) {
                @closedir ($dir); // Verzeichnis schliessen
                return -2; // melde ihn
            }
        } else {
            // ein nicht unterstuetzer Dateityp
            @closedir ($dir); // Verzeichnis schliessen
            return -3; // tut mir schrecklich leid...
        }
    }
    
    // schliesse nun das Verzeichnis
    @closedir ($dir);
    
    // versuche nun, das Verzeichnis zu loeschen
    $res = @rmdir ($pfad);
    
    // gab's einen Fehler?
    if (!$res) {
        return -2; // melde ihn
    }
    
    // alles ok
    return 0;
}

?>

