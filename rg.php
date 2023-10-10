<?php

$nomeFile = "database.txt";

$username = $_POST['username'];
$password = $_POST['password'];

if (file_exists($nomeFile)) {
    $file = fopen($nomeFile, "a"); 

    if ($file) {
        fwrite($file, $username . " " . $password . "\n"); 
        fclose($file);
        echo "Dati scritti correttamente nel file.";
    } else {
        echo "Impossibile aprire il file.";
    }
} else {
    echo "Il file non esiste!";
}

?>