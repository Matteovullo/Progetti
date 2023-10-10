<?php
$nomeFile = "database.txt";

$username = $_POST['username'];
$password = $_POST['password'];

if (file_exists($nomeFile)) {
    $file = fopen($nomeFile, "r");

    if ($file) {
        $accesso_riuscito = false; 
        while (($line = fgets($file)) !== false) {
            $parti = explode(" ", $line);

            if (count($parti) === 2) {
                $prima_parte = trim($parti[0]); 
                $seconda_parte = trim($parti[1]);

                
                if ($prima_parte === $username && $seconda_parte === $password) {
                    $accesso_riuscito = true;
                    break; 
                }
            } else {
                echo "La stringa non è stata suddivisa correttamente.";
            }
        }

        fclose($file);

        if ($accesso_riuscito) {
            echo "Accesso effettuato";
        } else {
            echo "Accesso negato";
        }
    } else {
        echo "Impossibile aprire il file.";
    }
} else {
    echo "Il file non esiste!";
}
?>
